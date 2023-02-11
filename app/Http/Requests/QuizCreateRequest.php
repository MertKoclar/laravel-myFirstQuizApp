<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:6|max:200',
            'description' => 'max:1000',
            'finished_at' => 'nullable|after:'.now()
        ];
    }
    public function attribute(){
        return [
            'title'=>'Quiz başlığı',
            'description'=>'Quiz açıklaması',
            'finished_at'=>'Bitiş tarihi'
        ];
    }
}
