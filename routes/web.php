<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\SimpleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/public',[HomeController::class,'publicMessage']);
// Route::get('/private',[HomeController::class,'privateMessage'])->Middleware(['auth']);
// Route::get('/secret',[HomeController::class,'secretMessage'])->Middleware('auth');

Route::middleware([SimpleMiddleware::class,'throttle:2,1'])->group(function(){
    Route::get('/private',[HomeController::class,'privateMessage']);
    Route::get('/secret',[HomeController::class,'secretMessage']);

});


// function downloadfile(Request $request){
//     return response()->json([
//         'message'=>'File Download'

//     ]);
// }

Route::get('/download',[HomeController::class,'downloadFile'])->middleware('throttle:2,1');
Route::get('/message',[HomeController::class,'message'])->middleware(SimpleMiddleware::class);

