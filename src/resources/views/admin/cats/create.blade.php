@extends('admin.layouts.app')

@section('content')
    <h1>Добавить кошку</h1>
    <form action="{{ route('admin.cats.store') }}" method="POST">
        @csrf
        @include('admin.cats.form')
        <button type="submit">Сохранить</button>
    </form>
@endsection
