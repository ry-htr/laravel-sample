<?php

namespace app\Services\Messenger;


class MailMessenger implements Messenger
{
    public function send($message) {
        // ここで、メールでメッセージを送る

        return "メールで $message を送りました。";
    }
}
