function total_items(){
    var _e_c_cart_number = document.getElementsByClassName("c-cart-number");
    var _l_itemts = localStorage.getItem('l_items');
    if(!isRealValue(_l_itemts)){
      return false;
    }
    //var re_items = localStorage.getItem('l_items');
    var itemts = JSON.parse(_l_itemts);
    console.log(itemts);
    var _trash;
    var _parent_id;
    var _count = 0;
     for ( var index=0; index < itemts.length; index++ ) {   
     		_parent_id = itemts[index].parent_id;
     		_trash = itemts[index].trash;       
           if(_parent_id == 0 && _trash == 0){
           		_count++;
           }         
    	}
    for (var i = _e_c_cart_number.length - 1; i >= 0; i--) {
      _e_c_cart_number[i].innerHTML = _count;
    }
     
}
total_items();
function isRealValue(obj) {
  return obj && obj !== 'null' && obj !== 'undefined';
}
//set cookie object
 function deleteCookie(cookiename){
      var d = new Date();
      d.setDate(d.getDate() - 1);
      var expires = ";expires="+d;
      var name=cookiename;
      //alert(name);
      var value="";
      document.cookie = name + "=" + value + expires + "; path=/";                    
  }
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setCookieHours(cname,cvalue,hours) {
    var d = new Date();
    d.setTime(d.getTime() + (hours*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
var l_items = getCookie('l_items');
if(!isRealValue(l_items)){
  localStorage.removeItem("l_items");
}

function show_currency(variable) {
  // if(isNaN(variable)){
  //   console.log("is number");
  // }else{
  //   console.log("is string");
  // }
  var digits = (""+variable).split("");
  var count = 1;
  var str_number = [];
  var len = digits.length;
  for (var i = len - 1; i >= 0; i--) {
    if(count % 3 ==0 ){
      str_number.push(digits[i]);
      str_number.push(".");
    }else{
      str_number.push(digits[i]);
    }
    count++;
  }
  var out_str = "";
  for (var k = str_number.length - 1; k >= 0; k--) {
    out_str = out_str + str_number[k];
  }
  var k = out_str.length - 1;
  if(str_number[k]=='.'){
    out_str = out_str.substr(1, out_str.length-1);
  }
  return out_str;
}
var _e_currency0 = document.getElementsByClassName("currency")[0];
if(_e_currency0){
	var _e_currency = document.getElementsByClassName("currency")[0];
	var _format_current;
	for (var i = _e_currency.length - 1; i >= 0; i--) {
	  _format_current = _e_currency[i].innerHTML;
	  _e_currency[i].innerHTML = show_currency(_format_current);
	}
}

function cart_number(){
  var e_cart_number = document.getElementsByClassName("cart-count")[0];
  if(!e_cart_number) return false;
  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    var http = new XMLHttpRequest();
    var _userid_order = 0;
    var url = url_home+"/teamilk/cartnumber";
    var params = JSON.stringify({"userid_order":_userid_order});  
    //var params = JSON.stringify({"userid_order":_userid_order,"idorder":_idorder,"quality":_quality});
    http.open("POST", url, true);
    http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
          //callback(this.responseText);
          var count = JSON.parse(this.responseText);
          e_cart_number.innerHTML = count;
          //console.log(e_cart_number);        
        }
    }
    http.send(params);
}
document.addEventListener('DOMContentLoaded', (event) => {
  cart_number();
})