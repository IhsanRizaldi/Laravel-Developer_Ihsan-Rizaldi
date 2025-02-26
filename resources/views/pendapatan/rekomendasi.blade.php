@extends('layout.main')
@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <h3>Rekomendasi Pengeluaran</h3>
                    <form action="{{ route('pendapatan.rekomendasi') }}" method="get">
                        @csrf
                        <div class="d-flex">
                            <div class="mb-3 me-3">
                                <label for="nama_pendapatan">Nama Pendapatan</label>
                                <input type="text" name="nama_pendapatan" class="form-control" placeholder="Masukan nama pendapatan" value="{{ old('nama_pendapatan', $data->nama_pendapatan ?? '') }}" required>
                                @error('nama_pendapatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 me-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $data->tanggal ?? '') }}" required>
                                @error('tanggal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 me-3">
                                <label for="gaya_hidup">Gaya Hidup</label>
                                <select name="gaya_hidup" class="form-control">
                                    @foreach (['hemat', 'sedang', 'boros'] as $gaya)
                                        <option value="{{ $gaya }}" {{ old('gaya_hidup', $gayaHidup ?? '') == $gaya ? 'selected' : '' }}>{{ ucfirst($gaya) }}</option>
                                    @endforeach
                                </select>
                                @error('gaya_hidup')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>

                    {{-- Jika ada hasil rekomendasi --}}
                    @if(isset($data))
                        <hr>
                        <h4>Hasil Rekomendasi</h4>
                        <p><strong>Nama Pendapatan:</strong> {{ $data->nama_pendapatan }}</p>
                        <p><strong>Nominal Pendapatan:</strong> {{ $data->nominal }}</p>
                        <p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
                        <p><strong>Gaya Hidup:</strong> {{ ucfirst($gayaHidup) }}</p>
                        @if ($data->nominal <= 3000000)
                            @if ($gayaHidup == 'hemat')
                                <p><strong>Gunakan 70% untuk kebutuhan pokok, 20% tabungan, 10% hiburan</strong></p>
                                <h4>Rincian</h4>
                                <p><strong>Kebutuhan Pokok :</strong> {{ (70/100) * $data->nominal }} </p>
                                <p><strong>Tabungan :</strong> {{ (20/100) * $data->nominal }} </p>
                                <p><strong>Hiburan :</strong> {{ (10/100) * $data->nominal }} </p>
                            @elseif ($gayaHidup == 'sedang')
                                <p><strong>Gunakan 80% untuk kebutuhan pokok, 10% tabungan, 10% hiburan</strong></p>
                                <h4>Rincian</h4>
                                <p><strong>Kebutuhan Pokok :</strong> {{ (80/100) * $data->nominal }} </p>
                                <p><strong>Tabungan :</strong> {{ (10/100) * $data->nominal }} </p>
                                <p><strong>Hiburan :</strong> {{ (10/100) * $data->nominal }} </p>
                            @else
                                <p><strong>Kurangi hiburan dan fokus pada kebutuhan</strong></p>
                            @endif
                        @elseif ($data->nominal >= 300000 && $data->nominal <= 10000000)
                            @if ($gayaHidup == 'hemat')
                                <p><strong>Gunakan 50% untuk kebutuhan pokok, 30% tabungan, 20% hiburan</strong></p>
                                <h4>Rincian</h4>
                                <p><strong>Kebutuhan Pokok :</strong> {{ (50/100) * $data->nominal }} </p>
                                <p><strong>Tabungan :</strong> {{ (30/100) * $data->nominal }} </p>
                                <p><strong>Hiburan :</strong> {{ (20/100) * $data->nominal }} </p>
                            @elseif ($gayaHidup == 'sedang')
                                <p><strong>Gunakan 60% untuk kebutuhan pokok, 20% tabungan, 20% hiburan</strong></p>
                                <h4>Rincian</h4>
                                <p><strong>Kebutuhan Pokok :</strong> {{ (60/100) * $data->nominal }} </p>
                                <p><strong>Tabungan :</strong> {{ (20/100) * $data->nominal }} </p>
                                <p><strong>Hiburan :</strong> {{ (20/100) * $data->nominal }} </p>
                            @else
                                <p><strong>Batasi hiburan 30%, sisakan 10% untuk tabungan</strong></p>
                            @endif
                        @else
                            @if ($gayaHidup == 'hemat')
                                <p><strong>Gunakan 40% untuk kebutuhan pokok, 40% tabungan, 20% hiburan</strong></p>
                                <h4>Rincian</h4>
                                <p><strong>Kebutuhan Pokok :</strong> {{ (40/100) * $data->nominal }} </p>
                                <p><strong>Tabungan :</strong> {{ (40/100) * $data->nominal }} </p>
                                <p><strong>Hiburan :</strong> {{ (20/100) * $data->nominal }} </p>
                            @elseif ($gayaHidup == 'sedang')
                                <p><strong>Gunakan 50% untuk kebutuhan pokok, 30% tabungan, 20% hiburan</strong></p>
                                <h4>Rincian</h4>
                                <p><strong>Kebutuhan Pokok :</strong> {{ (50/100) * $data->nominal }} </p>
                                <p><strong>Tabungan :</strong> {{ (30/100) * $data->nominal }} </p>
                                <p><strong>Hiburan :</strong> {{ (20/100) * $data->nominal }} </p>
                            @else
                                <p><strong>Hindari pengeluaran berlebihan, alokasikan lebih banyak ke tabungan</strong></p>
                            @endif
                        @endif
                    @else
                    <p><strong>Data Tidak Ditemukan</strong></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
