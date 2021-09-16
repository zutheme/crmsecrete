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
var io = require('socket.io')(server);

var cors = require('cors');

app.use(cors());
app.set('view engine', 'ejs');
app.set('views', './views');
app.use(express.static('public'));
 
app.get('/', function(req, res){
  res.send("Hello from the root application URL");
  //res.send('home');
});

server.listen(serverPort, function() {
  console.log('server express up and running at %s port', serverPort);
});
var redis = require('redis');
/*io.on("connection", socket => {  });*/

io.on('connection', socket => {
  console.log("new client connected");
  socket.on("ping", (count) => {
    console.log(count);
  });
  
  var redisClient = redis.createClient();
  redisClient.subscribe('message');
  redisClient.on("message", function(channel, message) {
    console.log("mew message in queue "+ message + " channel");
	
	io.sockets.emit('hello', message);
    io.emit("channel", message);
	console.log('emitted');
  });

  socket.on('disconnect', function() {
	console.log('disconnect');
    redisClient.quit();
  });

});

