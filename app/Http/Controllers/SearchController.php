<?php

namespace App\Http\Controllers;

use App\Entities\SearchRequest;
use App\Repositories\SearchRequestRepository;
use App\Repositories\SearchResultRepository;
use App\ShutterStock\ClientException;
use App\ShutterStock\Images\Search\Asset;
use App\ShutterStock\Images\Search\ImagesSearchRequest;
use App\ShutterStock\Images\Search\ImagesSearchResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        return view('search.index', ['searchRequest' => null, 'query' => '']);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function search(Request $request)
    {
        $data = \Validator::make(
            $request->query(),
            [
                'q' => 'required|max:255',
            ]
        )->validate();

        $query = $data['q'];

        try {
            $imagesSearchRequest = new ImagesSearchRequest($query);
            /** @var ImagesSearchResponse $response */
            $response = \ShutterStock::sendRequest($imagesSearchRequest);

            $searchRequestRepository = app()->make(SearchRequestRepository::class);
            $searchResultRepository = app()->make(SearchResultRepository::class);
            /** @var SearchRequest $searchRequest */
            $searchRequest = $searchRequestRepository->create(['query' => $query]);

            $items = $response->getItems();
            foreach ($items as $item) {
                /** @var Asset $asset */
                $asset = $item->getAssets()->get('preview');

                $searchResultRepository->create(
                    [
                        'aspect' => $item->getAspect(),
                        'description' => $item->getDescription(),
                        'image_type' => $item->getImageType(),
                        'media_type' => $item->getMediaType(),
                        'url' => $asset->getUrl(),
                        'height' => $asset->getHeight(),
                        'width' => $asset->getWidth(),
                        'request_id' => $searchRequest->id,
                    ]
                );
            }

            return redirect()->route('searchResults', ['id' => $searchRequest->id]);
        } catch (ClientException $e) {
            \Log::error($e->getMessage(), ['exception' => $e]);
        }

        return redirect()->route('searchIndex');
    }
}
