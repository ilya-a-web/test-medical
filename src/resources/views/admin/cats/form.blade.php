<div>
    <label>Имя:</label>
    <input type="text" name="name" value="{{ old('name', $cat->name ?? '') }}" required>

    <label>Пол:</label>
    <select name="gender" required>
        <option value="male" {{ old('gender', $cat->gender ?? '') == 'male' ? 'selected' : '' }}>Мужской</option>
        <option value="female" {{ old('gender', $cat->gender ?? '') == 'female' ? 'selected' : '' }}>Женский</option>
    </select>

    <label>Возраст:</label>
    <input type="number" name="age" value="{{ old('age', $cat->age ?? '') }}" required>

    <label>Мать:</label>
    <select name="mother_id">
        <option value="">—</option>
        @foreach ($femaleCats as $female)
            <option value="{{ $female->id }}"
                {{ old('mother_id', $cat->mother_id ?? '') == $female->id ? 'selected' : '' }}>
                {{ $female->name }}
            </option>
        @endforeach
    </select>

    <label>Отцы:</label>
    <select name="fathers[]" multiple style="width: 200px;">
        @foreach ($maleCats as $male)
            <option value="{{ $male->id }}"
                {{ in_array($male->id, old('fathers', $catFathers ?? [])) ? 'selected' : '' }}>
                {{ $male->name }}
            </option>
        @endforeach
    </select>
</div>
