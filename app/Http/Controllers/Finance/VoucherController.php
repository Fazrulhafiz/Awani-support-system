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
        return view('finance.cash-voucher.create');
    }

    public function store(Request $request)
    {
        $voucher = [];

        $voucher['name'] = $request->get('name');
        $voucher['email'] = $request->get('email');
        $voucher['msg'] = $request->get('msg');

        // Mail delivery logic goes here

        flash('Your voucher has been created!')->success();

        return redirect()->route('new-voucher.create');
    }
}
