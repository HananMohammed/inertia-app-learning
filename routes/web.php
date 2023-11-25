<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware([/* 'auth',*/ 'inertia'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                            ->when(request('search'), function ($query, $search) {
                                $query->where('name', 'like', '%' . $search . '%');
                            })
                            ->paginate(10)
                            ->withQueryString()
                            ->through(fn($user) => [
                            'id' => $user->id,
                            'name' => $user->name
                            ]),
            'filters' => request()->only(['search'])
        ]);
    });

    Route::get('users/create', function () {
        return Inertia::render('Users/Create');
    });

    Route::post('/users', function (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        User::create($request->all());

        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

    Route::post('/logout', function (Request $request) {
        dd("logging the users out", $request->all());
    });
});
