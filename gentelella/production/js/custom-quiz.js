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
