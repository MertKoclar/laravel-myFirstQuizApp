@extends('admin.layouts.app')
@section('title')Admin - Quiz ekle @endsection
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
        <form method="POST" action="{{route('quizzes.store')}}">
            @csrf
            <div class="mb-3">
                <label for="baslik" class="form-label">Başlık</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="baslik" name="title" value="{{old('title')}}" required>
                @error('title')
                    <div id="baslikFeedback" class="invalid-feedback">
                        Daha uzun bir şey deneyin.
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="aciklama" class="form-label">Açıklama</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="aciklama" name="description" rows="4">{{old('description')}}</textarea>
                @error('description')
                    <div id="aciklamaFeedback" class="invalid-feedback">
                        1000 harfi geçmeyin.
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="bitisTarihiBox">Bitiş tarihi olsun.</label>
                <input type="checkbox" class="form-check-input" @if(old('finished_at')) checked @endif id="bitisTarihiBox">
            </div>
            <div class="row mb-3" id="bitisTarihiDiv" @if(!old('finished_at')) style="display:none;" @endif>
                <label for="bitisTarihi" class="col-sm-2 col-form-label">Bitiş tarihi : </label>
                <div class="col-sm-3">
                    <input type="datetime-local" class="form-control @error('finished_at') is-invalid @enderror" id="bitisTarihi" name="finished_at" value="{{old('finished_at')}}">
                    @error('finished_at')
                        <div id="bitisTarihiFeedback" class="invalid-feedback">
                            Geçmiş günleri saatleri giremezsin.
                        </div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Oluştur</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    $('#bitisTarihiBox').change(function(){
        if($('#bitisTarihiBox').is(':checked')){
            $('#bitisTarihiDiv').show();
        }else{
            $('#bitisTarihiDiv').hide();
        }
    })
</script>    
@endsection