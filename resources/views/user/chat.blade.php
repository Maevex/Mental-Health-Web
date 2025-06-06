@extends('layouts.app')

@section('content')
<style>
    .chat-container {
        height: 70vh;
        display: flex;
        flex-direction: column;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
        background: #f9f9f9;
        border-radius: 10px;
    }

    .message-bubble {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 70%;
        word-wrap: break-word;
        margin-bottom: 10px;
        font-size: 15px;
    }

    .message-user {
        background-color: #007aff;
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
    }

    .input-group button {
        border-radius: 0 25px 25px 0;
    }
    .custom-scroll {
    max-height: 60vh;
    overflow-y: auto;
    border-radius: 8px;
    }

</style>

<div class="container py-4">
    <div class="row">
        <!-- Sidebar sesi -->
        <div class="col-md-3 mb-3">
    <a href="{{ url('/user/chat?sesi_id=baru') }}" class="btn btn-primary w-100 mb-3 rounded-pill">+ New Chat</a>
    
    
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
            <div class="card shadow-sm chat-container">
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
                        <button class="btn btn-success" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
