<?php
// app/Services/PhoneVerificationService.php
namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PhoneVerificationService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function verifyPhoneNumber($phoneNumber, $verifyCode)
    {
        try {

            $response = $this->client->request('POST', 'https://telesign-telesign-send-sms-verification-code-v1.p.rapidapi.com/sms-verification-code', [
                'headers' => [
                    'X-RapidAPI-Host' => 'telesign-telesign-send-sms-verification-code-v1.p.rapidapi.com',
                    'X-RapidAPI-Key' => config('app.rapid_api_key'),
                ],
                'query' => [
                    'phoneNumber' => $phoneNumber,
                    'verifyCode' => $verifyCode,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => 'Failed to send verification code. Please try again.'];
        } catch (Exception $e) {
            return ['error' => 'An unexpected error occurred. Please try again.'];
        }
    }
}
