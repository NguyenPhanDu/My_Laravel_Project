@extends('admin.shared.layout')
@section('content')
    @if(Session::has('login'))
        <div class="alert alert-success">
            {{ Session::get('login') }}
            {{Session::get('userAdmin')->username}}
        </div>
    @endif	   
    <h1>Index</h1>
@endsection