const fs = require('fs');

function guardarMissatgeDrive(message) {

    // Ignorar misatges del bot
    if (message.author.bot) return;

    // Data i hora actual
    let date = new Date().toString();

    // Data pel fitxer
    let dia = new Date().getDate();
    let mes = new Date().getMonth() + 1;
    let any = new Date().getFullYear();


    console.log(`\r"${message.author.username}" ha enviat "${message}" a les "${date}" en el xat "${message.channel.name}"`);

    let logMessage = (`\r"${message.author.username}" ha enviat "${message}" a les "${date}" en el xat "${message.channel.name}"`);



}

module.exports = guardarMissatgeDrive;
