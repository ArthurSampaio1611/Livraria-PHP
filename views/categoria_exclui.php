<?php     
include("../bd/conexao.php");     
include("../controls/categoria.php");             
    $id=$_GET['id'];     
    if(excluir_categoria($conexao,$id)) {         
            header("Location: categoria_lista.php");         
            die(); 
        }            
?> 
