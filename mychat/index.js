//server side code
var express=require('express');
var app=express(); //call to express
var server=require('http').createServer(app);
var io=require('socket.io').listen(server); // call to socket.io
//servng client side html , css, js file
var path=require('path');
app.use(express.static[path.join(__dirname,'public')]);
app.set('view engine','ejs');

// start the server and listen on port 3000
server.listen(process.env.PORT||300,function(){
console.log('server listening');
})

app.get("/",function(req,res){
	res.render("chat");
});


//web socket

io.sockets.on("connection",function(socket){
	socket.on("chat-message",function(message){
		io.sockets.emit("chat-message", message);
	});
});