@extends('layouts.app')

@section('content')
    <div class="mount">
        <chat-app :user="{{Auth()->user()}}"></chat-app>
    </div>
@endsection
