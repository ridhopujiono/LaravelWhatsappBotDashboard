@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="col-md">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form action="{{url('master')}}" method="POST" onsubmit="prepareBeforeSend()">
                            @csrf
                            <div class="mb-3">
                                <label for="house_floor_id" class="form-label">Lantai Rumah</label>
                                <select name="house_floor_id" id="house_floor_id" class="form-control">
                                    <option value="">----- Silahkan pilih lantai -----</option>
                                    @foreach($house_floors as $floor)
                                    <option value="{{$floor->id}}">{{$floor->house_floors->location_name}} - {{$floor->floor_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="house_type_id" class="form-label">Tipe Rumah</label>
                                <select name="house_type_id" id="house_type_id" class="form-control">
                                    <option value="">----- Silahkan pilih tipe rumah -----</option>
                                    @foreach($house_types as $type)
                                    <option value="{{$type->id}}">{{$type->house_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea class="form-control" style="height: unset" rows="3" name="descriptions"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Skema Pembayaran</label>
                                <textarea class="form-control mb-2" style="height: unset" rows="2" placeholder="Tuliskan keterangan cash disini" name="schema[cash]"></textarea>
                                <textarea class="form-control mb-2" style="height: unset" rows="2" placeholder="Tuliskan keterangan tempo disini" name="schema[tempo]"></textarea>
                                <textarea class="form-control mb-2" style="height: unset" rows="2" placeholder="Tuliskan keterangan kredit disini" name="schema[credit]"></textarea>
                            </div>
                            <button type=" submit" class="btn app-btn-primary">Simpan</button>
                        </form>
                    </div><!--//app-card-body-->

                </div>
            </div>

        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection