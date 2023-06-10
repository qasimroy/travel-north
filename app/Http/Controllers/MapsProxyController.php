<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MapsProxyController extends Controller
{
    public function proxyRequest(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        $originCoordinates = $this->geocodeAddress($origin);
        $destinationCoordinates = $this->geocodeAddress($destination);

        if ($originCoordinates && $destinationCoordinates) {
            $distance = $this->calculateDistance(
                $originCoordinates['lat'],
                $originCoordinates['lng'],
                $destinationCoordinates['lat'],
                $destinationCoordinates['lng']
            );

            return response()->json(['distance' => $distance]);
        }

        // Handle the case when coordinates are not available
        return response()->json(['error' => 'Coordinates not found'], 400);
    }

    private function geocodeAddress($address)
    {
        $client = new Client();
        $url = 'https://nominatim.openstreetmap.org/search';

        $response = $client->get($url, [
            'query' => [
                'q' => $address,
                'format' => 'json',
                'limit' => 1,
            ],
            'verify' => false,
        ]);

        $data = json_decode($response->getBody(), true);

        if (!empty($data)) {
            return [
                'lat' => $data[0]['lat'],
                'lng' => $data[0]['lon'],
            ];
        }

        return null;
    }

    private function calculateDistance($originLat, $originLng, $destinationLat, $destinationLng)
    {
        $client = new Client();
        $url = 'https://router.project-osrm.org/route/v1/driving/' . $originLng . ',' . $originLat . ';' . $destinationLng . ',' . $destinationLat;

        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);

        if (!empty($data['routes'][0]['distance'])) {
            return $data['routes'][0]['distance'];
        }

        return null;
    }
}
