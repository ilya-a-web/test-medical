@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Список заболеваний</h3>
                <a href="{{ route('admin.diseases.create') }}">Добавить заболевание</a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body">
            @if(count($diseases))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Пациент</th>
                        <th>Дата выявления</th>
                        <th>Название</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($diseases as $disease)
                        <tr class="align-middle">
                            <td>{{ $disease->id }}</td>
                            <td><a href="{{ route('admin.diseases.edit', $disease->id) }}">{{ $disease->patient->full_name . ' [ ' . $disease->patient->patient_code . ' ] ' }}</a></td>
                            <td>{{ date('d.m.Y', $disease->init_date) }}</td>
                            <td>{{ $disease->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Внимание!</h5>
                    <p>К сожалению список заболеваний пуст.</p>
                </div>
            @endif
        </div> <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{--@if(count($diseases))
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            @endif--}}
        </div>
    </div>
@endsection
