@extends('layout')
@section('content')
  <h1>Write New Article</h1>
  <hr />

  @include('errors.form_errors')

  {!! Form::open(['route' => 'articles.store']) !!}
    @include('articles.form', ['published_at' => date('Y-m-d H:i:s'), 'submitButton' => 'Add Article'])
  {!! Form::close() !!}
@stop
