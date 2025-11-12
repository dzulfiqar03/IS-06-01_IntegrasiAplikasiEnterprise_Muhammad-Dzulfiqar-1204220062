<?php

namespace App\Http\Controllers\Prayer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrayerTimesController extends Controller
{

    public function index()
    {

        $cities = $this->getCities();

        return view('prayers', compact('countries', 'cities'));
    }

    public function getCities()
    {
        $url = 'https://countriesnow.space/api/v0.1/countries/';

        $response = Http::get($url);
        $countries = 'Indonesia';

        $cities = collect($response['data'])
            ->firstWhere('country', $countries)['cities'];

        return $cities;
    }

    public function show(Request $request)
    {
        $date    = $request->input('date');     // contoh: 2025-10-02
        $country = $request->input('country');  // contoh: Indonesia
        $city    = $request->input('city');     // contoh: Jakarta

        // gabungkan date ke URL
        $url = "https://api.aladhan.com/v1/timingsByCity/$date";

        // kirim request dengan city & country
        $response = Http::get($url, [
            'city'    => $city,
            'country' => $country,
        ]);

        $timings = $response->json()['data']['timings'] ?? [];

        $cities = $this->getCities();
        // jangan lupa return
        return view('prayers', compact('timings', 'city', 'cities', 'country', 'date'));
    }
}
