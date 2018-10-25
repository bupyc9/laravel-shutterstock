<?php

namespace App\ShutterStock;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
class Client implements ClientInterface
{
    private $client;
    /**
     * @var string
     */
    private $consumerKey;
    /**
     * @var string
     */
    private $consumerSecret;

    /**
     * Client constructor.
     * @param string $url
     * @param string $consumerKey
     * @param string $consumerSecret
     * @throws \InvalidArgumentException
     */
    public function __construct(string $url, string $consumerKey, string $consumerSecret)
    {
        $this->client = new \GuzzleHttp\Client(
            [
                'base_uri' => $url,
                RequestOptions::TIMEOUT => 5.0,
                RequestOptions::ALLOW_REDIRECTS => true,
            ]
        );

        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws ClientException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $options = [
            RequestOptions::AUTH => [$this->consumerKey, $this->consumerSecret],
        ];
        if ($request->getMethod() === Request::METHOD_GET) {
            $options[RequestOptions::QUERY] = $request->getData();
        }
        if ($request->getMethod() === Request::METHOD_POST) {
            $options[RequestOptions::FORM_PARAMS] = $request->getData();
        }

        try {
            $response = $this->client->request($request->getMethod(), $this->buildUri($request), $options);
        } catch (\GuzzleHttp\Exception\ClientException | GuzzleException $e) {
            $response = $e->getResponse();
        }

        $data = [];
        $contents = $response->getBody()->getContents();
        if (!empty($contents)) {
            $data = \json_decode($contents, true);

            if (!\is_array($data)) {
                throw new ClientException('Can not parse response to json');
            }
        }

        return $request->createResponse($data, $response->getStatusCode());
    }

    /**
     * @param RequestInterface $request
     * @return string
     */
    private function buildUri(RequestInterface $request): string
    {
        return str_replace('//', '/', '/v2/' . $request->getUri());
    }
}