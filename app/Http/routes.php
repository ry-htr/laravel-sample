<?php

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

// DIコンテナの使い方
interface SenderInterface {
    public function send($message);
}

class MailSender implements SenderInterface {
    public function send($message) {
        // ここで、メールでメッセージを送る

        return "メールで $message を送りました。";
    }
}

class BikeSender implements SenderInterface {
    public function send($message) {
        // ここで、バイクに乗ってメッセージを届ける

        return "バイク便で $message を届けました。";
    }
}

class Messenger {
    protected $sender;

    public function __construct(MailSender $sender) {
        $this->sender = $sender;
    }

    public function send($message) {
        return $this->sender->send($message);
    }
}

/*
 *  Binding
 * @var Illiminate\Foundation\Application $this->app
 */
$this->app->bind('sender', 'MailSender');
$this->app->singleton('sender_single', 'MailSender');

$instance = new MailSender();
$this->app->instance('sender_instance', $instance);

/*
 * Routes
 */
Route::get('send/{message?}', function($message = '合格通知') {
    $messenger = $this->app->make('Messenger');

    return $messenger->send($message);
});

Route::get('not_singleton', function() {
    $sender1 = $this->app->make('sender');
    $sender2 = $this->app->make('sender');

    if ($sender1 === $sender2) {
        return "シングルトンです。";
    }

    return "シングルトンではありません。";
});

Route::get('singleton', function() {
    $sender1 = $this->app->make('sender_single');
    $sender2 = $this->app->make('sender_single');

    if ($sender1 === $sender2) {
        return "シングルトンです。";
    }

    return "シングルトンではありません。";
});

Route::get('instance', function() use ($instance) {   // ② 追加
    $sender = $this->app->make('sender_instance');    // ③

    if ($instance === $sender) {
        return "既存のインスタンスです。";
    }

    return "既存のインスタンスではありません。";
});
