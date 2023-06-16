@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('location')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            @include('admin.template.input', [
                            "label" => "Nama Lokasi",
                            "name" => "location_name",
                            "value" => "",
                            "placeholder" => "Silahkan isi nama lokasi"
                            ])
                        </div>
                        <button type="submit" class="btn app-btn-primary">Simpan</button>
                    </form>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection