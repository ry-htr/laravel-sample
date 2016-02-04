@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $article->title }}</h1>
                </div>

                <article>
                    <div class="body">{{ $article->body }}</div>
                </article>

                @unless ($article->tags->isEmpty())
                    <h5>Tags:</h5>
                    <ul>
                        @foreach($article->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                @endunless

                @if (Auth::check())
                    <br/>

                    {!! link_to(route('articles.edit', [$article->id]), '編集', ['class' => 'btn btn-primary']) !!}

                    <br/>
                    <br/>

                    {!! delete_form(['articles', $article->id]) !!}
                @endif
            </div>
        </div>
    </div>
</div>
@stop
