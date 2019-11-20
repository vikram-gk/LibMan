//var socket=io();


//receive chat frm server

// socket.on("chat-message",function(message){
// 	$("#chat-container").append(message+"<br />")
// });


// var socket=io();
// $("#chat-input").keydown(function(event){
// 	if(event.keyCode==13){   
// 		//default behaviour is to go to next line when u press enter ie key 13
// 		event.preventDefault(){
// 			if($("#chat-input").val()!=""){
// 				socket.emit("chat-message",$("#chat-input").val());  // $("#chat-input").val() is the data to pass
// 				$("#chat-input").val(""); //set the text box to empty
// 			}
// 		}
// 	}
// });

//receive chat frm server

// socket.on("chat-message",function(message){
// 	$("#chat-container").append(message+"<br />")
// });

$(function(){
   	//make connection
	var socket = io.connect('http://localhost:3000')
	//buttons and inputs
	var message = $("#message")
	var username = $("#username")
	var send_message = $("#send_message")
	var send_username = $("#send_username")
	var chatroom = $("#chatroom")
	var feedback = $("#feedback")

	//to send message from inputbox on click of send
	send_message.click(function(){
		socket.emit('new_message', {message : message.val()})
	})
	
	//to send message from inputbox on click of enter
	message.keypress(function(){
		if(event.keyCode==13)
		{
		socket.emit('new_message', {message : message.val()})
	}
	
	})

	//Listen on new_message
	socket.on("new_message", (data) => {
		feedback.html('');
		message.val('');
		chatroom.append("<p class='message'>" + data.username + ": " + data.message + "</p>")
	})

	//Emit a username
	send_username.click(function(){
		socket.emit('change_username', {username : username.val()})
	})

	//Emit typing
	message.bind("keypress", () => {
		socket.emit('typing')
	})
	//modification to take off the "typing message"
	body.bind("click",() =>{
		socket.emit('')
	})
	//Listen on typing
	socket.on('typing', (data) => {
		feedback.html("<p><i>" + data.username + " is typing a message..." + "</i></p>")
	})
});


