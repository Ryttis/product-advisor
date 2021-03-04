<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cache;

/**
 *  Service class for feching data from external api.meteo.lt
 * 
 */
class MeteoService
{

    /**
     * Fetches weather forecast from particular place
     * 
     * @return object
     */
    public function getForecast($place) : object
    {
        $client = new Client();
        $url = 'https://api.meteo.lt/v1/places/' . $place . '/forecasts/long-term';

        try {
            $res = $client->request('GET', $url);
        } catch (ClientException $e) {
            echo $e->getResponse()->getStatusCode();
            exit;
        }

        $response = $res->getBody();
        $responseArray = json_decode($response, true);
        $forecast = collect($responseArray);

        Cache::store('redis')->put($place, $forecast, 300);

        return $forecast;
    }

}
