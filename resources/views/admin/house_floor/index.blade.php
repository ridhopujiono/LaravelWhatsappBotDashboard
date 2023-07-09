@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div>
                @include('admin.template.create_button', ['url' => 'house_floor/create', 'text'=> 'Tambah '.$title])
            </div>
            @include('admin.template.alert')
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">List {{$title}}</h4>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <table class="table table-striped" id="datatableId">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Lokasi</th>
                                <th>Lantai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$number++}}</td>
                                <td>{{$d->house_floors->location_name}}</td>
                                <td>{{$d->floor_name}}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{url('house_floor/'.$d->id.'/edit')}}" class="badge bg-success" style="border: unset">edit</a>
                                        <form action="{{ url('house_floor/'.$d->id) }}" method="POST" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger" style="border: unset" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection
@push('datatables-script')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script>
    const dataTable = new simpleDatatables.DataTable("#datatableId", {
        fixedHeight: true,
        searchable: true,
        paging: true,
        active: "active" // will be "datatable-active" in version 7
    })
</script>
@endpush