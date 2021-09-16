function reachform(element){
  //var eparent = element.parentElement;
  var countdown = 100;
  var eparent = element;
  var frm = eparent.getElementsByTagName("form")[0];
  while(!frm && countdown > 0){
    eparent = eparent.parentElement;
    frm = eparent.getElementsByTagName("form")[0];
    countdown = countdown -1;
  }
  //setTimeout(function(){ return frm; },10000);
  return frm;
}
let ip_address = 'https://crm.secretenergy.net';
let socket_port = '3000';
//let socket = io(ip_address + ':' + socket_port);
//let socket = io.connect(ip_address + ':' + socket_port);
//const socket = io.connect(ip_address + ':' + socket_port);
var socket = io.connect(ip_address + ':' + socket_port, {secure: true});
//let socket = io();

var chatInput = document.getElementById("chatInput");
chatInput.addEventListener("keypress", function(event) {
    if (event.keyCode == 13) {
		 var frm = reachform(this);
		if(!frm) return false;
		var ecomment = frm.getElementsByTagName("textarea");
		var _comment='';
		if(ecomment){
		  for (var i = 0; i < ecomment.length; i++) {
			if(ecomment[i].name == 'note'){
				_comment = ecomment[i].value;
			}
		  }
		}
        let message = this.value;
		sendmessage(message);
		//io.sockets.emit('sendChatToServer', message);
		this.value = '';
        return false;
    }
    return true;
});
//socket.on('connection');

socket.on('msg', (data) => {
	console.log(data);
	alert(`New order! ${data.order_code} from a user`);
});

socket.on('chat:message', (data) => {
	console.log(data);
	alert(`New order! ${data.order_code} from a user`);
});

socket.on('hello', (data) => {
        console.log(data);
});
socket.on('connect', function () {
    console.log('---CONNECT--')
    
    socket.on('hello', function (data) {
        console.log('EVENT', data);
    })
    socket.on('disconnect', function () {
        console.log('---disconnect---')
    })

})

function sendmessage(_comment){
	var _url = document.URL;
	var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    //var _host = extractHostname(_url);
    var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
    var xhr = new XMLHttpRequest();
    var params = JSON.stringify({
        "data": {
          "note": _comment
        }
      });
    //console.log(params);
    var url = 'https://crm.secretenergy.net/sendMessageto';
    xhr.open("POST", url, true);
    //xhr.withCredentials = true;
	xhr.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader('Content-Type', 'application/json');
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () { 
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            //console.log(data);
			e_popup_processing.style.display ='none';
          }
    }
    xhr.send(params);
}