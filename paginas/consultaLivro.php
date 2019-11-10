    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Consulta de Livros</title>
    <style>
        div.down {
            position: absolute;
            width: 100%;
            height: 255px;
            margin: 0 auto;
            top: 168px;
            background: #ff3c00;
        }
    </style>
</head>
<body>

    <div id="buscaAcervo">

        <form action="" method="POST" name="FormProject" id="FormProject">
            <fieldset id="buscaLivro"><legend>Pesquisa<span class="titulo-emprestimo">&nbspAcervo</span></legend>
                <p><input type="radio" name="pesquisa" id="pesquisa" value="titulo" checked>Titulo
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="pesquisa" id="pesquisa" value="autor">Autor</p>

                <p><input type="text" name="txtConsulta" id="txtConsulta" size="25"  maxlength="40" placeholder="Busca por Titulo ou Autor"></p>
                <input type="submit" id="btnConsultar" name="btnConsultar" value="Consultar">
            </fieldset>
        </form>


    </div>
    <div class="down"></div>

        <div class="window_consultaLivro">

            <?php
            //include "classes/Conexao.class.php";
            //include "verificaLogin.php";
            //include "menu.php";

            if(isset($_POST["btnReservar"]))
            {
                //session_start();
                //echo $_SESSION["idusuario"];
                //echo $_POST["idacervo"];
                //exit;
                //echo "Botao inserir foi clicado.";
                //1 - Atribuindo as variaveis os valores digitados
                $idusuario = $_SESSION["idusuario"];
                $codacervo = $_POST["idacervo"];
                //2 - Instanciando um objeto do tipo conexao
                $c = new Conexao();
                //3 - Criando o comando SQL
                $comandoSql = "INSERT INTO emprestimo_novo
			(codusuario, codacervo, data_emprestimo, data_devolucao, situacao, STATUS)
			VALUES
			('$idusuario', '$codacervo', CURDATE(), CURDATE() + 7, 'R', 1)";
                //echo $comandoSql;
                //4 - Executando o comando SQL
                $c -> criarConsulta($comandoSql);
                echo "<script> alert('Livro reservado com Sucesso!') </script>";
                //header("Location:consultaUsuario.php");
            }


            if (isset($_POST["btnConsultar"]))
            {
                //echo "Botao logar foi clicado";
                //Armazenando nas variaveis o login e a senha digitado
                $nome = $_POST["txtConsulta"];
                //1 - Instanciando um objeto do tipo conexao
                $c = new Conexao();
                //2 - Comando sql do select

                $opcao = $_POST['pesquisa'];
                if ($_POST["txtConsulta"] == "")
                {
                    if ($opcao == "titulo")
                    {
                        $comandoSql = "SELECT
							ac.idacervo,
							ge.nome as codgeneros,
							id.nome as codidioma,
							fo.nome as codformato,
							ed.nome as codeditora,
							ac.titulo,
							ac.autor,
							ac.isbn,
							ac.edicao,
							ac.paginas,
							ac.ano,
							ac.quantidade,
							ac.sinopse,
							ac.imagem
						FROM
							acervo ac
						INNER JOIN generos ge ON (ac.codgeneros = ge.idgeneros)
						INNER JOIN idioma id ON (ac.codidioma = id.ididioma)
						INNER JOIN formato fo ON (ac.codformato = fo.idformato)
						INNER JOIN editora ed ON (ac.codeditora = ed.ideditora)
						where ac.status = 1
						order by ac.titulo";
                        //$comandoSql = "SELECT * FROM acervo WHERE titulo like '%$nome%'";
                    }
                    else
                    {
                        $comandoSql = "SELECT
							ac.idacervo,
							ge.nome as codgeneros,
							id.nome as codidioma,
							fo.nome as codformato,
							ed.nome as codeditora,
							ac.titulo,
							ac.autor,
							ac.isbn,
							ac.edicao,
							ac.paginas,
							ac.ano,
							ac.quantidade,
							ac.sinopse,
							ac.imagem
						FROM
							acervo ac
						INNER JOIN generos ge ON (ac.codgeneros = ge.idgeneros)
						INNER JOIN idioma id ON (ac.codidioma = id.ididioma)
						INNER JOIN formato fo ON (ac.codformato = fo.idformato)
						INNER JOIN editora ed ON (ac.codeditora = ed.ideditora)
						where ac.status = 1
						order by ac.autor";
                    }
                }
                else
                {
                    if ($opcao == "titulo")
                    {
                        $comandoSql = "SELECT
							ac.idacervo,
							ge.nome as codgeneros,
							id.nome as codidioma,
							fo.nome as codformato,
							ed.nome as codeditora,
							ac.titulo,
							ac.autor,
							ac.isbn,
							ac.edicao,
							ac.paginas,
							ac.ano,
							ac.quantidade,
							ac.sinopse,
							ac.imagem
						FROM
							acervo ac
						INNER JOIN generos ge ON (ac.codgeneros = ge.idgeneros)
						INNER JOIN idioma id ON (ac.codidioma = id.ididioma)
						INNER JOIN formato fo ON (ac.codformato = fo.idformato)
						INNER JOIN editora ed ON (ac.codeditora = ed.ideditora)
						WHERE titulo LIKE '%$nome%' AND ac.status = 1
						order by ac.titulo";
                        //$comandoSql = "SELECT * FROM acervo WHERE titulo like '%$nome%'";
                    }
                    else
                    {
                        $comandoSql = "SELECT
							ac.idacervo,
							ge.nome as codgeneros,
							id.nome as codidioma,
							fo.nome as codformato,
							ed.nome as codeditora,
							ac.titulo,
							ac.autor,
							ac.isbn,
							ac.edicao,
							ac.paginas,
							ac.ano,
							ac.quantidade,
							ac.sinopse,
							ac.imagem
						FROM
							acervo ac
						INNER JOIN generos ge ON (ac.codgeneros = ge.idgeneros)
						INNER JOIN idioma id ON (ac.codidioma = id.ididioma)
						INNER JOIN formato fo ON (ac.codformato = fo.idformato)
						INNER JOIN editora ed ON (ac.codeditora = ed.ideditora)
							WHERE ac.autor like '%$nome%' AND ac.status = 1
							order by ac.autor";
                    }
                }

//3 - Atribuindo o resultado do comando sql na variavel $resultado
                $resultado = $c -> criarConsulta($comandoSql);
//4 - Usando a função mysql_fetch_array()
//A função mysql_fetch_array armazena em vetor os registros encontrados na consulta feita do codigo sql.
                /*echo "<table width = '200' border='1'>
                    <tr>
                        <td>ID</td>
                        <td>Imagem</td>
                        <td>Titulo</td>
                        <td>Autor</td>
                        <td>Ano</td>
                        <td>Páginas</td>
                        <td>Sinopse</td>
                    </tr>
                    "; */

                while($linha = mysql_fetch_array($resultado))
                {
                    //O valor dentro do colchete é o nome de um campo de uma tabela do banco
                    $id = $linha["idacervo"];
                    $titulo = $linha["titulo"];
                    $autor = $linha["autor"];
                    $ano = $linha["ano"];
                    $paginas = $linha["paginas"];
                    $sinopse = $linha["sinopse"];
                    $imagem = $linha["imagem"];
                    $isbn = $linha["isbn"];
                    $editora = $linha["codeditora"];
                    $idioma = $linha["codidioma"];
                    $quantidade = $linha["quantidade"];
                    $formato = $linha["codformato"];
                    $genero = $linha["codgeneros"];
                    //$t = $linha["tipo"];

                    //Consulta - Caso o usuario seja comum ela vai poder ver a senha somente dela mesmo

                    if ($imagem == "")
                    {
                        echo "<table class='consultaLivro'>";
                        echo "<tr class='head_Livro'>";
                        echo " <td class='livros'><img src='_imagensAcervo/erro.jpg' />";
                        echo "<form action='' method='POST' name='FormProject'' id='FormProject'>
			<input type='hidden' name='idacervo' id='idacervo' value='$id'>
			<input type='submit' id='btnReservar' name='btnReservar' value='Reservar'></td>
						</form>";
                        echo " <td class='corpo_Livro'><h1>SINOPSE</h1>$sinopse</td>";
                        echo " <td><table>";
                        echo " <tr>";

                        echo "  <td class='info'>ISBN:</td>";
                        echo "  <td class='resInfo'>$isbn</td>";
                        echo " </tr>";
                        echo " <tr>";
                        echo "  <td class='info'>TITULO:</td>";
                        echo "  <td class='resInfo'>$titulo</td>";
                        echo "   </tr>";
                        echo "   <tr>";
                        echo "   <td class='info'>AUTOR:</td>";
                        echo "   <td class='resInfo'>$autor</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>GÊNERO:</td>";
                        echo "   <td class='resInfo'>$genero</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>FORMATO:</td>";
                        echo "   <td class='resInfo'>$formato</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>IDIOMA:</td>";
                        echo "   <td class='resInfo'>$idioma</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>ESTOQUE:</td>";
                        echo "   <td class='resInfo'>$quantidade</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>EDITORA:</td>";
                        echo "   <td class='resInfo'>$editora</td>";
                        echo " </tr>";
                        echo " <tr>";
                        echo "   <td class='info'>ANO:</td>";
                        echo "  <td class='resInfo'>$ano</td>";
                        echo "  </tr>";
                        echo "   <tr>";
                        echo "  <td class='info'>PÁGINAS:</td>";
                        echo "   <td class='resInfo'>$paginas</td>";
                        echo " </tr>";
                        echo "  </table><br />";


                        echo "</tr>";
                        echo "</table>";
                    }

                    else
                    {
                        echo "<table class='consultaLivro'>";
                        echo "<tr class='head_Livro'>";
                        echo " <td class='livros'><img src='_imagensAcervo/$imagem' />";
                        echo "<form action='' method='POST' name='FormProject'' id='FormProject'>
			<input type='hidden' name='idacervo' id='idacervo' value='$id'>
			<input type='submit' id='btnReservar' name='btnReservar' value='Reservar'></td>
						</form>";
                        echo " <td class='corpo_Livro'><h1>SINOPSE</h1>$sinopse</td>";
                        echo " <td><table>";
                        echo " <tr>";

                        echo "  <td class='info'>ISBN:</td>";
                        echo "  <td class='resInfo'>$isbn</td>";
                        echo " </tr>";
                        echo " <tr>";
                        echo "  <td class='info'>TITULO:</td>";
                        echo "  <td class='resInfo'>$titulo</td>";
                        echo "   </tr>";
                        echo "   <tr>";
                        echo "   <td class='info'>AUTOR:</td>";
                        echo "   <td class='resInfo'>$autor</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>GÊNERO:</td>";
                        echo "   <td class='resInfo'>$genero</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>FORMATO:</td>";
                        echo "   <td class='resInfo'>$formato</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>IDIOMA:</td>";
                        echo "   <td class='resInfo'>$idioma</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>ESTOQUE:</td>";
                        echo "   <td class='resInfo'>$quantidade</td>";
                        echo " </tr>";
                        echo "  <tr>";
                        echo "   <td class='info'>EDITORA:</td>";
                        echo "   <td class='resInfo'>$editora</td>";
                        echo " </tr>";
                        echo " <tr>";
                        echo "   <td class='info'>ANO:</td>";
                        echo "  <td class='resInfo'>$ano</td>";
                        echo "  </tr>";
                        echo "   <tr>";
                        echo "  <td class='info'>PÁGINAS:</td>";
                        echo "   <td class='resInfo'>$paginas</td>";
                        echo " </tr>";
                        echo "  </table><br />";


                        echo "</tr>";
                        echo "</table>";
                    }

                    /*
                    if ($imagem == "")
                    {
                        echo "<tr>";
                        echo "<td> $id </td>";
                        echo "<td> <img src='_imagensAcervo/erro.jpg' width='308' height='436' /> </td>";
                        echo "<td> $titulo </td>";
                        echo "<td> $autor </td>";
                        echo "<td> $ano </td>";
                        echo "<td> $paginas </td>";
                        echo "<td> $sinopse </td>";
                    }
                    else
                    {
                        echo "<tr>";
                        echo "<td> $id </td>";
                        echo "<td> <img src='_imagensAcervo/$imagem' width='308' height='436' /> </td>";
                        echo "<td> $titulo </td>";
                        echo "<td> $autor </td>";
                        echo "<td> $ano </td>";
                        echo "<td> $paginas </td>";
                        echo "<td> $sinopse </td>";
                    }
                        */


                    //Caso o usuario for comum ela podera alterar apenas ele mesmo

                    /*if ($_SESSION["tipo"]=="comum")
                    {
                        if($_SESSION["nome"] == $n)
                        {
                            echo "<td> <a href='alteraUsuario.php?id=$id'><img src='images/edit.png' width='50%' higth='50%'> </td>";
                            echo "<td> <img src='images/delete.png' width='50%' higth='50%'> </td>";
                            echo "</tr>";
                        }
                        else
                        {
                            echo "<td><img src='images/edit.png' width='50%' higth='50%'> </td>";
                            echo "<td><img src='images/delete.png' width='50%' higth='50%'> </td>";
                            echo "</tr>";
                        }
                    }
                    else
                    {
                        echo "<td> <a href='alteraUsuario.php?id=$id'><img src='images/edit.png' width='50%' higth='50%'> </td>";
                        echo "<td> <a href='excluiUsuario.php?id=$id'><img src='images/delete.png' width='50%' higth='50%'> </td>";
                        echo "</tr>";
                    }*/

                }
            }
            //echo "</table>";
            ?>

        </div>

</body>
</html>