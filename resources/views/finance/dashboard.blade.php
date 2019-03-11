@extends('layouts.awani')

@section('content')
    <div class="row">
        <div class="col col-xs-6 col-sm-4 col-md-3 p-2">
            <a href="{{ url('/finance/new-voucher') }}" class="btn btn-social btn-whatsapp"><i class="fas fa-plus"></i> New voucher</a>
        </div>
    <br><br>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" width="100%">
            <thead>
            <tr>
              <th scope="col">@sortablelink('voucher_no', __('views.admin.finance.dashboard.table_header_0'),['page' => $vouchers->currentPage()])</th>
              <th scope="col">@sortablelink('pay_to',  __('views.admin.finance.dashboard.table_header_1'),['page' => $vouchers->currentPage()])</th>
              <th scope="col">@sortablelink('created_date', __('views.admin.finance.dashboard.table_header_2'),['page' => $vouchers->currentPage()])</th>
              <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                <tr>
                  <td>PCV <?php print sprintf("%05d", $voucher->voucher_no); ?></td>
                  <td>{{ $voucher->pay_to }}</td>
                  <td>
                    <?php if($voucher->voucher_date) { ?>
                      {{ \Carbon\Carbon::parse($voucher->voucher_date)->format('d/m/Y') }}
                    <?php } else { ?>
                      {{ \Carbon\Carbon::parse($voucher->created_date)->format('d/m/Y') }}
                    <?php } ?>
                  </td>
                  <td>
                    <!-- <a href="{{ url('finance/cash-voucher/'.$voucher->id.'/show') }}"><i class="far fa-eye"></i></a> &nbsp; -->
                    <a href="{{ url('finance/cash-voucher/'.$voucher->id.'/edit') }}"><i class="far fa-edit"></i></a> &nbsp;
                    <a href="{{ url('finance/print-voucher/'.$voucher->id) }}" target="_blank"><i class="fas fa-print"></i></a> &nbsp;
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
        {{ $vouchers->links() }}
    </div>

    <div id="page-content" class="page-content">Page <?php print (isset($_GET["page"]) ? $_GET["page"] : '1'); ?></div>
@endsection
