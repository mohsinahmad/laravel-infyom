<?php

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Images Resize Route
Route::get('/resize/{img}', function ($img) {

    ob_end_clean();
    try {
        $w = request()->get('w');
        $h = request()->get('h');
        if ($h && $w) {
            // Image Handler lib
            return Image::make(asset("storage/app/$img"))->resize($h, $w, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })->response('png');
        } else {
            return response(file_get_contents(storage_path("/app/$img")))
                ->header('Content-Type', 'image/png');
        }

    } catch (\Exception $e) {
//        dd($e->getMessage());
        return abort(404, $e->getMessage());
    }
})->name('resize')->where('img', '(.*)');


/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

## No Token Required
Route::post('login', 'AuthAPIController@login')->name('login');


Route::middleware('auth:api')->group(function () {
    ## Token Required to below APIs
    Route::post('logout', 'AuthAPIController@logout');
    Route::post('refresh', 'AuthAPIController@refresh');
    Route::post('me', 'AuthAPIController@me');


});


Route::resource('v1/users', 'UserApiController');
Route::resource('v1/roles', 'RoleApiController');
Route::resource('v1/permissions', 'PermissionApiController');

Route::resource('v1/languages', 'LanguageAPIController');

Route::resource('v1/pages', 'PageAPIController');

Route::resource('v1/contactus', 'ContactUsAPIController');

Route::resource('v1/notifications', 'NotificationAPIController');