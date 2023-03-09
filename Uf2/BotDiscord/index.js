const { Client, GatewayIntentBits } = require('discord.js');
require('dotenv/config');

const pingPong = require('./commands/pingPong');
const guardarMensajeTXT = require('./commands/GuardaMissatgeTXT');

const client = new Client({
	intents: [
		GatewayIntentBits.Guilds,
		GatewayIntentBits.GuildMessages,
		GatewayIntentBits.MessageContent,
		GatewayIntentBits.GuildMessageTyping,
		GatewayIntentBits.GuildMembers,
		GatewayIntentBits.GuildModeration,
	],
});

client.on('ready', () => {
	console.log(`Ready!`);
})

client.on('messageCreate', pingPong);

client.on('messageCreate', guardarMensajeTXT);

client.login(process.env.TOKEN);