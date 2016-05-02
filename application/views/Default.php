<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html> 
<html lang=en> 
	<head> 
		<title>Taurus</title> 
		<meta http-equiv=Content-Type content="text/html; charset=utf-8" /> 
		<link rel=icon type=image/ico href="favicon.html"/> 
		<link href=<?php echo base_url();?>resource/css/stylesheets.css rel=stylesheet type=text/css /> 
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/jquery/jquery.min.js></script> 
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/jquery/jquery-ui.min.js></script> 
		<script type=text/javascript>
var totalViewPeople = 5;
var once = 2;
var once2 = 2;
var login = 1;
var formLog = <?php if($status != null) echo '1'; else echo '2';?>;
var barLoginOpen = 2;
$(document).ready(function(){
	$(window).keypress(function(event){
		if(event.keyCode == 108 || event.keyCode == 76){
			if(login == 1)
				once = 1;
		}	
	});
	$(window).keypress(function(event){
		if(event.keyCode == 97 || event.keyCode == 65){
			if(once == 1){
				if(formLog == 2){
					if(barLoginOpen == 2){
						barLoginOpen = 1;
						LoginBar.openBar("");			
					}else{
						barLoginOpen = 2;
						LoginBar.closeBar();
					}	
				}
			}
		}	
	});
	$('#close-login').click(function(){
		LoginBar.closeBar();
	});
	$(window).keyup(function(event){
		if(event.keyCode == 108 || event.keyCode == 76){
			once = 2;
		}	
	});
	if($("#layout_first").length>0)
		$("#layout_first").height($(window).height());
	$(".up-content").height($("#layout_first").height()*6/10);
	$(".down-content").height($("#layout_first").height()*4/10);	
	$("#content-video").height($('#layout-video').height());
	var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
	$('#video-show').css({
		"marginTop" : (h/2)+"px"
	});
	$('#content-acara').height(parseFloat($('#acara-layout').height())-parseFloat($('#watch-layout').height()));
	reLoadListViewPeople();
	$(window).resize(function(){
	    if($("#layout_first").length>0)
			$("#layout_first").height($(window).height());
	    $(".up-content").height($("#layout_first").height()*6/10);
	    $(".down-content").height($("#layout_first").height()*4/10);
		$("#content-video").height($('#layout-video').height());
		var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
		$('#video-show').css({
			"marginTop" : (h/2)+"px"
		});
		$('#content-acara').height(parseFloat($('#acara-layout').height())-parseFloat($('#watch-layout').height()));
		
	});
	$('#video-show').resize(function(){
		var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
		$('#video-show').css({
			"marginTop" : (h/2)+"px"
		});
	});
	$('.list-view-people').resize(function(){
		reLoadListViewPeople();
		
	});
	reLoadTable();
});
$(document).ready(function(){
	//reLoadLDTable();
});
$(document).ready(function(){
	watchMe();
});
var temp2=null;
var temp=null;
var temp1 = null;
var temp3=null;
var loop = 1;
var loopJ = 0;
function reLoadListViewPeople(){
	$('.list-view-people').height(parseFloat($('#list-dekan').height())/totalViewPeople);
	if($('.bingkai-content-image').width() > $('.bingkai-content-image').height())
	{
		$('.content-image').height(parseFloat($('.bingkai-content-image').height()));
		$('.content-image').width(parseFloat($('.bingkai-content-image').height()));
	}else{
		$('.content-image').height(parseFloat($('.bingkai-content-image').width()));	
		$('.content-image').width(parseFloat($('.bingkai-content-image').width()));
	}
	$('.content-image').css({
		"marginTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.content-image').height()))/2)+"px"
	});	
	
	$('.content-middle').css({
		"paddingTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.middle').height()))/2)+"px"
	});	
	
	$('.content-end').css({
		"paddingTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.content-image').height()))/2)+"px"
	});	
	//alert('hello');
	//alert($('.content-image').height());
}
var pauseTableAcara = true;
function reLoadTable(){
	temp2 = document.getElementById('content-table-acara');
	if(pauseTableAcara){
		return;
	}
	for(var i = 0;;i++){
		if(temp2.childNodes[i].innerHTML != undefined){
			temp1 = temp2.childNodes[i];
			break;
		}
	}
	$(temp1).fadeOut(2000,function(){
		temp3 = document.createElement('tr');
		temp3.innerHTML = temp1.innerHTML;
		temp2.removeChild(temp1);
		temp2.appendChild(temp3);
		temp2 = null;
		temp1 = null;
		temp3 = null;
		
		setTimeout(function(){
			tryReRef();
		},5000);
	});
}
/*
function reLoadLDTable(){
	var temps = document.getElementById('list-dekan');
	for(var i = 0;;i++){
		if(temps.childNodes[i].innerHTML != undefined){
			var tempt = temps.childNodes[i];
			break;
		}
	}
	$(tempt).fadeOut(2000,function(){
		var tempu = document.createElement('tr');
		$(tempu).attr('class','list-item');
		tempu.style.backgroundColor = '#888';
		tempu.style.color = '#eee';
		tempu.style.width = '100%';
		tempu.innerHTML = tempt.innerHTML;
		temps.removeChild(tempt);
		temps.appendChild(tempu);
		temps = null;
		tempt = null;
		tempu = null;
		setTimeout(function(){
			refLD();
		},7000);
	});
}
function refLD(){
	reLoadLDTable();
} 
*/
	/*
	if(temp2.childNodes[loop].innerHTML == 'undefined')
		loop++;
	alert(loop+" = "+temp2.childNodes[loop].innerHTML)
	temp = temp2.childNodes[loop];
	loop+=loopJ;
	loop++;
	if(loopJ == 0 && loop > 4){
		loop=0;
		loopJ=1;
	}
	else if(loopJ ==1 && loop > 7){
		loop=1;
		loopJ=0;
	}
	$(temp).fadeOut('slow');
	setTimeout(function(){
		temp3 = document.createElement('tr');
		temp3.innerHTML = temp.innerHTML; 
		temp2.removeChild(temp);
		temp2.appendChild(temp3);
		temp = null;
		temp2 = null;
		temp3 = null;
		setTimeout(hell(),10000);
		
	},1000);
}
*/
function tryReRef(){
	reLoadTable();
}
function watchMe(){
	setTimeout(function(){
		var xx = new Date();
		var cold = document.getElementById('watch-me').innerHTML = xx.getHours()+":"+xx.getMinutes()+":"+xx.getSeconds();
		watchMe();
	},100);
}
		</script> 
		<script
		type="text/javascript"
		src="<?php echo base_url();?>resource/mystyle/login.js"
		></script>
		<script
		type="text/javascript"
		src="<?php echo base_url();?>resource/mystyle/jaserv.min.dev.js"
		></script>
		<style type="text/css">
		.grey-color{
		background-color : #666;
		}
		.white-color{
		background-color : #aaa;
		}
		.layout-content {
			position:absolute;
			bottom : 2px;
			left : 2px;
			right : 2px;
			top : 2px;
			background-color : #fff;
			color : #666;
		}
		@media screen (max-width : 992px){
			.layout-content {
				position:absolute;
				bottom : 2px;
				left : 2px;
				right : 2px;
				top : 2px;
				background-color : #666;
			}	
		}
		body {
			background-color : #fff;
		}
		#watch-layout{
			background : rgba(0,0,0,0.2);
			font-size : 80px;
			font-family : courier new;
		}
		.pointer {
			cursor : pointer;
			color : #666;
			transition : 0.2s ease-in-out;
		}
		.pointer:hover {
			color : #555;
		}
		</style>
	</head> 
	<body style="height:100%; width : 100%;" id="layout_first"> 
		<div class="container">  
			<div class="row" style="background-color : #666;"> 
				<div class="col-md-6 up-content"> 
					<div class="layout-content">
						<div class="block" id="layout-acara" style="width: 100%; height : 100%;">
							<div style="display:none; position:absolute; height: 40px; background : rgba(255,255,255,0.3);width : 100%;"> 
								<span class="icon-plus pointer" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
								<span class="icon-edit pointer" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
								<div style="position : absolute; margin-top : 40px; z-index : 3000; color : #666; background-color : rgba(250,250,250,0.7);text-align : center; width : 100%;">
									<input type="text" placeholder="Tanggal" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
									<input type="text" placeholder="jam" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
									<input type="text" placeholder="Nama Acara" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
									<input type="text" placeholder="Penanggungjawab" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
									<input type="button" value="Masukan" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
								</div>
							</div>
							<div id="acara-layout" style="width:100%; height : 100%;">
								<div style="" id="watch-layout"> 
									<span id="watch-me">12:10</span>
								</div> 
								<div id="content-acara" style="background : rgba(255,255,255,0.2);">
									<table class="table table-hover"> 
										<thead> 
											<tr> 
												<th>Tanggal</th> 
												<th>Jam</th> 
												<th>Nama Acara</th> 
												<th>Penyelenggara</th> 
											</tr> 
										</thead> 
										<tbody id="content-table-acara" style="overflow-y:auto;"> 
										</tbody> 
									</table>
								</div> 
							</div>
						</div>
					</div>
				</div> 
				<div class="col-md-6 up-content"> 
					<div class="layout-content"> 
						<div class="block" id="layout-video" style="width: 100%; height : 100%;">
							<div style="display: none; position:absolute; height: 40px; background : rgba(255,255,255,0.3);width : 100%;" id="header-video"> 
								
							</div> 
							<div id="content-video" style="background : rgba(0,0,0,0);">
								<video id="video-show" style="height : 100%; width : 100%;" autoplay loop name="media">
									<source src="<?php echo base_url();?>data/video/hoho.mp4" type="video/mp4">
								</video>
							</div> 
						</div>
					</div>
				</div>  
				<div class="col-md-6 down-content"> 
					<div class="layout-content" >
						<div class="block" style="width: 100%; height : 100%;">
							<div style="display: none; position:absolute; height: 40px; background : rgba(255,255,255,0.3);width : 100%;" id="header-video"> 
								
							</div> 
							<div  style="width: 100%; height : 100%;">
								<div class="" id="list-dekan" style="width: 100%; height : 100%; overflow-y : hidden;"> 
									<div class="list-view-people" style=" width: 100%;"> 
										<div class="col-md-2 bingkai-content-image" style="text-align: center;"> 
											<img class="content-image" style="background-color : rgba(0,0,0,0); border-radius : 50%;" src="<?php echo base_url();?>resource/img/example/user/dmitry.jpg" class="img-circle"> 
										</div> 
										<div class="col-md-8 content-middle" > 
											<div class="middle">
												<a style="color : #666;" >Dekan</a>
												<p style="color : #666;" >Prof Dr Widowati, M.Si</p>
											</div>
										</div> 
										<div class="col-md-2 content-end"> 
											<span class="icon-ok" style="font-size : 50px;color : green;  line-height : 100%;"></span>
										</div> 
									</div>
									<div class="list-view-people" style="width: 100%;"> 
										<div class="col-md-2 bingkai-content-image" style="text-align: center;"> 
											<img class="content-image" style="background-color : rgba(0,0,0,0); border-radius : 50%;" src="<?php echo base_url();?>resource/img/example/user/dmitry.jpg" class="img-circle"> 
										</div> 
										<div class="col-md-8 content-middle" > 
											<div class="middle">
												<a style="color : #666;" >Dekan</a>
												<p style="color : #666;" >Prof Dr Widowati, M.Si</p>
											</div>
										</div> 
										<div class="col-md-2 content-end"> 
											<span class="icon-ok" style="font-size : 50px;color : green;  line-height : 100%;"></span>
										</div> 
									</div>
									<div class="list-view-people" style=" width: 100%;"> 
										<div class="col-md-2 bingkai-content-image" style="text-align: center;"> 
											<img class="content-image" style="background-color : rgba(0,0,0,0); border-radius : 50%;" src="<?php echo base_url();?>resource/img/example/user/dmitry.jpg" class="img-circle"> 
										</div> 
										<div class="col-md-8 content-middle" > 
											<div class="middle">
												<a style="color : #666;" >Dekan</a>
												<p style="color : #666;" >Prof Dr Widowati, M.Si</p>
											</div>
										</div> 
										<div class="col-md-2 content-end"> 
											<span class="icon-ok" style="font-size : 50px;color : green;  line-height : 100%;"></span>
										</div> 
									</div>
									<div class="list-view-people" style=" width: 100%;"> 
										<div class="col-md-2 bingkai-content-image" style="text-align: center;"> 
											<img class="content-image" style="background-color : rgba(0,0,0,0); border-radius : 50%;" src="<?php echo base_url();?>resource/img/example/user/dmitry.jpg" class="img-circle"> 
										</div> 
										<div class="col-md-8 content-middle" > 
											<div class="middle">
												<a style="color : #666;" >Dekan</a>
												<p style="color : #666;" >Prof Dr Widowati, M.Si</p>
											</div>
										</div> 
										<div class="col-md-2 content-end"> 
											<span class="icon-ok" style="font-size : 50px;color : green;  line-height : 100%;"></span>
										</div> 
									</div>
									<div class="list-view-people" style=" width: 100%;"> 
										<div class="col-md-2 bingkai-content-image" style="text-align: center;"> 
											<img class="content-image" style="background-color : rgba(0,0,0,0); border-radius : 50%;" src="<?php echo base_url();?>resource/img/example/user/dmitry.jpg" class="img-circle"> 
										</div> 
										<div class="col-md-8 content-middle" > 
											<div class="middle">
												<a style="color : #666;" >Dekan</a>
												<p style="color : #666;" >Prof Dr Widowati, M.Si</p>
											</div>
										</div> 
										<div class="col-md-2 content-end"> 
											<span class="icon-ok" style="font-size : 50px;color : green;  line-height : 100%;"></span>
										</div> 
									</div> 
								</div>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-md-6 down-content"> 
					<div class="layout-content"></div>
				</div> 
			</div>	
		</div> 
		<div class="statusbar statusbar-success" id='login' style="display: none;"> 
			<div class="statusbar-body"> 
				<form class="form-inline"> 
					<div class="form-group"> 
						<label>Login:</label> 
					</div> 
					<div class="form-group"> 
						<input type="text" id="username" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label>Password:</label> 
					</div> 
					<div class="form-group"> 
						<input type="password" id="password" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<button class="btn btn-default btn-clean" type="button" id="try-login">Submit</button> 
					</div> 
					
					<div class="form-group" style="margin-left : 100px;"> 
						<label id="login-message-error">Hello</label> 
					</div> 
				</form> 
			</div> 
			<div class="statusbar-close icon-remove" id="close-login"></div> 
		</div> 
		<div class="statusbar statusbar-success" id="loading-bar" style="display: none;"> 
			<div class="statusbar-icon"><img src="<?php echo base_url();?>resource/img/loader.gif">
			</div> 
			<div class="statusbar-text" id="loading-bar-message">Loading...</div>
			<div class="statusbar-close icon-remove"></div> 
		</div>
	</body>
</html>