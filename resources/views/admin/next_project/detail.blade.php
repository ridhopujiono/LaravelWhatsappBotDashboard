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
                        <label for="">Jenis Permintaan</label><br>
                        <div class="badge bg-{{ ($data->type == 'ruko') ? 'danger' : (($data->type == 'tanah') ? 'warning' : (($data->type == 'minat_lain') ? 'info' : (($data->type == 'lokasi_request') ? 'primary' : (($data->type == 'lokasi_fix') ? 'success' : 'secondary')))) }}">
                            {{ str_replace('_', ' ', $data->type) }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea class="form-control" style="height: unset" rows="3" name="descriptions" value="{{$data->descriptions}}">{{$data->descriptions}}</textarea>
                    </div>
                    <a href="{{url('request_project')}}" class="btn app-btn-secondary">Kembali</a>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection