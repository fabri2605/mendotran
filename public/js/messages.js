function showMsg(title,message,tipo){
    $.alert({
        title: title,
        content: message,
        type: tipo,
        typeAnimated: true,
        icon: 'mdi mdi-alert-circle '+tipo,
        buttons: {
            tryAgain: {
                text: 'Aceptar',
                btnClass: 'btn-'+tipo,
                close: function(){
                    
                }
            },
           
        }
    });
}
function showConfirm(title,message,tipo,url,metodo,data,token){
    $.confirm({
        title: title,
        content: message,
        icon: 'mdi mdi-alert-circle '+tipo,
        buttons: {
            confirm: function () {
                $.ajax({
                    url: url,
                    method: metodo,
                    data: {
                        data: data,
                        _token:token,
                    },
                }).done(function(data) {
                    if(data.status == 'success'){
                        showMsg('Información!', data.msg,'green');
                        location.reload();
                    }else{
                        showMsg('Advertencia!', data.msg,'red');
                    }
                });
            },
            cancel: function () {
               
            },
        },
        
    });
}
function showConfirmCallBack(title,message,tipo,callback){
    $.confirm({
        title: title,
        content: message,
        icon: 'mdi mdi-alert-circle '+tipo,
        buttons: {
            confirm: function () {
                callback(true);
            },
            cancel: function () {
                callback(false);
            },
        },
        
    });
}