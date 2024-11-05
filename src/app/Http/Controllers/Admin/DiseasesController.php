<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diseases;
use DeepCopy\TypeFilter\Spl\ArrayObjectFilter;
use Illuminate\Http\Request;

class DiseasesController extends Controller
{
    public function index()
    {
        $diseases = Diseases::query()->latest()->simplePaginate(100);
        return view('admin.diseases.index', [
            'diseases' => $diseases
        ]);
    }

    public function create()
    {
        $model = new Diseases();
        return view('admin.diseases.create',[
            'model' => $model
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'date_init' => 'required',
            'name' => 'required',
        ]);
        Diseases::create([
            'patient_id' => $request->input('patient_id'),
            'date_init' => strtotime($request->input('date_init')),
            'name' => $request->input('name'),
        ]);
        return redirect()->route('admin.diseases.index')->with(['success' => 'Заболевание успешно добавлено']);
    }

    public function edit($id)
    {
        $model = Diseases::findOrFail($id);
        return view('admin.diseases.edit',[
            'model' => $model
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required',
            'date_init' => 'required',
            'name' => 'required',
        ]);
        $model = Diseases::findOrFail($id);
        $model->update([
            'patient_id' => $request->input('patient_id'),
            'date_init' => strtotime($request->input('date_init')),
            'name' => $request->input('name'),
        ]);
        return redirect()->route('admin.diseases.index')->with(['success' => 'Заболевание успешно обновлено']);
    }
}
