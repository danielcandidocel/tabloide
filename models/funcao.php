<?php
class funcao extends model {
    
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