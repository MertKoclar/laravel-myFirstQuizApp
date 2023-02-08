@extends('admin.layouts.app')
@section('title')Admin - Quizler @endsection
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Quizler</h6>
            <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Quiz oluştur</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Quiz başlığı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td>{{$quiz->title}}</td>
                            <td>{{$quiz->status}}</td>
                            <td>{{$quiz->finished_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-warning" href=""><i class="fa fa-pen"></i></a>
                                    <a class="btn btn-sm btn-outline-danger " href=""><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="d-flex align-items-center justify-content-between mb-4">
                @if(!$quizzes->onFirstPage() & $quizzes->hasMorePages())
                    <a href="{{$quizzes->previousPageUrl()}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Önceki sayfa</a>
                    <a href="{{$quizzes->nextPageUrl()}}" class="btn btn-outline-primary">Sonraki sayfa <i class="fa fa-arrow-right"></i></a>
                @elseif($quizzes->onFirstPage() & $quizzes->hasMorePages())
                    <a></a>
                    <a href="{{$quizzes->nextPageUrl()}}" class="btn btn-outline-primary">Sonraki sayfa <i class="fa fa-arrow-right"></i></a>
                @elseif(!$quizzes->onFirstPage() & !$quizzes->hasMorePages())
                    <a href="{{$quizzes->previousPageUrl()}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Önceki sayfa</a>
                @endif
        </div>
    </div>
</div>
@endsection