@extends('layouts.welcome')

@extends('finance.layouts.finance')

@section('content')
    {!! Form::open(['route' => 'finance.new-voucher.store']) !!}

      <!--  General -->
      <div class="form-group">
        <h2 class="heading">Petty Cash Voucher</h2>
        <div class="controls">
          {!! Form::text('pay_to', null, ['class' => 'floatLabel']) !!}
          {!! Form::label('pay_to', 'Pay to') !!}
        </div>
        <div class="controls">
          {!! Form::text('payment_for', null, ['class' => 'floatLabel']) !!}
          {!! Form::label('payment_for', 'Payment for') !!}
        </div>
          <div class="grid">
            <div class="col-2-3">
              <div class="controls">
               {!! Form::text('ringgit', null, ['class' => 'floatLabel', 'id' => 'text']) !!}
               {!! Form::label('ringgit', 'Ringgit') !!}
              </div>
            </div>
            <div class="col-1-3">
              <div class="controls">
                {!! Form::number('rm', null, ['class' => 'floatLabel translateNumber']) !!}
                <!-- , 'onkeyup' => "convertNumberToWords(this.value)" -->
                {!! Form::label('rm', 'MYR') !!}
              </div>
            </div>
          </div>
      </div>
      <!--  Details -->
      <div class="form-group">
        <h2 class="heading">Details</h2>
          <div class="grid">
        <div class="col-1-2 col-1-2-sm">
        <div class="controls">
          <i class="fa fa-sort"></i>
          {!! Form::select('cost_centre', $cost_centre, null, ['class' => 'floatLabel']) !!}
          {!! Form::label('cost_centre', 'Cost centre') !!}
         </div>
        </div>

        <div class="col-1-2 col-1-2-sm">
        <div class="controls">
          <i class="fa fa-sort"></i>
          {!! Form::select('gl_code', $gl_code, null, ['class' => 'floatLabel']) !!}
          {!! Form::label('gl_code', 'GL code') !!}
         </div>
        </div>

         </div>
          <div class="grid">
                {!! Form::submit('Submit', ['class' => 'col-1-4']) !!}
                <a class="col-1-4" href="{{ url('/finance') }}">Cancel</a>
          </div>
      </div> <!-- /.form-group -->

    {!! Form::close() !!}
@endsection
