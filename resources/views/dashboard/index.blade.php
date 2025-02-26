@extends('layout.main')
@section('main')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <h3>Tecnical Test</h3>
                    <form action="{{ route('home') }}" method="get">
                        @csrf
                            <div class="mb-3 me-3">
                                <label for="text_pertama">Text Pertama</label>
                                <input type="text" name="text_pertama" class="form-control" placeholder="Masukan nama pendapatan" value="{{ old('text_pertama') }}" required>
                                @error('text_pertama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 me-3">
                                <label for="text_kedua">Text Kedua</label>
                                <input type="text" name="text_kedua" class="form-control" placeholder="Masukan nama pendapatan" value="{{ old('text_kedua') }}" required>
                                @error('text_kedua')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                    </form>

                    @if(isset($textPertama) && isset($textKedua))

                    @php
                        similar_text($textPertama,$textKedua, $persentase)
                    @endphp

                    <p><strong>Jumlah karakter text pertama yang mauncul pada text kedua adalah {{ number_format($persentase,2) }} % </strong> </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
