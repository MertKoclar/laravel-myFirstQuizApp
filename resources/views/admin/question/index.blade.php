@extends('admin.layouts.app')
@section('title')Admin - Quizler @endsection
@section('content')
@if(session('success'))
<div class="container-fluid pt-4 px-4">
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fa fa-check"></i>
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
    </div>
</div>
@endif
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0"><a href="{{route('quizzes.edit',$quiz->id)}}"><i class="fa fa-arrow-left"></i> {{$quiz->title}}</a> Quizine ait questionlar</h6>
            <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Question oluştur</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Quiz id</th>
                        <th scope="col">Question başlığı</th>
                        <th scope="col">Cevabı</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question)
                        <tr>
                            <td>{{$question->quiz_id}}</td>
                            <td>{{$question->question}}</td>
                            @php
                                $cevap = $question->correct_answer;
                            @endphp
                            <td>{{$question->$cevap}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-warning" href="questions/{{$question->id}}/edit"><i class="fa fa-pen"></i></a>
                                    <a class="btn btn-sm btn-outline-danger " href="{{route('questions.sil', $quiz->id)}}"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <br><br>
        <div class="d-flex align-items-center justify-content-between mb-4">
                @if(!$questions->onFirstPage() & $questions->hasMorePages())
                    <a href="{{$questions->previousPageUrl()}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Önceki sayfa</a>
                    <a href="{{$questions->nextPageUrl()}}" class="btn btn-outline-primary">Sonraki sayfa <i class="fa fa-arrow-right"></i></a>
                @elseif($questions->onFirstPage() & $questions->hasMorePages())
                    <a></a>
                    <a href="{{$questions->nextPageUrl()}}" class="btn btn-outline-primary">Sonraki sayfa <i class="fa fa-arrow-right"></i></a>
                @elseif(!$questions->onFirstPage() & !$questions->hasMorePages())
                    <a href="{{$questions->previousPageUrl()}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Önceki sayfa</a>
                @endif
        </div> --}}
    </div>
</div>
@endsection