<?php
    include 'crud.php';
    
    if(!$_GET['username']){
        echo "error";
    }else{
        $id=$_GET['username'];

        deleteProfil($id);
    }
?>