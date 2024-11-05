<?php

namespace App\Services;

use Illuminate\Http\Request;

class PatientService
{
    public function getPatientCode(Request $request): string
    {
        $result = [];
        $result[] = mb_strtoupper(mb_substr($request->input('last_name'), 0, 1, 'UTF8'));
        $result[] = mb_strtoupper(mb_substr($request->input('first_name'), 0, 1, 'UTF8'));
        $result[] = mb_strtoupper(mb_substr($request->input('middle_name'), 0, 1, 'UTF8'));
        $result[] = str_replace('.','',$request->input('birthday'));
        return implode('', $result);
    }

    public function getYearsOld(Request $request): int
    {
        $birthday = strtotime($request->input('birthday'));
        return abs((time() - $birthday) / 60 / 60 / 24 / 365);
    }
}
