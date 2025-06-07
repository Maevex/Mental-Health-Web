@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to bottom, #89f7fe, #66a6ff);
    }

    .chat-container {
        height: 70vh;
        display: flex;
        flex-direction: column;
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
        background: #f9f9f9;
        border-radius: 15px 15px 0 0;
    }

    .message-bubble {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 70%;
        word-wrap: break-word;
        margin-bottom: 10px;
        font-size: 15px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    }

    .message-user {
        background-color: #4d9eff;
        color: white;
        align-self: flex-end;
        text-align: right;
    }

    .message-bot {
        background-color: #e5e5ea;
        color: black;
        align-self: flex-start;
        text-align: left;
    }

    .input-group input {
        border-radius: 25px 0 0 25px;
        background-color: #f0f4f8;
        border: none;
        font-size: 14px;
    }

    .input-group button {
        border-radius: 0 25px 25px 0;
        background-color: #4d9eff;
        color: white;
        border: none;
        
    }

    .input-group button:hover {
        background-color: #368de0;
    }

    .custom-scroll {
        max-height: 60vh;
        overflow-y: auto;
        border-radius: 12px;
    }

    .btn-primary {
        background-color: #4d9eff !important;
        border: none;
       
    }

    .btn-primary:hover {
        background-color: #368de0 !important;
    }

    .list-group-item.active {
        background-color: #4d9eff;
        border-color: #4d9eff;
    }
</style>

<div class="container py-4">
    <div class="row">
        <!-- Sidebar sesi -->
        <div class="col-md-3 mb-3">
            <a href="{{ url('/user/chat?sesi_id=baru') }}" class="btn btn-primary w-100 mb-3 rounded-pill shadow-sm">+ New Chat</a>

            <div class="list-group shadow-sm custom-scroll">
                @foreach ($sesiList as $sesi)
                    <a href="{{ url('/user/chat?sesi_id=' . $sesi['sesi_id']) }}"
                       class="list-group-item list-group-item-action {{ $activeSesiId == $sesi['sesi_id'] ? 'active' : '' }}">
                        Sesi {{ $loop->iteration }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Chat area -->
        <div class="col-md-9">
            @if (!empty($kontakKonsultan))
    <div class="alert alert-warning mt-3 p-3 rounded" style="white-space: pre-line; background: #fff3cd; color: #856404;">
        <strong>Kontak Konsultan:</strong><br>
        {!! nl2br(e($kontakKonsultan)) !!}
    </div>
@endif

            <div class="chat-container">
                <div class="chat-messages">
                    @forelse ($messages as $msg)
                        <div class="d-flex {{ $msg['sender'] === 'user' ? 'justify-content-end' : 'justify-content-start' }}">
                            <div class="message-bubble {{ $msg['sender'] === 'user' ? 'message-user' : 'message-bot' }}">
                                {!! \App\Http\Controllers\UserController::renderWithBoldAndBreaks($msg['content']) !!}
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">Belum ada pesan. Mulai obrolan di bawah 👇</p>
                    @endforelse
                </div>
                <form method="POST" action="{{ route('user.chat.send') }}" class="p-3 border-top">
                    @csrf
                    <input type="hidden" name="sesi_id" value="{{ $activeSesiId }}">
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Tulis pesan..." required>
                        <button class="btn" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
