<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Services\PatientService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index()
    {
        $patients = Patient::query()->latest()->simplePaginate(100);
        return view('admin.patients.index', [
            'patients' => $patients
        ]);
    }

    public function create()
    {
        $patient = new Patient();
        return view('admin.patients.create', [
            'patients' => $patient,
            'gender' => ['male' => 'Мужской', 'female' => 'Женский'],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|min:3|max:30',
            'first_name' => 'required|min:3|max:30',
            'middle_name' => 'required|min:3|max:30',
            'birthday' => 'required',
            'city_id' => 'required',
            'email' => 'required',
            'gender' => 'required|in:male,female'
        ]);

        Patient::create([
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'birthday' => strtotime($request->input('birthday')),
            'years_old' => $this->patientService->getYearsOld($request),
            'gender' => $request->input('gender'),
            'patient_code' => $this->patientService->getPatientCode($request),
            'city_id' => $request->input('city_id'),
            'address' => $request->input('address'),
            'phones' => $request->input('phones'),
            'email' => $request->input('email'),
            'contacts_relatives' => $request->input('contacts_relatives'),
        ]);
        return redirect()->route('admin.patients.index')->with(['success' => 'Пациент успешно добавлен']);
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.edit',[
            'patient' => $patient,
            'gender' => ['male' => 'Мужской', 'female' => 'Женский'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'required|min:3|max:30',
            'first_name' => 'required|min:3|max:30',
            'middle_name' => 'required|min:3|max:30',
            'birthday' => 'required',
            'city_id' => 'required',
            'email' => 'required',
            'gender' => 'required|in:male,female'
        ]);
        $patient = Patient::findOrFail($id);
        $patient->update([
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'birthday' => strtotime($request->input('birthday')),
            'years_old' => $this->patientService->getYearsOld($request),
            'gender' => $request->input('gender'),
            'patient_code' => $this->patientService->getPatientCode($request),
            'city_id' => $request->input('city_id'),
            'address' => $request->input('address'),
            'phones' => $request->input('phones'),
            'email' => $request->input('email'),
        ]);
        return redirect()->route('admin.patients.index')->with(['success' => 'Пациент успешно обновлен']);
    }

    public function destroy($id)
    {

    }

}
