@extends('layout.main')

@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="text-center mb-3">Tambah Pengeluaran</h3>
                    <form action="{{ route('pengeluaran.store') }}" method="post">
                        @csrf
                        @foreach (['kebutuhan', 'tabungan', 'hiburan'] as $jenis)
                            <div class="mb-3">
                                <label for="nominal">Nominal ({{ ucfirst($jenis) }})</label>
                                <div id="input-{{ $jenis }}">
                                    <div class="d-flex mb-2">
                                        <input type="number" name="nominal[{{ $jenis }}][]" class="form-control me-2"
                                               placeholder="Masukan nominal" required>
                                        <button type="button" class="btn btn-success btn-sm" onclick="addField('{{ $jenis }}')">+</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addField(jenis) {
            let div = document.createElement("div");
            div.classList.add("d-flex", "mb-2");
            div.innerHTML = `
                <input type="number" name="nominal[${jenis}][]" class="form-control me-2" placeholder="Masukan nominal" required>
                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()">-</button>
            `;
            document.getElementById("input-" + jenis).appendChild(div);
        }
    </script>
@endsection
