<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quiz_id'           =>'required',
            'question'          =>'required|min:6',
            'image'             =>'nullable',
            'answer1'           =>'required|min:6',
            'answer2'           =>'required|min:6',
            'answer3'           =>'required|min:6',
            'answer4'           =>'required|min:6',
            'correct_answer'    =>'required'
        ];
    }
    public function attribute(){
        return [
            'quiz_id'           =>'Quiz id',
            'question'          =>'Question başlığı',
            'answer1'           =>'Cevap 1',
            'answer2'           =>'Cevap 2',
            'answer3'           =>'Cevap 3',
            'answer4'           =>'Cevap 4',
            'correct_answer'    =>'Doğru cevap'
        ];
    }
}