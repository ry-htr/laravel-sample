<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

// 追加
use App\User;
use Illuminate\Contracts\Mail\Mailer;

class SendReminderEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user; // 追加

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(Mailer $mailer)
    {
        $mailer->send('emails.reminder', ['user' => $this->user], function($message) {
            $message->from(env('MAIL_FROM_ADDRESS', 'hogehuga@piyo.co.jp'))
                    ->to($this->user->email, $this->user->name)->subject('お知らせ');
        });
    }
}
