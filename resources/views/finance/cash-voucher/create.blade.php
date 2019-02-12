@extends('layouts.awani')

@section('content')
    {!! Form::open(['route' => 'finance.new-voucher.store']) !!}

      <!--  General -->
      <div class="form-group">
        <h2 class="heading">Petty Cash Voucher <?php print sprintf("%05d", $voucher_no); ?></h2>
        {!! Form::hidden('voucher_no', $voucher_no) !!}
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
          <select class="floatLabel" name="cost_centre">
              <option value="select">SELECT ONE</option>
              @foreach($cost_centre as $cost)
              <option value="{{$cost->id}}">{{$cost->cost_centre." ".$cost->description}}</option>
              @endforeach
          </select>
          {!! Form::label('cost_centre', 'Cost Centre', ['class' => 'active']) !!}
         </div>
        </div>

        <div class="col-1-2 col-1-2-sm">
        <div class="controls">
          <i class="fa fa-sort"></i>
          <select class="floatLabel" name="gl_code">
              <option value="select">SELECT ONE</option>
              @foreach($gl_code as $glcode)
              <option value="{{$glcode->id}}">{{$glcode->gl_code." ".$glcode->gl_name}}</option>
              @endforeach
          </select>
          {!! Form::label('gl_code', 'GL code', ['class' => 'active']) !!}
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
