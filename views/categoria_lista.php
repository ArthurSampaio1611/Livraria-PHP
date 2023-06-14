<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Lista de Categorias</title> 
    
    <link rel="stylesheet" href="../public/css/style_lista.css">
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
        <div class="lista">
            <div id="titulo">Categorias:</div> 
            <table border="1"> 
                <tr> 
                    <td>ID</td> 
                    <td>Descrição</td> 
                    <td>Alterar</td> 
                    <td>Excluir</td> 
                </tr>         
                
                <?php             
                    include("../bd/conexao.php");             
                    include("../controls/categoria.php");             
                    $categorias=listar_categoria($conexao);             foreach ($categorias as $categoria): 
                ?> 
                
                <tr> 
                    <td> <?=$categoria['id_categoria'] ?> </td> 
                    <td> <?=$categoria['descricao'] ?> </td> 
                    <td class="btn"> <a href="categoria_altera.php?id=<?=$categoria['id_categoria']?>">Alterar</a></td>
                    <td class="btn"> <a href="categoria_exclui.php?id=<?=$categoria['id_categoria']?>">Excluir</a></td> 
                </tr>

                <?php
                    endforeach; 
                ?> 
            </table>
            <div class="link"><a href="categoria_cad.php">CADASTRAR CATEGORIA</div>
        </div>  
    </main>   
</body> 
</html> 
