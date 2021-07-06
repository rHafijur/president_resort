<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryImageController extends Controller
{
    public function index(){
        $categories=GalleryImage::distinct("category")->pluck("category");
        $images=GalleryImage::all();
        return view('main.gallery',\compact('categories','images'));
    }
}
