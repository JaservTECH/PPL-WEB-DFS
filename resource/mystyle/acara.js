function refreshTableAcara() {
	pauseTableAcara = true;
	pauseJamAcara = true;
	setTimeout(function(){
		pauseTableAcara = false;
		pauseJamAcara = false;
		reLoadTable();
		watchMe();
	},100);
}
$(document).ready(function(){
    startTableAcara();
});
var editAcara = 0;
var addAcara = 0;
function startTableAcara(){
	j('#setAjax').setAjax({
        methode : "POST",
        url : base_url+"Formdataacara/tampilDataAcara",
        bool : true,
        content : "code=JASERVTECH-CODE",
        sucOk : function(a){
			if(a[0] == "1"){
				$("#content-place-acara").html(a.substr(1,a.length-1));
				refreshTableAcara();
				setTimeout(function(){
					$("#edit-acara").click(function(){
						if(editAcara == 0){
							editAcara = 1;
							refreshTablePreviewAcara();
						}else{
							editAcara = 0;
						}
						$('#add-acara-message').slideUp('slow');
						$('#edit-acara-control').slideToggle('slow');
					});
					$('#add-acara').click(function(){
						$('#edit-acara-control').slideUp('slow');
						$('#add-acara-message').slideToggle('slow');
						
					});
					$('#submit-acara').click(function(){
						//filter
						$(this).attr("disabled","true");
						LoadingBar.openBar("Sending data to server ...");
						j('#setAjax').setAjax({
							methode : "POST",
							url : base_url+"Dataacaracontrol/menambahDataAcara",
							bool : true,
							content : 
							"tanggal="+$('#tanggal').val()+"&"+
							"jam="+$('#jam').val()+"&"+
							"namaacara="+$('#nama_acara').val()+"&"+
							"penyelenggara="+$('#penyelenggara').val(),
							sucOk : function(a){
								LoadingBar.setMessageBar("Processing response");
								if(a[0] == "1"){
									$('#submit-acara').removeAttr("disabled");
									$('#tanggal').val("");
									$('#jam').val("");
									$('#nama_acara').val("");
									$('#penyelenggara').val("");
									$('#add-acara-message').slideToggle('slow');
									LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									startTableAcara();
									setTimeout(function(){
										LoadingBar.closeBar();
									},2000);
								}else{
									$('#submit-acara').removeAttr("disabled");
									LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									setTimeout(function(){
										LoadingBar.closeBar();
									},2000);
								}
							},
							sucEr : function(a,b){
								template(a,b,"Process new Event ...");
							}
						});
					});
				},1000);
			}else{
				$("#content-place-acara").html(a.substr(1,a.length-1));
			}
        },
        sucEr : function(a,b){
            template(a,b,"Rfresh Acara ...");
        }
    });
}
function refreshTablePreviewAcara(){
	LoadingBar.openBar('sending data to server ...');
	j('#setAjax').setAjax({
		methode : "POST",
		url : base_url+"Formdataacara/tampilPreviewDataAcara",
		bool : true,
		content : "CODE=JASERVTECH",
		sucOk : function(a){
			LoadingBar.setMessageBar('Processing message ...');
			if(a[0] == '1'){
				LoadingBar.setMessageBar("prepare table ...");
				$('#template-edit-acara').height($(".up-content").height()-45);
				$('#content-edit-table-acara').html(a.substr(1,a.length-1));
				
			}else{
				LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
				
			}
			setTimeout(function(){
				LoadingBar.closeBar();
			},2000);
		},
		sucEr : function(a,b){
			template(a,b,"Process Data Acara Preview ...")
		}
	});
}
var pauseTableAcara = true;
var pauseJamAcara = true;
var temp2=null;
var temp=null;
var temp1 = null;
var temp3=null;
var loop = 1;
var loopJ = 0;
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
function tryReRef(){
	reLoadTable();
}
function watchMe(){
    if(pauseJamAcara){
        return;
    }
	setTimeout(function(){
		var xx = new Date();
		var cold = document.getElementById('watch-me').innerHTML = xx.getHours()+":"+xx.getMinutes()+":"+xx.getSeconds();
		watchMe();
	},100);
}