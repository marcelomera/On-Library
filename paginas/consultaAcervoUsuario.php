<html>
<head lang="pt-br">
	<meta charset="UTF-8">
	<title>Consulta de Reservas e Emprestimos</title>

	<style>
		div.down {
			position: absolute;
			width: 100%;
			height: 200px;
			margin: 0 auto;
			top: 200px;
			background: #ff3c00;
		}
	</style>
</head>
<body>
<div class="window">

<?php

    //include"classes/Conexao.class.php";
   // session_start();
    $id = $_SESSION["idusuario"];
    
    $c= new Conexao();    
       
   //comando sql do select
   $comandoSql="SELECT emp.idemprestimo, fo.nome AS codformato, ace.titulo, ace.autor, emp.data_emprestimo, 
   emp.data_devolucao, emp.situacao
	FROM emprestimo_novo emp
	INNER JOIN usuarios usu ON (emp.codusuario = usu.idusuario)
	INNER JOIN acervo ace ON (emp.codacervo = ace.idacervo)
	INNER JOIN formato fo ON (ace.codformato = fo.idformato)
	WHERE emp.status = 1 AND emp.codusuario = '$id'
	ORDER BY emp.data_devolucao";  
   //atribuindo  o resultado do comando sql na
   //variavel $resultado
   $resultado= $c->criarConsulta($comandoSql);
	echo "<h1>Consulta <span class='titulo-emprestimo'>Empréstimo e Reserva</span></h1>";
	echo "<table class='consultaAcervo'>
	<tr class='linha'>
		<td>Cod. Emp.</td>
		<td>Formato</td>
		<td>Titulo</td>
		<td>Autor</td>
		<td>Data Emp.</td>
		<td>Data Devolução</td>
		<td>Status</td>
	</tr>";

while($linha = mysql_fetch_array($resultado))
{
	//O valor dentro do colchete é o nome de um campo de uma tabela do banco
	$id = $linha["idemprestimo"];
	$codformato = $linha["codformato"];
	$titulo = $linha["titulo"];
	$autor = $linha["autor"];
	$data_emprestimo = $linha["data_emprestimo"];
	$data_devolucao = $linha["data_devolucao"];
	$situacao = $linha["situacao"];
	
	//$t = $linha["tipo"];
	
	//Consulta - Caso o usuario seja comum ela vai poder ver a senha somente dela mesmo
	if ($situacao == "R")
	{
			echo "<tr class='corpo'>";
			echo "<td> $id </td>";
			echo "<td> $codformato </td>";
			echo "<td> $titulo </td>";
			echo "<td> $autor </td>";
			echo "<td> $data_emprestimo </td>";
			echo "<td> $data_devolucao </td>";
			echo "<td> RESERVADO </td>";
	}
	if ($situacao == "E")
	{
		echo "<tr class='corpoEmp'>";
			echo "<td> $id </td>";
			echo "<td> $codformato </td>";
			echo "<td> $titulo </td>";
			echo "<td> $autor </td>";
			echo "<td> $data_emprestimo </td>";
			echo "<td> $data_devolucao </td>";
			echo "<td> EMPRESTADO </td>";
	}
	

}   
echo "</table>";
  //------------------------------------------------------------------
  ?>
</div>
</body>
</html>