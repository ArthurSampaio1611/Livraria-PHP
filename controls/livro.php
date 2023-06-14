<?php
    //função inserir
    function inserir_livro($conexao, $fk_editora, $fk_categoria, $fk_autor, $titulo, $nome_foto, $qtd){
        $sql = "insert into tb_livro values (default, $fk_editora, $fk_categoria, $fk_autor, '$titulo', '$nome_foto', $qtd)";
        return mysqli_query($conexao, $sql);
    }

    //função alterar
    function alterar_livro($conexao, $fk_editora, $fk_categoria, $fk_autor, $titulo, $nome_foto, $qtd, $id_livro){
        $sql = "update tb_livro set
        fk_editora = $fk_editora,
        fk_categoria = $fk_categoria,
        fk_autor = $fk_autor,
        titulo='$titulo',
        nome_img='$nome_foto',
        qtd='$qtd'
        where id_livro=$id_livro";
        return mysqli_query($conexao, $sql);
    }

    //função excluir
    function excluir_livro($conexao, $id_livro){
        $sql = "delete from tb_livro where id_livro=$id_livro";
        return mysqli_query($conexao, $sql);
    }

    //funação listar     
    function listar_livro($conexao){ 
        $livros = array(); 
        $resultado = mysqli_query($conexao, "select * from view_livro");         
        while ($livro = mysqli_fetch_assoc($resultado)) {             
            array_push ($livros, $livro); 
        }         
        return $livros; 
    } 

    //função buscar
    function buscar_livro($conexao, $id_livro){
        $resultado = mysqli_query($conexao, "select * from view_livro where id_livro=$id_livro");
        return mysqli_fetch_assoc($resultado);
    }

    //função busca
    function busca_livro($conexao, $titulo){
        $livros = array(); 
        $resultado = mysqli_query($conexao, "select * from view_livro where titulo like '%$titulo%'");         
        while ($livro = mysqli_fetch_assoc($resultado)) {             
            array_push ($livros, $livro); 
        }         
        return $livros; 
    }
?>