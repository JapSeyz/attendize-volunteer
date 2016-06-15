<?php namespace Modules\Volunteers\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ZipController extends Controller
{
    /**
     * Translate a zip-code into a city name.
     *
     * @param $zip
     *
     * @return string
     */
    public function getCity($zip)
    {
        if (strlen($zip) == 4) {
            $postalcodes = json_decode(file_get_contents(public_path('modules/volunteers/json/dk_postal.json')));
        }
        try {
            $city = $postalcodes->$zip;
        } catch (\ErrorException $e) {
            $city = 'Zip does not belong to a city';
        }
        return $city;
    }

}