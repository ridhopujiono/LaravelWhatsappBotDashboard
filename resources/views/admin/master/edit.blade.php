@extends('admin.template.main')
@section('container')
<div class="container-xl">

    @include('admin.template.page_title')


    <div class="row g-4 mb-4">
        <div class="col-md-12">
            @include('admin.template.alert')
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{url('master')}}/{{$data->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="alert alert-warning">
                                <b> Berikut adalah contoh wording atau petunjuk penulisan untuk menggunakan format teks seperti bold, coret, dan miring:</b>
                                <br>
                                <ul>
                                    <li>Untuk membuat teks bold, tambahkan tanda asterisk (*) sebelum dan sesudah kata atau kalimat yang ingin ditebalkan. Contoh: *Ini teks bold*
                                    </li>
                                    <li>Untuk membuat teks coret, tambahkan tanda tildes (~) sebelum dan sesudah kata atau kalimat yang ingin dicoret. Contoh: ~Ini teks dicoret~</li>
                                    <li>Untuk membuat teks miring, tambahkan tanda garis bawah (_) sebelum dan sesudah kata atau kalimat yang ingin dimiringkan. Contoh: _Ini teks miring_</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea class="form-control" style="height: unset" rows="10" name="descriptions" value="{{$data->descriptions}}">{{$data->descriptions}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Skema Pembayaran</label>
                            <div class="ps-2">
                                <label for="" class="text-primary fw-bold mb-2">
                                    <div class="badge bg-info">Cash Keras</div>
                                </label>
                                <textarea class="form-control mb-2" style="height: unset" rows="7" placeholder="Tuliskan keterangan cash disini" name="schema[cash]" value="{{$data->house_floor_type_payments[0]->descriptions}}">{{$data->house_floor_type_payments[0]->descriptions}}</textarea>
                                <label for="" class="text-primary fw-bold mb-2">
                                    <div class="badge bg-success">Cash Tempo</div>
                                </label>
                                <textarea class="form-control mb-2" style="height: unset" rows="7" placeholder="Tuliskan keterangan tempo disini" name="schema[tempo]" value="{{$data->house_floor_type_payments[1]->descriptions}}">{{$data->house_floor_type_payments[1]->descriptions}}</textarea>
                                <label for="" class="text-primary fw-bold mb-2">
                                    <div class="badge bg-warning">Kredit</div>
                                </label>
                                <textarea class="form-control mb-2" style="height: unset" rows="7" placeholder="Tuliskan keterangan kredit disini" name="schema[credit]" value="{{$data->house_floor_type_payments[2]->descriptions}}">{{$data->house_floor_type_payments[2]->descriptions}}</textarea>
                            </div>
                        </div>
                        <a href="{{url('master')}}" class="btn app-btn-secondary">Kembali</a>
                        <button class="btn bg-success text-white" type="submit">Simpan</button>
                    </form>
                </div><!--//app-card-body-->

            </div>
        </div><!--//col-->

    </div><!--//row-->

</div><!--//container-fluid-->
@endsection