@extends('layouts.app')

<!-- :colon  will treat as a JSON string, we are passing the auth user to the main app-->
@section('content')
    <App :user="{{ auth()->user() }}"></App>
@endsection
