@extends('layouts.main')
@section('content')
<div>
    @if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color: red"> {{ $error }}</div>
    @endforeach
    @endif
    @if(session()->has('success'))
        <p><strong>Links: <a href="{{ session()->get('success') }}">{{ session()->get('success') }}</a></strong></p>
    @endif
    <form action="{{ route('links.send') }}" id="main-form" method="post">
        @csrf
        <input type="text" name="url" placeholder="https://example.com"/>
        <input type="submit" value="Send"/>
    </form>
</div>
@stop
