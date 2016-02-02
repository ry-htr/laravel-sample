@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>

    <br/>

    {!! link_to(action('ArticlesController@edit', [$article->id]), '編集', ['class' => 'btn btn-primary']) !!}

    <br/>
    <br/>

    {!! delete_form(['articles', $article->id]) !!}
@stop