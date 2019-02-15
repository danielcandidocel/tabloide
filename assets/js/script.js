
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
function cadastroProduto(){
    $('#cadastro').modal('show');
}
function cadastrarProdutos(){
event.preventDefault();
document.querySelector("#txtCampos").style.display = 'none';
document.querySelector("#imgCampos").style.display = 'none';

    var imagem = document.querySelector('input[name=imagemProduto').files[0];
   
    if ($('input[name="produto-nome"]').val() <= 0 || $('input[name="produto-valor"]').val() <= 0){
        document.querySelector("#txtCampos").style.display = 'block';
        $('#campos').modal('show');
    } else  if(imagem){
        document.getElementById("formProduto").submit();
    }else {
        document.querySelector("#imgCampos").style.display = 'block';
        $('#campos').modal('show');
    }
   
}


function previewImagem(){
    
    var imagem = document.querySelector('input[name=imagemProduto').files[0];
    var preview = document.querySelector('img[name=fotoProduto]');
    var reader = new FileReader();
    reader.onloadend = function() {        
        preview.src = reader.result;
    }
    if(imagem){
        reader.readAsDataURL(imagem);
    }else {
        preview.src = "";
    }
}
$('#fotoProduto').click(function(){
  $('#imagemProduto').click();
});
function produtoExcluir(id){
    var html = '';                
        html += '<p><strong>Alerta!</strong> <br/>';
        html += '<strong>Deseja Realmente Excluir o Produto?</strong></p><br>';
        html += '<button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>';
        html += '<button type="button" class="btn btn-danger" onclick="excluirProduto('+id+')">Sim</button>';
    $('#modalAlert').html(html);
    
    $('#excluir').modal('show');
}
function excluirProduto(id){    
   $.ajax({
    type:'POST',
    url:BASE_URL+"produtos/excluir",
    data:{                
         id:id           
     },
    success:function(){            
        window.setTimeout("location.href='"+BASE_URL+"produtos/listar'",500); 
    }
 });
}
function criarTabloide(){
 
    $('#escolherLayout').modal('show');
    $.ajax({
        url:BASE_URL+"template/getLayout",        
        dataType:'json',
        success:function(json){ 
            var html = '<option value="0"></option>';
            cat = json.length;
            for(var i in json){
                // html += '';
                html += '<option value="'+json[i].id+'">'+json[i].nome+'</option>';
            }
            $('#templates').html(html);
        }, error:function(erro){
            console.log(erro);
        }
     });    
}
function layout(id){
    var id = id.value;
    if (id === "0") {
        document.querySelector("#qtde_produtos").style.display = 'none';
        document.querySelector("#add_produtos").style.display = 'none';
    } else {
        document.querySelector("#qtde_produtos").style.display = 'block';
    }
}
function qtde(id){
    var id = id.value; 
    if (id === "0") {
        document.querySelector("#add_produtos").style.display = 'none';
    } else {
        document.querySelector("#add_produtos").style.display = 'block';
    }
}
function teste(){
    var layout = $('select[name=templates]').val(); 
    var qtde = $('select[name=qtde]').val(); 
    alert(layout);
    alert(qtde);
}