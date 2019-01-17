@extends('layouts.welcome')

@extends('finance.layouts.finance')

@section('content')
    <div class="row">
        <div class="col col-xs-6 col-sm-4 col-md-3 p-2" style="text-align: left;">
            <a href="{{ url('/finance/new-voucher') }}" class="btn btn-social btn-whatsapp"><i class="fas fa-plus"></i> New voucher</a>
        </div>
    <br><br>
    </div>
    <div class="row">
        <table class="finance-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>@sortablelink('voucher_no', __('views.admin.finance.dashboard.table_header_0'),['page' => $vouchers->currentPage()])</th>
                <th>@sortablelink('pay_to',  __('views.admin.finance.dashboard.table_header_1'),['page' => $vouchers->currentPage()])</th>
                <th>@sortablelink('created_date', __('views.admin.finance.dashboard.table_header_2'),['page' => $vouchers->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->voucher_no }}</td>
                    <td>{{ $voucher->pay_to }}</td>
                    <td>{{ \Carbon\Carbon::parse($voucher->created_date)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ url('cash-voucher/'.$voucher->id.'/show') }}"><i class="far fa-eye"></i></a> &nbsp; 
                        <a href="{{ url('cash-voucher/'.$voucher->id.'/edit') }}"><i class="far fa-edit"></i></a>
                        {{--@if(!$voucher->hasRole('administrator'))--}}
                            {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                    {{--data-url="{{ route('admin.users.destroy', [$voucher->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                {{--<i class="fa fa-trash"></i>--}}
                            {{--</button>--}}
                        {{--@endif--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
