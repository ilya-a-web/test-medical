@extends('admin.layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <h3>Кол-во пациентов в БД</h3>

            <div class="col-md-12">
                <h4>Всего</h4>

                <pre>SELECT COUNT(*) AS count FROM patients;</pre>

                <h4>Разбивка по диагнозам</h4>

                <pre>SELECT name, COUNT(patient_id) AS count FROM diseases GROUP BY name ORDER BY COUNT(patient_id) DESC</pre>
            </div>

        </div>

        <div class="col-md-12">
            <h3>Кол-во пациентов по регионам</h3>
            <div class="col-md-12">
                <pre>
                    SELECT gr.region_name_ru AS region, COUNT(p.id) AS count
                    FROM patients p
                    INNER JOIN geo_city AS gc ON gc.id = p.city_id
                    INNER JOIN geo_region AS gr ON gr.id = gc.id_region
                    GROUP BY gc.id_region
                </pre>
            </div>
        </div>

        <div class="col-md-12">
            <h3>Кол-во анализов</h3>
            <div class="col-md-12">
                <pre>
                    SELECT COUNT(*) AS count FROM analyses;
                </pre>
            </div>
        </div>

        <div class="col-md-12">
            <h3>Кол-во анализов по регионам</h3>
            <div class="col-md-12">
                <pre>
                    SELECT gr.region_name_ru AS region, COUNT(a.id) AS count FROM analyses a
                    INNER JOIN patients AS p ON p.id = a.patient_id
                    INNER JOIN geo_city AS gc ON gc.id = p.city_id
                    INNER JOIN geo_region AS gr ON gr.id = gc.id_region
                    GROUP BY gc.id_region
                </pre>
            </div>
        </div>

    </div>

@endsection
