@extends('admin.layouts.app')

@section('content')
    <style>
        .select2-container--default .select2-selection--single {
            border-radius: 0px !important;
            border-color: #aeacb4 !important;
            height: 30px !important;
            line-height: 1.5 !important;
        }
    </style>
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Добавить пациента</div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="post" action="{{ route('admin.patients.store') }}"> <!--begin::Body-->
            @csrf
            <div class="card-body">

                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="exampleInputEmail1" name="last_name" aria-describedby="emailHelp" value="{{ old('last_name') }}">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Имя</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="exampleInputEmail1" name="first_name" aria-describedby="emailHelp" value="{{ old('first_name') }}">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Отчество</label>
                        <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="exampleInputEmail1" name="middle_name" aria-describedby="emailHelp" value="{{ old('middle_name') }}">
                        @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <br/>

                <div class="row">

                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
                        <input type="text"
                               class="form-control datepicker-input @error('birthday') is-invalid @enderror"
                               name="birthday" value="{{ old('birthday') }}"/>
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--<div class="col-2">
                        <label for="exampleInputEmail1" class="form-label">Возраст</label>
                        <input disabled readonly type="text" class="form-control @error('years_old') is-invalid @enderror" id="exampleInputEmail1" name="years_old" aria-describedby="emailHelp" value="{{ old('years_old') }}">
                        @error('years_old')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>--}}

                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label">Пол</label>
                        <select class="form-control @error('gender') is-invalid @enderror" id="exampleInputEmail1" name="gender" aria-describedby="emailHelp">
                            @foreach($gender as $key => $val)
                                <option value="{{ $key }}" @if(old('gender') == $key) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--<div class="col-2">
                        <label for="exampleInputEmail1" class="form-label">Код пациента</label>
                        <input disabled readonly type="text" class="form-control @error('patient_code') is-invalid @enderror" id="exampleInputEmail1" name="patient_code" aria-describedby="emailHelp" value="{{ old('patient_code') }}">
                        @error('patient_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>--}}

                </div>

                <br/>

                <div class="row">

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Город</label>
                        <select class="form-control select2 select2-geo-city @error('city_id') is-invalid @enderror" id="exampleInputEmail1" name="city_id">
                            @if(isset($company) && $company->city)
                                <option value="{{ $company->city->id }}">{{ $company->city->city_full }}</option>
                            @endif
                        </select>
                        @error('city_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <br/>

                <div class="row g-3">

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Адрес</label>
                        <textarea style="resize: none; height: 200px;" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" name="address" aria-describedby="emailHelp">{{ old('city_id') }}</textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Телефоны</label>
                        <textarea style="resize: none; height: 200px;" class="form-control @error('phones') is-invalid @enderror" id="exampleInputEmail1" name="phones" aria-describedby="emailHelp">{{ old('phones') }}</textarea>
                        @error('phones')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Контакты родственников</label>
                        <textarea style="resize: none; height: 200px;" class="form-control @error('contacts_relatives') is-invalid @enderror" id="exampleInputEmail1" name="contacts_relatives" aria-describedby="emailHelp">{{ old('contacts_relatives') }}</textarea>
                        @error('contacts_relatives')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>




            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="width: 300px">Добавить</button>
            </div> <!--end::Footer-->
        </form> <!--end::Form-->
    </div>
    @push('scripts')
        <link rel="stylesheet" href="/template/plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="/template/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="/template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="/template/plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="/template/plugins/dropzone/min/dropzone.min.css">
        <!-- Theme style -->

        <script src="/template/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="/template/plugins/moment/moment.min.js"></script>
        <script src="/template/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="/template/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- BS-Stepper -->
        <script src="/template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="/template/plugins/dropzone/min/dropzone.min.js"></script>

        <link rel="stylesheet" href="/template/plugins/jquery-ui/jquery-ui.css">
        <script src="/template/plugins/jquery-ui/jquery-ui.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function () {

                $('.datepicker-input').datepicker({
                    dateFormat: 'dd.mm.yy',
                    onSelect: function (on, off) {
                        let myDate = on.split(".");
                        let newDate = new Date( myDate[2], myDate[1] - 1, myDate[0]);
                    }
                });

                $('.select2-geo-city').select2({
                    theme: 'bootstrap4',
                    //language: "ru",
                    placeholder: 'Выберите город',
                    minimumInputLength: 2,
                    ajax: {
                        url: '/api/geo/select2',
                        dataType: 'json',
                        type: 'POST',
                        data: function (params) {
                            return {
                                request: params.term
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        item: item,
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        },
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    },
                    templateSelection: function (data, container) {
                        // Add custom attributes to the <option> tag for the selected option
                        if( typeof data.item === 'object' ) {
                            return data.text;
                        }
                        else {
                            return data.text;
                        }
                    },
                    cache: true
                });
            });
        </script>
    @endpush
@endsection
