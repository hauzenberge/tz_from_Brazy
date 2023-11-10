<?php

namespace App\Helpers;

class PixaBayHelper
{

    private static $url = 'https://pixabay.com/api/';

    public static function getImages()
    {
        $key = env('PIXABAY_KEY');

        $curl = curl_init();

        $image_type = 'photo';      //Filter results by image type.  Accepted values: "all", "photo", "illustration", "vector" Default: "all"
        $lang = 'ru';               //Language code of the language to be searched in. Accepted values: cs, da, de, en, es, fr, id, it, hu, nl, no, pl, pt, ro, sk, fi, sv, tr, vi, th, bg, ru, el, ja, ko, zh Default: "en"
        $order = 'popular';        //How the results should be ordered. Accepted values: "popular", "latest" Default: "popular"
        $safesearch = 'true';      //A flag indicating that only videos suitable for all ages should be returned.Accepted values: "true", "false" Default: "false"
        $per_page = strval(200);   //Determine the number of results per page. Accepted values: 3 - 200 Default: 20


        $params = '?key=' . $key
            . '&image_type=' . $image_type

            . '&lang=' . $lang
            . '&order=' . $order
            . '&safesearch=' . $safesearch
            . '&per_page=' . $per_page;
        $curlUrl = self::$url . $params;

        curl_setopt_array($curl, array(
            CURLOPT_URL =>  $curlUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    public static function getRandomImage()
    {
        $images = self::getImages()["hits"];

        $randomKey = array_rand($images);
        $randomElement = $images[$randomKey];

        return $randomElement;
    }
}
