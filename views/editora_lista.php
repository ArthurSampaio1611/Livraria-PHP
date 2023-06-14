<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Lista de Editoras</title> 
    
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
            <div id="titulo">Editoras:</div> 
            <table border="1"> 
                <tr> 
                    <td>ID</td> 
                    <td>Descrição</td> 
                    <td>Alterar</td> 
                    <td>Excluir</td> 
                </tr>      
                
                <?php             
                    include("../bd/conexao.php");             
                    include("../controls/editora.php");             
                    $editoras=listar_editora($conexao);             
                    foreach ($editoras as $editora): 
                ?> 

                <tr> 
                    <td><?=$editora['id_editora'] ?></td> 
                    <td><?=$editora['descricao'] ?></td> 
        
                    <td class="btn"><a href="editora_altera.php?id=<?=$editora['id_editora']?>">Alterar</a></td> 
                    <td class="btn"><a href="editora_exclui.php?id=<?=$editora['id_editora']?>">Excluir</a></td> 
                </tr> 

                <?php 
                    endforeach;    
                ?> 
            </table>  
            <div class="link"><a href="editora_cad.php">CADASTRAR DE EDITORA</div> 
        </div>
    </main>  
</body> 
</html> 
