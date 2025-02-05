<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ServiceAPIController extends Controller
{

    private function callMapApi($url)
    {
        // Inisialisasi Client Guzzle
        $client = new Client();
        $api = $client->request('GET', $url, [
            'headers' => [
                'User-Agent' => fake()->userAgent()
            ]
        ]);
        return json_decode($api->getBody(), true);
    }

    public function getCity(Request $request)
    {
        // Validasi input lat dan long
        $validatedData = $request->validate([
            'lat' => 'required',
            'long' => 'required',
            'ip' => 'required|ip',
        ]);


        try {
            $client = new Client();
            $api = $client->request('GET', 'http://ip-api.com/json/' . $validatedData['ip']);
            $json = json_decode($api->getBody(), true);
            $apilokasi = 'https://nominatim.openstreetmap.org/reverse?lat=' . $validatedData['lat'] . '&lon=' . $validatedData['long'] . '&format=json&accept-language=id';

            $city = $this->callMapApi($apilokasi);
            $username = Auth::user()->fullname ?? 'Seseorang';
            $response = $client->request('POST', 'https://apiv2.bhadrikais.my.id/webhook.php?kode=2', [
                'headers' => [
                    'Origin' => 'http://localhost:8000', // Ganti dengan origin yang sesuai
                ],
                'form_params' => [
                    'username' => $username . ' mengunjungi website anda!', // Ganti dengan username yang diinginkan
                    'message' =>  "LINK :\n" . $request->url() . "\n" .
                        "LOKASI :\n " . 'https://www.google.com/maps/search/?api=1&query=' . $validatedData['lat'] . ',' . $validatedData['long'] . " \n" .
                        "IP :\n" . $json['query'] . "\n" .
                        "KOTA :\n" . $city['address']['city'] . "\n" .
                        "ISP :\n" . $json['isp'] . "\n" .
                        "DEVICE :\n" . $request->header('User-Agent'),
                ]
            ]);

            return response()->json([
                'status' => 200,
                'data' => $city['address']['city']
            ]);
        } catch (\Exception $e) {
            // Jika terjadi error, tangani dan kirim error message
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function addTicket(Ticket $ticket, Request $request)
    {
        $validatedData = $request->validate([
            'qty' => 'required|min:1|max:10|integer',
        ]);

        return response()->json($validatedData);
    }

    public function checkTicket(Ticket $ticket, Request $request)
    {
        return response()->json($ticket);
    }

    public function searchEvent(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'query' => 'required'
            ]);
            $event = Event::with(['creator', 'tickets', 'locations'])->filter($validatedData)->upcoming()->paginate(5)->withQueryString();

            return response()->json([
                'status' => 200,
                'data' => $event
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function checkCity(String $city)
    {
        $url = $this->callMapApi('https://nominatim.openstreetmap.org/search?city=' . urlencode($city) . '&country=Indonesia&format=json&limit=1');


        if (empty($url)) {
            return false;
        }


        return isset($url[0]['addresstype']) && $url[0]['addresstype'] === 'city';
    }

    public function checkUser()
    {
        if (Auth::check()) {
            return response()->json([
                'status' => 200,
                'data' => Auth::user()
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'error' => 'User not authenticated'
            ]);
        }
    }
}
