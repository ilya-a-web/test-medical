@extends('admin.layouts.app')

@section('content')
    <h1>Редактировать кошку: {{ $cat->name }}</h1>
    <form action="{{ route('admin.cats.update', $cat) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.cats.form')
        <button type="submit">Обновить</button>
    </form>
@endsection
