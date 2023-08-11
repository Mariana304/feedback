<?php

use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

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

Route::get('/gracias', function(){
return view('gracias');
})->name('feedback.gracias');

Route::post('/feedback',[FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedback/{token}', [FeedbackController::class, 'index'])->name('feedback.index');

Route::get('/{token}', function ($token) {
   


         $token = Crypt::encryptString($token);
    return to_route('feedback.index', [
        'token' =>  $token]);

  
   

   
});







