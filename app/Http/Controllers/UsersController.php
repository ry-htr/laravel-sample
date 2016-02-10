<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function SendReminderEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->dispatch(new SendReminderEmail($user));

        return 'リマインダーメールを送りました。';
    }
}
