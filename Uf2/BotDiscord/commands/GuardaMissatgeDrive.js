const { google } = require('googleapis');
const fs = require('fs');

const credentials = require('./path/to/your/credentials.json');

const auth = new google.auth.GoogleAuth({
  credentials,
  scopes: ['https://www.googleapis.com/auth/drive.file'],
});

const drive = google.drive({ version: 'v3', auth });

const folderMetadata = {
  name: 'My Folder',
  mimeType: 'application/vnd.google-apps.folder',
};

drive.files.create({
  resource: folderMetadata,
  fields: 'id',
}, (err, file) => {
  if (err) {
    console.error(err);
  } else {
    console.log(`Folder has been created with ID: ${file.data.id}`);
  }
});

module.exports = guardarMissatgeDrive;
