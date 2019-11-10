<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>

</head>
<body>

    <?php 
		//include "verificaLogin.php";
		//include "menu.php";

		if(isset($_POST["btnCadastrar_admin"]))
		{
			//echo "Botao inserir foi clicado.";
			//1 - Atribuindo as variaveis os valores digitados
			$nome = $_POST["fun_nome"];
			$datanascimento = $_POST["fun_datanascimento"];
			$sexo = $_POST["fun_sexo"];
			$cpf = $_POST["fun_cpf"];
            $rg = $_POST["fun_rg"];
			$telefone = $_POST["fun_telefone"];
			$celular = $_POST["fun_celular"];
			$email = $_POST["fun_email"];
			$logradouro = $_POST["fun_logradouro"];
			$numero = $_POST["fun_numero"];
			$complemento = $_POST["fun_complemento"];
			$bairro = $_POST["fun_bairro"];
			$cidade = $_POST["fun_cidade"];
			$estado = $_POST["fun_codestado"];
			$cep = $_POST["fun_cep"];
            $login = $_POST["fun_login"];
			$senha = $_POST["fun_senha"];			
			//2 - Instanciando um objeto do tipo conexao
			$c = new Conexao();
			//3 - Criando o comando SQL
			$comandoSql = "insert into funcionarios (fun_nome, fun_datanascimento, fun_sexo, 
            fun_cpf, fun_rg, fun_telefone, fun_celular, fun_email, fun_logradouro, fun_numero, 
            fun_complemento, fun_bairro, fun_cidade, fun_codestado, fun_cep, fun_login, fun_senha, 
            fun_status)
			 values ('$nome', '$datanascimento','$sexo', '$cpf', '$rg', '$telefone', '$celular', 
             '$email', '$logradouro', $numero, '$complemento', '$bairro', '$cidade', $estado, '$cep', 
             '$login', '$senha', 1)"; //0 - valido(false) / 1 - status(true)
			//4 - Executando o comando SQL
			$c -> criarConsulta($comandoSql);
            echo "<script>alert ('Funcionário cadastrado com Sucesso!') </script>";
			//header("Location:consultaUsuario.php");
		}
		?>
        <div class="window">
            <h1>Cadastro <span class="titulo-emprestimo">de Funcionários</span></h1>

   <form id="formularioCadastroFuncionario" method="post" action="">
    <div id="formulario">
        <div id="pessoais"> <!-- DIV DOS DADOS PESSOAIS-->
            <h4>Dados Pessoais</h4>
            <p class="dado"> <label for="fun_nome"> nome completo </label></p>
            <p><input type="text" name="fun_nome" id="fun_nome" size="25" maxlength="100" required  placeholder="SEU NOME COMPLETO"></p>
            <p class="dado"><label for="fun_rg">rg</label></p>
            <p><input type="text" name="fun_rg" id="fun_rg" size="25" maxlength="12" required="Favor informar RG" OnKeyPress="formatar('##.###.###-#', this)" placeholder="APENAS NÚMEROS"></p>
            <p class="dado"> <label for="fun_cpf">cpf</label></p>
            <p><input type="text" name="fun_cpf" id="fun_cpf" size="25" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required placeholder="APENAS NÚMEROS"> </p>
            <p class="dado"><label for="fun_datanascimento">data de nascimento</label></p>
            <p><input type="date" name="fun_datanascimento" id="fun_datanascimento" size="25" placeholder="DIGITE SEU RG SEM TRAÇO"> </p>
            <p class="dado">Sexo</p>
            <p><input type="radio" name="fun_sexo" id="fun_sexo_M" value="M" checked>MASCULINO 
    &nbsp;&nbsp;&nbsp;&nbsp; 
              <input type="radio" name="fun_sexo" id="fun_sexo_F" value="F">FEMININO</p>
            <p class="dado"><label for="fun_telefone"> Telefone </label></p>
            <p><input type="text" name="fun_telefone" id="fun_telefone" OnKeyPress="formatar('##-####-####', this)" required placeholder="DIGITE APENAS NÚMEROS" maxlength="12" size="25"></p>
            <p class="dado"><label for="fun_celular"> Celular </label></p>
            <p><input type="text" name="fun_celular" id="fun_celular" OnKeyPress="formatar('##-#####-####', this)" required placeholder="DIGITE APENAS NÚMEROS" maxlength="13" size="25"></p>
        </div> <!-- FIM DA DIV DOS DADOS PESSOAIS-->

        <div id="acesso"> <!-- DIV DE DADOS DE ACESSO -->
            <h4>Dados de Acesso</h4>
            <p class="dado"> <label for="fun_email"> E-mail </label></p>
            <p><input type="email" name="fun_email" id="fun_email" size="25" maxlength="150" required placeholder="DIGITE SEU E-MAIL"></p>
            <p class="dado"> <label for="fun_login"> login </label></p>
            <p><input type="text" name="fun_login" id="fun_login" size="25" maxlength="20" required placeholder="DIGITE SEU E-MAIL"></p>
            <p class="dado"> <label for="fun_senha"> Senha </label></p>
            <p><input type="password" name="fun_senha" id="fun_senha" size="25" maxlength="20" required placeholder="DIGITE SUA SENHA"></p>
            
        </div> <!-- FIM DA DIV DE DADOS DE ACESSO-->

        <div id="endereco"> <!--DIV DE ENDEREÇO -->
            <h4>Endereço</h4>
            <p class="dado"> <label for="fun_cep"> CEP </label></p>
            <p><input type="text" name="fun_cep" id="fun_cep" size="25" maxlength="9" OnKeyPress="formatar('#####-###', this)" placeholder="DIGITE SEU CEP" required="Informar CEP!"></p>
            <p class="dado"> <label for="fun_logradouro"> Logradouro </label></p>
            <p><input type="text" name="fun_logradouro" id="fun_logradouro" size="25" maxlength="150" placeholder="EX: RUA JOSÉ ANTÔNIO..." required></p>
            <p class="dado"> <label for="fun_numero"> Número  </label></p>
            <p id="numero"><input type="number" name="fun_numero" id="fun_numero" size="25" maxlength="10" placeholder="EX: 1234"></p>
            <div id="complemento">
                <p class="dado"><label for="fun_complemento">Complemento</label></p>
                <p><input type="text" name="fun_complemento" id="fun_complemento" size="25" maxlength="20" placeholder="APTO, BLOCO, ANDAR..."></p>
            </div>
            <div id="bairro">
                <p class="dado"><label for="fun_bairro">Bairro</label></p>
                <p><input type="text" name="fun_bairro" id="fun_bairro" size="25" maxlength="40" required placeholder="DIGITE O SEU BAIRRO"></p>
            </div>
            <div id="estado">
                <p class="dado"><label for="fun_codestado">Estado</label></p>
                <p><select name="fun_codestado" id="fun_codestado">
				<option value="1">AC</option>
				<option value="2">AL</option>
				<option value="3">AP</option>
				<option value="4">AM</option>
				<option value="5">BA</option>
				<option value="6">CE</option>
				<option value="7">DF</option>
				<option value="8">ES</option>
				<option value="9">GO</option>
				<option value="10">MA</option>
				<option value="11">MT</option>
				<option value="12">MS</option>
				<option value="13">MG</option>
				<option value="14">PA</option>
				<option value="15">PB</option>
				<option value="16">PR</option>
				<option value="17">PE</option>
				<option value="18">PI</option>
				<option value="19">RJ</option>
				<option value="20">RN</option>
				<option value="21">RS</option>
				<option value="22">RO</option>
				<option value="23">RR</option>
				<option value="24">SC</option>
				<option value="25">SP</option>
				<option value="26">SE</option>
				<option value="27">TO</option>
			</select></p>
            </div>
            <div id="cidade">
                <p class="dado"><label for="fun_cidade">Cidade</label></p>
                <p><input type="text" name="fun_cidade" id="fun_cidade" size="25" maxlength="50" required placeholder="DIGITE A CIDADE"></p>
            </div>

        </div> <!-- FIM DA DIV ENDEREÇO-->
    </div>

    <p><input type="submit" name="btnCadastrar_admin" id="btnCadastrar_admin" value="Cadastrar"></p>
    </form>
    </div>
</body>
</html>