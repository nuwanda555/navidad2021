<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/foto",function(){
    $img = Image::make("https://thispersondoesnotexist.com/image");
    $img->resize(128, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $filePath = public_path('/fotos');
    $img->save("$filePath/foto_reduce.png");
});




require __DIR__.'/auth.php';
require __DIR__.'/front_end.php';
require __DIR__.'/back_end.php';

