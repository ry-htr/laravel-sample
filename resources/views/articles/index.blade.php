@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Articles</h1>
                </div>
                {!! link_to('articles/create', '新規作成', ['class' => 'btn btn-primary']) !!}
                @foreach($articles as $article)
                    <article>
                        <h2>
                            <a href="{{ url('articles', $article->id) }}">
                                {{ $article->title }}
                            </a>
                        </h2>
                        <div class="body">
                            {{ $article->body }}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
