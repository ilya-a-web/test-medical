<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analyses;
use Illuminate\Http\Request;

class AnalysesController extends Controller
{
    public function index()
    {
        $analyses = Analyses::query()->latest()->simplePaginate(100);
        return view('admin.analyses.index', [
            'analyses' => $analyses
        ]);
    }

    public function create()
    {
        $analyse = new Analyses();
        return view('admin.analyses.create', [
            'patients' => $analyse,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'date_result_create' => 'required',
            'date_result_done' => 'required',
            'result' => 'required',
            'laboratory' => 'required',
        ]);
        Analyses::create([
            'patient_id' => $request->input('patient_id'),
            'date_result_create' => strtotime($request->input('date_result_create')),
            'date_result_done' => strtotime($request->input('date_result_done')),
            'result' => $request->input('result'),
            'laboratory' => $request->input('laboratory'),
        ]);
        return redirect()->route('admin.analyses.index')->with(['success' => 'Анализ успешно добавлен']);
    }

    public function edit($id)
    {
        $model = Analyses::findOrFail($id);
        return view('admin.analyses.edit',[
            'model' => $model,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required',
            'date_result_create' => 'required',
            'date_result_done' => 'required',
            'result' => 'required',
            'laboratory' => 'required',
        ]);
        $model = Analyses::findOrFail($id);
        $model->update([
            'patient_id' => $request->input('patient_id'),
            'date_result_create' => strtotime($request->input('date_result_create')),
            'date_result_done' => strtotime($request->input('date_result_done')),
            'result' => $request->input('result'),
            'laboratory' => $request->input('laboratory'),
        ]);
        return redirect()->route('admin.analyses.index')->with(['success' => 'Анализ успешно обновлен']);
    }
}
