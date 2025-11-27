<?php
/**
 * OUTSSINC Platform - Live Chat Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Live Chat';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<style>
.chat-container {
    max-width: 900px;
    margin: 0 auto;
    padding: var(--spacing-xl);
}

.chat-box {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    height: 600px;
    display: flex;
    flex-direction: column;
}

.chat-header {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: white;
    padding: var(--spacing-lg);
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
}

.chat-avatar {
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.chat-status {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    font-size: 0.85rem;
    opacity: 0.9;
}

.status-dot {
    width: 8px;
    height: 8px;
    background: var(--color-success);
    border-radius: 50%;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: var(--spacing-lg);
    background: var(--color-light);
}

.message {
    display: flex;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-lg);
}

.message.incoming {
    flex-direction: row;
}

.message.outgoing {
    flex-direction: row-reverse;
}

.message-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-weight: 600;
}

.message.incoming .message-avatar {
    background: var(--color-primary);
    color: white;
}

.message.outgoing .message-avatar {
    background: var(--color-gray-light);
    color: var(--color-dark);
}

.message-bubble {
    max-width: 70%;
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--border-radius);
}

.message.incoming .message-bubble {
    background: white;
    box-shadow: var(--shadow-sm);
}

.message.outgoing .message-bubble {
    background: var(--color-primary);
    color: white;
}

.message-time {
    font-size: 0.75rem;
    color: var(--color-gray);
    margin-top: var(--spacing-xs);
}

.message.outgoing .message-time {
    text-align: right;
    color: rgba(255,255,255,0.7);
}

.chat-input {
    padding: var(--spacing-lg);
    background: white;
    border-top: 1px solid var(--color-light);
    display: flex;
    gap: var(--spacing-md);
}

.chat-input input {
    flex: 1;
    padding: var(--spacing-md) var(--spacing-lg);
    border: 2px solid var(--color-gray-light);
    border-radius: var(--border-radius-pill);
    font-size: 1rem;
}

.chat-input input:focus {
    border-color: var(--color-primary);
    outline: none;
}

.chat-input button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--color-primary);
    color: white;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
}

.chat-input button:hover {
    background: var(--color-primary-dark);
    transform: scale(1.05);
}

.typing-indicator {
    display: flex;
    gap: 4px;
    padding: var(--spacing-sm);
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    background: var(--color-gray-light);
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
.typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-8px); }
}
</style>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Live Chat</span>
    </nav>
    <h1>Chat With a Peer Support Worker</h1>
    <p>Connect with someone who understands. Our chat is confidential and judgment-free.</p>
</div>

<div class="chat-container">
    <div class="alert alert-info" style="margin-bottom: var(--spacing-lg);">
        <i class="fas fa-info-circle"></i>
        <div>
            <strong>Chat Hours:</strong> Monday-Friday, 9 AM - 9 PM | Saturday-Sunday, 10 AM - 6 PM
            <br>For 24/7 crisis support, call <a href="tel:<?php echo CRISIS_LINE; ?>"><?php echo CRISIS_LINE; ?></a>
        </div>
    </div>
    
    <div class="chat-box" id="chat-box">
        <div class="chat-header">
            <div class="chat-avatar">
                <i class="fas fa-headset"></i>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 1.1rem;">OUTSSINC Support</h3>
                <div class="chat-status">
                    <span class="status-dot"></span>
                    <span>Online - Typically replies in a few minutes</span>
                </div>
            </div>
        </div>
        
        <div class="chat-messages" id="chat-messages">
            <div class="message incoming">
                <div class="message-avatar">O</div>
                <div>
                    <div class="message-bubble">
                        <p style="margin: 0;">Hi there! 👋 Welcome to OUTSSINC. I'm a peer support worker and I'm here to listen and help however I can.</p>
                    </div>
                    <div class="message-time">Just now</div>
                </div>
            </div>
            
            <div class="message incoming">
                <div class="message-avatar">O</div>
                <div>
                    <div class="message-bubble">
                        <p style="margin: 0;">What brings you here today? Feel free to share as much or as little as you're comfortable with.</p>
                    </div>
                    <div class="message-time">Just now</div>
                </div>
            </div>
        </div>
        
        <div class="chat-input">
            <input type="text" id="chat-input" placeholder="Type your message..." autocomplete="off">
            <button id="send-btn"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
    
    <p style="text-align: center; margin-top: var(--spacing-lg); color: var(--color-gray); font-size: 0.9rem;">
        <i class="fas fa-lock"></i> Your conversation is confidential and encrypted.
    </p>
</div>

<script>
var chatMessages = document.getElementById('chat-messages');
var chatInput = document.getElementById('chat-input');
var sendBtn = document.getElementById('send-btn');

// Demo responses
var responses = [
    "Thank you for sharing that. It takes courage to reach out.",
    "I understand how difficult that must be. You're not alone in this.",
    "That sounds really challenging. Have you been able to access any support so far?",
    "I hear you. Would you like me to share some resources that might help?",
    "It's completely normal to feel that way. Many people we support have felt similarly.",
    "I'm here to listen. Take your time - there's no pressure."
];

function addMessage(text, isOutgoing) {
    var messageDiv = document.createElement('div');
    messageDiv.className = 'message ' + (isOutgoing ? 'outgoing' : 'incoming');
    
    messageDiv.innerHTML = 
        '<div class="message-avatar">' + (isOutgoing ? 'Y' : 'O') + '</div>' +
        '<div>' +
            '<div class="message-bubble"><p style="margin: 0;">' + escapeHtml(text) + '</p></div>' +
            '<div class="message-time">Just now</div>' +
        '</div>';
    
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showTyping() {
    var typingDiv = document.createElement('div');
    typingDiv.className = 'message incoming';
    typingDiv.id = 'typing-indicator';
    typingDiv.innerHTML = 
        '<div class="message-avatar">O</div>' +
        '<div class="message-bubble">' +
            '<div class="typing-indicator"><span></span><span></span><span></span></div>' +
        '</div>';
    
    chatMessages.appendChild(typingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function removeTyping() {
    var typing = document.getElementById('typing-indicator');
    if (typing) typing.remove();
}

function escapeHtml(text) {
    var div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function sendMessage() {
    var text = chatInput.value.trim();
    if (!text) return;
    
    addMessage(text, true);
    chatInput.value = '';
    
    // Simulate response
    showTyping();
    setTimeout(function() {
        removeTyping();
        var response = responses[Math.floor(Math.random() * responses.length)];
        addMessage(response, false);
    }, 1500 + Math.random() * 1500);
}

sendBtn.addEventListener('click', sendMessage);
chatInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') sendMessage();
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
