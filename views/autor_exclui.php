<?php     
include("../bd/conexao.php");     
include("../controls/autor.php");         
    $id=$_GET['id'];     
    if(excluir_autor($conexao,$id)) {         
        header("Location: autor_lista.php");         
        die(); 
    }     
?> 
