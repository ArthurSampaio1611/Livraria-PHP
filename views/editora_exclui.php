<?php     
include("../bd/conexao.php");     
include("../controls/editora.php");         
    $id=$_GET['id'];     
    if(excluir_editora($conexao,$id)) {        
        header("Location: editora_lista.php");        
        die(); 
    }            
?> 
