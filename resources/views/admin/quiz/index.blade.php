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
    <div class="bg-secondary text-center rounded p-2 align-items-center">
        <form class="d-flex">

            <div class="form-group px-2">
                <select class="form-select" name="status" aria-placeholder="Durum seç">
                    <option value="">Durum seç</option>
                    <option value="publish" @if(request('status')=='publish') selected @endif>Aktif</option>
                    <option value="passive" @if(request('status')=='passive') selected @endif>Pasif</option>
                    <option value="draft"   @if(request('status')=='draft') selected @endif>Taslak</option>
                </select>
            </div>
            <div class="form-group d-flex px-4">
                <input class="form-control bg-dark border-0" type="search" placeholder="Quiz başlığı" value="{{request('q')}}" name="q">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-sm btn-outline-primary">ARA</button>
                @if(request()->get('status') || request()->get('q'))
                &nbsp;&nbsp;
                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-outline-light d-flex align-items-center"><i class="fa fa-times-circle"></i></a>
                @endif
            </div>
        </form>
    </div>
</div>
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
                        <th scope="col">Soru sayısı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td>{{$quiz->title}}</td>
                            <td class="text-align-center">{{$quiz->questions_count}}</td>
                            <td class="text-align-center">
                                @if($quiz->status=='draft') <span class="badge text-bg-warning">Taslak</div> @endif
                                @if($quiz->status=='publish') <span class="badge text-bg-success">Aktif</span> @endif
                                @if($quiz->status=='passive') <span class="badge text-bg-danger">Pasif</span> @endif
                            </td>
                            <td class="text-align-center"><span title="{{$quiz->finished_at}}">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-success" href="{{route('questions.index', $quiz->id)}}"><i class="fa fa-question"></i></a>
                                    <a class="btn btn-sm btn-outline-warning" href="{{route('quizzes.edit', $quiz->id)}}"><i class="fa fa-pen"></i></a>
                                    <a class="btn btn-sm btn-outline-danger " href="{{route('quizzes.destroy', $quiz->id)}}"><i class="fa fa-times"></i></a>
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
                    <a href="{{$quizzes->withQueryString()->previousPageUrl()}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Önceki sayfa</a>
                    <a href="{{$quizzes->withQueryString()->nextPageUrl()}}" class="btn btn-outline-primary">Sonraki sayfa <i class="fa fa-arrow-right"></i></a>
                @elseif($quizzes->onFirstPage() & $quizzes->hasMorePages())
                    <a></a>
                    <a href="{{$quizzes->withQueryString()->nextPageUrl()}}" class="btn btn-outline-primary">Sonraki sayfa <i class="fa fa-arrow-right"></i></a>
                @elseif(!$quizzes->onFirstPage() & !$quizzes->hasMorePages())
                    <a href="{{$quizzes->withQueryString()->previousPageUrl()}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Önceki sayfa</a>
                @endif
        </div>
    </div>
</div>
@endsection
