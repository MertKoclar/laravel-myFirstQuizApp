<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Http\Requests\QuestionUpdateRequest;
use App\Http\Requests\QuestionCreateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index($quiz_id){
        $quiz = Quiz::whereId($quiz_id)->with('questions')->first() ?? abort(404, 'Quiz bulunamadı.');
        return view('admin.question.index', compact('quiz'));
    }

    public function create($quiz_id){
        $quiz = Quiz::whereId($quiz_id)->first() ?? abort(404, 'Quiz bulunamadı.');
        return view('admin.question.create',compact('quiz'));
    }

    public function store(QuestionCreateRequest $request,$quiz_id){
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->getClientOriginalextension();
            $fileNameWithUpload = 'uploads/'.$fileName;

            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image' => $fileNameWithUpload,
            ]);
        }

        Quiz::find($quiz_id)->questions()->create($request->post());
        
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Question başarıyla oluşturuldu.');
    }

    public function show($quiz_id,$id){
        return "show";
    }

    public function edit($quiz_id,$id){
        $question = Quiz::find($quiz_id)->questions()->where('id',$id)->first() ?? abort(404,'Question bulunamadı');
        
        return view('admin.question.edit', compact('question'));
    }

    public function update(QuestionCreateRequest $request, $quiz_id, $id){
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->getClientOriginalextension();
            $fileNameWithUpload = 'uploads/'.$fileName;

            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image' => $fileNameWithUpload,
            ]);

        }
        Quiz::find($quiz_id)->questions()->whereId($id)->first()->update($request->post());
        
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Question başarıyla güncellendi.');
    }

    public function destroy($quiz_id,$id){
        Quiz::find($quiz_id)->questions()->where('id',$id) ?? abort(404,'Question bulunamadı');
        Quiz::find($quiz_id)->questions()->where('id',$id)->delete();

        return redirect()->route('questions.index',$quiz_id)->withSuccess('Question başarıyla silindi.');
    }
}
