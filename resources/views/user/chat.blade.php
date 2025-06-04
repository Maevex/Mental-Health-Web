@extends('layouts.app')

@section('content')

<div class="container py-4">
    <h2>Chat Konsultasi</h2>

    <div class="row">
        <!-- Sidebar sesi -->
        <div class="col-md-3">
            <a href="{{ url('/user/chat') }}" class="btn btn-primary mb-3">+ New Chat</a>
            <div class="list-group">
                @foreach ($sesiList as $sesi)
                    <a href="{{ url('/user/chat?sesi_id=' . $sesi['sesi_id']) }}"
                       class="list-group-item list-group-item-action {{ $activeSesiId == $sesi['sesi_id'] ? 'active' : '' }}">
                        Sesi {{ $sesi['sesi_id'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Chat area -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    @foreach ($messages as $msg)
                        <div class="mb-2 text-{{ $msg['sender'] === 'user' ? 'end' : 'start' }}">
                            <span class="badge bg-{{ $msg['sender'] === 'user' ? 'primary' : 'secondary' }}">
                                {{ $msg['content'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
                <form method="POST" action="{{ route('user.chat.send') }}" class="p-3">
                    @csrf
                    <input type="hidden" name="sesi_id" value="{{ $activeSesiId }}">
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Tulis pesan..." required>
                        <button class="btn btn-success" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
