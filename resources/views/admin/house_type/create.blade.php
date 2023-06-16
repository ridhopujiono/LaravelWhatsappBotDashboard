@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('house_type')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            @include('admin.template.input', [
                            "label" => "Nama Tipe Rumah",
                            "name" => "house_type_name",
                            "value" => "",
                            "placeholder" => "Silahkan isi nama tipe rumah"
                            ])
                        </div>
                        <div class="mb-3">
                            <label for="">Foto Tipe Rumah (bisa lebih dari 1) <span class="text-danger">(Maks. per foto 10 MB)</span></label>
                            <input type="file" multiple name="image[]" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn app-btn-primary">Simpan</button>
                    </form>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection