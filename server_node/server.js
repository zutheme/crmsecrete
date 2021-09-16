const fs = require('fs');
const privateKey = fs.readFileSync('./keys/privkey.perm','utf8');
const certificate = fs.readFileSync('./keys/cert.perm','utf8');
const ca = fs.readFileSync('./keys/chain.perm','utf8');

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
const io = require('socket.io')(server, {
    cors: { origin: "*"}
});
/*var cors = require('cors');

app.use(cors());
app.use(express.static('public'));

app.get('/chat-node', (req, res) => {
    res.sendFile(__dirname + '/public/chat-node.html')
});
*/
/*app.get('/', function(req, res){
    res.send("Hello from the root application URL");
});*/
/*app.get('/chat-node', function (req, res, next) {
  res.json({msg: 'This is CORS-enabled for all origins!'})
});*/
//app.use((req,res) => res.sendFile(__dirname + '/public/chat-node.html'));

var redis = require('redis');

server.listen(serverPort, function() {
  console.log('server up and running at %s port', serverPort);
});
io.on('connection', function (socket) {

  console.log("new client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('message');

  redisClient.on("message", function(channel, message) {
    console.log("mew message in queue "+ message + "channel");
    socket.emit(channel, message);
  });

  socket.on('disconnect', function() {
    redisClient.quit();
  });

});

