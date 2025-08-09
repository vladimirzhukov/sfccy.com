<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Meta;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WebController extends Controller
{
    private function getMeta($parameter = null)
    {
        $meta = new \StdClass();
        $meta->locale = LaravelLocalization::getCurrentLocale();
        $meta->language = LaravelLocalization::getCurrentLocaleName();
        $meta->languages = LaravelLocalization::getSupportedLocales();
        $metas = Meta::where('url', Route::currentRouteName())->whereIn('language', ['en', LaravelLocalization::getCurrentLocale()])->get();
        foreach ($metas as $metaSingle) {
            $meta->metas[$metaSingle->language] = $metaSingle;
        }
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
