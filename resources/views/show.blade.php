@extends('layouts.main')
@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column mt-auto vh-100">
    <div class="w-50">
        <form>
            @csrf
            <div class="form-group mb-3">
                <input class="form-control" type="text" name="url" placeholder="https://example.com"/>
            </div>
            <input type="button" value="Сгенерировать ссылку" id="btn-submit" class="btn btn-primary form-control"/>
        </form>
    </div>
    <div class="w-50">
        <p><strong>Короткая ссылка: <a href="" id="link"></a></strong></p>
    </div>
</div>
@stop
