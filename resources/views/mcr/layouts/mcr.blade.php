@extends('layouts.app')

@section('styles')
    {{ Html::style(mix('assets/mcr/css/mcr.css')) }}
@endsection

@section('scripts')
    {{ Html::script(mix('assets/mcr/js/mcr.js')) }}
@endsection
