document.addEventListener('DOMContentLoaded', () => {
    const chatMessages = document.getElementById('chat-messages');
    const sendMessageButton = document.getElementById('send-message');
    const messageInput = document.getElementById('message');

    sendMessageButton.addEventListener('click', () => {
        const message = messageInput.value;
        // Send the message logic here
        // Append the message to the chat
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
        // Clear the input field
        messageInput.value = '';
    });
});

