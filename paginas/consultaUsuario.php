<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Emprestimo de Livros</title>
    <style>
        div.down{
            position: absolute;
            width: 100%;
            top: 200px;
            height: 350px;
            margin: 0 auto;
            background: #ff3c00;
        }
    </style>
</head>
<body>
    <div class="window_pesquisaUser">
        <h1>Pesquisa<span class="titulo-emprestimo">&nbsp;Usuários</span></h1>
        <form method="POST" name="formUsuario" id="formUsuario" action="#">
            <fieldset id="busca_user"><legend>Pesquisa</legend>
                <label for="inpUser"></label>
                <input type="search" name="inpUser" id="inpUser" placeholder="digite o nome do usuário">
                <input type="submit" name="pesquisaUser" id="pesquisaUser" value="PESQUISAR">
            </fieldset>
        </form>
        <div class="window_consultaUser">
            <?php
            //include "classes/conexao.class.php";
            if (isset($_POST["pesquisaUser"])) {
                //echo "Botao logar foi clicado";
                //Armazenando nas variaveis o login e a senha digitado
                $nome = $_POST["inpUser"];
                // 1 -instanciando um objeto do tipo conexao
                $c = new Conexao();
                // 2 - comando SQL do select
                $comandoSql = "SELECT * FROM usuarios WHERE user_nome like '%$nome%'";
                // 3 - atribuindo o resultado do comando sql na variavel $resultado
                $resultado = $c->criarConsulta($comandoSql);
                // 4 - usando a função mysql_fetch_array();
                // função mysql_fetch_array armazena em vetor os registros encontrados na consulta feita
                echo " <table id='consultaUser'>
                <tr id='head_User'>
                    <td>CÓDIGO</td>
                    <td>NOME</td>
                    <td>E-MAIL</td>
                    <td>SENHA</td>
                    <td>EDITAR</td>
                </tr>";
                while ($linha = mysql_fetch_array($resultado)) 
                {
                    $id = $linha['idusuario']; //o valor dentro do [] é o valor de um campo da tabela
                    $n = $linha['user_nome'];
                    $e = $linha['user_email'];
                    $s = $linha['user_senha'];
                    //exibindo os registros
                    echo "<tr id='corpo_User'>";
                    echo " <td> $id </td> ";
                    echo "<td > $n </td> ";
                    echo "<td> $e </td> ";
                    echo "<td> $s </td> ";
                    echo "<td><a href='#?id'><img src='_imagens/edicao.png'></a></td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>