@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('custom_menu')}}/{{$data->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea class="form-control" style="height: unset" rows="10" name="text" value="{{$data->text}}">{{$data->text}}</textarea>
                        </div>
                        <a href="{{url('custom_menu')}}" class="btn app-btn-secondary">Kembali</a>
                        <button class="btn bg-success text-white" type="submit">Simpan</button>
                    </form>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection