var produtos = [];
var qtdeProdutos = 0;
var tema = 0;
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
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
    produtos.length = 0;
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
    var l = id.value;
    if (l === "0") {
        document.querySelector("#qtde_produtos").style.display = 'none';
        document.querySelector("#add_produtos").style.display = 'none';
    } else {
        document.querySelector("#qtde_produtos").style.display = 'block';
    }
}
function qtde(id){
    var qt = id.value;
    if (qt === "0") {
        document.querySelector("#add_produtos").style.display = 'none';
    } else {
        document.querySelector("#add_produtos").style.display = 'block';
    }
}

function addProdutos(){
    window.tema = $('select[name=templates]').val(); 
    window.qtdeProdutos = $('select[name=qt]').val(); 
    var q = '';
    q = window.produtos.length+'/'+window.qtdeProdutos;
    $('#qtAdd').html(q);
    
     $('#escolherLayout').modal('hide');
     
     $.ajax({
        url:BASE_URL+"produtos/getProdutos",        
        dataType:'json',
        success:function(json){ 
            var html = '';
           
            for(var i in json){
            html += '<tr class="tabela-produtos" >';
            html += '<td><img src="'+BASE_URL+'assets/images/produtos/'+json[i].id+'.png"></td>';
            html += '<td>'+json[i].nome+'</td>';
            html += '<td><span class="btn btn-primary" onclick="add('+json[i].id+')">Adicionar</span></td>';
            html += '</tr>';
                 
            }
            $('#myTable').html(html);
        }, error:function(erro){
            console.log(erro);
        }
    });    
    
    $('#adicionarProdutos').modal('show');
}

function add(id){
    if (produtos.length >= window.qtdeProdutos) {
        var html = '';                
            html += '<p><strong>Alerta!</strong> <br/>';
            html += '<strong>Você Já Adicionou a Quantidade Necessária!</strong></p><br>';
            $('#alertas').html(html);
        
            $('#alerta').modal('show');
    } else {
        var lugar = produtos.indexOf(id);
        if ( lugar > -1) {
            var html = '';                
            html += '<p><strong>Alerta!</strong> <br/>';
            html += '<strong>Produto Já Adicionado!</strong></p><br>';
            $('#alertas').html(html);
        
            $('#alerta').modal('show');
        } else {

            produtos.push(id);
            viewRelacao();
        }
    }
}
function viewRelacao(){
    var x = window.qtdeProdutos - produtos.length;
    if ( x === 0 ) {
        document.querySelector(".produtos_adicionados p").style.display = 'block';
    } else {
        document.querySelector(".produtos_adicionados p").style.display = 'none';
    }
    var q = '';
    q = produtos.length+'/'+window.qtdeProdutos;
    $('#qtAdd').html(q);
    if (produtos.length > 0) {
        var html = '';
       
        for(var i in produtos){
            var id = produtos[i];
            $.ajax({
                type:'POST',
                url:BASE_URL+"produtos/getProduto",  
                data:{                
                    id:id
                 },      
                dataType:'json',
                success:function(json){                             
                    html += ' <div class="prod"><span onclick="dellProduto('+json.id+')"><img src="'+BASE_URL+'assets/images/produtos/'+json.id+'.png"></span></div>';
                   $('.relacao').html(html);                                  
                }, error:function(erro){
                    console.log(erro);
                }
            });   
        
        }
        
    }
}
function dellProduto(id){
    var lugar = produtos.indexOf(id);
    if ( lugar > -1) {
        produtos.splice(lugar, 1);
    }
    viewRelacao();
}
function gerarTabloide(){
    var j = JSON.stringify(produtos);
    window.localStorage.setItem('produtos', j);
    var tema = window.tema;
    window.setTimeout("location.href='"+BASE_URL+"tabloide/imprimirTabloide?layout="+tema+"'");
}
function listaProdutos(){

var j2 = window.localStorage.getItem('produtos');

var prods = JSON.parse(j2);
console.log(prods);
var c = 0;
var html = '';
        for(var i in prods){
            var id = prods[i];
            $.ajax({
                type:'POST',
                url:BASE_URL+"produtos/getProduto",  
                data:{                
                    id:id
                 },      
                dataType:'json',
                success:function(json){ console.log(json);
                    var r = json.valor.split(".");
                    var v1 = r[0];
                    var v2 = r[1];

                    if(c === 0){
                        html += '<div class="produtos">';                           
                    }                    
                    html += '<div class="produtos_produto">'; 
                    html += '<div class="produtos_img">';
                    html += '<img src="'+BASE_URL+'assets/images/produtos/'+json.id+'.png">';
                    html += '</div>';
                    html += '<div class="produtos_info">';
                    html += '<div class="produtos_desc">';
                    html += '<span>'+json.nome+'</span>';
                    html += '</div>';
                    html += '<div class="produto_price">';
                    html += '<span id="r">R$</span>';
                    html += '<div class="produto_price_valor">';
                    html += '<span id="v1">'+v1+',</span>';
                    html += '<span id="v2">'+v2+'</span>';
                    html += '</div></div></div></div>';
                    c += 1;
                    if(c === 3){
                        html += '</div>';
                        c = 0;
                    }
                    $('.template_produtos').html(html);       
                }, error:function(erro){
                    console.log(erro);
                }
            });   
        
        }
    
        // <div class="dados">
        //         <p>Obs:</p>
        //         <p>Validade:</p>
        //     </div>
}
function teste(){
        // var layout = $('select[name=templates]').val(); 
        // var qtde = $('select[name=qt]').val(); 
    $('#escolherLayout').modal('hide');
    $('#adicionarProdutos').modal('show');


    // window.setTimeout("location.href='"+BASE_URL+"tabloide/imprimirTabloide?layout="+layout+"'");
    
}