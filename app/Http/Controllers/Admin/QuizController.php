<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    public function index(){
        $quizzes = Quiz::withCount('questions');

        if(request()->get('q')){
            $quizzes = $quizzes->where('title','like','%'.request()->get('q').'%');
        }
        if(request()->get('status')){
            $quizzes = $quizzes->where('status',request()->get('status'));
        }
        $quizzes = $quizzes->paginate(5);


        return view('admin.quiz.index', compact('quizzes'));
    }

    public function create(){
        return view('admin.quiz.create');
    }

    public function store(QuizCreateRequest $request){
        Quiz::create($request->post());

        return redirect()->route('quizzes.index')->withSuccess('Quiz başarıyla oluşturuldu.');
    }

    public function show($id){
        return "show";
    }

    public function edit($id){
        $quiz = Quiz::withCount('questions')->find($id) ?? abort(404,'Quiz bulunamadı');
        return view('admin.quiz.edit', compact('quiz'));
    }

    public function update(QuizUpdateRequest $request, $id){
        Quiz::find($id) ?? abort(404,'Quiz bulunamadı');

        Quiz::where('id',$id)->update($request->except('_method','_token'));

        return redirect()->route('quizzes.index')->withSuccess('Quiz başarıyla güncellendi.');
    }

    public function destroy($id){
        Quiz::find($id) ?? abort(404,'Quiz bulunamadı');
        Quiz::find($id)->delete();

        return redirect()->route('quizzes.index')->withSuccess('Quiz başarıyla silindi.');
    }
}
