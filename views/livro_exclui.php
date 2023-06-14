<?php     
include("../bd/conexao.php");     
include("../controls/livro.php");         
    $id=$_GET['id'];     
    if(excluir_livro($conexao,$id)) {        
        header("Location: livro_lista.php");        
        die(); 
    }            
?> 
