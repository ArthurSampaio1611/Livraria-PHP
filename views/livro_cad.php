<?php     
    include("../bd/conexao.php"); 
?> 
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro de Livros</title> 
    <link rel="stylesheet" href="../public/css/style_cadastro.css">
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
            <div id="titulo">Cadastrar Livro</div> 
            <div class="img">  
                    <img id="output">    
            </div>
            <form action="" method="post" enctype="multipart/form-data"> 
                <label>
                    <input class="btn" id="arquivo" type="file" name="txtimg[]" onchange="loadFile(event)">
                </label>
                <br>
                <label for="titulo">Titulo </label>      
                <input class="input" type="text" name="titulo" placeholder="Titulo" id=""> 
                <br> 
                <label name="lbl_autor">Autor</label> 
                <select class="input" name="autor"> 
                    <option value="">Selecione</option> 
                    <?php                        
                        include("../controls/autor.php");              
                        $autores=listar_autor($conexao);             
                        foreach ($autores as $a) : 
                            echo "<option value=". $a['id_autor'] . ">" . $a['nome'] . "</option>"; 
                        endforeach; 
                    ?>                     
                </select> 
                <br> 
                <label name="lbl_categoria">Categoria</label> 
                <select class="input" name="categoria"> 
                    <option value="">Selecione</option>
                    <?php                                 
                        include("../controls/categoria.php");              
                        $categorias=listar_categoria($conexao);             
                        foreach ($categorias as $c) : 
                            echo "<option value=" . $c['id_categoria']. ">" . $c['descricao'] . "</option>"; 
                        endforeach; 
                    ?>                     
                </select> 
                <br> 
                <label name="lbl_editora">Editora</label> 
                <select class="input" name="editora"> 
                    <option value="">Selecione</option> 
                    <?php                                 
                        include("../controls/editora.php");              
                        $editoras=listar_editora($conexao);             
                        foreach ($editoras as $e) : 
                            echo "<option value=" . $e['id_editora'] . ">" . $e['descricao'] . "</option>"; 
                        endforeach; 
                    ?>             
                </select> 
                <br> 
                <label for="qtd">Quantidade</label> 
                <input class="input" type="number" name="qtd" id="" placeholder="quantidade"> 
                <br> 
                <input class="btn" type="submit" value="Cadastrar"> 
            </form> 
            <?php     
                include("../controls/livro.php");             
                if($_POST) { 
                    $nome_foto = "";
                    foreach ($_FILES["txtimg"]["error"] as $key => $valor){
                        if ($valor == UPLOAD_ERR_OK){
                            $temp = $_FILES['txtimg']['tmp_name'][$key];
                            $nome_foto = $_FILES ['txtimg']['name'][$key];
                            move_uploaded_file($temp, "../public/img/$nome_foto");
                        }
                    }
                    echo "<br>";
                    $editora=$_POST['editora']; 
                    $categoria=$_POST['categoria']; 
                    $autor=$_POST['autor']; 
                    $titulo=$_POST['titulo'];             
                    $qtd=$_POST['qtd'];             
                    if(inserir_livro($conexao, $editora, $categoria, $autor, $titulo, $nome_foto, $qtd)) {                 
                        header("Location: livro_lista.php");
                        die();
                    } else { 
                        $msg=mysqli_error($conexao);                 
                        echo ($msg); 
                    } 
                }
            ?>
            <div class="link"><a href="livro_lista.php">LISTA DE LIVROS</div>  
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