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
        $vouchers = DB::table('onboard_in')->paginate(10);
        // dd($vouchers);

        return view('mcr.dashboard', ['req_id' => $vouchers]);
    }

    /**
     * New voucher application.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $request_type = DB::table('request_type')->get();
        $emp_position = DB::table('emp_position')->get();
        $custodian_status = DB::table('custodian_status')->get();
        $services_type = DB::table('services_type')->get();
        $cost_centre = DB::table('cost_centre')->get();

        return view('mcr.onboarding.create', ['cost_centre' => $cost_centre, 'request_type' => $request_type, 'emp_position' => $emp_position, 'custodian_status' => $custodian_status, 'services_type' => $services_type]);
    }

    public function store(Request $request)
    {
        $custodian_id = DB::table('emp_particulars')->where('employee_id', $request->get('custodian_id'));
        $requester_id = DB::table('emp_particulars')->where('employee_id', $request->get('requester_id'));

        DB::table('onboard_in')->insert([
            'req_type'  =>  $request->get('req_type'),
            'emp_position'  =>  $request->get('emp_position'),
            'custodian_status'  =>  $request->get('custodian_status'),
            'custodian_duration'  =>  $request->get('custodian_duration'),
            'custodian_id'  =>  $request->get('custodian_id'),
            'requester_id'  =>  $request->get('requester_id'),
            'services_id'  =>  $request->get('services_id'),
            'justification'  =>  $request->get('justification'),
            'user_manager'  =>  $request->get('user_manager'),
            'hod_id'  =>  $request->get('hod_id'),
            'head_it'  =>  $request->get('head_it'),
            'itd_hod'  =>  $request->get('itd_hod'),
            'itd_crm'  =>  $request->get('itd_crm'),
        ]);

        DB::table('emp_particulars')->insert([
        ]);

        return redirect('mcr')->with('key', 'Your request has been created!');
    }

    public function update(Request $request)
    {
        DB::table('onboard_in')
        ->where('id', $request->get('id'))
        ->update([
          'req_type'  =>  $request->get('req_type'),
          'emp_position'  =>  $request->get('emp_position'),
          'custodian_status'  =>  $request->get('custodian_status'),
          'custodian_duration'  =>  $request->get('custodian_duration'),
          'custodian_id'  =>  $request->get('custodian_id'),
          'requester_id'  =>  $request->get('requester_id'),
          'services_id'  =>  $request->get('services_id'),
          'justification'  =>  $request->get('justification'),
          'user_manager'  =>  $request->get('user_manager'),
          'hod_id'  =>  $request->get('hod_id'),
          'head_it'  =>  $request->get('head_it'),
          'itd_hod'  =>  $request->get('itd_hod'),
          'itd_crm'  =>  $request->get('itd_crm'),
        ]);

        return redirect('mcr')->with('key', 'Your request has been updated!');
    }

    public function editvoucher($voucher)
    {
        $voucherdetail = DB::table('cash_voucher')->where('id', '=', $voucher)->get();
        $cost_centre = DB::table('cost_centre')->pluck('cost_centre', 'id', 'description');
        $gl_code = DB::table('gl_code')->pluck('gl_code', 'id', 'gl_name');

        return view('finance.cash-voucher.edit')->with(['voucherdetail' => $voucherdetail, 'cost_centre' => $cost_centre, 'gl_code' => $gl_code]);
    }
}
