<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0"> 
    <title>Menu Cliente</title> 
    
    <link rel="stylesheet" href="../public/css/style_index.css">
</head> 
<body>
    <nav>        
        <a href="menu_cliente.php?titulo=" class="logo"> Menu Cliente </a>
        <form method="GET" action="menu_cliente.php">
            <input id="txt_pesquisa" type="text" name="titulo" placeholder="Pesquisar Livro">
            <input id="btn_pesquisa" type="submit" value="Buscar">

        </form>
    </nav>
    <main>
        <div class="links">
            <div id="titulo">
                SISTEMA GERENCIAMENTO:
            </div>
            <ul class="links">
                Autores:
                <li>
                    <a href="autor_lista.php"> Listar Autores</a>
                </li>
                <li>
                    <a href="autor_cad.php"> Cadastrar Autor</a>
                </li>
                <br/>
                Categorias:
                <li>
                    <a href="categoria_lista.php"> Listar Cadegorias</a>
                </li>
                <li>
                    <a href="categoria_cad.php"> Cadastrar Categoria</a>
                </li>
                <br/>
                Editoras:
                <li>
                    <a href="editora_lista.php"> Listar Editoras </a>
                </li>
                <li>
                    <a href="editora_cad.php"> Cadastrar Editora </a>
                </li>
                <br/>
                Livros:
                <li>
                    <a href="livro_lista.php"> Listar Livros </a>
                </li>
                <li>
                    <a href="livro_cad.php"> Cadastrar Livro </a>
                </li>
        </div>
    </main>
</body>
</html>