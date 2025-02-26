@extends('layout.main')
@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex">
                        <h3>Pendapatan Anda</h3>
                        <a href="{{ route('pendapatan.create') }}" class="btn btn-primary ms-auto">Tambah</a>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('pendapatan.rekomendasi') }}" class="btn btn-warning ms-auto mt-3">Rekomendasi Pengeluaran</a>
                    </div>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pendapatan</th>
                                <th>Nominal</th>
                                <th>Bulan</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pendapatan }}</td>
                                    <td>{{ $item->nominal }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{ route('pendapatan.edit',$item->id) }}">Ubah</a></li>
                                              <li><a class="dropdown-item" href="{{ route('pendapatan.destroy',$item->id) }}" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></li>
                                            </ul>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

