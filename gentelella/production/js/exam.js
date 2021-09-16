function addquiztoexam(_element, _idproduct){
	var _idexam = _element.parentElement.getElementsByClassName('idexam')[0].value;
	var _iduser = _element.getAttribute("iduser");
	var _idcrosstype = _element.getAttribute("idcrosstype");
	if( _idexam > 0 && _idproduct > 0 && _iduser > 0 && _idcrosstype > 0){
		addquiz( _iduser, _idexam, _idproduct, _idcrosstype);
	}else{
		alert('Bạn chưa nhập mã đề');
	}
	return false;
} 
function addquiz( _iduser, _idexam, _idproduct, _idcrosstype){

	var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    var xhr = new XMLHttpRequest();
    var url = url_home+"/admin/insertlessontoexam";
    var params = JSON.stringify({"iduser":_iduser, "idexam":_idexam, "idproduct":_idproduct, "idcrosstype":_idcrosstype });
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
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.result+'</br>'+data.idimp+'</br>'+data.idcode;
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            }else {
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.result;
                //e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            }
            
            setTimeout(function(){
				//console.log(e_popup_processing);
                e_popup_processing.style.display ='none';
              },3000);  
        }
    }
    xhr.send(params);
    console.log("request sent to the server");

}

