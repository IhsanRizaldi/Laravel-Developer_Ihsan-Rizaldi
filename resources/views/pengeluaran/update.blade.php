@extends('layout.main')

@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="text-center mb-3">Ubah Pengeluaran Jenis {{ $data->jenis }}</h3>
                    <form action="{{ route('pengeluaran.update',$data->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="jenis" value="{{ $data->jenis }}">
                        <div class="mb-3">
                            <label for="nominal">Nominal</label>
                            <input type="number" name="nominal" class="form-control" placeholder="Masukkan nominal" value="{{ old('nominal', $data->nominal) }}" required>
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
                            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $data->tanggal) }}" required>
                            @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
