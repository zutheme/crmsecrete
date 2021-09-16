const fs = require('fs');
const privateKey = fs.readFileSync('./privkey.perm','utf8');
const certificate = fs.readFileSync('./cert.perm','utf8');
const ca = fs.readFileSync('./chain.perm','utf8');

const options = {
	key: privateKey,
	cert: certificate,
	ca: ca
};
var serverPort = 443;
const https = require('https');
var express = require('express');
var app = express();
var server = https.createServer(app);
var server = https.createServer(options, app);
var io = require('socket.io')(server);

var cors = require('cors');

app.use(cors());
app.use(express.static('public'));

/*app.listen(serverPort, () => {
    console.log('server is listening on port '+serverPort);
});*/
/*app.get('/products/:id', function (req, res, next) {
  res.json({msg: 'This is CORS-enabled for all origins!'})
});*/

/*app.listen(serverPort, function () {
  console.log('CORS-enabled web server listening on port 6002');
});*/
app.use((req,res) => res.sendFile(__dirname + '/public/chat.html'));
/*app.get('/', function(req, res) {
  res.sendFile(__dirname + '/public/index.html');
});*/

io.on('connection', function(socket) {
  console.log('new connection');
  socket.emit('message', 'This is a message from the dark side.');
});

server.listen(serverPort, function() {
  console.log('server up and running at %s port', serverPort);
});