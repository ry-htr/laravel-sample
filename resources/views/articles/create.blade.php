@extends('layouts.app')

@section('content')
    <h1>Write a New Article</h1>

    <hr/>
    {{-- エラーの表示を追加 --}}
    @include('errors.form_errors')

    {!! Form::open(['url' => 'articles']) !!}
        @include('articles.form', ['published_at' => date('Y-m-d'), 'submitButton' => 'Add Article'])
    {!! Form::close() !!}
@endsection
