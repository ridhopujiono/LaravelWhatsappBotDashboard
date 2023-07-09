@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('house_type')}}/{{$data->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Tipe Rumah</label>
                            <input type="text" class="form-control" name="house_type_name" value="{{$data->house_type_name}}">
                        </div>
                        <a href="{{url('house_type')}}" class="btn app-btn-secondary">Kembali</a>
                        <button class="btn bg-success text-white" type="submit">Simpan</button>
                    </form>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection