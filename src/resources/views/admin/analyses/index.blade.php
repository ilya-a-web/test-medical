@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Список анализов</h3>
                <a href="{{ route('admin.analyses.create') }}">Добавить анализ</a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body">
            @if(count($analyses))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Пациент</th>
                        <th>Материал получен</th>
                        <th>Анализ выполнен</th>
                        <th>Лаборатория</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($analyses as $analyse)
                        <tr class="align-middle">
                            <td>{{ $analyse->id }}</td>
                            <td><a href="{{ route('admin.analyses.edit', $analyse->id) }}">{{ $analyse->patient->full_name . ' [ ' . $analyse->patient->patient_code . ' ] ' }}</a></td>
                            <td>{{ date('d.m.Y', $analyse->date_result_create) }}</td>
                            <td>{{ date('d.m.Y', $analyse->date_result_done) }}</td>
                            <td>{{ $analyse->laboratory }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Внимание!</h5>
                    <p>К сожалению список анализов пуст.</p>
                </div>
            @endif
        </div> <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{--@if(count($patients))
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
