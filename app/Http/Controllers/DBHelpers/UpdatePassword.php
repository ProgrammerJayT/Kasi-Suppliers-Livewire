<?php

namespace App\Http\Controllers\DBHelpers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePassword extends Controller
{
    //
    public static function update($id, $password, $currentPassword)
    {
        $account = Account::find($id);

        if (!Hash::check($currentPassword, $account->password)) {
            $message = 'Password is incorrect';
            $code = 403;
        } else {

            $account->password = Hash::make($password);

            try {

                $account->save();

                $message = 'Password updated successfully';
                $code = 200;

            } catch (\Throwable $th) {
                $message = 'Password update failed. ' . $th->getMessage();
                $code = 400;
            }
        }

        return response($message, $code);
    }
}