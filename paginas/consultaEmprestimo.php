<html>
    <head lang="pt-br">
        <meta charset="UTF-8">
        <title>Tela Emprestimo de Reserva</title>

		<style>
			div.down{
				position: absolute;
				width: 100%;
				top: 220px;
				height: 300px;
				margin: 0 auto;
				background: #ff3c00;
			}
		</style>
    </head>
    <body>
	<div class="window_consultaEmprestimo">
		<h1>Consulta <span class="titulo-emprestimo">Empréstimo</span></h1>
	<form action="" method="POST" name="FormProject" id="FormProject">
		<fieldset class="consultas">
        <label for="tLogin">Consultar emprestimo por Nome</label>
        <p><input type="text" name="txtConsulta" id="txtConsulta" size="25"  maxlength="40" placeholder="Nome usuário" required></p>
		</fieldset>

		<fieldset class="consultas">
		  <p class="dado"> <label for="datainicio">Data Inicio Emprestimo</label></p>
    <p><input type="date" name="datainicio" id="datainicio" required > </p>
        <div id="erro_datainicio" class="msg_erro"></div>
		</fieldset>

		<fieldset class="consultas">
			<p class="dado"> <label for="datafim">Data Fim Emprestimo</label></p>
    <p><input type="date" name="datafim" id="datafim" required > </p>
        <div id="erro_datafim" class="msg_erro"></div>
		</fieldset>
		
        <p><input type="submit" name="btnConsultar" id="btnConsultar" value="Consultar"></p>
    </form>
<?php 
//include "classes/Conexao.class.php";
//include "verificaLogin.php";
//include "menu.php";
if(isset($_POST["btnDevolver"]))
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
			data_devolucao = CURDATE(), situacao = 'D'
			WHERE idemprestimo = '$id'";
	//echo $comandoSql;
	//exit;
	//4 - Executando o comando SQL
	$c -> criarConsulta($comandoSql);

	echo "<script> alert('Livro devolvido com Sucesso!') </script>";
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
	WHERE emp.situacao = 'E' AND emp.status = 1 and usu.user_nome like '%$nome%'
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
	echo "<td>

			<p><form action='' method='POST' name='FormProject'' id='FormProject'>
			<input type='hidden' name='idemprestimo' id='idemprestimo' value='$idemprestimo'>
			<input type='submit' id='btnDevolver' name='btnDevolver' value='DEVOLVER'></p>
			</form></td>";
	echo "</tr>";
			echo "</table>";

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
?>
	</div>
    </body>
</html>