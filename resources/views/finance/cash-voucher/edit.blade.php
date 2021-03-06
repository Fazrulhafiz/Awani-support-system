@extends('layouts.awani')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {!! Form::open(['route' => 'finance.cash-voucher.update']) !!}

    <!--  General -->
    <h2 class="heading">Petty Cash Voucher :: <?php print sprintf("%05d", $voucherdetail[0]->voucher_no); ?></h2>
    <div class="form-group col-2-3">
      {!! Form::hidden('voucher_no', $voucherdetail[0]->voucher_no) !!}
      <div class="controls">
        {!! Form::text('pay_to', $voucherdetail[0]->pay_to, ['class' => 'floatLabel']) !!}
        {!! Form::label('pay_to', 'Pay to', ['class' => 'active']) !!}
      </div>
      <div class="controls">
        {!! Form::text('payment_for', $voucherdetail[0]->payment_for, ['class' => 'floatLabel']) !!}
        {!! Form::label('payment_for', 'Payment for', ['class' => 'active']) !!}
      </div>
      <div class="grid">
        <div class="col-1-3">
          <div class="controls">
            {!! Form::number('rm', $voucherdetail[0]->rm, ['class' => 'floatLabel', 'id' => 'rm', 'onkeyup' => 'convertNumberToWords(this.value)', 'step' => '.01']) !!}
            {!! Form::label('rm', 'MYR', ['class' => 'active']) !!}
          </div>
        </div>
        <div class="col-2-3">
          <div class="controls">
           {!! Form::text('ringgit', $voucherdetail[0]->ringgit, ['class' => 'floatLabel', 'id' => 'ringgit', 'readonly' => 'readonly']) !!}
           {!! Form::label('ringgit', 'Ringgit', ['class' => 'active']) !!}
          </div>
        </div>
      </div>
      <div class="grid">
        <div class="col-2-3">
          <div class="controls">
            <i class="fa fa-sort"></i>
            <select class="floatLabel" name="cost_centre">
                <option value="select">SELECT ONE</option>
                @foreach($cost_centre as $cost)
                    @if ($cost->id == $voucherdetail[0]->cost_centre)
                        <?php $selected = "selected"; ?>
                    @else
                        <?php $selected = ""; ?>
                    @endif
                    <option value="{{$cost->id}}" <?php print $selected ?>>{{$cost->cost_centre." ".$cost->description}}</option>
                @endforeach
            </select>
            {!! Form::label('cost_centre', 'Cost centre', ['class' => 'active']) !!}
           </div>
         </div>
         <div class="col-1-3">
           <div class="controls">
              @if ($voucherdetail[0]->voucher_date == null)
                {!! Form::text('voucher_date', date("m/d/Y"), ['id' => 'datepicker']) !!}
              @else
                {!! Form::text('voucher_date', date("m/d/Y",strtotime($voucherdetail[0]->voucher_date)), ['id' => 'datepicker']) !!}
              @endif
             {!! Form::label('voucher_date', 'Voucher date', ['class' => 'active']) !!}
             <script>
                 $('#datepicker').datepicker({
                     uiLibrary: 'bootstrap'
                 });
             </script>
           </div>
         </div>
       </div>
    </div>
    <!--  Details -->
    <div class="form-group col-1-3 limited_container">
      <div>
        <table class="record_table">
          <tr><td>&nbsp;</td></tr>
          <?php $glcode_che = explode(',', $voucherdetail[0]->gl_code); ?>
          <?php $gldata = array(); ?>
          @foreach($gl_code as $glcode)
            <tr>
            <td>{!! Form::checkbox('gl_code[]', $glcode->id, in_array($glcode->id, $glcode_che)) !!} {{ $glcode->gl_code." ".$glcode->gl_name }}</td>
            </tr>
          @endforeach
          {!! Form::label('gl_code', 'GL code', ['class' => 'active']) !!}
        </table>
       </div>
      </div>
      <div class="form-group col-1-3">
        <div class="grid">
          {!! Form::submit('Update', ['class' => 'col-1-4']) !!}
          <a class="col-1-4" href="{{ url('/finance') }}">Cancel</a>
        </div>
      </div>

  {!! Form::close() !!}
@endsection
