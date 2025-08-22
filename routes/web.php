<?php

use Illuminate\Support\Facades\Route;
use App\Models\Radio;


Route::get('/', function (){
    return view('home',[
        'radios'=> Radio::all()
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/radios/{id}', function ($id) {
    $radio = Radio::find($id);

    return view('radio',['radio'=>$radio]);
});
