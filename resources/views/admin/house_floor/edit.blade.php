@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('house_floor')}}/{{$data->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="" class="form-label">Lantai</label>
                            <select name="location_point_id" id="" class="form-control">
                                @foreach($location_points as $location_point)
                                <option value="{{$location_point->id}}" {{ $location_point->id == $data->location_point_id ? 'selected' : '' }}>
                                    {{$location_point->location_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lantai</label>
                            <input type="text" class="form-control" name="floor_name" value="{{$data->floor_name}}">
                        </div>
                        <a href="{{url('house_floor')}}" class="btn app-btn-secondary">Kembali</a>
                        <button class="btn bg-success text-white" type="submit">Simpan</button>
                    </form>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection