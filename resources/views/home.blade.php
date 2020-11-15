@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">We Code Messenger</div>
                <div class="card-body" id="app">
                <chat-app :user="{{Auth()->user()}}"></chat-app>
                </div>
            </div>

             {{-- <textarea id="example1"></textarea> --}}


        </div>
    </div>
</div>
@endsection
