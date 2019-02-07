<?php

namespace App\Http\Controllers\Mcr;
use Illuminate\Http\Request;

use App\Models\Auth\User\User;
use App\Models\Finance\Voucher\Voucher;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

use Illuminate\Support\Facades\DB;

class OnboardController extends Controller
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
        $vouchers = DB::table('cash_voucher')->paginate(10);
        // dd($vouchers);

        return view('mcr.dashboard', ['vouchers' => $vouchers]);
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
        $voucher_no = DB::table('cash_voucher')->max('voucher_no');
        if ($voucher_no <= 3000) {
            $voucher_no = 3001;
        } else {
            $voucher_no += 1;
        }

        return view('finance.cash-voucher.create', ['cost_centre' => $cost_centre, 'gl_code' => $gl_code, 'voucher_no' => $voucher_no]);
    }

    public function store(Request $request)
    {
        DB::table('cash_voucher')->insert([
            'voucher_no'  =>  $request->get('voucher_no'),
            'pay_to'  =>  $request->get('pay_to'),
            'payment_for'  =>  $request->get('payment_for'),
            'ringgit'  =>  $request->get('ringgit'),
            'rm'  =>  $request->get('rm'),
            'cost_centre'  =>  $request->get('cost_centre'),
            'gl_code'  =>  $request->get('gl_code'),
        ]);
        return redirect('finance')->with('key', 'Your voucher has been created!');
    }

    public function update(Request $request)
    {
        DB::table('cash_voucher')
        ->where('voucher_no', $request->get('voucher_no'))
        ->update([
            'pay_to'  =>  $request->get('pay_to'),
            'payment_for'  =>  $request->get('payment_for'),
            'ringgit'  =>  $request->get('ringgit'),
            'rm'  =>  $request->get('rm'),
            'cost_centre'  =>  $request->get('cost_centre'),
            'gl_code'  =>  $request->get('gl_code'),
        ]);

        return redirect('finance')->with('key', 'Your voucher has been updated!');
    }

    public function showvoucher($voucher)
    {
        return view('finance.cash-voucher.show', ['id' => $voucher]);
    }

    public function editvoucher($voucher)
    {
        $voucherdetail = DB::table('cash_voucher')->where('id', '=', $voucher)->get();
        $cost_centre = DB::table('cost_centre')->pluck('cost_centre', 'id', 'description');
        $gl_code = DB::table('gl_code')->pluck('gl_code', 'id', 'gl_name');

        return view('finance.cash-voucher.edit')->with(['voucherdetail' => $voucherdetail, 'cost_centre' => $cost_centre, 'gl_code' => $gl_code]);
    }
}
