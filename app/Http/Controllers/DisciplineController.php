<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::orderBy('name')->get();
        return view('discipline.index', compact('disciplines'));
    }

    public function store(Request $request)
    {
        $discipline = new Discipline();
        $discipline->name = $request->name;
        $discipline->description = $request->description;
        $discipline->teacher = $request->teacher;
        $discipline->numberVacancies = $request->numberVacancies;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = date('Ymdhis') . $discipline->name.'.'.$extension;
            $file->storeAs('public/disciplines/images', $filename);
        }

        $discipline->image = $filename;

        $discipline->save();
        return redirect()->route('discipline.index')
            ->with('mensagem', ['texto' => 'Disciplina eletiva adicionada com sucesso!', 'alert' => 'success']);
    }

    public function show($id)
    {
        $discipline = Discipline::find($id);
        return view('discipline.show', compact('discipline'));
    }
}
