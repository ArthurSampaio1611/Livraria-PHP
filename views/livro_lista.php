<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Lista de Livros</title> 
    
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
            <div id="titulo">Livros:</div> 
            <table border="1"> 
                <tr> 
                    <td>ID</td> 
                    <td>Título</td>
                    <td>Editora</td> 
                    <td>Categoria</td> 
                    <td>Autor</td>  
                    <td>Quantidade</td> 
                    <td>Alterar</td> 
                    <td>Excluir</td> 
                </tr>   

                <?php             
                    include("../bd/conexao.php");             
                    include("../controls/livro.php");             
                    $livros=listar_livro($conexao);             
                    foreach ($livros as $livro):
                ?> 

                <tr> 
                    <td><?=$livro['id_livro'] ?></td> 
                    <td><?=$livro['titulo'] ?></td> 
                    <td><?=$livro['editora'] ?></td> 
                    <td><?=$livro['categoria'] ?></td> 
                    <td><?=$livro['autor'] ?></td> 
                    <td><?=$livro['qtd'] ?></td> 
                    <td class="btn"><a href="livro_altera.php?id=<?=$livro['id_livro']?>">Alterar</a></td> 
                    <td class="btn"><a href="livro_exclui.php?id=<?=$livro['id_livro']?>">Excluir</a></td> 
                </tr> 
                
                <?php 
                    endforeach; 
                ?> 
            </table>  
            <div class="link"><a href="livro_cad.php">CADASTRAR LIVRO</div>  
        </div>
    </main>   
</body> 
</html> 

