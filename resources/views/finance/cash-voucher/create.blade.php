@extends('layouts.welcome')

@section('content')
    {!! Form::open(['route' => 'finance.new-voucher.store']) !!}

    <div class="form-group">
        {!! Form::label('pay_to', 'Pay to') !!}
        {!! Form::text('pay_to', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('payment_for', 'Payment for') !!}
        {!! Form::text('payment_for', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ringgit', 'Ringgit') !!}
        {!! Form::text('ringgit', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('rm', 'MYR') !!}
        {!! Form::text('rm', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cost_centre', 'Cost centre') !!}
        {!! Form::select('cost_centre', $cost_centre) !!}
    </div>

    <div class="form-group">
        {!! Form::label('gl_code', 'GL code') !!}
        {!! Form::select('gl_code', $gl_code) !!}
    </div>

    <div class="form-group">
        {!! Form::label('created_by', 'Created') !!}
        {!! Form::text('created_by', '1') !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}
@endsection
