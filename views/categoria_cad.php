<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro de Categorias</title> 
    
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
            <div id="titulo">Cadastrar Categoria</div> 
            <form action="" method="post"> 
                <label name="lbl_descricao">Descrição da categoria</label> 
                <input class="input" type="text" name="descricao" placeholder="Digite o nome da categoria"> 
                <input class="btn" type="submit" value="Cadastrar"> 
            </form> 
            <?php     
                include("../bd/conexao.php");     
                include("../controls/categoria.php");             
                if ($_POST) { 
                    $descricao = $_POST['descricao'];                
                    if (inserir_categoria($conexao,$descricao)){                 
                        header("Location: categoria_lista.php");         
                        die(); 
                    } else { 
                        $msg = mysqli_error($conexao);                 
                        echo ($msg); 
                    } 
                } 
            ?> 
            <div class="link"><a href="categoria_lista.php">LISTA DE CATEGORIAS</div>
        </div>   
    </main>            
</body> 
</html> 
