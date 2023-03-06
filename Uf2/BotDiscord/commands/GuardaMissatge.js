
function guardarMensaje(message) {

    // Ignorar misatges del bot
    if (message.author.bot) return;

    // data i hora actual
    let date = new Date().toString();

    console.log(`${message.author.username} ha enviat ${message} a les ${date}`);
}

module.exports = guardarMensaje;
