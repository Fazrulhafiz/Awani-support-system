<?php

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
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

/**
 * Finance
 */
Route::group(['prefix' => 'finance', 'as' => 'finance.', 'namespace' => 'Finance', 'middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', 'VoucherController@index')->name('finance');

    Route::get('cash-voucher', 'VoucherController@voucher')->name('cash-voucher');
    Route::get('cash-voucher/{voucher}/show', 'VoucherController@showvoucher')->name('cash-voucher.show');

    Route::get('cash-voucher/{voucher}/edit', 'VoucherController@editvoucher')->name('cash-voucher.edit');
    Route::post('cash-voucher', 'VoucherController@update')->name('cash-voucher.update');

    Route::get('new-voucher', 'VoucherController@create')->name('new-voucher.create');
    Route::post('new-voucher', 'VoucherController@store')->name('new-voucher.store');

    Route::get('print-voucher/{voucherid}', function($voucherid)
    {
        $voucherdetail = DB::table('cash_voucher')->where('id', '=', $voucherid)->get();
        $cost_centre = DB::table('cost_centre')->where('id', '=', $voucherdetail[0]->cost_centre)->value('cost_centre');
        $gl_code = DB::table('gl_code')->where('id', '=', $voucherdetail[0]->gl_code)->value('gl_code');

        $copytitle = ['Finance\'s Copy', 'Customer\'s Copy'];

        $border = 0;
        Fpdf::AddPage();
        for ($i=0; $i < count($copytitle); $i++) {
            $lastY = 150*$i;
            // left
            Fpdf::SetY(10+$lastY);
            Fpdf::SetFont('Arial', 'B', 18);
            Fpdf::Cell(130, 8, 'Astro Awani Network Sdn Bhd', $border);
            Fpdf::SetY(16+$lastY);
            Fpdf::SetFont('Arial', 'I', 12);
            Fpdf::Cell(130, 6, '(formerly known as MAMBO Networks Sdn Bhd)', $border);
            Fpdf::SetY(22+$lastY);
            Fpdf::SetFont('Arial', '', 12);
            Fpdf::MultiCell(130, 6, "1st Floor, Exchange Square Annexe\nBukit Kewangan\n50200, Kuala Lumpur", $border, 'L');
            Fpdf::SetY(52+$lastY);
            Fpdf::SetFont('Arial', 'B', 18);
            Fpdf::Cell(130, 8, 'Petty Cash Voucher', $border, 0, 'C');
            Fpdf::SetY(60+$lastY);
            Fpdf::SetFont('Arial', '', 12);
            Fpdf::MultiCell(130, 8, 'Pay to '.$voucherdetail[0]->pay_to, $border);
            Fpdf::SetY(68+$lastY);
            Fpdf::MultiCell(130, 8, 'Being payment for '.$voucherdetail[0]->payment_for, $border, 'L');
            Fpdf::SetY(84+$lastY);
            Fpdf::MultiCell(130, 8, 'Ringgit '.$voucherdetail[0]->ringgit, $border, 'L');
            // right
            Fpdf::SetXY(150, 10+$lastY);
            Fpdf::SetFont('Arial', '', 12);
            Fpdf::Cell(50, 8, $copytitle[$i], $border, 0, 'R');
            Fpdf::SetXY(150, 30+$lastY);
            Fpdf::Cell(50, 8, 'PCV NO: '.sprintf("%05d", $voucherdetail[0]->voucher_no), $border);
            Fpdf::SetXY(150, 38+$lastY);
            Fpdf::Cell(50, 8, 'DATE: '.date("d/m/Y",strtotime($voucherdetail[0]->created_date)), $border);
            Fpdf::SetXY(150, 46+$lastY);
            Fpdf::Cell(50, 8, 'Cost Centre: '.$cost_centre, 1);
            Fpdf::SetXY(150, 54+$lastY);
            Fpdf::Cell(50, 8, 'GL Code: '.$gl_code, 1);
            Fpdf::SetXY(150, 62+$lastY);
            Fpdf::MultiCell(50, 8, "Cheque Signed by:\n ", 1);
            Fpdf::SetXY(150, 84+$lastY);
            Fpdf::MultiCell(50, 8, 'RM: '.$voucherdetail[0]->rm, 1);
            // bottom
            Fpdf::SetY(100+$lastY);
            Fpdf::MultiCell(63, 8, "Authorised by:\n\n\n", 1, 'C');
            Fpdf::SetXY(73, 100+$lastY);
            Fpdf::MultiCell(63, 8, "Received by:\n\n\n", 1, 'C');
            Fpdf::SetXY(136, 100+$lastY);
            Fpdf::MultiCell(63, 8, "Accounts code:\n\n\n", 1, 'C');
        }
        Fpdf::Output($voucherdetail[0]->voucher_no.'.pdf', 'I');
        exit();
    });
});

/**
 * MCR
 */
Route::group(['prefix' => 'mcr', 'as' => 'mcr.', 'namespace' => 'Mcr', 'middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', 'OnboardController@index')->name('mcr');

    Route::get('new-request/{request}/edit', 'OnboardController@editvoucher')->name('new-request.edit');
    Route::post('new-request', 'OnboardController@update')->name('new-request.update');

    Route::get('new-request', 'OnboardController@create')->name('new-request.create');
    Route::post('new-request', 'OnboardController@store')->name('new-request.store');

    Route::get('print-request/{req_id}', function($req_id)
    {
        $voucherdetail = DB::table('cash_voucher')->where('id', '=', $voucherid)->get();
        $cost_centre = DB::table('cost_centre')->where('id', '=', $voucherdetail[0]->cost_centre)->value('cost_centre');
        $gl_code = DB::table('gl_code')->where('id', '=', $voucherdetail[0]->gl_code)->value('gl_code');

        $copytitle = ['Finance\'s Copy', 'Customer\'s Copy'];

        $border = 0;
        Fpdf::AddPage();
        for ($i=0; $i < count($copytitle); $i++) {
            $lastY = 150*$i;
            // left
            Fpdf::SetY(10+$lastY);
            Fpdf::SetFont('Arial', 'B', 18);
            Fpdf::Cell(130, 8, 'Astro Awani Network Sdn Bhd', $border);
            Fpdf::SetY(16+$lastY);
            Fpdf::SetFont('Arial', 'I', 12);
            Fpdf::Cell(130, 6, '(formerly known as MAMBO Networks Sdn Bhd)', $border);
            Fpdf::SetY(22+$lastY);
            Fpdf::SetFont('Arial', '', 12);
            Fpdf::MultiCell(130, 6, "1st Floor, Exchange Square Annexe\nBukit Kewangan\n50200, Kuala Lumpur", $border, 'L');
            Fpdf::SetY(52+$lastY);
            Fpdf::SetFont('Arial', 'B', 18);
            Fpdf::Cell(130, 8, 'Petty Cash Voucher', $border, 0, 'C');
            Fpdf::SetY(60+$lastY);
            Fpdf::SetFont('Arial', '', 12);
            Fpdf::MultiCell(130, 8, 'Pay to '.$voucherdetail[0]->pay_to, $border);
            Fpdf::SetY(68+$lastY);
            Fpdf::MultiCell(130, 8, 'Being payment for '.$voucherdetail[0]->payment_for, $border, 'L');
            Fpdf::SetY(84+$lastY);
            Fpdf::MultiCell(130, 8, 'Ringgit '.$voucherdetail[0]->ringgit, $border, 'L');
            // right
            Fpdf::SetXY(150, 10+$lastY);
            Fpdf::SetFont('Arial', '', 12);
            Fpdf::Cell(50, 8, $copytitle[$i], $border, 0, 'R');
            Fpdf::SetXY(150, 30+$lastY);
            Fpdf::Cell(50, 8, 'PCV NO: '.sprintf("%05d", $voucherdetail[0]->voucher_no), $border);
            Fpdf::SetXY(150, 38+$lastY);
            Fpdf::Cell(50, 8, 'DATE: '.date("d/m/Y",strtotime($voucherdetail[0]->created_date)), $border);
            Fpdf::SetXY(150, 46+$lastY);
            Fpdf::Cell(50, 8, 'Cost Centre: '.$cost_centre, 1);
            Fpdf::SetXY(150, 54+$lastY);
            Fpdf::Cell(50, 8, 'GL Code: '.$gl_code, 1);
            Fpdf::SetXY(150, 62+$lastY);
            Fpdf::MultiCell(50, 8, "Cheque Signed by:\n ", 1);
            Fpdf::SetXY(150, 84+$lastY);
            Fpdf::MultiCell(50, 8, 'RM: '.$voucherdetail[0]->rm, 1);
            // bottom
            Fpdf::SetY(100+$lastY);
            Fpdf::MultiCell(63, 8, "Authorised by:\n\n\n", 1, 'C');
            Fpdf::SetXY(73, 100+$lastY);
            Fpdf::MultiCell(63, 8, "Received by:\n\n\n", 1, 'C');
            Fpdf::SetXY(136, 100+$lastY);
            Fpdf::MultiCell(63, 8, "Accounts code:\n\n\n", 1, 'C');
        }
        Fpdf::Output($voucherdetail[0]->voucher_no.'.pdf', 'I');
        exit();
    });
});
