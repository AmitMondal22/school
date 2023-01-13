<?php

use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\school\Assets;
use App\Http\Controllers\school\AuthController;
use App\Http\Controllers\school\ClassRoomController;
use App\Http\Controllers\school\Dashboard;
use App\Http\Controllers\school\SchoolInfo;
use App\Http\Controllers\school\Student;
use App\Http\Controllers\school\Teacher;
use App\Http\Controllers\theame\Home;
use Illuminate\Support\Facades\Auth;
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

// Route::any('/', function () {
//     return redirect('/home');
// });
// Route::get('/a', [Home::class,'index']);
Route::get('/',[Home::class,'index']);
Route::get('/home',[Home::class,'index'])->name('home');

Route::post('/contact-user',[Home::class,'contact_request'])->name('contactForm');
Route::get('reload-captcha', [Home::class, 'reloadCaptcha'])->name('reloadcaptcha');






Route::prefix('org')->group(function(){

    Route::middleware('guest:orgSadmin')->group(function(){
        Route::match(['get','post'], '/login',[AuthController::class,'login'])->name('orglogin');
        Route::match(['get','post'], '/register',[AuthController::class,'register'])->name('orgregister');
        Route::match(['get','post'], '/email-valadition/{id}/{email}',[AuthController::class,'otp_valadition'])->name('emailvaladition');

    });



    Route::middleware('auth:orgSadmin')->group(function(){
        Route::get('/dashboard',[Dashboard::class,'index'])->name('school.dashboard');
        Route::get('/',[Dashboard::class,'index'])->name('school.dashboard');

        Route::get('school-name', [Assets::class,'schoolName'])->name('achoolName');
        Route::match(['get','post'], '/mail',[AuthController::class,'sendmaiTest']);
        // ===================common==========================
        Route::get('/city/{id}', [Assets::class,'city'])->name('school.city');
        Route::get('/state/{id}', [Assets::class,'state'])->name('school.state');
        Route::get('/classs/{id}', [Assets::class,'all_classs'])->name('school.classs_select');
        // ===================end common======================

        // =====================Add School =====================================
        Route::match(['get','post'],'/school-add', [SchoolInfo::class,'school_add'])->name('school.schoolAdd');
        Route::match(['get','post'],'/school', [SchoolInfo::class,'school'])->name('school.school');
        Route::get('school-list/{id}',[Assets::class,'get_school'])->name('school_list');
        Route::get('class-list/{school_id}',[Assets::class,'get_class_html'])->name('get_class_html');
        // =====================End Add School =====================================

        //======================add class====================================
        Route::match(['get','post'],'/add-class', [ClassRoomController::class,'addclass'])->name('school.addclass');
        Route::match(['get','post'],'/class', [ClassRoomController::class,'all_class'])->name('school.all_class');
        Route::match(['get','post'],'/add-class/{school_id}', [ClassRoomController::class,'addclass_schoolid'])->name('school.addclass_schoolid');

        Route::match(['get','post'],'/class-info/{class_id}', [ClassRoomController::class,'class_info'])->name('class.info');
            //ferch
        Route::post('/class_level_up',[Student::class,'class_level_up'])->name('apiClass_level_up');
         //======================end add class====================================

        //======================add Teacher====================================
        Route::match(['get','post'],'/add-teacher', [Teacher::class,'addteacher'])->name('school.addteacher');
        Route::match(['get','post'],'/teacher', [Teacher::class,'all_teacher'])->name('school.all_teacher');
        // Route::match(['get','post'],'/add-teacher/{class_id}', [Teacher::class,'addteacher_classid'])->name('school.addteacher_teacherid');
        //======================End Teacher====================================

        //======================== Student ====================================
        Route::match(['get','post'],'/student-admision', [Student::class,'student_admision'])->name('school.student_admision');
        Route::match(['get','post'],'/my-student', [Student::class,'my_student'])->name('school.my_student');

        Route::match(['get','post'],'/all-student', [Student::class,'my_student_filter'])->name('school.my_student_filter');
        //======================End Student====================================


        Route::get('getcountryy',[Assets::class,'get_ip']);

        Route::get('/logout',function(){
            Auth::guard('orgSadmin')->logout();
            return redirect('/org/login');
        })->name('orgadminlogout');
    });


});


// =========================RazorpayPay Test============
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


Route::get('testrzpay',[RazorpayPaymentController::class,'testview']);
Route::get('mPay',[RazorpayPaymentController::class,'mPaym'])->name('mp');
// =========================RazorpayPay Test============

Route::get('/initiate',[RazorpayPaymentController::class,'initiate'])->name('initiate.payment');
Route::post('/payment',[RazorpayPaymentController::class,'pay'])->name('make.payment');
Route::post('/payment/status', [RazorpayPaymentController::class,'paymentCallback'])->name('status');
