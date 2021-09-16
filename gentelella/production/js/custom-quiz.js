var e_btn_open_exam = document.getElementsByClassName("btn-open-exam")[0];
if(e_btn_open_exam){
	var _e_btn_open_exam = e_btn_open_exam;
	var e_openexam = document.getElementById('exam');
	var open_exam = false;
	_e_btn_open_exam.addEventListener("click",function(){
		if(!open_exam){
			e_openexam.style.display = "block";
			open_exam = true;
		}else{
			e_openexam.style.display = "none";
			open_exam = false;
		}
	});
}

function sort_quiz(){
	let  list = [];
	var e_left_defaults = document.getElementById("left-defaults");
	if(!e_left_defaults) return false;
	var e_list_data = e_left_defaults.getElementsByClassName("data");
	for(var i = 0;i < e_list_data.length;i++ ){
		let _idimp = e_list_data[i].getAttribute("idimp");
		let _idproduct = e_list_data[i].getAttribute("idproduct");
		let _orders = e_list_data[i].getAttribute("orders");
		let strobj = { "idimp": _idimp ,"idproduct":_idproduct,"orders":(i + 1) };
		list.push(strobj);
	}
	sort_data(list);
}
function sort_data(list){
	var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    var xhr = new XMLHttpRequest();
    var url = url_home+"/admin/sortquiz";
	  //console.log(list);
	  var params = JSON.stringify({
        "data": list
      });
	console.log(params);
    xhr.open("POST", url, true);
    xhr.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader('Content-Type', 'application/json');
  
	var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
	
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
        	var data = JSON.parse(xhr.responseText);
            console.log(data);
            e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
            e_popup_processing.getElementsByClassName("loading")[0].style.display ="none";
            e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
            if(data.error == 0){
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.desc;
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            }else {
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.desc;
                //e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            }
            
            setTimeout(function(){
                e_popup_processing.style.display ='none';
				location.reload();
              },3000);  
        }
    }
    xhr.send(params);
    console.log("request sent to the server");
}
function trashquiz(_idimp){
	var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    var xhr = new XMLHttpRequest();
    var url = url_home+"/admin/trashquiz";
	  //console.log(list);
	  var params = JSON.stringify({
        "idimp": _idimp,"idstatustype": 5,
      });
	console.log(params);
    xhr.open("POST", url, true);
    xhr.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader('Content-Type', 'application/json');
  
	var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
	
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
        	var data = JSON.parse(xhr.responseText);
            console.log(data);
            e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
            e_popup_processing.getElementsByClassName("loading")[0].style.display ="none";
            e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
            if(data.error == 0){
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.desc;
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            }else {
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.desc;
                //e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            }
            setTimeout(function(){
                e_popup_processing.style.display ='none';
				location.reload();
              },3000);  
        }
    }
    xhr.send(params);
    console.log("request sent to the server");
}
