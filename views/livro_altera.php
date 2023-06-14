<?php 
    include("../bd/conexao.php"); 
    include("../controls/livro.php"); 
    $id = $_GET['id']; 
    $livro = buscar_livro($conexao, $id); 
?>
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Alterar Livro</title> 
    <link rel="stylesheet" href="../public/css/style_altera.css">
</head> 
<body>
    <nav>        
        <a href="index.php" class="logo"> Sistema Biblioteca </a>
        <form method="GET" action="menu_cliente.php">
            <input id="txt_pesquisa" type="text" name="titulo" placeholder="Pesquisar Livro">
            <input id="btn_pesquisa" type="submit" value="Buscar">

        </form>
    </nav>
    <main>
        <div class="gerenciador">
            <div id="titulo">Alterar Livro</div> 
            <div class="img">  
                    <img src="../public/img/<?=$livro['nome_imagem']?>" id="output">    
            </div>
            <form action="" method="post" enctype="multipart/form-data"> 
                <label>
                    <input class="btn" id="arquivo" type="file" name="txtimg[]" onchange="loadFile(event)">
                </label>
                <br>
                <label name="lbl_id">Código</label> 
                <input class="input" type="number" name="id" value="<?= $livro['id_livro'] ?>" readonly> 
                <br> 
                <label for="titulo">Titulo </label>         
                <input class="input" type="text" name="titulo" placeholder="Titulo" id="" value="<?= $livro['titulo'] ?>"> 
                <br> 
                <label name="lbl_autor">Autor: <?= $livro['autor']?></label>      
                <select class="input" name="autor">
                    <?php             
                        include("../controls/autor.php");             
                        $autores = listar_autor($conexao);             
                        foreach ($autores as $a) :                 
                            echo "<option value=" . $a['id_autor'] . ">" . $a['nome'] . "</option>";            
                        endforeach; 
                ?> 
                </select> 
                <br> 
                <label name="lbl_categoria">Categoria: <?= $livro['categoria'] ?></label>
                <select class="input" name="categoria"> 
                    <?php             
                        include("../controls/categoria.php");             
                        $categorias = listar_categoria($conexao);             
                        foreach ($categorias as $c) :                 
                            echo "<option value=" . $c['id_categoria'] . ">" . $c['descricao'] . "</option>";             
                        endforeach; 
                    ?> 
                </select> 
                <br> 
                <label name="lbl_editora">Editora: <?= $livro['editora'] ?></label> 
                <select class="input" name="editora"> 
                    <?php             
                        include("../controls/editora.php");             
                        $editoras = listar_editora($conexao);             
                        foreach ($editoras as $e) : 
                            echo "<option value=" . $e['id_editora'] . ">" . $e['descricao'] . "</option>"; 
                        endforeach; 
                    ?> 
                </select> 
                <br> 
                <label for="qtd">Quantidade</label>         
                <input class="input" type="number" name="qtd" id="" placeholder="quantidade" value="<?= $livro['qtd'] ?>"> 
                <br> 
                <input class="btn" type="submit" value="Alterar">   
            </form> 
            <?php 
                if ($_POST) { 
                    foreach ($_FILES["txtimg"]["error"] as $key => $valor){
                        if ($valor == UPLOAD_ERR_OK){
                            $temp = $_FILES['txtimg']['tmp_name'][$key];
                            $name = $_FILES ['txtimg']['name'][$key];
                            move_uploaded_file($temp, "../public/img/$name");
                            echo ("nome: $name");
                        }
                    }
                    $foto = $name;
                    $id=$_POST['id']; 
                    $editora=$_POST['editora']; 
                    $categoria=$_POST['categoria']; 
                    $autor=$_POST['autor']; 
                    $titulo=$_POST['titulo']; 
                    $qtd=$_POST['qtd'];   
                    if(alterar_livro($conexao, $editora, $categoria, $autor, $titulo, $foto, $qtd, $id)) {             
                        header("Location: livro_lista.php");        
                        die();
                    } else { 
                        $msg = mysqli_error($conexao);             
                        echo ($msg); 
                    } 
                } 
            ?> 
        </div>
    </main>
</body> 
</html> 
<script>
        function loadFile(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>