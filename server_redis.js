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
    cors: { origin: "*"},
	transports: ['websocket','polling'],
	allowUpgrades: false,
	pingTimeout: 30000
});
httpServer.listen(serverPort, function() {
  console.log('server up and running at %s port', serverPort);
});
/*var redis = require('redis');*/
/*io.on("connection", socket => {  });*/
io.on('connection', (socket) => {
  console.log("new client connected");
  socket.on('abc', data => {
    console.log(data);
    socket.emit('abc', {comment: 'server'})
  });
  socket.broadcast.to(socket.id).emit('msg', 'msg data');
  socket.on('disconnect', function() {
	console.log('disconnect');
  });
});
var Redis = require('ioredis');
var redis = new Redis(6379);
redis.psubscribe("*", function(error,count){
	console.log(error);
});
redis.on('pmessage', function(partner, channel, message){
	console.log(channel);
	console.log(message);
	console.log(partner);
	message = JSON.parse(message);
	io.sockets.emit(channel+":"+message.event, message.data.message);
	io.emit("hello", message);
	
	console.log('Sent');
});
