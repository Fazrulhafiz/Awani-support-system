@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{ config('app.name') }}
    </div>
    <div class="m-b-md">
        Sample users:<br/>
        Admin user: admin.asa@astro.com.my / password: admin<br/>
        Demo user: demo.asa@astro.com.my / password: demo
    </div>
@endsection
