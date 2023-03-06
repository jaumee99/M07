const { Client, GatewayIntentBits } = require('discord.js');
require('dotenv/config');

const pingPong = require('./commands/pingPong');
const guardarMensaje = require('./commands/GuardaMissatge');

const client = new Client({
	intents: [
		GatewayIntentBits.Guilds,
		GatewayIntentBits.GuildMessages,
		GatewayIntentBits.MessageContent,
	],
});

client.on('ready', () => {
	console.log(`Ready!`);
})

client.on('messageCreate', pingPong);


client.login(process.env.TOKEN);