@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">FAQ</div>

                    <div class="card-body">
                        @if (!empty($sent) && $sent)
                            <div>Успешно отправлено</div>
                        @endif
                        <div>Вопросы пользователей</div>
                        @if (!empty($messages) && !$messages->isEmpty())
                            <form action="{{ route('answer-faq-form') }}" method="post">
                                @csrf
                                @foreach($messages as $message)
                                    <div>
                                        <h3>Имя: {{ $message-> name}}</h3>
                                        <h3>Вопрос: {{ $message-> message}}</h3>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Ответ</label>
                                        <textarea id="message" name="message[{{ $message->thread_id }}]"
                                                  class="form-control"></textarea>
                                    </div>
                                    <hr>
                                @endforeach

                                <button type="submit" class="btn btn-success">Отправить</button>
                            </form>
                        @else
                            <div>Нет сообщений</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
