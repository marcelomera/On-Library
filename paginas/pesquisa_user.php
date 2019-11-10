<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>On-Library</title>

    <meta name="emport" content="width=device-width, inicitial-scale=1.0;">

</head>
<body>
        <div class="window_pesquisaUser">
            <h1>Pesquisa<span class="titulo-emprestimo">&nbsp;Usuários</span></h1>
            <form method="POST" name="formUsuario" id="formUsuario" action="#">
                    <fieldset id="busca_user"><legend>Pesquisa</legend>
                        <label for="tLogin">Consultar por Nome ou E-mail</label>
                        <p><input type="text" name="txtConsulta" id="txtConsulta" size="25" required maxlength="40" placeholder="Nome"></p>
                        <input type="submit" name="btnConsultar" value="Consultar">
                    </fieldset>
            </form>
        </div>
        <?php
        include "classes/Conexao.class.php";
        //include "verificaLogin.php";
        //include "menu.php";
        if (isset($_POST["btnConsultar"]))
        {
            //echo "Botao logar foi clicado";
            //Armazenando nas variaveis o login e a senha digitado
            $nome = $_POST["txtConsulta"];
            //1 - Instanciando um objeto do tipo conexao
            $c = new Conexao();
            //2 - Comando sql do select
            $comandoSql = "SELECT * FROM usuarios WHERE user_nome like '%$nome%'";
//echo $comandoSql;
//3 - Atribuindo o resultado do comando sql na variavel $resultado
            $resultado = $c -> criarConsulta($comandoSql);
//4 - Usando a função mysql_fetch_array()
//A função mysql_fetch_array armazena em vetor os registros encontrados na consulta feita do codigo sql.
            echo "<table width = '200' border='1'>
	<tr>
		<td>ID</td>
		<td>Nome</td>
		<td>Email</td>
		<td>Editar</td>
	</tr>
	";

            while($linha = mysql_fetch_array($resultado))
            {
                //O valor dentro do colchete é o nome de um campo de uma tabela do banco
                $id = $linha["idusuario"];
                $nome = $linha["user_nome"];
                $email = $linha["user_email"];
                $senha = $linha["user_senha"];
                //$t = $linha["tipo"];

                //Consulta - Caso o usuario seja comum ela vai poder ver a senha somente dela mesmo

                echo "<tr>";
                echo "<td> $id </td>";
                echo "<td> $nome </td>";
                echo "<td> $email </td>";
                echo "<td> <a href='alteraUsuario.php?id=$id'><img src='images/edit.png' width='50%' higth='50%'> </td>";

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
        echo "</table>";
        ?>
</body>
</html>