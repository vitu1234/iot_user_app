<?php

namespace App;

use Illuminate\Support\Facades\Http;

class ChirpstackAPIs
{

    public $chirpstackURL;
    public $chirpstackToken;

    public function __construct()
    {
        $this->chirpstackURL = env('CHIRPSTACK_API_URL');
        $this->chirpstackToken = env('CHIRPSTACK_TOKEN');
    }

    public function sendGetrequest($endpoint)
    {

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->chirpstackToken,
        ])->get($this->chirpstackURL . $endpoint);

        if ($response->successful()) {
            return ["error" => false, "data" => $response->json()];
        } else {
            $error_response = ["error" => true, "message" => $response->status()];
            return $error_response;
        }
    }

    public function sendPostRequest($endpoint, $data)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->chirpstackToken,
        ])->post($this->chirpstackURL . $endpoint, $data);

        if ($response->successful()) {
            return ["error" => false, "data" => $response->json()];
        } else {
            $error_response = ["error" => true, "message" => $response->status()];
            return $error_response;

        }
    }
}
