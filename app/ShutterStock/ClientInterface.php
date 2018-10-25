<?php

namespace App\ShutterStock;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
interface ClientInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws ClientException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface;
}