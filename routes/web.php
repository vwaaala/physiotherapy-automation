<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AppSettingController;
use App\Http\Controllers\UserController as AllUserController;
use App\Http\Controllers\PortfolioController as ClientPortfolioController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RolePermissionsController;
use App\Http\Controllers\Admin\PrescriptionController as AdminPrescriptionController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\TherapyPackageController;
use App\Http\Controllers\TherapyController;

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

/**
 * Portfolio routes
 */

Route::controller(ClientPortfolioController::class)->prefix('/')->name('portfolio.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::post('/contact_us', 'contact_us')->name('contact_us');
    Route::post('/appointment', 'appointment')->name('make-appointment');
});
/*
------------------------------Login-------------------------------
*/
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

/*
------------------------------Register-------------------------------
*/
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','store')->name('register');    
});

/*
----------------------------Forgot Password--------------------------
*/
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');    
});

/*
----------------------------Reset Password--------------------------
*/
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');    
});
/**
 * All user routes
 */

Route::controller(AllUserController::class)->prefix('/user')->name('user.')->group(function (){
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/update-personal-info', 'update_personal_info')->name('update-user-personal-info');
});


/**
 *----------------------- Admin privileged routes ------------------------
 * Protected all route with auth guard
 */
Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Routes for users
        Route::controller(UserController::class)->prefix('/users')->name('users.')->group(function(){
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/add', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
            Route::post('/delete', 'delete')->name('delete');
            Route::get('/filter', 'filterUser')->name('filter');
            Route::get('/all', 'all')->name('all');
        });
        
        // Routes for user activities
        Route::controller(UserController::class)->prefix('/users-activity')->name('users-activity.')->group(function(){
            Route::get('/normal', 'activityLog')->name('normal-log');
            Route::get('/advance', 'userActivityLog')->name('advance-log');
        });

        // Portfolio Controller
        Route::controller(AppSettingController::class)->prefix('/software-settings')->name('portfolio.')->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::post('/store', 'store')->name('store');
            Route::post('/edit', 'edit')->name('edit');
        });

        // Appointment Controller
        Route::controller(AdminAppointmentController::class)->prefix('/appointments')->name('appointments.')->group(function () {
            Route::get('/all', 'all_appointment')->name('all');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
            Route::post('/destroy', 'destroy')->name('destroy');
            Route::post('/change-status', 'change_status')->name('change-status');
        });

        // Routes for prescription
        Route::controller(AdminPrescriptionController::class)->prefix('/prescriptions')->name('prescriptions.')->group(function () {
            Route::get('/all', 'all')->name('all');
            Route::get('/create', 'create')->name('create');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/detail/{id}', 'detail')->name('detail');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
            Route::post('/destroy', 'destroy')->name('destroy');
        });

        // Therapy pcakage Controller
        Route::controller(TherapyPackageController::class)->prefix('/therapy-packages')->name('therapy-packages.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create/{prescription_id}', 'create')->name('create');
            Route::get('/new', 'new')->name('new');
            Route::get('/show/{package_id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::post('/edit', 'edit')->name('edit');
        });

        // Therapy Session Controller
        Route::controller(TherapyController::class)->prefix('/therapy-sessions')->name('therapy-sessions.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/show/{session_id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
        });


        // All routes for portfolio site
        Route::controller(AdminPortfolioController::class)->prefix('/portfolio')->name('portfolio.')->group(function () {
            Route::get('/contact-us-requests', 'contact_us_index')->name('contact_us_index');
        });
        
        // All routes for roles
        Route::controller(RolesController::class)->prefix('/roles')->name('roles.')->group(function () {
            Route::get('/index', 'index')->name('index');
        });

        // All routes for role permissions
        // Route::controller(RolePermissionsController::class)->prefix('/role/permissions')->name('role.permissions')->group(function () {
        //     Route::get('/index', 'index')->name('index');
        // });
    });
});

/**
 * Patient privileged routes
 */
Route::middleware(['auth'])->group(function () {
    Route::controller(PatientController::class)->prefix('/patient')->name('patient.')->group(function (){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/medical-history/therapy', 'therapy')->name('therapy');
        Route::get('/medical-history/prescriptions', 'prescriptions')->name('prescriptions');
        Route::get('/medical-history/appointments', 'appointments')->name('appointments');
        Route::get('/payment-history/invoices', 'invoices')->name('invoices');
        Route::get('/payment-history/transactions', 'transactions')->name('transactions');
    });
});

/**
 * Doctor privileged routes
 */
Route::middleware(['auth'])->group(function () {
    Route::controller(DoctorController::class)->prefix('/doctor')->name('doctor.')->group(function (){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/medical-history/patients', 'patients')->name('patients');
        Route::get('/medical-history/appointments', 'appointments')->name('appointments');
        Route::get('/medical-history/prescriptions', 'prescriptions')->name('prescriptions');
        Route::get('/wallet-history/honorium', 'honorium')->name('honorium');
        Route::get('/wallet-history/cash-out', 'cashout')->name('cash-out');
    });
});