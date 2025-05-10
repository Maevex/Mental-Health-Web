@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Bagikan Keluhanmu</h3>

    {{-- Form --}}
    <form action="{{ route('keluhan.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kategori">Kategori Masalah</label>
            <select name="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <option value="Kampus" {{ old('kategori', $kategori ?? '') == 'Kampus' ? 'selected' : '' }}>Kampus</option>
                <option value="Rumah" {{ old('kategori', $kategori ?? '') == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                <option value="Kantor" {{ old('kategori', $kategori ?? '') == 'Kantor' ? 'selected' : '' }}>Kantor</option>
                {{-- Tambah kategori lain kalau ada --}}
            </select>
        </div>

        <div class="mb-3">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" class="form-control" rows="4" required>{{ old('keluhan', $keluhan ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    {{-- Hasil Kesimpulan --}}
    @isset($kesimpulan)
    <hr>
    <h4>Kesimpulan Chatbot</h4>
    <p><strong>{{ $kesimpulan }}</strong></p>
    <p>{{ $saran }}</p>
    @endisset

    {{-- Rekomendasi Konsultan --}}
    @if(!empty($konsultan))
        <hr>
        <h4>{{ $rekomendasi }}</h4>
        <div class="row">
            @foreach($konsultan as $k)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $k['nama'] }}</h5>
                        <p>{{ $k['spesialisasi'] }} ({{ $k['pengalaman'] }})</p>
                        <p><strong>Telp:</strong> {{ $k['no_telepon'] }}</p>
                        <p><strong>Email:</strong> {{ $k['email'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
