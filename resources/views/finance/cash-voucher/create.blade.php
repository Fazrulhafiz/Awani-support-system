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
  {!! Form::open(['route' => 'finance.new-voucher.store']) !!}

    <!--  General -->
    <h2 class="heading">Petty Cash Voucher <?php print sprintf("%05d", $voucher_no); ?></h2>
    <div class="form-group col-2-3">
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
        <div class="col-1-3">
          <div class="controls">
            {!! Form::number('rm', null, ['class' => 'floatLabel', 'id' => 'rm', 'onkeyup' => 'convertNumberToWords(this.value)', 'step' => '.01']) !!}
            {!! Form::label('rm', 'MYR') !!}
          </div>
        </div>
        <div class="col-2-3">
          <div class="controls">
           {!! Form::text('ringgit', null, ['class' => 'floatLabel', 'id' => 'ringgit', 'readonly' => 'readonly']) !!}
           {!! Form::label('ringgit', 'Ringgit', ['class' => 'active']) !!}
          </div>
        </div>
      </div>
      <div class="grid">
        <div class="col-2-3">
          <div class="controls">
            <i class="fa fa-sort"></i>
            <select class="floatLabel" name="cost_centre">
              <option value="">SELECT ONE</option>
              @foreach($cost_centre as $cost)
              <option value="{{$cost->id}}">{{$cost->cost_centre." ".$cost->description}}</option>
              @endforeach
            </select>
            {!! Form::label('cost_centre', 'Cost Centre', ['class' => 'active']) !!}
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
            {!! Form::text('voucher_date', date('m/d/Y'), ['id' => 'datepicker']) !!}
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
          @foreach($gl_code as $glcode)
          <tr>
          <td>{!! Form::checkbox('gl_code[]', $glcode->id, null) !!} {{ $glcode->gl_code." ".$glcode->gl_name }}</td>
          </tr>
          @endforeach
          {!! Form::label('gl_code', 'GL code', ['class' => 'active']) !!}
        </table>
      </div>
    </div> <!-- /.form-group -->
    <div class="form-group col-1-3">
      <div class="grid">
        {!! Form::submit('Save', ['class' => 'col-1-4']) !!}
        <a class="col-2-4" href="{{ url('/finance') }}">Cancel</a>
      </div>
    </div>

  {!! Form::close() !!}
@endsection
