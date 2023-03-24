const fs = require('fs');
const path = require('path');
const process = require('process');
const { google } = require('googleapis');
const { GoogleDocsAuth } = require('google-auth-library');
const { authorize } = require('../Auth');

const SCOPES = [
  'https://www.googleapis.com/auth/documents.readonly',
  'https://www.googleapis.com/auth/documents',
  'https://www.googleapis.com/auth/drive',
  'https://www.googleapis.com/auth/drive.file'
];


async function guardarMissatgeDrive(message) {
  let doc = {};
  const auth = await authorize();
  const docs = google.docs({ version: 'v1' });
  let date = new Date().toString();
  let logMessage = (`\n\n"${message.author.username}" ha enviat "${message}" a les "${date}" en el xat "${message.channel.name}"`);
  doc = JSON.parse(fs.readFileSync('../BotDiscord/document.json'))
  console.log(doc)

  docs.documents.batchUpdate({
    auth,
    documentId: doc.data.id,
    requestBody: {
      requests: [
        {
          insertText: {
            location: {
              index: 1,
            },
            text: logMessage,
          },
        },
      ],
    },
  });
}



module.exports = guardarMissatgeDrive;
