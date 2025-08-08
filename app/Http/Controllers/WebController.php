<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WebController extends Controller
{
    private function getMeta($parameter = null)
    {
        $meta = new \StdClass();
        $meta->locale = LaravelLocalization::getCurrentLocale();
        $meta->language = LaravelLocalization::getCurrentLocaleName();
        $meta->languages = LaravelLocalization::getSupportedLocales();
        return $meta;
    }

    public function index()
    {
        $meta = $this->getMeta();
        return view('index', [
            'meta' => $meta
        ]);
    }
}
