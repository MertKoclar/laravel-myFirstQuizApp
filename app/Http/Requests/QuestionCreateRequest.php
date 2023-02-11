<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question'          =>'required|min:6',
            'image'             =>'nullable|image|max:5120|mimes:jpg,jpeg,png',
            'answer1'           =>'required',
            'answer2'           =>'required',
            'answer3'           =>'required',
            'answer4'           =>'required',
            'correct_answer'    =>'required'
        ];
    }
    public function attribute(){
        return [
            'question'          =>'Question başlığı',
            'answer1'           =>'Cevap 1',
            'answer2'           =>'Cevap 2',
            'answer3'           =>'Cevap 3',
            'answer4'           =>'Cevap 4',
            'correct_answer'    =>'Doğru cevap'
        ];
    }
}
