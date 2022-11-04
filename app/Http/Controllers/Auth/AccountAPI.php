<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountAPI extends Controller
{
    //
    public static function create($data)
    {

        //Format user input before insertion
        $data['password'] = Hash::make($data['password']);
        $data['email'] = strtolower($data['email']);
        $data['name'] = ucfirst(strtolower($data['name']));
        $data['surname'] = ucfirst(strtolower($data['surname']));

        //Create user's account
        try {
            $newUserAccount = Account::create(
                [
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'privilege' => $data['privilege'],
                ]
            );

            return $newUserAccount;

        } catch (\Throwable $th) {
            return response('Error creating your account. ' . $th->getMessage(), 500);
        }
    }
}