@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        User area
    </div>
    <div class="m-b-md">
        @if($valid)
            Your membership status is confirmed. All the protected pages will be accessible.
            @if($expires)
                <br/>Your license expires on <i>{{  new \Carbon\Carbon($expires) }}</i>
            @endif
        @else
            Your membership status isn't confirmed. All the protected pages will not be accessible!
        @endif

        @if($shopUrl)
            <br/><br/>
            Click <a href="{{ $shopUrl }}">here</a> to extend or renew your membership.
        @endif

        <br/><br/>
        <a href="{{ url('/finance') }}" class="card">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample35.jpg" alt="sq-sample35" />
          <p>FINANCE</p>
        </a><a href="{{ url('/mcr') }}" class="card">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample35.jpg" alt="sq-sample35" />
          <p>MCR</p>
        </a>
    </div>
@endsection
