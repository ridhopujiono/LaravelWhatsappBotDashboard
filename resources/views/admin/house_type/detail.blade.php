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
                        "label" => "Nama Tipe Rumah",
                        "name" => "house_type_name",
                        "value" => $data->house_type_name,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Foto Tipe Rumah</p>
                        @foreach($data->image as $img)
                        <img src="{{$img}}" class="me-3 mb-3" height="400px" alt="">
                        @endforeach
                    </div>
                    <a href="{{url('house_type')}}" class="btn app-btn-secondary">Kembali</a>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection