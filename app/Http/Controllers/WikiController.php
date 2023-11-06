<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class WikiController extends Controller
{
    public function getWikipediaInfo(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'playerName' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $name = $request->input('playerName');

        try {
            // Step 1: Search for the person's article and retrieve the page ID
            $searchResponse = Http::get('https://en.wikipedia.org/w/api.php', [
                'action' => 'query',
                'format' => 'json',
                'list' => 'search',
                'srsearch' => $name,
            ]);

            $searchData = $searchResponse->json();

            if (count($searchData['query']['search']) === 0) {
                return response()->json(['message' => 'No results found for ' . $name . ' on Wikipedia.']);
            }

            // Extract the title of the first search result
            $firstSearchResult = $searchData['query']['search'][0];
            $title = $firstSearchResult['title'];

            // Step 2: Fetch article details, including images
            $articleResponse = Http::get('https://en.wikipedia.org/w/api.php', [
                'action' => 'query',
                'format' => 'json',
                'prop' => 'extracts|images',
                'exintro' => '',
                'titles' => $title,
            ]);

            $articleData = $articleResponse->json();

            // Extract the extract from the response
            $pages = $articleData['query']['pages'];
            $page = reset($pages); // Get the first (and only) page
            $extract = $page['extract'];

            // Step 3: Choose an image from the list of images
            $images = $page['images'];

            // You can select the image you want here
            $selectedImage = $images[0]['title'];

            // Construct the image URL
            $imageUrl = 'https://en.wikipedia.org/w/api.php?action=query&format=json&prop=imageinfo&iiprop=url&titles=' . $selectedImage;

            // Fetch the image URL
            $imageInfoResponse = Http::get($imageUrl);
            $imageData = $imageInfoResponse->json();
            $image = reset($imageData['query']['pages']);
            $imageUrl = $image['imageinfo'][0]['url'];

            return response()->json([
                'extract' => $extract,
                'imageUrl' => $imageUrl
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data from Wikipedia: ' . $e->getMessage()], 500);
        }
    }

}
