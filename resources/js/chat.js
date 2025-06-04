document.addEventListener('DOMContentLoaded', () => {
    const sessionList = document.getElementById('session-list');
    const messagesDiv = document.getElementById('messages');
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');
    const newChatButton = document.getElementById('new-chat');

    let currentSessionId = null;

    const fetchSessions = async () => {
        const res = await fetch(CHAT_ROUTES.sessions);
        const sessions = await res.json();
        sessionList.innerHTML = '';
        sessions.forEach(session => {
            const li = document.createElement('li');
            li.textContent = `Sesi ${session.sesi_id}`;
            li.addEventListener('click', () => selectSession(session.sesi_id));
            sessionList.appendChild(li);
        });
    };

    const selectSession = async (id) => {
        currentSessionId = id;
        const res = await fetch(CHAT_ROUTES.sessionDetail(id));
        const data = await res.json();
        messagesDiv.innerHTML = '';
        data.forEach(item => {
            if (item.message) appendMessage('user', item.message);
            if (item.chatbot_response) appendMessage('bot', item.chatbot_response);
        });
    };

    const appendMessage = (sender, content) => {
        const div = document.createElement('div');
        div.className = `message ${sender}`;
        div.textContent = content;
        messagesDiv.appendChild(div);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    };

    const sendMessage = async () => {
        const message = messageInput.value.trim();
        if (!message) return;
        appendMessage('user', message);
        messageInput.value = '';
        const res = await fetch(CHAT_ROUTES.send, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message, sesi_id: currentSessionId })
        });
        const data = await res.json();
        appendMessage('bot', data.response || 'Terjadi kesalahan.');
        if (data.sesi_id) {
            currentSessionId = data.sesi_id;
            fetchSessions();
        }
    };

    sendButton.addEventListener('click', sendMessage);
    newChatButton.addEventListener('click', () => {
        currentSessionId = null;
        messagesDiv.innerHTML = '';
    });

    fetchSessions();
});
