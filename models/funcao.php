<?php
class funcao extends model {
    
    
    public function registro($nomeArquivo, $cUF, $cNF, $natOp, $mod, $serie, $nNF, $dhEmi, $dhSaiEnt, $tpNF, $emit_CNPJ, $xNome, $xLgr, $nro, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone, $IE, $CRT, $CPF, $xNome_rem, $dest_xLgr, $dest_nro, $dest_xBairro, $dest_cMun, $dest_xMun, $dest_UF, $dest_CEP, $dest_cPais, $dest_xPais, $dest_indIEDest, $data){
        $sql = "INSERT INTO registros SET nome_arquivo = :nome, cUF = :cUF, cNF= :cNF, natOp= :natOp, xmod = :xmod, serie = :serie, nNF = :nNF, dhEmi = :dhEmi, dhSaiEnt = :dhSaiEnt, tpNF = :tpNF, emit_CNPJ = :emit_CNPJ, xNome = :xNome, xLgr = :xLgr, nro = :nro, xBairro = :xBairro, cMun = :cMun, xMun = :xMun, UF = :UF, CEP = :CEP, cPais = :cPais, xPais = :xPais, fone = :fone, IE = :IE, CRT = :CRT, CPF = :CPF, xNome_rem = :xNome_rem, dest_xLgr = :dest_xLgr, dest_nro = :dest_nro, dest_xBairro = :dest_xBairro, dest_cMun = :dest_cMun,  dest_xMun = :dest_xMun, dest_UF = :dest_UF, dest_CEP = :dest_CEP, dest_cPais = :dest_cPais, dest_xPais = :dest_xPais, dest_indIEDest = :dest_indIEDest, data_arquivo = :data";
        $sql = $this->db->prepare($sql);             
        $sql->bindValue(":nome", $nomeArquivo);  
        $sql->bindValue(":cUF", $cUF);
        $sql->bindValue(":cNF", $cNF);
        $sql->bindValue(":natOp", $natOp);
        $sql->bindValue(":xmod", $mod);
        $sql->bindValue(":serie", $serie);
        $sql->bindValue(":nNF", $nNF);
        $sql->bindValue(":dhEmi", $dhEmi);
        $sql->bindValue(":dhSaiEnt", $dhSaiEnt);
        $sql->bindValue(":tpNF", $tpNF);
        $sql->bindValue(":emit_CNPJ", $emit_CNPJ);
        $sql->bindValue(":xNome", $xNome);
        $sql->bindValue(":xLgr", $xLgr);
        $sql->bindValue(":nro", $nro);
        $sql->bindValue(":xBairro", $xBairro);
        $sql->bindValue(":cMun", $cMun);
        $sql->bindValue(":xMun", $xMun);
        $sql->bindValue(":UF", $UF);
        $sql->bindValue(":CEP", $CEP);
        $sql->bindValue(":cPais", $cPais);
        $sql->bindValue(":xPais", $xPais);
        $sql->bindValue(":fone", $fone);
        $sql->bindValue(":IE", $IE);
        $sql->bindValue(":CRT", $CRT);
        $sql->bindValue(":CPF", $CPF);
        $sql->bindValue(":xNome_rem", $xNome_rem);
        $sql->bindValue(":dest_xLgr", $dest_xLgr);
        $sql->bindValue(":dest_nro", $dest_nro);
        $sql->bindValue(":dest_xBairro", $dest_xBairro);
        $sql->bindValue(":dest_cMun", $dest_cMun);
        $sql->bindValue(":dest_xMun", $dest_xMun);
        $sql->bindValue(":dest_UF", $dest_UF);
        $sql->bindValue(":dest_CEP", $dest_CEP);
        $sql->bindValue(":dest_cPais", $dest_cPais);
        $sql->bindValue(":dest_xPais", $dest_xPais);
        $sql->bindValue(":dest_indIEDest", $dest_indIEDest);
        $sql->bindValue(":data", $data);        
        $sql->execute();
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function produtos($id, $cod_produto, $ean_produto, $nome_produto){
        $sql = "INSERT INTO produtos SET id_registro = :id, cod_produto = :cod_produto, ean_produto = :ean_produto, nome_produto = :nome_produto";
        $sql = $this->db->prepare($sql);             
        $sql->bindValue(":id", $id);  
        $sql->bindValue(":cod_produto", $cod_produto);
        $sql->bindValue(":ean_produto", $ean_produto);
        $sql->bindValue(":nome_produto", $nome_produto);        
        $sql->execute();        
    }
    
        //verifica o login do usuario
    public function verifyUser($login, $senha){
       
        $sql = "SELECT * FROM user WHERE login = :login AND senha = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->bindValue(":pass", MD5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;    
        } else { return false; }
    }

    //seleciona as informações do usuario
    public function getDadosUser ($id){
        $array = array();
        
        $sql = "SELECT * FROM user WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }        
        return $array;
    }
        //Seleciona os dados do usuario após o login 
    public function getUser($login, $senha){
        $array = array();

        $sql = "SELECT * FROM user WHERE login = :login AND senha = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);        
        $sql->bindValue(":pass", MD5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    public function getIpUser($ip, $id){
        $sql = "SELECT * FROM user WHERE ip = :ip AND id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
        
        if($sql->rowCount() == 0){
            return true;
        }
    }
    public function setIpUser($ip, $id){
        $data = date('Y-m-d H:i:s');
        $sql = "UPDATE user SET ip = :ip, ultimo_acesso = :data WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":data", $data);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
    }
}