var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
server.listen(8890, function () {
    console.log('Listening on Port 8890');
});

app.get('/', function (req, res) {
    res.sendFile(__dirname + '/index.html');
});


var redisClient = redis.createClient();
redisClient.subscribe('message');

io.on('connection', function (socket) {

    console.log("new client connectedaa");


    redisClient.on("message", function (channel, message) {
        console.log("new message in queue " + message + " channel:" + channel);
        socket.emit(channel, message);
    });

    redisClient.on('disconnect', function () {
        console.log('disconnect');
    });

});