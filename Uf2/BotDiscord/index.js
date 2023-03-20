const { Client, GatewayIntentBits } = require('discord.js');
require('dotenv/config');

const pingPong = require('./commands/pingPong');
const guardarMissatgeTXT = require('./commands/GuardaMissatgeTXT');
//const guardarMissatgeDrive = require('./commands/GuardaMissatgeDrive');

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

client.on('messageCreate', guardarMissatgeTXT);

//client.on('messageCreate', guardarMissatgeDrive);

client.login(process.env.TOKEN);

(async () => {
	const googleDriveService = new GoogleDriveService(driveClientId, driveClientSecret, driveRedirectUri, driveRefreshToken);
  
	const finalPath = path.resolve(__dirname, '../public/spacex-uj3hvdfQujI-unsplash.jpg');
	const folderName = 'Picture';
  
	if (!fs.existsSync(finalPath)) {
	  throw new Error('File not found!');
	}
  
	let folder = await googleDriveService.searchFolder(folderName).catch((error) => {
	  console.error(error);
	  return null;
	});
  
	if (!folder) {
	  folder = await googleDriveService.createFolder(folderName);
	}
  
	await googleDriveService.saveFile('SpaceX', finalPath, 'image/jpg', folder.id).catch((error) => {
	  console.error(error);
	});
  
	console.info('File uploaded successfully!');
  
	// Delete the file on the server
	fs.unlinkSync(finalPath);
  })();