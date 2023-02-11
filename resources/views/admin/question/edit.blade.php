@extends('admin.layouts.app')
@section('title')Admin - Question düzenle @endsection
@section('content')
{{-- <div class="container-fluid pt-4 px-4">
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li class="text-sm">{{$error}}</li>
            @endforeach
        </div>
    @endif
</div> --}}
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Quiz oluştur</h6>
        <form method="POST" action="questions/{{$question->id}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Soru başlığı</label>
                <textarea class="form-control @error('question') is-invalid @enderror" id="question" name="question" rows="2" required>{{$question->question}}</textarea>
                @error('question')
                    <div id="questionFeedback" class="invalid-feedback">
                        Daha uzun bir şey deneyin.
                    </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="answer1" class="form-label">Cevap 1</label>
                    <textarea class="form-control @error('answer1') is-invalid @enderror" id="answer1" name="answer1" rows="2" required>{{$question->answer1}}</textarea>
                    @error('answer1')
                        <div id="answer1Feedback" class="invalid-feedback">
                            Daha uzun bir şey deneyin.
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="answer2" class="form-label">Cevap 2</label>
                    <textarea class="form-control @error('answer2') is-invalid @enderror" id="answer2" name="answer2" required>{{$question->answer2}}</textarea>
                    @error('answer2')
                        <div id="answer2Feedback" class="invalid-feedback">
                            Daha uzun bir şey deneyin.
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="answer3" class="form-label">Cevap 3</label>
                    <textarea class="form-control @error('answer3') is-invalid @enderror" id="answer3" name="answer3" rows="2" required>{{$question->answer3}}</textarea>
                    @error('answer3')
                        <div id="answer3Feedback" class="invalid-feedback">
                            Daha uzun bir şey deneyin.
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="answer4" class="form-label">Cevap 4</label>
                    <textarea class="form-control @error('answer2') is-invalid @enderror" id="answer4" name="answer4" required>{{$question->answer4}}</textarea>
                    @error('answer4')
                        <div id="answer4Feedback" class="invalid-feedback">
                            Daha uzun bir şey deneyin.
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="correct_answer" class="form-label col-sm-2 col-form-label">Doğru cevabı seçin</label>
                <div class="col-sm-3">
                    <select class="form-select @error('correct_answer') is-invalid @enderror" name="correct_answer" id="correct_answer">
                        <option value="answer1" @if($question->correct_answer == 'answer1') selected @endif>Cevap 1</option>
                        <option value="answer2" @if($question->correct_answer == 'answer2') selected @endif>Cevap 2</option>
                        <option value="answer3" @if($question->correct_answer == 'answer3') selected @endif>Cevap 3</option>
                        <option value="answer4" @if($question->correct_answer == 'answer4') selected @endif>Cevap 4</option>
                    </select>
                </div>
                @error('correct_answer')
                    <div id="baslikFeedback" class="invalid-feedback">
                        Boş bırakılamaz.
                    </div>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Düzenle</button>
            </div>
        </form>
    </div>
</div>
@endsection