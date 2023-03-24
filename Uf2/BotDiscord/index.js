const { Client, GatewayIntentBits } = require('discord.js');
require('dotenv/config');

//const pingPong = require('./commands/pingPong');
//const guardarMissatgeTXT = require('./commands/GuardaMissatgeTXT');
const { authorize } = require('./Auth');
const guardarMissatgeDrive = require('./commands/GuardaMissatgeDrive');

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

//client.on('messageCreate', pingPong);

//client.on('messageCreate', guardarMissatgeTXT);

client.on('connection', authorize);

client.on('messageCreate', guardarMissatgeDrive);

client.login(process.env.TOKEN);
