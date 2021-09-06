function exist_menu(){
  var count_find = 100;
  var interval_menu = setInterval(function() {
    var x = document.getElementById("menu");
     if (x) {
		 var e_liprofile = document.getElementById("liprofile");
		 e_liprofile.style.display = 'block';
		 x.insertBefore(e_liprofile, x.firstChild);
        clearInterval(interval_menu);
     }else if(count_find < 0){
         clearInterval(interval_menu);
     }
     count_find--;
  }, 100);
}
exist_menu();