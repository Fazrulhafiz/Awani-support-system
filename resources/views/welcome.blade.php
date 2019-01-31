@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{ config('app.name') }}
    </div>
    <div class="m-b-md">
        Beta version<br/>
    </div>

    @if (Auth::check())
        <br/><br/>
        @if (auth()->user()->hasRoles(['administrator', 'finance']))
            <a href="{{ url('/finance') }}" class="card">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample35.jpg" alt="sq-sample35" />
              <p>FINANCE</p>
            </a>
        @endif
        @if (auth()->user()->hasRoles(['administrator']))
            <a href="{{ url('/mcr') }}" class="card">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample35.jpg" alt="sq-sample35" />
              <p>MCR</p>
            </a>
        @endif
    @endif
@endsection
