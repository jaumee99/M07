function pingPong(message) {
  if (message.content === 'ping') {
    message.reply('pong');
  }
}

module.exports = pingPong;
