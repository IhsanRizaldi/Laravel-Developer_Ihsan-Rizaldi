@extends('layout.main')

@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="text-center mb-3">Tambah Pendapatan</h3>
                    <form action="{{ route('pendapatan.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pendapatan">Nama Pendapatan</label>
                            <input type="text" name="nama_pendapatan" class="form-control" placeholder="Masukan nama pendapatan" value="{{ old('nama_pendapatan') }}" required>
                            @error('nama_pendapatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nominal">Nominal</label>
                            <input type="number" name="nominal" class="form-control" placeholder="Masukan nominal" value="{{ old('nominal') }}" required>
                            @error('nominal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bulan">Bulan</label>
                            <select name="bulan" class="form-control">
                                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bln)
                                    <option value="{{ $bln }}" {{ old('bulan') == $bln ? 'selected' : '' }}>{{ $bln }}</option>
                                @endforeach
                            </select>
                            @error('bulan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pendapatan.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
