<?php
use App\Http\Resources\BooksResource;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|-----------------------------
---------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/books',function(){
    return BooksResource::collection(book::all());

});

 Route::get('/book/{id}', function($id){
    return new BooksResource(book::findOrFail($id)); 
 });
 Route::post('/book',[BookController::class,'store' ]);
 Route::put('/book/{id}', [BookController::class,'update']);
 Route::delete('/book/[id}',[BookController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
