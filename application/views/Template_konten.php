<?php 
if(!defined('BASEPATH'))
    exit("You dont have permission on this url");
?>
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
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/jaserv.min.dev.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/master.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/acara.js"></script>
		
		<script
		type="text/javascript"
		src="<?php echo base_url();?>resource/mystyle/login.js"
		></script>
		<script type="text/javascript" >
			//var formLog = <?php //if($status != null) echo '1'; else echo '2';?>;
			//
			var base_url = "<?php echo base_url();?>";
		</script>
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
					<div class="layout-content" id="content-place-acara">
						<!--acara-->
					</div>
				</div> 
				<div class="col-md-6 up-content"> 
					<div class="layout-content"> 
                        <!--Video-->
					</div>
				</div>  
				<div class="col-md-6 down-content"> 
					<div class="layout-content" >
						<!--Dosen-->
					</div>
				</div> 
				<div class="col-md-6 down-content"> 
					<div class="layout-content">
                        <!--Event-->
                    </div>
				</div> 
			</div>	
		</div> 
		<div class="statusbar statusbar-success" id='login' style="display: none;"> 
			<!--login-->
		</div> 
		<div class="statusbar statusbar-success" id="loading-bar" style="display: none;"> 
			<div class="statusbar-icon"><img src="<?php echo base_url();?>resource/img/loader.gif">
			</div> 
			<div class="statusbar-text" id="loading-bar-message">Loading...</div>
			<div class="statusbar-close icon-remove"></div> 
		</div>
	</body>
</html>