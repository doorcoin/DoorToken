<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserVerifyController;

use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\EstateController;
use App\Http\Controllers\Admin\VerifyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashBoardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])
        ->middleware(['auth'])
        ->name('profile.view');

Route::post('/dashboard/profile/update', [ProfileController::class, 'update'])
        ->middleware(['auth'])
        ->name('profile.update');

Route::get('/dashboard/my-wallet', [WalletController::class, 'index'])
        ->middleware(['auth'])
        ->name('wallet.my.view');

Route::get('/dashboard/transactions-wallet', [WalletController::class, 'transactions'])
        ->middleware(['auth'])
        ->name('wallet.transactions.view');

Route::get('/dashboard/add-wallet', [WalletController::class, 'add'])
        ->middleware(['auth'])
        ->name('wallet.add.view');

Route::get('/dashboard/main-wallet', [WalletController::class, 'main'])
        ->middleware(['auth'])
        ->name('wallet.main.view');

Route::get('/dashboard/deposit-wallet', [WalletController::class, 'deposit'])
        ->middleware(['auth'])
        ->name('wallet.deposit.view');

Route::get('/dashboard/withdraw-wallet', [WalletController::class, 'withdraw'])
        ->middleware(['auth'])
        ->name('wallet.withdraw.view');

Route::get('/dashboard/log-all', [LogController::class, 'allTransactions'])
        ->middleware(['auth'])
        ->name('log.all.view');

Route::get('/dashboard/log-withdraw', [LogController::class, 'deposit_withdraw'])
        ->middleware(['auth'])
        ->name('log.deposit-withdraw.view');

Route::get('/dashboard/my-property', [PropertyController::class, 'index'])
        ->middleware(['auth'])
        ->name('property.index.view');

Route::get('/dashboard/property-add', [PropertyController::class, 'add'])
        ->middleware(['auth'])
        ->name('property.add.view');

Route::post('/dashboard/property-add', [PropertyController::class, 'create'])
        ->middleware(['auth'])
        ->name('property.add.create');

Route::get('/dashboard/my-list', [ListController::class, 'index'])
        ->middleware(['auth'])
        ->name('list.index.view');

Route::get('/dashboard/list-add', [ListController::class, 'add2list'])
        ->middleware(['auth'])
        ->name('list.add.view');

Route::get('/dashboard/list-add/{id}', [ListController::class, 'subscribe'])
        ->middleware(['auth'])
        ->name('list.add.subscribe');

Route::get('/dashboard/my-leads', [LeadController::class, 'index'])
        ->middleware(['auth'])
        ->name('leads.myleads.view');

Route::get('/dashboard/lead-settings', [LeadController::class, 'settings'])
        ->middleware(['auth'])
        ->name('leads.settings.view');

Route::get('/dashboard/user-verify', [UserVerifyController::class, 'index'])
        ->middleware(['auth'])
        ->name('user.verify');

Route::post('/dashboard/user-verify', [UserVerifyController::class, 'add2info'])
        ->middleware((['auth']))
        ->name('user.verify.upload');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');

    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users.index');

    Route::get('/verify-users', [VerifyController::class, 'view_user'])->name('admin.verify.user.view');
    Route::get('/verify-users/{id}', [VerifyController::class, 'verify_user_detail'])->name('admin.verify.user.detail');
    Route::post('/verify-users/{id}', [VerifyController::class, 'verify_user'])->name('admin.verify.user');

    Route::get('/verify-property', [VerifyController::class, 'view_property'])->name('admin.verify.property.view');
    Route::get('/verify-property/{id}', [VerifyController::class, 'view_property_detail'])->name('admin.verify.property.detail.view');
    Route::post('/verify-property/{id}', [VerifyController::class, 'verify_property'])->name('admin.verify.property');

    Route::get('/properties', [EstateController::class, 'view_property'])->name('admin.estate.property');
    Route::get('/lists', [EstateController::class, 'view_lists'])->name('admin.estate.lists');
    Route::get('/leads', [EstateController::class, 'view_leads'])->name('admin.estate.leads');
});

require __DIR__.'/auth.php';
