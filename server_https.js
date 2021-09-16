const fs = require('fs');
const privateKey = fs.readFileSync('./privkey.perm','utf8');
const certificate = fs.readFileSync('./cert.perm','utf8');
const ca = fs.readFileSync('./chain.perm','utf8');

const options = {
	key: privateKey,
	cert: certificate,
	ca: ca
};
var serverPort = 1000;
const https = require('https');
var express = require('express');
var app = express();
var server = https.createServer(options, app);
var io = require('socket.io')(server);

var cors = require('cors');

app.use(cors());
app.set('view engine', 'ejs');
app.set('views', './views');
app.use(express.static('public'));
 
app.get('/', function(req, res){
  res.send('home');
});
 
io.on("connection", function(socket){
  console.log('Co nguoi ket noi');
  socket.emit('THONG_BAO', 'Xin chào gacoder.info');
});

/*io.on('connection', function(socket) {
  console.log('new connection');
  socket.emit('message', 'This is a message from the dark side.');
});*/

server.listen(serverPort, function() {
  console.log('server express up and running at %s port', serverPort);
});