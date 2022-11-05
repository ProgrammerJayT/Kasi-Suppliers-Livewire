<?php

namespace App\Http\Controllers\DBHelpers;

use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Account;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Controller
{
    //
    public static function register($data)
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
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'privilege' => $data['privilege'],
                ]
            );

            //Check user's privilege and set model
            switch ($data['privilege']) {
                case 'admin':
                    $model = new Admin();
                    break;
                case 'customer':
                    $model = new Customer();
                    break;
                case 'vendor':
                    $model = new Vendor();
                    break;
                default:
                    return response()->json(['message' => 'Invalid account type: ' . $data['privilege']], 400);
            }

            //Create user's profile
            try {
                $newUserProfile = $model->create(
                    [
                        'account_id' => $newUserAccount->id,
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'email' => $data['email'],
                    ]
                );

                return [
                    'profile' => $newUserProfile,
                    'account' => $newUserAccount
                ];

            } catch (\Throwable $th) {
                return response('Account creation failed. ' . $th->getMessage(), 424);
            }

        } catch (\Throwable $th) {
            return response('Account creation failed. ' . $th->getMessage(), 424);
        }
    }
}