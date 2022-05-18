@extends('layouts.main')
@section('content')
<div>
    @if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color: red"> {{ $error }}</div>
    @endforeach
    @endif
    <form action="{{ route('links.send') }}" id="main-form" method="post">
        @csrf
        <input type="text" name="url" placeholder="https://example.com"/>
        <input type="submit" value="Send"/>
    </form>
</div>
@stop
