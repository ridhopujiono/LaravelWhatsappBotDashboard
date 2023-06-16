@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('house_floor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="location_id" class="form-label">Lokasi</label>
                            <select name="location_id" id="location_id" class="form-control">
                                <option value="">----- Silahkan pilih lokasi -----</option>
                                @foreach($data as $d)
                                <option value="{{$d->id}}">{{$d->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            @include('admin.template.input', [
                            "label" => "Nama Lantai Rumah",
                            "name" => "floor_name",
                            "value" => "",
                            "placeholder" => "Silahkan isi nama lantai rumah"
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