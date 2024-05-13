<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[MainController::class, 'main'])->name('main'); //funkcija v nutri klassa - metod

Route::get('/about',[MainController::class, 'about'])->name('about');

Route::get('/services',[MainController::class, 'services'])->name('services');


Route::get('/payments/{invoice}',[PaymentController::class, 'showPaymentForm'])->name('payment.show-form');
Route::post('/payments/{invoice}/execute',[PaymentController::class, 'executePayment'])->name('payment.execute');
Route::any('/payments/{invoice}/finish',[PaymentController::class, 'finish'])->name('payment.finish');
Route::any('/payments/{invoice}/cancel',[PaymentController::class, 'cancel'])->name('payment.cancel');

/*Route::get('/Account_management',[MainController::class, 'Account_management'])->name('Account_management');

Route::get('/Managing_administrators',[MainController::class, 'Managing_administrators'])->name('Managing_administrators');

Route::get('/Company_management',[MainController::class, 'Company_management'])->name('Company_management'); */


Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'as' => 'admin.'], static function() {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource("companies", CompanyController::class)->except("show");
    Route::resource("users", AdminController::class)->except("show");
    Route::resource("posts", PostController::class)->except("show");
    Route::resource("invoices", InvoiceController::class);
    Route::resource('questions', QuestionController::class)->except('show', 'create', 'store');
    Route::post('/questions/{question}/response',[QuestionController::class, 'response'])->name('questions.response');
    Route::post('/invoices/{invoice}/send-email',[InvoiceController::class, 'sendEmail'])->name('invoices.send-email');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::controller(BlogController::class)->group(function () {
    Route::get('/posts/{post}', 'show')->name('blog.show');
});

Route::controller(ContactsController::class)->group(function () {
    Route::get('/contacts', 'index')->name('contacts.index');
    Route::post('/contacts', 'submit')->name('contacts.submit');
});
