<?php

namespace App\Http\Controllers;

use App\User;
use App\Jobs\SendReminderEmail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function SendReminderEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->dispatch(new SendReminderEmail($user));

        return "リマインダーメールを送りました。";
    }
}
