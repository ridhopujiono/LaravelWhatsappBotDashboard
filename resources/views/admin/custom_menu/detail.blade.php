@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">

                    <div class="mb-3">
                        @include('admin.template.input', [
                        "label" => "Nama Menu",
                        "name" => "name",
                        "value" => $data->name,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea class="form-control" style="height: unset" rows="10" name="text" value="{{$data->text}}">{{$data->text}}</textarea>
                    </div>
                    @if($data->image !== null)
                    <div class="mb-3">
                        <p class="fw-bold">Foto</p>
                        @foreach($data->image as $img)
                        <img src="{{$img}}" class="me-3 mb-3" alt="">
                        @endforeach
                    </div>
                    @endif
                    <a href="{{url('custom_menu')}}" class="btn app-btn-secondary">Kembali</a>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection