<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index(){
        $quizzes = Quiz::paginate(5);
        return view('admin.quizzes', compact('quizzes'));
    }

    public function create(){
        return "create";
    }

    public function store(Request $request){
        return "store";
    }

    public function show($id){
        return "show";
    }

    public function edit($id){
        return "edit";
    }

    public function update(Request $request, $id){
        return "update";
    }

    public function destroy($id){
        return "destroy";
    }
}
