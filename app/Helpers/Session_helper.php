<?php
    
    function pesan($parameter=""){
        $session = session();
        if($parameter=="error"){
            return $session->getFlashdata('error');
        }else{
            return $session->getFlashdata('message');   
        }
    }
    
    function sess($parameter){
        $session = session();
        if($parameter == 'active_user_id'){
            return $session->get('activeId');
        }else if($parameter == 'active_username'){
            return $session->get('username');
        }else if($parameter == 'active_user_name'){
            return $session->get('nama');
        }
    }

    function sessActiveRole(){
        $session = session();
        return $session->get('role');
    }

    function sessUserSignature(){
        $session = session();
        return $session->get('signatureFile');
    }
    
?>
