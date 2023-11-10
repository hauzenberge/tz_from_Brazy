<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Helpers\PixaBayHelper;


class TestController extends Controller
{
    public function index()
    {
        $image = PixaBayHelper::getRandomImage();
        dd($image);
    }
}
