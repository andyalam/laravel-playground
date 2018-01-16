<?php

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix' => 'do'], function () {
    Route::get('/{action}/{name?}', [
        'uses' => 'NiceActionController@getNiceAction',
        'as' => 'niceaction'
    ]);

    Route::get('/hug', function () {
        return view('actions.hug');
    })->name('hug');

    Route::get('/shake', function () {
        return view('actions.shake');
    })->name('shake');

    Route::post('/', function (Request $request) {
        if (isset($request['action']) && $request['name'] && strlen($request['name']) > 0) {
            $data = [
                'action' => $request['action'],
                'name' => $request['name']
            ];
            return view('actions.nice', $data);
        }
        return redirect()->back();
    })->name('benice');
});