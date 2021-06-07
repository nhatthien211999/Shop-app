<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function show($id){

        $shop = Shop::find($id);

        return view('content.content-map', compact('shop'));
    }
}
