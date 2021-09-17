<?php

use App\Http\Controllers\AddOrder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Notifications;
use App\Http\Controllers\OrderDetails;
use App\Http\Controllers\Paypal;
use App\Http\Controllers\TopWriters;
use App\Http\Controllers\Users\Bidding;
use App\Http\Controllers\Users\Cancelled;
use App\Http\Controllers\Users\Completed;
use App\Http\Controllers\Users\Drafts;
use App\Http\Controllers\Users\InProgress;
use App\Http\Controllers\Users\MyOrders;
use App\Http\Controllers\Users\Writers;
use App\Http\Controllers\ViewOrder;
use App\Http\Controllers\Writers\AvailableOrders;
use App\Http\Controllers\Writers\InvitedOrders;
use App\Http\Controllers\Writers\Progress;
use App\Models\Writer;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use Artesaos\SEOTools\Facades\SEOMeta;
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

Route::get('/', [Controller::class, 'Home'])->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware(['not-robot']);

Route::get('/contact', function () {

    SEOMeta::setTitle("Contact Us")
             ->setDescription("We'd love to hear from you.");

    return view('contact');
})->name('contact');

Route::get('/blog', [Controller::class, 'blog'])->name('blog');

Route::get('/blog/{slug}', [Controller::class, 'readBlog'])
    ->name('blog.read');

Route::get('/top-writers', [TopWriters::class, 'index'])->name('top-writers');

Route::get('/faqs', function () {
    
    SEOMeta::setTitle("FAQs")
             ->setDescription("Frequently Asked Questions");

    return view('faqs');
})->name('faqs');

Route::get('/about', function () {
    SEOMeta::setTitle("About Us")
             ->setDescription("Essay Flame understands the pressure the students are facing and are ready to help whenever we have a call for action. ");
    return view('about');
})->name('about');

Route::get('/order-now', [Controller::class, 'OrderNow'])
    ->name('order-now');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/user/my-orders');
})->name('dashboard');

Route::get('/logout', [Controller::class, 'logout']);

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login-controller');

Route::get('/not-a-robot', [\App\Http\Controllers\Captchav2Controller::class, 'NotARobot'])
    ->name('not-a-robot');

Route::post('/v2-checkbox/submit',[\App\Http\Controllers\Captchav2Controller::class, 'store'])->name('captcha.submit');


Route::get('/writer/registration', [Controller::class, 'WriterRegistration'])
    ->name('writer-registration')->middleware(['not-robot']);

Route::get('/chat', function () {
    return view('chat');
})->name('chat');

Route::middleware(['auth', 'verified'])->get('/log-notifications', [Controller::class, 'LogNotification'])
->name('log-notifications');


Route::prefix('user')->middleware(['not-robot'])->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/my-orders', [MyOrders::class, 'index'])
        ->name('my-order');

    Route::middleware(['auth:sanctum', 'verified'])->get('/drafts', [Drafts::class, 'index'])
        ->name('drafts');

    Route::middleware(['auth:sanctum', 'verified'])->get('/bidding', [Bidding::class, 'index'])
        ->name('bidding');

    Route::middleware(['auth:sanctum', 'verified'])->get('/in-progress', [InProgress::class, 'index'])
        ->name('progress');

    Route::middleware(['auth:sanctum', 'verified'])->get('/completed', [Completed::class, 'index'])
        ->name('completed');

    Route::middleware(['auth:sanctum', 'verified'])->get('/cancelled', [Cancelled::class, 'index'])
        ->name('cancelled');

    Route::middleware(['auth:sanctum', 'verified'])->get('/writers', [Writers::class, 'index'])
        ->name('writers');

    Route::middleware(['auth:sanctum', 'verified'])->get('/notifications', [Notifications::class, 'index'])
        ->name('notification');

    Route::get('/rules', function () {
        return view('user.rules');
    })->name('rules');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/edit/{id}', [OrderDetails::class, 'index'])
        ->name('order-edit');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/add', [AddOrder::class, 'index'])
        ->name('order-add');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/view/{id}', [ViewOrder::class, 'index'])
        ->name('order-view');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/return/{id}', [ViewOrder::class, 'returnOrder'])
        ->name('order-view');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/rate-writer/{id}', [Controller::class, 'rateWriter'])
        ->name('rate-order');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/delete/{id}', [Controller::class, 'deleteOrder'])
        ->name('delete-order');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/download/files/orderNumber/{orderNumber}', [Controller::class, 'downloadOrderFiles'])
        ->name('download-files');

    Route::middleware(['auth:sanctum', 'verified'])->get('/order/bids/{orderNumber}', [Controller::class, 'orderBids'])
        ->name('order-bids');

    Route::middleware(['auth:sanctum', 'verified'])->get('/favourite/writer/add', [Controller::class, 'favouriteWriter'])
        ->name('favourite-writer');

    Route::middleware(['auth:sanctum', 'verified'])->get('/favourite/writer/remove', [Controller::class, 'favouriteWriterRemove'])
        ->name('remove-favourite');

    Route::middleware(['auth:sanctum', 'verified'])->get('/writer/view/{id}', [Controller::class, 'writerView'])
        ->name('user.view.writer');

    Route::middleware(['auth:sanctum', 'verified'])->get('/writer/block/add', [Controller::class, 'blockWriter'])
        ->name('user.block.writer');

    Route::middleware(['auth:sanctum', 'verified'])->get('/writer/block/remove', [Controller::class, 'unblockWriter'])
        ->name('user.unblock.writer');


    Route::middleware(['auth:sanctum', 'verified'])->get('/notification/seen/{id}', [Controller::class, 'WriterNotificationSeen'])
        ->name('notification-seen');

});

Route::prefix('writer')->middleware(['not-robot'])->group(function () {

    Route::middleware(['auth:sanctum', 'verified'])->get('/help', function () {
        return view('help');
    })->name('help');
    
    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/order/download/files/orderNumber/{orderNumber}', [Controller::class, 'downloadOrderFiles'])
        ->name('writer-download-files');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/available-orders', [AvailableOrders::class, 'index'])
        ->name('available-orders');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/chats', [Controller::class, 'WriterChat'])
        ->name('writer-chat');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/profile', function () {
        return view('writer.profile.show');
    })->name('writer-profile');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/invited-order', [InvitedOrders::class, 'index'])
        ->name('invited-order');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/bidding', [\App\Http\Controllers\Writers\Bidding::class, 'index'])
        ->name('writer-bidding');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/in-progress', [Progress::class, 'index'])
        ->name('writer-progress');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/notifications', [Controller::class, 'WriterNotification'])
        ->name('writer-notifications');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/log-notifications', [Controller::class, 'LogNotification'])
        ->name('log-notifications');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/notification/seen/{id}', [Controller::class, 'WriterNotificationSeen'])
        ->name('writer-notification-seen');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/log-notifications', [Controller::class, 'LogNotification']);

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/completed', [\App\Http\Controllers\Writers\Completed::class, 'index'])
        ->name('writer-completed');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/cancelled', [\App\Http\Controllers\Writers\Cancelled::class, 'index'])
        ->name('writer-cancelled');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/rules', function () {
        return view('writer.rules');
    })->name('writer-rules');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/grammar', function () {
        return view('writer.grammar');
    })->name('grammar-questions');

    Route::middleware(['auth:writers', 'writer-email-verified'])->get('/failed', function () {
        return view('writer.failed');
    })->name('writer-failed');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/review', function () {
        return view('writer.review');
    })->name('writer-review');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/test', function () {
        return view('writer.test');
    })->name('writer-test');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->get('/order/view/{id}', [ViewOrder::class, 'writerView'])
        ->name('write-order-view');

    Route::middleware(['auth:writers', 'passedTest', 'writer-email-verified'])->post('/order/file/upload', [Controller::class, 'fileUpload'])
        ->name('file-upload');
});

Route::get('/writer/verify/token/{token}', function ($token) {
    $count = DB::table('writers')
        ->where('verification_token', $token)
        ->count();
    if ($count == 1) {
        $writer = DB::table('writers')
            ->where('verification_token', $token)
            ->value('id');

        $writer = Writer::find($writer);
        $verification_token = $writer->verification_token;

        if ($verification_token == $token) {
            $writer->email_verified = 1;
            $writer->update();

            Auth::guard('writers')->login($writer);

            return view('email-verified');
        } else {
            return view('email-verified-invalid');
        }
    } else {
        return view('email-verified-invalid');
    }
})->name('email-verified');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/user/my-orders');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['middleware' => 'web'], function () {
    Route::post('/laravel-livewire-forms/file-upload', function () {
        return call_user_func([request()->input('component'), 'fileUpload']);
    })->name('laravel-livewire-forms.file-upload');
});

Route::get('/email/unverified', function () {
    return view('email-unverified');
})->name('email-unverified');

Route::middleware(['auth:sanctum', 'verified'])->get('/paypal/payment', [Paypal::class, 'postPaymentWithpaypal'])->name('paypal');
Route::get('/paypal/payment/status', [Paypal::class, 'getPaymentStatus'])->name('status');

