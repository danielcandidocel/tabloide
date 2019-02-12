<?php

class homeController extends controller {
    public function index() {
        $dados = array();
        if(isset($_SESSION['xmlLogin']) && !empty($_SESSION['xmlLogin'])){
        global $config;
        
        $ip = $_SERVER['REMOTE_ADDR'];
        //função para derrubar o usuario logado em outra maquina
        // if($u->getIpUser($ip, $_SESSION['xmlLogin'])){
        //     unset($_SESSION['xmlLogin']);
        //     header("Location: ".BASE_URL); 
        // }
        
        
        $this->loadTemplate('painel', $dados);
        
        } else {
            $this->loadTemplate('login', $dados);
        }
    } 
    public function enviar(){
    	$dados['arquivos'] = $_FILES['arquivo'];
    	$n = 0;
		$x = 0;
    	if(count($_FILES['arquivo']['tmp_name']) > 0){
    		for($q=0;$q<count($_FILES['arquivo']['tmp_name']);$q++){
    			$nome = $_FILES['arquivo']['name'][$q];
    			$t = explode('.', $nome);
    			
    			if ($t[1] == 'xml') {
    				move_uploaded_file($_FILES['arquivo']['tmp_name'][$q], 'arquivo/novo/'.$nome);
    				$x++;
    			} else {
    				$n++;
    			}    			
    		}
    		$dados['naoXML'] = $n;
    		$dados['XML'] = $x;

		$d = dir("arquivo/novo/");
		$b = -2;
		while (false !== ($entry = $d->read())) {		 
			$b++;
		}
		$dados['totalArquivos'] = $b;
    	}
    	$this->loadTemplate('enviar', $dados);
    }
    public function processo() {
        $dados = array();
        $f = new funcao();

        $path = "arquivo/novo/";
		$diretorio = dir($path);	

	   	$d = dir("arquivo/novo/");
		$n = -2;
		while (false !== ($entry = $d->read())) {		 
			$n++;
		}
		
		$d->close();
		
	   	if ($n > 0) {
	
		while($arquivo = $diretorio -> read()){
			$a = explode('.', $arquivo);
			if($a[1] == 'xml'){
				$xml = simplexml_load_file('arquivo/novo/'.$a[0].".xml");

				$json = json_encode($xml);

				$array = json_decode($json,TRUE);
				
				if (isset($array['NFe']['infNFe']['ide']['cUF']) && !empty($array['NFe']['infNFe']['ide']['cUF'])) {
					$cUF = $array['NFe']['infNFe']['ide']['cUF'];
				} else {	
					$cUF = '';
				}				
				if (isset($array['NFe']['infNFe']['ide']['cNF']) && !empty($array['NFe']['infNFe']['ide']['cNF'])) {
					$cNF = $array['NFe']['infNFe']['ide']['cNF'];
				} else {	
					$cNF = '';
				}
				if (isset($array['NFe']['infNFe']['ide']['natOp']) && !empty($array['NFe']['infNFe']['ide']['natOp'])) {
					$natOp = $array['NFe']['infNFe']['ide']['natOp'];
				} else {	
					$natOp = '';
				}
				if (isset($array['NFe']['infNFe']['ide']['mod']) && !empty($array['NFe']['infNFe']['ide']['mod'])) {
					$mod = $array['NFe']['infNFe']['ide']['mod'];
				} else {	
					$mod = '';
				}
				if (isset($array['NFe']['infNFe']['ide']['serie']) && !empty($array['NFe']['infNFe']['ide']['serie'])) {
					$serie = $array['NFe']['infNFe']['ide']['serie'];
				} else {	
					$serie = '';
				}
				if (isset($array['NFe']['infNFe']['ide']['nNF']) && !empty($array['NFe']['infNFe']['ide']['nNF'])) {
					$nNF = $array['NFe']['infNFe']['ide']['nNF'];
				} else {	
					$nNF = '';
				}
				if (isset($array['NFe']['infNFe']['ide']['dhEmi']) && !empty($array['NFe']['infNFe']['ide']['dhEmi'])) {
					$dh = $array['NFe']['infNFe']['ide']['dhEmi'];
					$d = explode('T', $dh);
					$dhEmi = $d[0];
				} else {	
					$dhEmi = '';
				}				
				if (isset($array['NFe']['infNFe']['ide']['dhSaiEnt']) && !empty($array['NFe']['infNFe']['ide']['dhSaiEnt'])) {
					$dh1 = $array['NFe']['infNFe']['ide']['dhSaiEnt'];
					$d2 = explode('T', $dh1);
					$dhSaiEnt = $d2[0];
					
				} else {	
					$dhSaiEnt = '';
				}
				if (isset($array['NFe']['infNFe']['ide']['tpNF']) && !empty($array['NFe']['infNFe']['ide']['tpNF'])) {
					$tpNF = $array['NFe']['infNFe']['ide']['tpNF'];
				} else {	
					$tpNF = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['CNPJ']) && !empty($array['NFe']['infNFe']['emit']['CNPJ'])) {
					$emit_CNPJ = $array['NFe']['infNFe']['emit']['CNPJ'];
				} else {	
					$emit_CNPJ = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['xNome']) && !empty($array['NFe']['infNFe']['emit']['xNome'])) {
					$xNome = $array['NFe']['infNFe']['emit']['xNome'];
				} else {	
					$xNome = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['xLgr']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['xLgr'])) {
					$xLgr = $array['NFe']['infNFe']['emit']['enderEmit']['xLgr'];
				} else {	
					$xLgr = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['nro']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['nro'])) {
					$nro = $array['NFe']['infNFe']['emit']['enderEmit']['nro'];
				} else {	
					$nro = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['xBairro']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['xBairro'])) {
					$xBairro = $array['NFe']['infNFe']['emit']['enderEmit']['xBairro'];
				} else {	
					$xBairro = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['cMun']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['cMun'])) {
					$cMun = $array['NFe']['infNFe']['emit']['enderEmit']['cMun'];
				} else {	
					$cMun = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['xMun']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['xMun'])) {
					$xMun = $array['NFe']['infNFe']['emit']['enderEmit']['xMun'];
				} else {	
					$xMun = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['UF']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['UF'])) {
					$UF = $array['NFe']['infNFe']['emit']['enderEmit']['UF'];
				} else {	
					$UF = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['CEP']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['CEP'])) {
					$CEP = $array['NFe']['infNFe']['emit']['enderEmit']['CEP'];
				} else {	
					$CEP = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['cPais']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['cPais'])) {
					$cPais = $array['NFe']['infNFe']['emit']['enderEmit']['cPais'];
				} else {	
					$cPais = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['xPais']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['xPais'])) {
					$xPais = $array['NFe']['infNFe']['emit']['enderEmit']['xPais'];
				} else {	
					$xPais = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['enderEmit']['fone']) && !empty($array['NFe']['infNFe']['emit']['enderEmit']['fone'])) {
					$fone = $array['NFe']['infNFe']['emit']['enderEmit']['fone'];
				} else {	
					$fone = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['IE']) && !empty($array['NFe']['infNFe']['emit']['IE'])) {
					$IE = $array['NFe']['infNFe']['emit']['IE'];
				} else {	
					$IE = '';
				}
				if (isset($array['NFe']['infNFe']['emit']['CRT']) && !empty($array['NFe']['infNFe']['emit']['CRT'])) {
					$CRT = $array['NFe']['infNFe']['emit']['CRT'];
				} else {	
					$CRT = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['CPF']) && !empty($array['NFe']['infNFe']['dest']['CPF'])) {
					$CPF = $array['NFe']['infNFe']['dest']['CPF'];
				} else {	
					$CPF = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['xNome']) && !empty($array['NFe']['infNFe']['dest']['xNome'])) {
					$xNome_rem = $array['NFe']['infNFe']['dest']['xNome'];
				} else {	
					$xNome_rem = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['xLgr']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['xLgr'])) {
					$dest_xLgr = $array['NFe']['infNFe']['dest']['enderDest']['xLgr'];
				} else {	
					$dest_xLgr = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['nro']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['nro'])) {
					$dest_nro = $array['NFe']['infNFe']['dest']['enderDest']['nro'];
				} else {	
					$dest_nro = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['xBairro']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['xBairro'])) {
					$dest_xBairro = $array['NFe']['infNFe']['dest']['enderDest']['xBairro'];
				} else {	
					$dest_xBairro = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['cMun']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['cMun'])) {
					$dest_cMun = $array['NFe']['infNFe']['dest']['enderDest']['cMun'];
				} else {	
					$dest_cMun = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['xMun']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['xMun'])) {
					$dest_xMun = $array['NFe']['infNFe']['dest']['enderDest']['xMun'];
				} else {	
					$dest_xMun = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['UF']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['UF'])) {
					$dest_UF = $array['NFe']['infNFe']['dest']['enderDest']['UF'];
				} else {	
					$dest_UF = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['CEP']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['CEP'])) {
					$dest_CEP = $array['NFe']['infNFe']['dest']['enderDest']['CEP'];
				} else {	
					$dest_CEP = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['cPais']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['cPais'])) {
					$dest_cPais = $array['NFe']['infNFe']['dest']['enderDest']['cPais'];
				} else {	
					$dest_cPais = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['enderDest']['xPais']) && !empty($array['NFe']['infNFe']['dest']['enderDest']['xPais'])) {
					$dest_xPais = $array['NFe']['infNFe']['dest']['enderDest']['xPais'];
				} else {	
					$dest_xPais = '';
				}
				if (isset($array['NFe']['infNFe']['dest']['indIEDest']) && !empty($array['NFe']['infNFe']['dest']['indIEDest'])) {
					$dest_indIEDest = $array['NFe']['infNFe']['dest']['indIEDest'];
				} else {	
					$dest_indIEDest = '';
				}
							
				
				
				$d = $array['NFe']['infNFe']['ide']['dhEmi'];
				$d1 = explode('T', $d);
				$data = $d1[0];

				$nomeArquivo = $a[0];
				
				// $id = $f->registro($nomeArquivo, $cUF, $cNF, $natOp, $mod, $serie, $nNF, $dhEmi, $dhSaiEnt, $tpNF, $emit_CNPJ, $xNome, $xLgr, $nro, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone, $IE, $CRT, $CPF, $xNome_rem, $dest_xLgr, $dest_nro, $dest_xBairro, $dest_cMun, $dest_xMun, $dest_UF, $dest_CEP, $dest_cPais, $dest_xPais, $dest_indIEDest, $data);

// echo '<pre>';print_r($array);exit;
				
				foreach ($array['NFe']['infNFe']['det'] as $value) {
					
					if (isset($value['@attributes']['nItem']) && !empty($value['@attributes']['nItem'])) {
						$nItem = $value['@attributes']['nItem'];
					} else {	
						$nItem = '';
					}
					if (isset($value['prod']['cProd']) && !empty($value['prod']['cProd'])) {
						$cProd = $value['prod']['cProd'];
					} else {	
						$cProd = '';
					}
					if (isset($value['prod']['cEAN']) && !empty($value['prod']['cEAN'])) {
						$cEAN = $value['prod']['cEAN'];
					} else {	
						$cEAN = '';
					}
					if (isset($value['prod']['xProd']) && !empty($value['prod']['xProd'])) {
						$xProd = $value['prod']['xProd'];
					} else {	
						$xProd = '';
					}
					if (isset($value['prod']['NCM']) && !empty($value['prod']['NCM'])) {
						$NCM = $value['prod']['NCM'];
					} else {	
						$NCM = '';
					}
					if (isset($value['prod']['CEST']) && !empty($value['prod']['CEST'])) {
						$CEST = $value['prod']['CEST'];
					} else {	
						$CEST = '';
					}
					if (isset($value['prod']['indEscala']) && !empty($value['prod']['indEscala'])) {
						$indEscala = $value['prod']['indEscala'];
					} else {	
						$indEscala = '';
					}
					if (isset($value['prod']['CFOP']) && !empty($value['prod']['CFOP'])) {
						$CFOP = $value['prod']['CFOP'];
					} else {	
						$CFOP = '';
					}
					if (isset($value['prod']['uCom']) && !empty($value['prod']['uCom'])) {
						$uCom = $value['prod']['uCom'];
					} else {	
						$uCom = '';
					}
					if (isset($value['prod']['qCom']) && !empty($value['prod']['qCom'])) {
						$qCom = $value['prod']['qCom'];
					} else {	
						$qCom = '';
					}
					if (isset($value['prod']['vUnCom']) && !empty($value['prod']['vUnCom'])) {
						$vUnCom = $value['prod']['vUnCom'];
					} else {	
						$vUnCom = '';
					}
					if (isset($value['prod']['vProd']) && !empty($value['prod']['vProd'])) {
						$vProd = $value['prod']['vProd'];
					} else {	
						$vProd = '';
					}
					if (isset($value['prod']['cEANTrib']) && !empty($value['prod']['cEANTrib'])) {
						$cEANTrib = $value['prod']['cEANTrib'];
					} else {	
						$cEANTrib = '';
					}
					if (isset($value['prod']['uTrib']) && !empty($value['prod']['uTrib'])) {
						$uTrib = $value['prod']['uTrib'];
					} else {	
						$uTrib = '';
					}
					if (isset($value['prod']['qTrib']) && !empty($value['prod']['qTrib'])) {
						$qTrib = $value['prod']['qTrib'];
					} else {	
						$qTrib = '';
					}
					if (isset($value['prod']['vUnTrib']) && !empty($value['prod']['vUnTrib'])) {
						$vUnTrib = $value['prod']['vUnTrib'];
					} else {	
						$vUnTrib = '';
					}
					if (isset($value['prod']['vOutro']) && !empty($value['prod']['vOutro'])) {
						$vOutro = $value['prod']['vOutro'];
					} else {	
						$vOutro = '';
					}
					if (isset($value['prod']['indTot']) && !empty($value['prod']['vUnTrindTotib'])) {
						$indTot = $value['prod']['indTot'];
					} else {	
						$indTot = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['orig']) && !empty($value['imposto']['ICMS']['ICMS10']['orig'])) {
						$orig = $value['imposto']['ICMS']['ICMS10']['orig'];
					} else {	
						$orig = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['CST']) && !empty($value['imposto']['ICMS']['ICMS10']['CST'])) {
						$CST = $value['imposto']['ICMS']['ICMS10']['CST'];
					} else {	
						$CST = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['modBC']) && !empty($value['imposto']['ICMS']['ICMS10']['modBC'])) {
						$modBC = $value['imposto']['ICMS']['ICMS10']['modBC'];
					} else {	
						$modBC = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['vBC']) && !empty($value['imposto']['ICMS']['ICMS10']['vBC'])) {
						$vBC = $value['imposto']['ICMS']['ICMS10']['vBC'];
					} else {	
						$vBC = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['pICMS']) && !empty($value['imposto']['ICMS']['ICMS10']['pICMS'])) {
						$pICMS = $value['imposto']['ICMS']['ICMS10']['pICMS'];
					} else {	
						$pICMS = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['vICMS']) && !empty($value['imposto']['ICMS']['ICMS10']['vICMS'])) {
						$vICMS = $value['imposto']['ICMS']['ICMS10']['vICMS'];
					} else {	
						$vICMS = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['modBCST']) && !empty($value['imposto']['ICMS']['ICMS10']['modBCST'])) {
						$modBCST = $value['imposto']['ICMS']['ICMS10']['modBCST'];
					} else {	
						$modBCST = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['pMVAST']) && !empty($value['imposto']['ICMS']['ICMS10']['pMVAST'])) {
						$pMVAST = $value['imposto']['ICMS']['ICMS10']['pMVAST'];
					} else {	
						$pMVAST = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['vBCST']) && !empty($value['imposto']['ICMS']['ICMS10']['vBCST'])) {
						$vBCST = $value['imposto']['ICMS']['ICMS10']['vBCST'];
					} else {	
						$vBCST = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['pICMSST']) && !empty($value['imposto']['ICMS']['ICMS10']['pICMSST'])) {
						$pICMSST = $value['imposto']['ICMS']['ICMS10']['pICMSST'];
					} else {	
						$pICMSST = '';
					}
					if (isset($value['imposto']['ICMS']['ICMS10']['vICMSST']) && !empty($value['imposto']['ICMS']['ICMS10']['vICMSST'])) {
						$vICMSST = $value['imposto']['ICMS']['ICMS10']['vICMSST'];
					} else {	
						$vICMSST = '';
					}
					// $cod_produto = $value['prod']['cProd'];
					// if (isset($value['prod']['cEAN']) && !empty($value['prod']['cEAN'])) {
					// 	$ean_produto = $value['prod']['cEAN'];
					// } else {
					// 	$ean_produto = '';
					// }
					
					// $nome_produto = $value['prod']['xProd'];
					// $f->produtos($id, $cod_produto, $ean_produto, $nome_produto);			
				}
					$origem = 'arquivo/novo/'.$a[0].".xml";
					$destino = 'arquivo/processado/'.$a[0].".xml";
					copy($origem, $destino);
					unlink($origem);
			}		
			
		}
			$dados['retorno'] = $n. ' Arquivo(s) Processado(s)';
		} else {
			$dados['retorno'] = 'Não há arquivos a serem processados';
		}
		$diretorio -> close();
	    $this->loadTemplate('home', $dados);//loadView é uma função do arquivo core/controller.php.
    }
   
    }


