@extends('admin.layouts.app')

@section('content')
    <h1>🐾 Список кошек</h1>

    <form method="GET" action="{{ route('admin.cats.index') }}" style="margin-bottom: 20px; display: flex; gap: 20px; align-items: flex-end; flex-wrap: wrap;">
        <div>
            <label for="name">Имя:</label><br>
            <input type="text" name="name" id="name" value="{{ request('name') }}" placeholder="Поиск по имени">
        </div>

        <div>
            <label for="gender">Пол:</label><br>
            <select name="gender" id="gender">
                <option value="">Все</option>
                <option value="male" {{ request('gender') === 'male' ? 'selected' : '' }}>Самец</option>
                <option value="female" {{ request('gender') === 'female' ? 'selected' : '' }}>Самка</option>
            </select>
        </div>

        <div>
            <label for="age_from">Возраст от:</label><br>
            <input type="number" name="age_from" id="age_from" value="{{ request('age_from') }}" min="0">
        </div>

        <div>
            <label for="age_to">Возраст до:</label><br>
            <input type="number" name="age_to" id="age_to" value="{{ request('age_to') }}" min="0">
        </div>

        <div>
            <button type="submit">🔍 Фильтровать</button>
            <a href="{{ route('admin.cats.index') }}" style="margin-left: 10px;">↩️ Сбросить</a>
        </div>
    </form>

    <br>
    <a href="{{ route('admin.cats.create') }}">Добавить кошку</a>
    <br>
    <br>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f5f5f5;">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Пол</th>
            <th>Возраст</th>
            <th>Мать</th>
            <th>Отцы</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cats as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->gender === 'male' ? '♂ Самец' : '♀ Самка' }}</td>
                <td>{{ $cat->age }} лет</td>
                <td>{{ $cat->mother?->name ?? '—' }}</td>
                <td>{{ $cat->fathers->pluck('name')->join(', ') ?: '—' }}</td>
                <td style="white-space: nowrap;">
                    <a href="{{ route('admin.cats.edit', $cat) }}">✏️</a>
                    <form action="{{ route('admin.cats.destroy', $cat) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Удалить кошку {{ $cat->name }}?')">🗑️</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" style="text-align: center;">😿 Кошки не найдены</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $cats->withQueryString()->links() }}
    </div>
@endsection
