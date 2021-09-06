var e_target = document.getElementsByClassName('target')[0];
var e_product = document.getElementsByClassName('product')[0];
var e_prices = document.getElementsByClassName('prices')[0];
e_target.addEventListener("keyup", fn_target);
var _target = 0;
var _price = 0;
function fn_target(){
	_target = this.value;
	_target = _target.replace(/\D/g,'');
	if(_target > 0 && _price > 0){
		calculate(_target, _price);
	}
}
e_prices.addEventListener("keyup", fn_prices);
function fn_prices(){
	_price = this.value;
	_price = _price.replace(/\D/g,'');
	if(_target > 0 && _price > 0){
		calculate(_target, _price);
	}
}
function calculate(_target, _price){
	var _ds_usd = (_target/23000);
	_ds_usd = Math.round(_ds_usd);
	_ds_usd = format_currency(_ds_usd);
	var e_ds_usd = document.getElementById('ds_usd');
	e_ds_usd.innerHTML = _ds_usd;
	var e_ds_year = document.getElementById('ds-year');
	e_ds_year.innerHTML = format_currency(_target);
	
	var e_ds_month = document.getElementById('ds-month');
	var _ds_month = Math.round(_target/12);
	e_ds_month.innerHTML = format_currency(_ds_month);
	
	var e_ds_week = document.getElementById('ds-week');
	var _ds_week = Math.round(_ds_month/4);
	e_ds_week.innerHTML = format_currency(_ds_week);
	var _ds_date = Math.round(_ds_week/7);
	
	var e_ds_date = document.getElementById('ds-date');
	e_ds_date.innerHTML = format_currency(_ds_date);
	/*caculate price of product*/
	let n_price = _price;
	var _pr_year = Math.round(_target/n_price);
	
	var e_pr_year = document.getElementById('pr-year');
	e_pr_year.innerHTML = format_currency(_pr_year);
	
	var _pr_month = Math.round(_pr_year/12);
	var e_pr_month = document.getElementById('pr-month');
	e_pr_month.innerHTML = format_currency(_pr_month);
	
	var _pr_week = Math.round(_pr_month/4);
	var e_pr_week = document.getElementById('pr-week');
	e_pr_week.innerHTML = format_currency(_pr_week);
	
	var _pr_date = Math.round(_pr_week/7);
	var e_pr_date = document.getElementById('pr-date');
	e_pr_date.innerHTML = format_currency(_pr_date);
}

function format_currency(variable) {
  var digits = (""+variable).split("");
  var count = 1;
  var str_number = [];
  var len = digits.length;
  for (var i = len - 1; i >= 0; i--) {
    if(count % 3 ==0 ){
      str_number.push(digits[i]);
      str_number.push(",");
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
  if(str_number[k]==','){
    out_str = out_str.substr(1, out_str.length-1);
  }
  return out_str;
}