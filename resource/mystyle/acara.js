function refreshTableAcara() {
	pauseTableAcara = true;
	pauseJamAcara = true;
	setTimeout(function(){
		pauseTableAcara = false;
		pauseJamAcara = false;
		reLoadTable();
		watchMe();
		setTimeout(function(){
			startTableAcara();
		},300000);
	},100);
}
$(document).ready(function(){
    startTableAcara();
});
var editAcara = 0;
var addAcara = 0;
function startTableAcara(){
	
	editAcara = 0;
	addAcara = 0;
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
                                                formAcaraActiveEdit = 0;
						$('#add-acara-message').slideUp('slow');
						$('#edit-acara-control').slideToggle('slow');
					});
					$('#add-acara').click(function(){
						editAcara = 0;
						$('#submit-acara').css({
							"display" : "block"
						});
						$('#submit-edit-acara').css({
							"display":"none"
						});
						$('#edit-acara-control').slideUp('slow');
						if(formAcaraActiveEdit == 0){
							$('#tanggal').val("");
							$('#jam').val("");
							$('#nama_acara').val("");
							$('#penyelenggara').val("");
							$('#add-acara-message').slideToggle('slow');
						}else{
							formAcaraActiveEdit = 0;
							$('#add-acara-message').slideUp('slow',function(){
								$('#tanggal').val("");
								$('#jam').val("");
								$('#nama_acara').val("");
								$('#penyelenggara').val("");
								$(this).slideDown('slow');
							});
						}
						
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
					$('#submit-edit-acara').click(function(){
						//filter
						$(this).attr("disabled","true");
						
						////LoadingBar.openBar("Sending data to server ...");
						j('#setAjax').setAjax({
							methode : "POST",
							url : base_url+"Dataacaracontrol/mengubahDataAcara",
							bool : true,
							content : 
							"id="+idAcaraActive+"&"+
							"tanggal="+$('#tanggal').val()+"&"+
							"jam="+$('#jam').val()+"&"+
							"namaacara="+$('#nama_acara').val()+"&"+
							"penyelenggara="+$('#penyelenggara').val(),
							sucOk : function(a){
								////LoadingBar.setMessageBar("Processing response");
								if(a[0] == "1"){
									idAcaraActive = 0;
									$('#submit-edit-acara').removeAttr("disabled");
									$('#tanggal').val("");
									$('#jam').val("");
									$('#nama_acara').val("");
									$('#penyelenggara').val("");
									$('#add-acara-message').slideToggle('slow');
									formAcaraActiveEdit = 0;
									////LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									refreshTableAcara();
									$('#edit-acara').trigger('click');
									setTimeout(function(){
										////LoadingBar.closeBar();
									},2000);
								}else{
									$('#submit-edit-acara').removeAttr("disabled");
									////LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									setTimeout(function(){
										////LoadingBar.closeBar();
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
                    refreshTableAcara();
			}
        },
        sucEr : function(a,b){
			if(parseInt(a) == 4 && parseInt(b) == 0)
				startTableAcara();
			if(parseInt(b) > 400)
				startTableAcara();
            //template(a,b,"Rfresh Acara ...");
        }
    });
}
function dropEvent(id){
	ModalAlert().onYes(function(){
		////LoadingBar.openBar('Deleting event ...');
		j('#setAjax').setAjax({
			methode : "POST",
			url : base_url+"Dataacaracontrol/menghapusDataAcara",
			bool : true,
			content : "id="+id,
			sucEr : function(a,b){
				template(a,b,'process delete ...')
			},
			sucOk : function(a){
				////LoadingBar.setMessageBar("Processing response ...");
				////LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
				setTimeout(function(){
					////LoadingBar.closeBar();
					if(a[0]=='1'){
						refreshTablePreviewAcara();
					}
				},2000);
			}
		});
	}).onNo(function(){
		
	}).show('Are you sure about this ?');
}
var idAcaraActive=0;
var formAcaraActiveEdit = 0;
function editEvent(id,a){
	formAcaraActiveEdit = 1;
	a=a.parentNode;
	a=a.parentNode;
	$('#tanggal').val(a.childNodes[0].innerHTML);
	$('#jam').val(a.childNodes[1].innerHTML);
	$('#nama_acara').val(a.childNodes[2].innerHTML);
	$('#penyelenggara').val(a.childNodes[3].innerHTML);
	//alert
	editAcara = 0;
	$('#submit-acara').css({
		"display" : "none"
	});
	$('#submit-edit-acara').css({
		"display":"block"
	});
	$('#edit-acara-control').slideUp('slow');
	$('#add-acara-message').slideToggle('slow');
	idAcaraActive = id;
}
function refreshTablePreviewAcara(){
	////LoadingBar.openBar('sending data to server ...');
	j('#setAjax').setAjax({
		methode : "POST",
		url : base_url+"Formdataacara/tampilPreviewDataAcara",
		bool : true,
		content : "CODE=JASERVTECH",
		sucOk : function(a){
			////LoadingBar.setMessageBar('Processing message ...');
			if(a[0] == '1'){
				////LoadingBar.setMessageBar("prepare table ...");
				$('#template-edit-acara').height($(".up-content").height()-45);
				$('#content-edit-table-acara').html(a.substr(1,a.length-1));
				
			}else{
				////LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
				
			}
			setTimeout(function(){
				////LoadingBar.closeBar();
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