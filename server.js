const fs = require('fs');
const privateKey = fs.readFileSync('./keys/privkey.perm','utf8');
const certificate = fs.readFileSync('./keys/cert.perm','utf8');
const ca = fs.readFileSync('./keys/chain.perm','utf8');

var serverPort = 3000;

const httpServer = require("https").createServer({
  key: privateKey,
  cert: certificate,
  ca: ca
});
const io = require('socket.io')(httpServer, {
    cors: { origin: "*"}
});
httpServer.listen(serverPort, function() {
  console.log('server up and running at %s port', serverPort);
});
var redis = require('redis');
/*io.on("connection", socket => {  });*/
io.on('connection', (socket) => {
  console.log("new client connected");
    //Create new map object in here.
  var redisClient = redis.createClient();
  redisClient.subscribe('message');
  redisClient.on("message", function(channel, message) {
    console.log("mew message in queue "+ message + " channel");
	io.sockets.emit('hello', message);
    //socket.emit(channel, message);
	console.log('emitted');
  });

  socket.on('disconnect', function() {
	console.log('disconnect');
    redisClient.quit();
  });

});
