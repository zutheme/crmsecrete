var _e_modal_cross_form = document.getElementsByClassName("modal-cross-form")[0];
var _e_modal_cross = document.getElementsByClassName("modal-cross")[0];
var _e_close = document.getElementsByClassName("close")[0];
var _e_idparentcrosss="";
var _e_htz_popup_processing = document.getElementsByClassName("htz-popup-processing")[0];
function cross_product(){
	if(_e_modal_cross){
	  _e_modal_cross.style.display = "block";
	}
}
if(_e_close){
	_e_close.addEventListener("click", close_cross);
}
function close_cross(){
   if(_e_modal_cross){
	_e_modal_cross.style.display = "none";
   }
}
var _e_modal_cate_form = document.getElementsByClassName("modal-cate-form")[0];
var _e_modal_cate = document.getElementsByClassName("modal-cate")[0];

function cate_products(element){
   if(!_e_modal_cate) return false;
   _e_idparentcrosss = element.parentElement;
  _e_modal_cate.style.display = "block";
}

function close_cate(){
  if(!_e_modal_cate) return false;
  _e_modal_cate.style.display = "none";
}
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);
    if (elt.selectedIndex == -1)
        return null;
    return elt.options[elt.selectedIndex].text;
}

/*var _e_sel_idcat_main = document.getElementsByName("sel_idcat_main")[0];

_e_sel_idcat_main.addEventListener("change", function(){

    var select_idcat = this.options[this.selectedIndex].value;
    //console.log(select_idcat);
    if(select_idcat > -1){
      select_category(select_idcat);

    }

});*/

function select_category(select_idcat){

  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
  var http = new XMLHttpRequest();
  var host = window.location.hostname;

  if(_posttype == 'survey'){
     _posttype = 'tag';
  }
  
  var url = url_home + "/admin/product/categorybyid/"+_posttype+"/"+select_idcat+"/"+_idproduct;
  /*var params = JSON.stringify({"sel_idcategory":select_idcat});*/
  http.open("POST", url, true);
  http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
  http.setRequestHeader("Accept", "application/json");
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //var load = _e_frm_reg.getElementsByClassName("loading")[0];
  //load.style.display = "block";
  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);
           var e_sel_dynamic =  document.getElementsByClassName("select_dynamic")[0];
           //var e_ul =  document.getElementsByClassName("list-check")[0];
           var idcat;
           if(e_sel_dynamic){
              while (e_sel_dynamic.firstChild) {
                  e_sel_dynamic.removeChild(e_sel_dynamic.firstChild);
              }
            }
           e_sel_dynamic.innerHTML = myArr;
          //load.style.display = "none";      
      }
  }
  http.send();
}

var _e_sel_idcat_main_edit = document.getElementsByName("sel_idcat_main_edit")[0];
if(_e_sel_idcat_main_edit){
	_e_sel_idcat_main_edit.addEventListener("change", function(){
		var select_idcat = this.options[this.selectedIndex].value;
		if(select_idcat > -1){
		  select_category_search(select_idcat);     
		}
	});
}

var e_sel_dynamic =  document.getElementsByClassName("select_dynamic_edit")[0];

function select_category_search(select_idcat){

  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");

  var http = new XMLHttpRequest();

  var host = window.location.hostname;

  var url = url_home + "/admin/product/listcategorybyid/product/"+select_idcat+"/"+_idproduct;
 
  var params = JSON.stringify({"sel_idcategory":select_idcat});

  http.open("POST", url, true);

  http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);

  http.setRequestHeader("Accept", "application/json");

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //var load = _e_frm_reg.getElementsByClassName("loading")[0];

  //load.style.display = "block";

  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);
           
           //var e_ul =  document.getElementsByClassName("list-check")[0];
           var idcat;
           if(e_sel_dynamic){
              while (e_sel_dynamic.firstChild) {
                  e_sel_dynamic.removeChild(e_sel_dynamic.firstChild);
              }
            }
           e_sel_dynamic.innerHTML = myArr;
          //load.style.display = "none";      
      }
  }
  http.send(params);
}

function OnChangeCheckbox(element){
    var select_idcat = element.value;
    var e_parent = element.parentElement;
    var checked = 0;
    if(element.checked == true){
       checked = 1;
      }else{
        checked = 0;
      }
    
    if(_posttype == 'custom' || _posttype == 'survey'||_posttype == 'phone'||_posttype == 'consultant'||_posttype == 'order'){
        ListTag(select_idcat,_idproduct);
    }else{
        console.log(_posttype);
        var _hidden_idcate = e_parent.getElementsByClassName("hidden_idcate")[0].value;
        update_category(select_idcat,_idproduct,checked,_hidden_idcate);
    }
}
function getlistchecked(){
    var _lstchecked = document.getElementsByClassName("checklist");
    let lst = [];
    for (var i = 0; i < _lstchecked.length; i++) {
      if(_lstchecked[i].checked){
          lst.push(_lstchecked[i].value);
      }
    }
    return lst;
}
function ListTag(_idcat, _idproduct){
    var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    var http = new XMLHttpRequest();
    var host = window.location.hostname;
    var url = url_home + "/admin/listtag";
    var _select_idcat = getlistchecked();
    if(_select_idcat.length == 0){
        _select_idcat.push(_idcat);
    }
    var params = JSON.stringify({"select_idcat":_select_idcat, "idproduct":_idproduct });

    http.open("POST", url, true);

    http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);

    http.setRequestHeader("Accept", "application/json");

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var load = document.getElementsByClassName("htz-popup-processing")[0];
      //load.style.display = "block";

    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
             var myArr = JSON.parse(this.responseText);
             //console.log(myArr);
             var e_tagclound = document.getElementsByClassName("tagclound")[0];
             
             e_tagclound.innerHTML = myArr;
             //load.style.display = "none";   
        }
    }
    http.send(params);
}
function update_category(select_idcat,_idproduct,_checked,_hidden_idcate){
  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");

  var http = new XMLHttpRequest();

  var host = window.location.hostname;

  var url = url_home + "/admin/post/updatecategory/"+select_idcat+"/"+_idproduct+"/"+_checked+"/"+_hidden_idcate;
 
  //var params = JSON.stringify({"sel_idcategory":select_idcat});

  http.open("POST", url, true);

  http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);

  http.setRequestHeader("Accept", "application/json");

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  _e_htz_popup_processing.style.display = "block";

  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);
           console.log(myArr);
           _e_htz_popup_processing.style.display = "none";   
      }
  }
  http.send();
}
var _e_form_cate = document.getElementsByClassName("frm-cate")[0];
var _e_btn_search = document.getElementsByClassName("btn-search")[0];
if(_e_btn_search){
	_e_btn_search.addEventListener("click",function(){
		var listcheck = document.getElementsByClassName("select_dynamic_edit")[0];
		if(!listcheck) return false;
		var e_lst_check = listcheck.getElementsByClassName("checklist");
		var lst_value = ""; var _search = false;
		if(e_lst_check){

		  for (var i = 0; i < e_lst_check.length; i++) {
			if(e_lst_check[i].checked){
				lst_value = lst_value + '{"idcate":'+e_lst_check[i].value + '},';
				_search = true;
			}
		  }
		  if(_search){
			lst_value = '['+lst_value.replace(/,\s*$/, "")+']';
			search_productbyidcate(lst_value);
		  }else{
			 alert("B???n ch???n ??t nh???t m???t chuy??n m???c");
		  } 
		}  
	});
}
function search_productbyidcate(_list_idcate){
  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
  var http = new XMLHttpRequest();

  var host = window.location.hostname;

  var url = url_home + "/admin/post/listproductbyidcate";
 
  var params = JSON.stringify({"list_idcate":_list_idcate});

  http.open("POST", url, true);

  http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);

  http.setRequestHeader("Accept", "application/json");

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  var load = document.getElementsByClassName("loading")[0];
  load.style.display = "block";

  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);
           //console.log(myArr);
           var e_ul =  _e_form_cate.getElementsByClassName("list-check-result")[0]; 
            e_ul.innerHTML = myArr;
           load.style.display = "none";      
      }
  }
  http.send(params);
}

function remove(element){
  var _e_parent = element.parentElement.parentElement.parentElement;
  _e_parent.getElementsByClassName("cross_id_status_type")[0].value = 5;
  _e_parent.style.display = "none";
}
var _e_new_relative = document.getElementsByClassName("btn-create-new-relative")[0];
if(_e_new_relative){
		_e_new_relative.addEventListener("click",function(){
		var e_ul =  _e_form_cate.getElementsByClassName("list-check-result")[0]; 
		if(e_ul){
			var lst_item="";
			var check = false;
			var _e_lstchk = e_ul.getElementsByClassName("listcheck");
			for (var i = 0; i < _e_lstchk.length; i++) {
			  if(_e_lstchk[i].checked){
				 check = true;
			  }
			}
			if(!check){
			  alert("b???n ch??a ch???n s???n ph???m li??n quan");
			  return false;
			}
			_e_form_cate.submit();
		}
	});
}
var _close = false;
function apply_promo(element){
   var _e_parent = element.parentElement.parentElement;
   var _e_promo = _e_parent.getElementsByClassName("promo")[0];
   if(!_close){
       _e_promo.style.display = "block";
       _close = true;
   }else{
      _e_promo.style.display = "none";
      _close =  false;
   }
}
$(document).ready(function(){
    $('.myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('.myDatepicker2').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss'
    });
    // $("#myDatepicker2").on("dp.change", function(e) {
    //$("input[name='_start_date']").val(_start_date_sl);
    // });
    // $('yourpickerid').on('changeDate', function(ev){
    //     $(this).datepicker('hide');
    // });

});
var _showdate = false;
function showdate(element){
 var e_apply = element.parentElement.getElementsByClassName("apply-date")[0];
 if(!_showdate){
  e_apply.style.display = "block";
  _showdate = true;
 }else{
     e_apply.style.display = "none";
    _showdate = false;
 }
}

/*begin tag*/
function removingtag(element){
      var _idtag = element.getAttribute("idtag");
      var _idproduct = element.getAttribute("idproduct");
      var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
      var http = new XMLHttpRequest();
      var host = window.location.hostname;
      var url = url_home + "/admin/tags/trash";
      var params = JSON.stringify({"idproduct":_idproduct, "idtag":_idtag});
      http.open("POST", url, true);
      http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
      http.setRequestHeader("Accept", "application/json");
      http.setRequestHeader("Content-type", "application/json");
      var load = document.getElementsByClassName("htz-popup-processing")[0];
      load.style.display = "block";
      http.onreadystatechange = function() {
          if(http.readyState == 4 && http.status == 200) {
               var myArr = JSON.parse(this.responseText);
               console.log(myArr);
               element.parentElement.style.display = "none";
               load.style.display = "none"; 
          }
      }
      http.send(params);
}
/*end tag*/
var _ls_text_tag = '';
var _ls_idtag ='';
function OnChangetag(element){
  var _idtag = element.value;
  var e_parent = element.parentElement;
  var _text_tag = e_parent.innerText;
  var etags_1 = document.getElementById("tags_1");
  var etags_2 = document.getElementById("tags_2");
  _ls_text_tag = _ls_text_tag + ','+ _text_tag;
  _ls_idtag = _ls_idtag + ',' + _idtag;
  etags_2.value = _ls_idtag;
  etags_1.value = _ls_text_tag; 
  console.log(_ls_idtag , _ls_text_tag);
}