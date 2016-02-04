<?php
use App\Services\Messenger\Messenger;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sendmail/{name?}', function($name = "guest") {
    Mail::queue('emails.welcome', ['name' => $name], function($message) {
        $message->from('hoge@huga.com')->to('someone@example.com')->subject('Welcome');
    });

    return "Welcome メッセージを $name に送りました";
});

Route::get('send_message/{message}', function(Messenger $messenger, $message){
    return $messenger->send($message);
});

Route::get('pay/{money}', function($money){
    return \App\Facades\Payment::pay($money);
})->where('money', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('articles', 'ArticlesController');
});
