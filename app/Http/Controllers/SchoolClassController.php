<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $schoolClasses = SchoolClass::orderBy('name')->get();
        return view('schoolClass.index',compact('schoolClasses'));
    }

    public function store(Request $request)
    {
        $schoolClass = new SchoolClass();
        $schoolClass->name = $request->name;
        $schoolClass->save();
        return redirect()->route('schoolClass.index')
                ->with('mensagem', ['texto' => 'Turma adicionada com sucesso!', 'alert' => 'success']);;
    }

    public function show($id)
    {
        $schoolClass = SchoolClass::find($id);
        return view('schoolClass.show',compact('schoolClass'));
    }
}
