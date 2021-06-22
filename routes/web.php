<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookRackController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\BookRequestController;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function(){
    
	Route::get('/login',[AdminController::class, 'loginForm']);

	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    Route::resource('/bookcategory','BookCategoryController');
    Route::resource('/bookrack','BookRackController');
    Route::resource('/book','BookController');
    Route::resource('/member','MemberController');
    Route::resource('/bookissue','BookIssuecontroller');


});


//admin
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');

})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');





//users
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::get('admin/member/inactive/{status}', [ApprovalController::class,'memberinactive'])->name('member.inactive')->middleware('admin');

Route::get('admin/member/active/{status}', [ApprovalController::class,'memberactive'])->name('member.active')->middleware('admin');

Route::get('admin/waitingapproval/member',[ApprovalController::class,'memberindex'])->name('waitingmember.index');

//book request


Route::get('admin/bookrequest/index', [BookRequestController::class,'index'])->name('bookrequest.index')->middleware('admin');
Route::get('admin/bookrequest/create', [BookRequestController::class,'create'])->name('bookrequest.create')->middleware('admin');
Route::post('admin/bookrequest/store', [BookRequestController::class,'store'])->name('bookrequest.store')->middleware('admin');
Route::get('admin/bookrequest/edit/{id}',[BookRequestController::class,'edit'])->name('bookrequest.edit')->middleware('admin');
Route::post('admin/bookrequest/update/{id}',[BookRequestController::class,'update'])->name('bookrequest.update')->middleware('admin');
Route::get('admin/bookrequest/checkedit/{id}',[BookRequestController::class,'checkedit'])->name('bookrequest.checkedit')->middleware('admin');
Route::post('admin/bookrequest/checkupdate/{id}',[BookRequestController::class,'checkupdate'])->name('bookrequest.checkupdate')->middleware('admin');

//bookrequest active and inactive
Route::get('admin/bookrequest/active/{status}', [BookRequestController::class,'bookrequestactive'])->name('bookrequest.active')->middleware('admin');
Route::get('admin/bookrequest/inactive/{status}', [BookRequestController::class,'bookrequestinactive'])->name('bookrequest.inactive')->middleware('admin');

//
Route::group(['prefix'=>'user', 'middleware'=>'web' ], function(){
    
	Route::get('/login',[AdminController::class, 'loginForm']);

	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    Route::resource('/bookcategory','BookCategoryController');
    Route::resource('/bookrack','BookRackController');
    Route::resource('/book','BookController');
    Route::resource('/member','MemberController');
    Route::resource('/bookissue','BookIssuecontroller');


});

Route::get('user/bookrequest/index', [BookRequestController::class,'index'])->name('bookrequest.index')->middleware('auth');
Route::get('user/bookrequest/create', [BookRequestController::class,'create'])->name('bookrequest.create')->middleware('auth');
Route::post('user/bookrequest/store', [BookRequestController::class,'store'])->name('bookrequest.store')->middleware('auth');
Route::get('user/bookrequest/edit/{id}',[BookRequestController::class,'edit'])->name('bookrequest.edit')->middleware('auth');
Route::post('user/bookrequest/update/{id}',[BookRequestController::class,'update'])->name('bookrequest.update')->middleware('auth');
Route::get('user/bookrequest/checkedit/{id}',[BookRequestController::class,'checkedit'])->name('bookrequest.checkedit')->middleware('auth');
Route::post('user/bookrequest/checkupdate/{id}',[BookRequestController::class,'checkupdate'])->name('bookrequest.checkupdate')->middleware('auth');