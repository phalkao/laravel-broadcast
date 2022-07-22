<?php 

use App\Events\channelPublico;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Mail\newBroadcastMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('insert.user/{name}/{email}', [UserController::class, 'store'])->name('insert.user');

Route::get('broadcast/{msg}', function($msg){
    broadcast(new channelPublico($msg));
});

Route::get('envio-email', function() {

    $user = new stdClass();
    $user->name = 'Julio César';
    $user->email = 'phalkao@gmail.com';

    // return new newBroadcastMail($user);
    Mail::send(new newBroadcastMail($user));

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
