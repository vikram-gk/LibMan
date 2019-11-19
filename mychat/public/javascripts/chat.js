var socket=io();
$("#chat-input").keydown(function(event){
	if(event.keyCode==13){   
		//default behaviour is to go to next line when u press enter ie key 13
		event.preventDefault(){
			if($("#chat-input").val()!=""){
				socket.emit("chat-message",$("#chat-input").val());  // $("#chat-input").val() is the data to pass
				$("#chat-input").val(""); //set the text box to empty
			}
		}
	}
});

//receive chat frm server

socket.on("chat-message",function(message){
	$("#chat-container").append(message+"<br />")
});