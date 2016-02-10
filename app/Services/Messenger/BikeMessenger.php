<?php

namespace app\Services\Messenger;

class BikeMessenger implements Messenger
{
    public function send($message)
    {
        // ここで、バイクに乗ってメッセージを届ける

        return "バイク便で $message を届けました。";
    }
}
