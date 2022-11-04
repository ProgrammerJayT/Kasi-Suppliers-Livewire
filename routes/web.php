<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Globals\Home;
use App\Http\Livewire\User\Dashboard;
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

Route::get('/', Home::class)->name('home');

Route::get('/login', Login::class)->name('login');

Route::get('/register', Register::class)->name('register');

Route::get('/dashboard', Dashboard::class)->name('dashboard');