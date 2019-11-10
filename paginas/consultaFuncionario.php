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
            height: 300px;
            margin: 0 auto;
            background: #ff3c00;
        }
    </style>
</head>
<body>


        <div class="window_pesquisaFunc">
            <h1>Pesquisa<span class="titulo-emprestimo">&nbsp;Funcionário</span></h1>
            <form method="POST" name="formFuncionario" id="formFuncionario" action="#">
                <fieldset><legend>Pesquisa</legend>
                    <label for="inpFunc"></label>
                    <input type="search" name="inpFunc" id="inpFunc" placeholder="digite o nome do Funcionário">
                    <input type="submit" name="pesquisaFunc" id="pesquisaFunc" value="PESQUISAR">
                </fieldset>
            </form>



<div class="window_consultaFunc">

            <?php


           // include "classes/conexao.class.php";

            if (isset($_POST["pesquisaFunc"])) {
            //echo "Botao logar foi clicado";
            //Armazenando nas variaveis o login e a senha digitado
            $nome = $_POST["inpFunc"];



            // 1 -instanciando um objeto do tipo conexao

            // 1 -instanciando um objeto do tipo conexao

            $c = new Conexao();


            // 2 - comando SQL do select

            $comandoSql = "SELECT * FROM funcionarios WHERE fun_nome like '%$nome%'";


            // 3 - atribuindo o resultado do comando sql na variavel $resultado

            $resultado = $c -> criarConsulta($comandoSql);


            // 4 - usando a função mysql_fetch_array();

            // a função mysql_fetch_array armazena em vetor os registros encontrados
            // na consulta feita atraves do codigo sql


                echo " <table id='consultaFunc'>
                <tr id='head_Func'>
                    <td>CÓDIGO</td>
                    <td>NOME</td>
                    <td>LOGIN</td>
                    <td>SENHA</td>
                    <td>EDITAR</td>
                </tr>

                ";

                while($linha = mysql_fetch_array($resultado)) {

                $id = $linha['idfuncionario']; //o valor dentro do [] é o valor de um campo da tabela
                $n = $linha['fun_nome'];
                $e = $linha['fun_login'];
                $s = $linha['fun_senha'];



                //exibindo os registros

                    echo "<tr id='corpo_Func'>";
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