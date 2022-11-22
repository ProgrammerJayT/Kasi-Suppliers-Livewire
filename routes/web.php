<?php

use App\Http\Livewire\Auth\Admin;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Globals\Cart;
use App\Http\Livewire\Globals\Home;
use App\Http\Livewire\Globals\Dashboard;
use App\Http\Livewire\Globals\Profile;
use App\Http\Livewire\Globals\Shop;
use App\Http\Livewire\Globals\Stock;
use App\Http\Livewire\User\Order\Create;
use App\Http\Livewire\User\Stock\Edit\Vendor;
use App\Http\Livewire\User\Stock\Vendor as StockVendor;
use App\Http\Livewire\User\Vendor\Stock\Edit;
use App\Http\Middleware\Admin as MiddlewareAdmin;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::fallback(
    function () {
        return redirect()->route('home');
    }
);

Route::middleware(
    [
        CheckAuth::class
    ]
)->group(
        function () {
            Route::get('/dashboard', Dashboard::class)->name('dashboard');
            Route::get('/profile', Profile::class)->name('profile');
            Route::get('/shop', Shop::class)->name('shop');
            Route::get('/wishlist', Profile::class)->name('wishlist');
            Route::get('/stock', Stock::class)->name('stock');
            Route::get('/stock.edit', Vendor::class)->name('stock.edit');
            Route::get('/orders', Profile::class)->name('orders');
            Route::get('/order.create', Create::class)->name('order.create');
            Route::get(
                '/logout',
                function () {

                            session()->flush();

                            return redirect()->route('login');
                        }
            )->name(
                    'logout'
                );
        }
    );

Route::middleware(
    [
        Guest::class
    ]
)->group(
        function () {

            Route::middleware(
                [
                    MiddlewareAdmin::class
                ]
            )->group(
                    function () {

                                Route::get('/admin', Admin::class)->name('admin');
                            }
                );

            Route::get('/', Home::class)->name('home');

            Route::get('/login', Login::class)->name('login');

            Route::get('/register', Register::class)->name('register');
        }
    );
Route::get('/cart', Cart::class)->name('cart');