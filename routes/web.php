<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Controllers\profile\avatarController;
use OpenAI\Laravel\Facades\OpenAI;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\TicketController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // $users = DB::select("select * from users ");
    // $users = DB::table('users')->get();
        // $users = User::get();

    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)',
    // [
    //     'ghadb',
    //     'ghadb@gmail.com',
    //     'laravel10'
    // ]);
    // $user = DB::delete("delete from users where id=6");
    // $user = DB::table('users')->insert([
    //     'name'=>'amar',
    //     'email'=>'ammar.mohamed2001@gmail.com',
    //     'password'=>bcrypt('laravel10')
    // ]);
    // $user = User::where('id',6);
    // $user->update([
    //     'password'=> bcrypt('anything')
    // ]);
    
    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar',[AvatarController::class,'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/avatar/ai',[AvatarController::class,'generate'])->name('profile.avatar.ai');

});

require __DIR__.'/auth.php';

 
// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();

// });

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();
//     dd($user->email);
 
//     // $user->token
// });

// Route::get('/openai',function(){
// $result = OpenAI::images()->create([
//     "prompt"=> "A cute baby sea otter",
//     "n"=> 2,
//     "size"=> "1024x1024"
// ]);
// dd($result);
// echo $result->choices[0]->message->content; // Hello! How can I assist you today?
// });

Route::middleware('auth')->group(function() {   

    Route::resource('/ticket', TicketController::class);
    // Route::get('/ticket/create', [TicketController::class, 'create']);

});
