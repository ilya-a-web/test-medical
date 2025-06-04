<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    public function index(Request $request)
    {
        $query = Cat::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('age_from')) {
            $query->where('age', '>=', $request->age_from);
        }

        if ($request->filled('age_to')) {
            $query->where('age', '<=', $request->age_to);
        }

        $cats = $query->with(['mother', 'fathers'])->paginate(10);

        return view('admin.cats.index', compact('cats'));
    }

    public function create()
    {
        $femaleCats = Cat::where('gender', 'female')->get();
        $maleCats = Cat::where('gender', 'male')->get();
        return view('admin.cats.create', compact('femaleCats', 'maleCats'));
    }

    public function store(Request $request)
    {
        $cat = Cat::create($request->only('name', 'gender', 'age', 'mother_id'));
        if ($request->has('fathers')) {
            $cat->fathers()->sync($request->input('fathers'));
        }
        return redirect()->route('admin.cats.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Cat $cat)
    {
        $femaleCats = Cat::where('gender', 'female')->where('id', '!=', $cat->id)->get();
        $maleCats = Cat::where('gender', 'male')->where('id', '!=', $cat->id)->get();
        $catFathers = $cat->fathers->pluck('id')->toArray();

        return view('admin.cats.edit', compact('cat', 'femaleCats', 'maleCats', 'catFathers'));
    }

    public function update(Request $request, Cat $cat)
    {
        $cat->update($request->only('name', 'gender', 'age', 'mother_id'));
        $cat->fathers()->sync($request->input('fathers', []));
        return redirect()->route('admin.cats.index');
    }

    public function destroy(Cat $cat)
    {
        $cat->delete();
        return redirect()->route('admin.cats.index');
    }
}
