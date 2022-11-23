<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderControl extends Controller
{
    //
    public static function create($data)
    {
        //id	account_id	date	amount	num_items	is_delivery	status	created_at	updated_at

        try {
            $createOrder = Orders::create($data);

            return response($createOrder, 201);

        } catch (\Throwable $th) {
            return response($th->getMessage(), 403);
        }
    }
}