<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class VinDecoderService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function decodeVin($vin)
    {
        try {
            $response = $this->client->request('GET', `https://vindecoder.p.rapidapi.com/decode_vin`, [
                'headers' => [
                    'X-RapidAPI-Host' => 'vindecoder.p.rapidapi.com',
                    'X-RapidAPI-Key' => config('app.rapid_api_key'),
                ],
                'query' => ['vin' => $vin],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => 'Failed to decode VIN. Please check the VIN and try again.'];
        } catch (Exception $e) {
            return ['error' => 'An unexpected error occurred while decoding VIN. Please try again.'];
        }
    }
}
