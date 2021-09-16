const fs = require('fs');
const privateKey = fs.readFileSync('./keys/privkey.perm','utf8');
const certificate = fs.readFileSync('./keys/cert.perm','utf8');
const ca = fs.readFileSync('./keys/chain.perm','utf8');

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
const io = require('socket.io')(server, {
    cors: { origin: "*"}
});
var cors = require('cors');

app.use(cors());
app.use(express.static('public'));

/*app.get('/', function(req, res){
    res.send("Hello from the root application URL");
});*/
/*app.get('/chat-node', function (req, res, next) {
  res.json({msg: 'This is CORS-enabled for all origins!'})
});*/
//app.use((req,res) => res.sendFile(__dirname + '/resources/views/teamilk/riode/section-chat'));

/*io.on('connection', function(socket) {
  console.log('new connection '+socket.id);
  socket.emit('message', 'This is a message from the dark side.');
});*/
io.on('connection', (socket) => {
    console.log('new connection '+socket.id);

    socket.on('sendChatToServer', (message) => {
        console.log(message);

        // io.sockets.emit('sendChatToClient', message);
        //socket.broadcast.emit('sendChatToClient', message);
    });


    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});
server.listen(serverPort, function() {
  console.log('server up and running at %s port', serverPort);
});