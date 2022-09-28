@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">FAQ</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('faq-form') }}" method="post">
                            @csrf

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="name">Ваше имя</label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Ваше имя">
                            </div>

                            <div class="form-group">
                                <label for="message">Ваш вопрос</label>
                                <textarea id="message" name="message" class="form-control"></textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">Отправить</button>
                        </form>
                        <hr>
                        @forelse($messages as $message)
                            @if (empty($message['answer'])) @continue @endif
                            <h3>Вопрос от пользователя {{ $message['question']['name'] }}: {{ $message['question']['message'] }}</h3>
                            <div>Ответ: {{ $message['answer']['message'] }}</div>
                            <hr>
                        @empty
                            <div>Ответов пока нет</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
