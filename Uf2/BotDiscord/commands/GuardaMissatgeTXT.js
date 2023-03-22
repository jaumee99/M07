const fs = require('fs');

function guardarMissatgeTXT(message) {

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

    //Crear carpeta on es guardara tot
    if (!fs.existsSync('logs')) {
        fs.mkdirSync('logs');
    }

    //cada cop que se envia un mensaje se crea un archivo amb la data del dia
    if (!fs.existsSync(`logs/${dia}_${mes}_${any}.txt`)) {
        fs.writeFileSync(`logs/${dia}_${mes}_${any}.txt`, `Logs del dia ${dia} del mes ${mes} i any ${any}:`);
    }

    // Escriu en el fitxer de logs.txt
    fs.appendFile(`logs/${dia}_${mes}_${any}.txt`, logMessage, (err) => {
        if (err) throw err;
    });

}

module.exports = guardarMissatgeTXT;
