<?php

namespace app\Services;

class Payment
{
    public function pay($money)
    {
        // ここで支払い処理をします。

        return "$money 円の支払いが完了しました。";
    }
}
