<?php     
    include("../bd/conexao.php"); 
    include("../controls/categoria.php"); 
    $id=$_GET['id']; 
    $categoria=buscar_categoria($conexao, $id); 
?> 
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Alterar Categoria</title> 
    
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
            <div id="titulo">Alterar Categoria</div> 
            <form action="" method="post"> 
                <label name="lbl_id">Código</label>         
                <input class="input" type="number" name="id" value="<?=$categoria['id_categoria']?>" readonly> 
                <br> 
                <label name="lbl_des">Descrição da categoria</label> 
                <input class="input" type="text" name="desc" value="<?=$categoria['descricao']?>" placeholder="Digite a descrição da categoria"> 
                <br> 
                <input class="btn" type="submit" value="Alterar"> 
            </form> 
            <?php       
                if($_POST) { 
                    $id=$_POST['id'];             
                    $desc=$_POST['desc'];             
                    if(alterar_categoria($conexao, $desc, $id)) {                 
                        header("Location: categoria_lista.php");         
                        die();  
                    } else { 
                        $msg=mysqli_error($conexao);                 
                        echo ($msg); 
                    } 
                } 
            ?> 
        </div>   
    </main>
</body> 
</html> 
