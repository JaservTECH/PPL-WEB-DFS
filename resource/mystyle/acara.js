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
						
					});
					$('#add-acara').click(function(){
						$('#add-acara-message').slideToggle('slow');
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