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
                        "label" => "Nomor Telfon",
                        "name" => "",
                        "value" => explode('@', $data->phone_number)[0],
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        <label for="">Jenis Pelanggan</label><br>
                        <div class="btn btn-{{ ($data->urgent_type == 'hot') ? 'danger' : (($data->urgent_type == 'warm') ? 'warning' : 'info') }}
                                    ">{{$data->urgent_type}}</div>
                    </div>
                    <div class="mb-3">
                        @include('admin.template.input', [
                        "label" => "Jenis Pembayaran",
                        "name" => "",
                        "value" => $data->payment_type,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        @include('admin.template.input', [
                        "label" => "Tipe Tindakan",
                        "name" => "",
                        "value" => $data->follow_up,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        @include('admin.template.input', [
                        "label" => "Lokasi",
                        "name" => "",
                        "value" => $data->master->house_floors?->house_floors?->location_name,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        @include('admin.template.input', [
                        "label" => "Lantai Rumah",
                        "name" => "",
                        "value" => $data->master->house_floors?->floor_name,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        @include('admin.template.input', [
                        "label" => "Tipe Rumah",
                        "name" => "",
                        "value" => $data->master->house_types?->house_type_name,
                        "placeholder" => ""
                        ])
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Foto Tipe Rumah</p>
                        @foreach($data->master->house_types->image as $img)
                        <img src="{{$img}}" class="me-3 mb-3" height="400px" alt="">
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea class="form-control" style="height: unset" rows="3" name="descriptions" value="{{$data->master->descriptions}}">{{$data->master->descriptions}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Skema Pembayaran</label>
                        <textarea class="form-control mb-2" style="height: unset" rows="2" placeholder="Tuliskan keterangan cash disini" name="schema[cash]" value="{{$data->master->house_floor_type_payments[0]->descriptions}}">{{$data->master->house_floor_type_payments[0]->descriptions}}</textarea>
                        <textarea class="form-control mb-2" style="height: unset" rows="2" placeholder="Tuliskan keterangan tempo disini" name="schema[tempo]" value="{{$data->master->house_floor_type_payments[1]->descriptions}}">{{$data->master->house_floor_type_payments[1]->descriptions}}</textarea>
                        <textarea class="form-control mb-2" style="height: unset" rows="2" placeholder="Tuliskan keterangan kredit disini" name="schema[credit]" value="{{$data->master->house_floor_type_payments[2]->descriptions}}">{{$data->master->house_floor_type_payments[2]->descriptions}}</textarea>
                    </div>
                    <a href="{{url('interest')}}" class="btn app-btn-secondary">Kembali</a>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection