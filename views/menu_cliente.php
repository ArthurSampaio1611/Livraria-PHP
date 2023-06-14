<?php
    if($_GET['titulo']){
        $mensagem = $_GET['titulo'];
    }
    else {
        $mensagem = "Buscar Livros";
    }
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Menu Cliente</title> 
    
    <link rel="stylesheet" href="../public/css/style_menu_cliente.css">
</head> 
<body>
<nav>
<a href="index.php" class="logo"> Sistema Biblioteca </a>
<form method="GET" action="menu_cliente.php">
    <input id="txt_pesquisa" type="text" name="titulo" placeholder="<?php echo ("$mensagem");?>">
    <input id="btn_pesquisa" type="submit" value="Buscar">
</form>
</nav>

<main>
    <div class="container">
        <div id="carrossel">
            <?php              
                $titulo = $_GET['titulo'];   
                include("../bd/conexao.php");             
                include("../controls/livro.php");             
                $livros=busca_livro($conexao, $titulo);             
                foreach ($livros as $livro):
            ?>
            <div class="item"> 
                <div class="image">
                    <img src="../public/img/<?= $livro['nome_imagem']?>" id="output">  
                </div>
                <div class="info">
                    <span class="titulo"><?= $livro['titulo']?></span>
                    <span class="categoria"><?= $livro['categoria'] ?></span>
                    <span class="autor"><?= $livro['autor'] ?></span>
                    <span class="editora"><?= $livro['editora'] ?></span> 
                    <span class="quantidade"><?= $livro['qtd'] ?></span> 
                </div>
                <a href="#">Emprestar</a>
            </div>
            <?php 
                endforeach; 
                if(empty($livros)){
                    echo ("nenhum resultado encontrado.");
                }
            ?> 
        </div>
    </div>
</main>

</body>
<script src="../public/js/carrossel.js"></script>
</html>