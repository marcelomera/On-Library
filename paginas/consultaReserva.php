<html>
    <head lang="pt-br">
        <meta charset="UTF-8">
        <title>Tela Consulta de Reserva</title>

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

	<div class="window_consultaReserva">
		<h1>Consulta <span class="titulo-emprestimo">Reserva</span></h1>
		<form action="" method="POST" name="FormProject" id="FormProject">
			<fieldset class="consultas">
				<label for="tLogin">Consultar Reserva por Nome</label>
				<p><input type="text" name="txtConsulta" id="txtConsulta" size="25"  maxlength="40" placeholder="Nome usuário" required></p>
			</fieldset>

			<fieldset class="consultas">
				<p class="dado"> <label for="datainicio">Data Inicio Reserva</label></p>
				<p><input type="date" name="datainicio" id="datainicio" required > </p>
				<div id="erro_datainicio" class="msg_erro"></div>
			</fieldset>

			<fieldset class="consultas">
				<p class="dado"> <label for="datafim">Data Fim Reserva</label></p>
				<p><input type="date" name="datafim" id="datafim" required > </p>
				<div id="erro_datafim" class="msg_erro"></div>
			</fieldset>

			<p><input type="submit" name="btnConsultar" id="btnConsultar" value="Consultar"></p>
		</form>

<?php 
	//include "classes/Conexao.class.php";
//include "verificaLogin.php";
//include "menu.php";
if(isset($_POST["btnEmprestar"]))
{
	//session_start();
	//echo $_SESSION["idusuario"];
	//echo $_POST["idacervo"];
	//exit;
	//echo "Botao inserir foi clicado.";
	//1 - Atribuindo as variaveis os valores digitado
	$id = $_POST["idemprestimo"];
	//2 - Instanciando um objeto do tipo conexao
	$c = new Conexao();
	//3 - Criando o comando SQL
	$comandoSql = "UPDATE emprestimo_novo SET
			data_emprestimo = CURDATE(), data_devolucao = CURDATE() + 7, situacao = 'E'
			WHERE idemprestimo = '$id'";
	//echo $comandoSql;
	//exit;
	//4 - Executando o comando SQL
	$c -> criarConsulta($comandoSql);

	echo "<script> alert('Livro emprestado com Sucesso!') </script>";
	//header("Location:consultaUsuario.php");
}


if(isset($_POST["btnCancelar"]))
{
	//session_start();
	//echo $_SESSION["idusuario"];
	//echo $_POST["idacervo"];
	//exit;
	//echo "Botao inserir foi clicado.";
	//1 - Atribuindo as variaveis os valores digitado
	$id = $_POST["idemprestimo"];
	//2 - Instanciando um objeto do tipo conexao
	$c = new Conexao();
	//3 - Criando o comando SQL
	$comandoSql = "UPDATE emprestimo_novo SET
			status = 0
			WHERE idemprestimo = '$id'";
	//echo $comandoSql;
	//exit;
	//4 - Executando o comando SQL
	$c -> criarConsulta($comandoSql);

	echo "<script> alert('Reserva cancelada com Sucesso!') </script>";
	//header("Location:consultaUsuario.php");
}

if (isset($_POST["btnConsultar"]))
{
	//echo "Botao logar foi clicado";
	//Armazenando nas variaveis o login e a senha digitado
	$nome = $_POST["txtConsulta"];
	$data_inicio_emprestimo = $_POST["datainicio"];
	$data_fim_emprestimo = $_POST["datafim"];


	//1 - Instanciando um objeto do tipo conexao
	$c = new Conexao();
	//2 - Comando sql do select
	$comandoSql = "SELECT emp.idemprestimo, usu.user_nome, fo.nome AS codformato, ace.titulo,
	ace.autor, emp.data_emprestimo, emp.data_devolucao, emp.situacao, emp.status
	FROM emprestimo_novo emp
	INNER JOIN usuarios usu ON (emp.codusuario = usu.idusuario)
	INNER JOIN acervo ace ON (emp.codacervo = ace.idacervo)
	INNER JOIN formato fo ON (ace.codformato = fo.idformato)
	WHERE emp.situacao = 'R' AND emp.status = 1 and usu.user_nome like '%$nome%'
	and data_emprestimo BETWEEN '$data_inicio_emprestimo' AND '$data_fim_emprestimo'
	ORDER BY emp.data_emprestimo";
	//echo $comandoSql;
	//3 - Atribuindo o resultado do comando sql na variavel $resultado
	$resultado = $c -> criarConsulta($comandoSql);
	//4 - Usando a função mysql_fetch_array()
	//A função mysql_fetch_array armazena em vetor os registros encontrados na consulta feita do codigo sql.
	while($linha = mysql_fetch_array($resultado))
	{
		//O valor dentro do colchete é o nome de um campo de uma tabela do banco
		$idemprestimo = $linha["idemprestimo"];
		$nome = $linha["user_nome"];
		$formato = $linha["codformato"];
		$titulo = $linha["titulo"];
		$autor = $linha["autor"];
		$data_emprestimo = $linha["data_emprestimo"];
		$data_devolucao = $linha["data_devolucao"];
		$situacao = $linha["situacao"];
		$status = $linha["status"];

		//$t = $linha["tipo"];

		//Consulta - Caso o usuario seja comum ela vai poder ver a senha somente dela mesmo

		echo "<table class='consultarReserva'>";
		echo "<tr class='linha'>";
		echo "<td>Codigo:</td>";
		echo "<td>Usuario:</td>";
		echo "<td>Formato:</td>";
		echo "<td>Titulo:</td>";
		echo "<td>Autor:</td>";
		echo "<td>Reserva</td>";
		echo "<td>Devolução:</td>";
		echo "</tr>";

		echo "<tr class='corpo'>";
		echo "<td>$idemprestimo</td>";
		echo "<td>$nome</td>";
		echo "<td>$formato</td>";
		echo "<td>$titulo</td>";
		echo "<td>$autor</td>";
		echo "<td>$data_emprestimo</td>";
		echo "<td>$data_devolucao</td>";

		echo "</tr>";

		echo "<td>

			<p><form action='' method='POST' name='FormProject'' id='FormProject'>
			<input type='hidden' name='idemprestimo' id='idemprestimo' value='$idemprestimo'>
			<input type='submit' id='btnEmprestar' name='btnEmprestar' value='EMPRESTAR'>
			<input type='submit' id='btnCancelar' name='btnCancelar' value='CANCELAR'></p>
			</form></td>";
		echo "</tr>";


		echo "</table>";
	}
}
?>
		</div>
    </body>
</html>