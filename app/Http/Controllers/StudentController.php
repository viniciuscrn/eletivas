<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Student;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->registration = $request->registration;
        $student->school_class_id = $request->id;
        $student->save();
        return redirect()->route('schoolClass.show', ['id' => $student->school_class_id])
            ->with('mensagem', ['texto' => 'Aluno adicionado com sucesso!', 'alert' => 'success']);;
    }

    public function student(Request $request)
    {
        $disciplines = Discipline::orderBy('name')->get();
        
        if ($student = Student::where('registration', '=', $request->registration)->first())
            Session::flash('mensagem', ['texto' => 'Aluno encontrado com sucesso!', 'alert' => 'success']);
        else
            Session::flash('mensagem', ['texto' => 'Aluno não encontrado. Confira a matrícula', 'alert' => 'warning']);
        return view('welcome', compact('student','disciplines'));
    }
    
    public function confirm(Request $request)
    {
        $discipline = Discipline::find($request->discipline);
        $student = Student::find($request->student);
        return view('confirm', compact('student','discipline'));
    }
    
    public function storeVote(Request $request)
    {
        $vote = new Vote();
        $vote->discipline_id = $request->discipline;
        $vote->student_id = $request->student;
        $vote->save();
        Session::flash('mensagem', ['texto' => 'Escolha efetuada com sucesso!', 'alert' => 'success']);
        return view('welcome');
    }
}
