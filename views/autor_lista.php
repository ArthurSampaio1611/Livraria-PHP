<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Lista de Autores</title> 
    
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
            <div id="titulo">Autores:</div> 
            <table border="1"> 
                <tr> 
                    <td>ID</td> 
                    <td>Nome</td> 
                    <td>Alterar</td> 
                    <td>Excluir</td> 
                </tr>        
                
                <?php             
                    include("../bd/conexao.php");             
                    include("../controls/autor.php");             
                    $autores=listar_autor($conexao);             
                    foreach ($autores as $autor): 
                ?>

                <tr> 
                    <td><?=$autor['id_autor'] ?></td> 
                    <td><?=$autor['nome'] ?></td> 
        
                    <td class="btn"><a href="autor_altera.php?id=<?= $autor['id_autor']?>">Alterar</a></td> 
                    <td class="btn"><a href="autor_exclui.php?id=<?= $autor['id_autor']?>">Excluir</a></td> 
                </tr> 

                <?php 
                    endforeach; 
                ?> 
            </table>
            <div class="link"><a href="autor_cad.php">CADASTRAR AUTOR</div>
        </div>   
    </main>  
</body> 
</html> 
