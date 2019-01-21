<?php

namespace App\Http\Controllers\Finance;
use Illuminate\Http\Request;

use App\Models\Auth\User\User;
use App\Models\Finance\Voucher\Voucher;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
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
        // dd($vouchers);

        return view('finance.dashboard', ['vouchers' => $vouchers]);
    }

    /**
     * New voucher application.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cost_centre = DB::table('cost_centre')->pluck('cost_centre', 'id', 'description');
        $gl_code = DB::table('gl_code')->pluck('gl_code', 'id', 'gl_name');

        return view('finance.cash-voucher.create', ['cost_centre' => $cost_centre, 'gl_code' => $gl_code]);
    }

    public function store(Request $request)
    {
        $voucher = [];

        $voucher['voucher_no'] = $request->get('voucher_no');
        $voucher['pay_to'] = $request->get('pay_to');
        $voucher['payment_for'] = $request->get('payment_for');
        $voucher['ringgit'] = $request->get('ringgit');
        $voucher['rm'] = $request->get('rm');
        $voucher['cost_centre'] = $request->get('cost_centre');
        $voucher['gl_code'] = $request->get('gl_code');

        // Mail delivery logic goes here

        flash('Your voucher has been created!')->success();

        return redirect()->route('new-voucher.show');
    }

    public function showvoucher($voucher)
    {
        return view('finance.cash-voucher.show', ['id' => $voucher]);
    }

    public function editvoucher($voucher)
    {
        $voucherdetail = DB::table('cash_voucher')->where('id', '=', $voucher)->get();

        return view('finance.cash-voucher.edit')->with(['voucherdetail' => $voucherdetail]);
    }
}
