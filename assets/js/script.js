

//função de login

function logar(){
    
   if($('input[name="name"]').val() <= 0 || $('input[name="senha"]').val() <= 0){
       $('#CamposObrigatorios').modal('show');
   } else {
        var nome = $('input[name=name]').val();
        var senha = $('input[name=senha]').val();
        
        $.ajax({
            url:BASE_URL+"usuarios/login",
            type:'POST',
            data:{                
                nome:nome,
                senha:senha
            },
            
            success:function(c) {
                if (c === '1') {                    
                    var url = document.URL;
                    var r = url.split("/");
                    r.reverse();         
                    if(r[0] != ''){
                    window.setTimeout("location.href='"+BASE_URL+r[1]+"/"+r[0]+"'",1000);
                    } else {
                        window.setTimeout("location.href='"+BASE_URL+"'"); 
                    }
                }  else {
                    $('#loginInvalido').modal('show');
                    // window.setTimeout("location.href='"+BASE_URL+"'",3000); 
                }
            }
        });
   }
}



