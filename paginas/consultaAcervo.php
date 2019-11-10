<html>
    <head lang="pt-br">
        <meta charset="UTF-8">
        <title>Tela Consulta de Usuario</title>
    </head>
    <body>
<?php 
include "/classes/Conexao.class.php";
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
	
	/*$
	titulo = 'unchecked';
	$autor = 'unchecked';
	

		if ($selected_radio == 'male')
		{
		$male_status = 'checked';
		}
		else if ($selected_radio == 'female') 
		{
		$female_status = 'checked';
		}
		*/
	
	$opcao = $_POST['pesquisa'];  
	if ($opcao == "titulo") 
	{          
		$comandoSql = "SELECT * FROM acervo WHERE titulo like '%$nome%'";   
	}
	else 
	{
		$comandoSql = "SELECT * FROM acervo WHERE autor like '%$nome%'";
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
			echo "<table border='1'>";
			echo "<tr>";
			echo " <td><img src='/_imagensAcervo/erro.jpg' width='308' height='436' /></td>";
			echo " <td> <table border='1'>";
			echo " <tr>";
			echo "  <td>ISBN</td>";
			echo "  <td>$isbn</td>";
			echo " </tr>";
			echo " <tr>";
			echo "  <td>Titulo</td>";
			echo "  <td>$titulo</td>";
			echo "   </tr>";
			echo "   <tr>";
			echo "   <td>Autor</td>";
			echo "   <td>$autor</td>";
			echo " </tr>";
			echo "  <tr>";
			echo "   <td>Editora</td>";
			echo "   <td>$editora</td>";
			echo " </tr>";
			echo " <tr>";
			echo "   <td>Ano</td>";
			echo "  <td>$ano</td>";
			echo "  </tr>";
			echo "   <tr>";
			echo "  <td>Paginas</td>";
			echo "   <td>$paginas</td>";
			echo " </tr>";
			echo "  </table>";
			echo "  <p>BOTAO RESERVAR</p></td>";
			echo "  <td>$sinopse</td>";
			echo "</tr>";
			echo "</table>";
		}
		else
		{
			echo "<table border='1'>";
			echo "<tr>";
			echo " <td><img src='/_imagensAcervo/$imagem' width='308' height='436' /></td>";
			echo " <td> <table border='1'>";
			echo " <tr>";
			echo "  <td>ISBN</td>";
			echo "  <td>$isbn</td>";
			echo " </tr>";
			echo " <tr>";
			echo "  <td>Titulo</td>";
			echo "  <td>$titulo</td>";
			echo "   </tr>";
			echo "   <tr>";
			echo "   <td>Autor</td>";
			echo "   <td>$autor</td>";
			echo " </tr>";
			echo "  <tr>";
			echo "   <td>Genero</td>";
			echo "   <td>$genero</td>";
			echo " </tr>";
			echo "  <tr>";
			echo "   <td>Formato</td>";
			echo "   <td>$formato</td>";
			echo " </tr>";
			echo "  <tr>";
			echo "   <td>Idioma</td>";
			echo "   <td>$idioma</td>";
			echo " </tr>";
			echo "  <tr>";
			echo "   <td>Estoque</td>";
			echo "   <td>$quantidade</td>";
			echo " </tr>";
			echo "  <tr>";
			echo "   <td>Editora</td>";
			echo "   <td>$editora</td>";
			echo " </tr>";
			echo " <tr>";
			echo "   <td>Ano</td>";
			echo "  <td>$ano</td>";
			echo "  </tr>";
			echo "   <tr>";
			echo "  <td>Paginas</td>";
			echo "   <td>$paginas</td>";
			echo " </tr>";
			echo "  </table>";
			echo "  <p>BOTAO RESERVAR</p></td>";
			echo "  <td>$sinopse</td>";
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
        <form action="" method="POST" name="FormProject" id="FormProject">
		<p class="dado">Pesquisa</p>
    	<p><input type="radio" name="pesquisa" id="pesquisa" value="titulo" checked>Titulo
    	&nbsp;&nbsp;&nbsp;&nbsp; 
		<input type="radio" name="pesquisa" id="pesquisa" value="autor">Autor</p>
		
			
        <label for="tLogin">Consultar por Nome ou E-mail</label>
        <p><input type="text" name="txtConsulta" id="txtConsulta" size="25"  maxlength="40" placeholder="Nome"></p>
        <input type="submit" name="btnConsultar" value="Consultar">
    </form>

    </body>
</html>