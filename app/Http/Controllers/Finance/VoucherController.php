<?php

namespace App\Http\Controllers\Finance;

use App\Models\Auth\User\User;
use App\Models\Finance\Voucher\Voucher;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the applied voucher.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = DB::table('cash_voucher')->paginate(15);

        return view('finance.dashboard', ['vouchers' => $vouchers]);
    }
}
