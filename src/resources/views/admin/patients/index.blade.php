@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Список пациентов</h3>
                <a href="{{ route('admin.patients.create') }}">Добавить пациента</a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body">
            @if(count($patients))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>ФИО</th>
                        <th>Код</th>
                        <th>Дата рождения</th>
                        <th>Пол</th>
                        <th>Город</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                        <tr class="align-middle">
                            <td>{{ $patient->id }}</td>
                            <td><a href="{{ route('admin.patients.edit', $patient->id) }}">{{ $patient->full_name }}</a></td>
                            <td>{{ $patient->patient_code }}</td>
                            <td>{{ $patient->day_with_year }}</td>
                            <td>{{ $patient->gender_values }}</td>
                            <td>{{ $patient->city ? $patient->city->city_full : 'Не указано' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Внимание!</h5>
                    <p>К сожалению список пациентов пуст.</p>
                </div>
            @endif
        </div> <!-- /.card-body -->
        <div class="card-footer clearfix">
            @if(count($patients))
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
