<?php

namespace App\Http\Controllers\DBHelpers;

use App\Models\Account;
use App\Models\Customer;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginUser extends Controller
{
    //
    public static function read($data)
    {
        //Check if user exists
        $userAccount = Account::where('email', $data['email'])->first();

        if (!$userAccount) {
            //reset password field

            return response('Invalid credentials', 404);
        } else {
            //Check if password is correct
            if (Hash::check($data['password'], $userAccount->password)) {

                switch ($userAccount->privilege) {
                    case 'vendor':
                        $model = new Vendor();
                        break;

                    case 'customer':
                        $model = new Customer();
                        break;

                    case 'admin':
                        $model = new Admin();
                        break;

                    default:
                        $model = null;
                        break;
                }

                if ($model != null) {
                    $userProfile = $model->where('account_id', $userAccount->id)->first();

                    if ($userProfile) {
                        session()->put('profile', $userProfile);
                        session()->put('account', $userAccount);

                        return response(
                            [
                                'account' => $userAccount,
                                'profile' => $userProfile
                            ],
                            200
                        );
                    }

                } else {
                    return response('invalid privilege level', 403);
                }

            } else {
                return response('Invalid credentials', 403);
            }
        }
    }
}