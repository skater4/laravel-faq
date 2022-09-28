@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">FAQ</div>

                    <div class="card-body">
                        Сообщение успешно отправлено <a class="btn btn-success" href="{{ route('admin') }}">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
