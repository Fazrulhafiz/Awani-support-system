@extends('layouts.awani')

@section('content')
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
              {!! Form::number('rm', $voucherdetail[0]->rm, ['class' => 'floatLabel', 'onkeyup' => 'convertNumberToWords(this.value)']) !!}
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
      <!--  Details -->
      <div class="form-group col-1-3">
        <div class="controls">
          <table>
            <tr><td>&nbsp;</td></tr>
            <?php $gl_code = explode(',', $glcode_str); ?>
            <?php $gldata = array(); ?>
            @foreach($gl_code as $glcode)
              <?php $gldata[] = $voucherdetail[0]->gl_code; ?>
              <tr>
              <td>{!! Form::checkbox('gl_code[]', $glcode->id, in_array($glcode->id, $gldata)) !!} {{ $glcode->gl_code." ".$glcode->gl_name }}</td>
              </tr>
            @endforeach
            {!! Form::label('gl_code', 'GL code', ['class' => 'active']) !!}
          </table>
         </div>
        </div>
        <div class="grid">
              {!! Form::submit('Submit', ['class' => 'col-1-4']) !!}
              <a class="col-1-4" href="{{ url('/finance') }}">Cancel</a>
        </div>

    {!! Form::close() !!}
@endsection
