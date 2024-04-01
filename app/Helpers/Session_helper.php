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
        if($parameter == 'act_id'){
            return $session->get('activeId');
        }else if($parameter == 'act_username'){
            return $session->get('username');
        }else if($parameter == 'act_nama'){
            return $session->get('nama');
        }
    }
    
?>