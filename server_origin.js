const fs = require('fs');
const privateKey = fs.readFileSync('./keys/privkey.perm','utf8');
const certificate = fs.readFileSync('./keys/cert.perm','utf8');
const ca = fs.readFileSync('./keys/chain.perm','utf8');

const credentials = {
	key: privateKey,
	cert: certificate,
	ca: ca
};

const https = require('https');
var express = require('express');
var app = express();
var server = https.createServer(app);
const httpsServer = https.createServer(credentials, app);
var port = 443;

app.use(express.static('public'));

//app.use((req,res) => res.sendFile('chat.html', { root: path.join(__dirname, 'public') }));

app.use((req,res) => res.sendFile(__dirname + '/public/chat.html'));
//res.sendFile(path.join(__dirname, '../public', 'index1.html'));
//res.sendFile('index1.html', { root: path.join(__dirname, '../public') });



//const server = require('http').createServer(app);


const io = require('socket.io')(httpsServer, {
	cors: {
        origin: "*",
		methods: ["GET", "POST"]
    }
});

io.on('connection', (socket) => {
    console.log('connection');
	console.log(socket.id);
	socket.emit('sendChatToClient', 'heelo');
	// Server code
    socket.on('sendChatToServer', (message) => {
        console.log(message);
		socket.emit('announcements', { message: 'A new user has joined!' });
		//socket.emit("sendChatToClient", message);
         //io.sockets.emit('sendChatToClient', message);
        socket.broadcast.emit('sendChatToClient', message);
		//io.sockets.emit("sendChatToClient", "test1");
		//io.emit("sendChatToClient", "test2");
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

httpsServer.listen(port, ()=> {
	console.log('https Server is current is running port',port);
});
