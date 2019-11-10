<?php

  if(isset($_POST["btnInserir"]))
  {
	  //echo "foi clicado no alterar";

	  //instanciando um objeto do tipo conexao
        $c= new Conexao();

	  //comando sql do select
	   $comandoSql= "update usuarios set
     user_telefone = '".$_POST["user_telefone"]."',
     user_celular = '".$_POST["user_celular"]."',
     user_logradouro = '".$_POST["user_logradouro"]."',
     user_numero = '".$_POST["user_numero"]."',
     user_complemento = '".$_POST["user_complemento"]."',
     user_bairro = '".$_POST["user_bairro"]."',
     user_cidade = '".$_POST["user_cidade"]."',
     user_codestado = '".$_POST["user_codestado"]."',
     user_cep = '".$_POST["user_cep"]."',
     user_senha = '".$_POST["user_senha"]."',
     user_valido = 0, 
     user_status = 1
     where idusuario = '".$_SESSION["idusuario"]."'";

	 //atribuindo  o resultado do comando sql na
	  //variavel $resultado
	  $resultado= $c->criarConsulta($comandoSql);

	 //fazendo a variavel de sessao receber
	//atualizacao do nome caso tenha sido alterado

	  $_SESSION["user_nome"] = $_POST["user_nome"];

     //fazendo a variavel de sessao receber
	//atualizacao da senha caso tenha sido alterada
	// $_SESSION["tipo"] = $_POST["rdbTipo"];

	 //-----------------------------------------

	 //redirecionando para o consulta de usuario
     echo "<script> alert ('Usuário alterado com sucesso!') </script>";
	 header("Location:user.php");

  }
   ?>

<?php
   //include"classes/Conexao.class.php";
    //session_start();
    $id = $_SESSION["idusuario"];

    $c= new Conexao();

   //comando sql do select
   $comandoSql="select * from usuarios where idusuario = '$id'";
   //atribuindo  o resultado do comando sql na
   //variavel $resultado
   $resultado= $c->criarConsulta($comandoSql);

   //usando a funcao mysql_fetch_array
     if($linha= mysql_fetch_array($resultado))
	 {
	   //armazenando em variaveis os
	   //registros vindos do banco
	    $nome = $linha["user_nome"];
		  $datanascimento = $linha["user_datanascimento"];
			$sexo = $linha["user_sexo"];
			$cpf = $linha["user_cpf"];
			$telefone = $linha["user_telefone"];
			$celular = $linha["user_celular"];
			$email = $linha["user_email"];
			$logradouro = $linha["user_logradouro"];
			$numero = $linha["user_numero"];
			$complemento = $linha["user_complemento"];
			$bairro = $linha["user_bairro"];
			$cidade = $linha["user_cidade"];
			$estado = $linha["user_codestado"];
			$cep = $linha["user_cep"];
			$senha = $linha["user_senha"];

   }
  //------------------------------------------------------------------
  ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil Usuário</title>
    
    <style>
        .window {
            height: 700px;
        }

        div.down {
            position: absolute;
            width: 100%;
            height: 370px;
            margin: 0 auto;
            top: 430px;
            background: #ff3c00;
        }
    </style>

</head>
<body>
<div class="window">
    <form id="formularioCadastroUsuario" name="formularioCadastroUsuario" method="post" action="">
        <h1>Perfil <span class="titulo-emprestimo">de Usuário</span></h1>
        <div id="formulario">
            <div id="pessoais"> <!-- DIV DOS DADOS PESSOAIS-->
                <h4>Dados Pessoais</h4>
                <p class="dado"> <label for="user_nome"> nome completo </label></p>
                <p><input type="text" name="user_nome" id="user_nome" size="25" maxlength="100" placeholder="SEU NOME COMPLETO" disabled="desabled" required value="<?php echo $nome; ?>"></p>

                <div id="erroUser_Nome" class="msg_erro"></div>
                <p class="dado"> <label for="user_cpf">cpf</label></p>

                <p><input type="text" name="user_cpf" id="user_cpf" size="25" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder="APENAS NÚMEROS" disabled="desabled" required value="<?php echo $cpf; ?>"></p>

                <div id="erroUser_Cpf" class="msg_erro"></div>
                <p class="dado"> <label for="user_datanascimento">data de nascimento</label></p>

                <p><input type="date" name="user_datanascimento" id="user_datanascimento" size="25" disabled="desabled" required value="<?php echo $datanascimento; ?>"> </p>
                <div id="erroUser_Datanascimento" class="msg_erro"></div>

                <p class="dado">Sexo</p>
                <p><input type="radio" name="user_sexo" id="user_sexo_M" value="M" checked="desabled" 
                <?php 
                if($sexo == "M")
                {
                echo "checked=checked";
                }
                ?>>MASCULINO &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="user_sexo" id="user_sexo_F" value="F" disabled="desabled"
                <?php 
                if($sexo == "F")
                {
                echo "checked=checked";
                }
                ?>>FEMININO</p>
                <p class="dado"><label for="user_telefone"> Telefone </label></p>

                <p><input type="text" name="user_telefone" id="user_telefone" OnKeyPress="formatar('##-####-####', this)" placeholder="DIGITE APENAS NÚMEROS" maxlength="12" size="25" required value="<?php echo $telefone; ?>"></p>

                <div id="erroUser_Telefone" class="msg_erro"></div>
                <p class="dado"><label for="user_celular"> Celular </label></p>

                <p><input type="text" name="user_celular" id="user_celular" OnKeyPress="formatar('##-#####-####', this)" placeholder="DIGITE APENAS NÚMEROS" maxlength="13" size="25" required value="<?php echo $celular; ?>"></p>
                <div id="erroUser_Celular" class="msg_erro"></div>
            </div> <!-- FIM DA DIV DOS DADOS PESSOAIS-->

            <div id="acesso"> <!-- DIV DE DADOS DE ACESSO -->
                <h4>Dados de Acesso</h4>
                <p class="dado"> <label for="user_email"> E-mail </label></p>
                <p><input type="email" name="user_email" id="user_email" size="25" maxlength="150" placeholder="DIGITE SEU E-MAIL" disabled="desabled" required value="<?php echo $email; ?>"></p>
                <div id="erroUser_Email" class="msg_erro"></div>
                <p class="dado"> <label for="user_senha"> Senha </label></p>
                <p><input type="password" name="user_senha" id="user_senha" size="25" maxlength="20" placeholder="DIGITE SUA SENHA" required value="<?php echo $senha; ?>"></p>

                <!-- <div id="erroUser_Senha" class="msg_erro"></div>
                 <p class="dado"> <label for="user_senha_confirmar"> Confirmar Senha </label></p>
                 <p><input type="password" name="user_senha_confirmar" id="user_senha_confirmar" size="25" maxlength="20" placeholder="DIGITE SUA SENHA NOVAMENTE" required></p>
                 <div id="erroUser_Senha_Confirmar" class="msg_erro"></div>-->

            </div> <!-- FIM DA DIV DE DADOS DE ACESSO-->

            <div id="endereco"> <!--DIV DE ENDEREÇO -->
                <h4>Endereço</h4>
                <p class="dado"> <label for="user_cep"> CEP </label></p>
                <p><input type="text" name="user_cep" id="user_cep" size="25" maxlength="9" OnKeyPress="formatar('#####-###', this)" placeholder="DIGITE SEU CEP" required value="<?php echo $cep; ?>"></p>
                <div id="erroUser_Cep" class="msg_erro"></div>
                <p class="dado"> <label for="user_logradouro"> Logradouro </label></p>
                <p><input type="text" name="user_logradouro" id="user_logradouro" size="25" maxlength="150" placeholder="EX: RUA JOSÉ ANTÔNIO..." required value="<?php echo $logradouro; ?>"></p>
                <div id="erroUser_Logradouro" class="msg_erro"></div>
                <p class="dado"> <label for="user_numero"> Número  </label></p>
                <p id="numero"><input type="number" name="user_numero" id="user_numero" size="25" maxlength="10" placeholder="EX: 1234" required value="<?php echo $numero; ?>"></p>
                <div id="erroUser_Numero" class="msg_erro"></div>
                <div id="complemento">
                    <p class="dado"><label for="user_complemento">Complemento</label></p>
                    <p><input type="text" name="user_complemento" id="user_complemento" size="25" maxlength="20" placeholder="APTO, BLOCO, ANDAR..." value="<?php echo $complemento; ?>"></p>
                    <div id="erroUser_Complemento" class="msg_erro"></div>
                </div>
                <div id="bairro">
                    <p class="dado"><label for="user_bairro">Bairro</label></p>
                    <p><input type="text" name="user_bairro" id="user_bairro" size="25" maxlength="40" placeholder="DIGITE O NOME DO SEU BAIRRO" required value="<?php echo $bairro; ?>"></p>
                    <div id="erroUser_Bairro" class="msg_erro"></div>
                </div>
                <div id="estado">
                    <p class="dado"><label for="user_codestado">Estado</label></p>
                    <p><select name="user_codestado" id="user_codestado">
				<option value="1" <?php if($estado == 1) {echo " selected ";}?>>AC</option>
				<option value="2" <?php if($estado == 2) {echo " selected ";}?>>AL</option>
				<option value="3" <?php if($estado == 3) {echo " selected ";}?>>AP</option>
				<option value="4" <?php if($estado == 4) {echo " selected ";}?>>AM</option>
				<option value="5" <?php if($estado == 5) {echo " selected ";}?>>BA</option>
				<option value="6" <?php if($estado == 6) {echo " selected ";}?>>CE</option>
				<option value="7" <?php if($estado == 7) {echo " selected ";}?>>DF</option>
				<option value="8" <?php if($estado == 8) {echo " selected ";}?>>ES</option>
				<option value="9" <?php if($estado == 9) {echo " selected ";}?>>GO</option>
				<option value="10" <?php if($estado == 10) {echo " selected ";}?>>MA</option>
				<option value="11" <?php if($estado == 11) {echo " selected ";}?>>MT</option>
				<option value="12" <?php if($estado == 12) {echo " selected ";}?>>MS</option>
				<option value="13" <?php if($estado == 13) {echo " selected ";}?>>MG</option>
				<option value="14" <?php if($estado == 14) {echo " selected ";}?>>PA</option>
				<option value="15" <?php if($estado == 15) {echo " selected ";}?>>PB</option>
				<option value="16" <?php if($estado == 16) {echo " selected ";}?>>PR</option>
				<option value="17" <?php if($estado == 17) {echo " selected ";}?>>PE</option>
				<option value="18" <?php if($estado == 18) {echo " selected ";}?>>PI</option>
				<option value="19" <?php if($estado == 19) {echo " selected ";}?>>RJ</option>
				<option value="20" <?php if($estado == 20) {echo " selected ";}?>>RN</option>
				<option value="21" <?php if($estado == 21) {echo " selected ";}?>>RS</option>
				<option value="22" <?php if($estado == 22) {echo " selected ";}?>>RO</option>
				<option value="23" <?php if($estado == 23) {echo " selected ";}?>>RR</option>
				<option value="24" <?php if($estado == 24) {echo " selected ";}?>>SC</option>
				<option value="25" <?php if($estado == 25) {echo " selected ";}?>>SP</option>
				<option value="26" <?php if($estado == 26) {echo " selected ";}?>>SE</option>
				<option value="27" <?php if($estado == 27) {echo " selected ";}?>>TO</option>
			</select></p>
                    <span id="erroUser_Estado" class="msg_erro"></span>
                </div>
                <div id="cidade">
                    <p class="dado"><label for="user_cidade">Cidade</label></p>
                    <p><input type="text" name="user_cidade" id="user_cidade" size="25" maxlength="50" placeholder="DIGITE A CIDADE" required value="<?php echo $cidade; ?>"></p>
                    <div id="erroUser_Cidade" class="msg_erro"></div>
                </div>

            </div> <!-- FIM DA DIV ENDEREÇO-->
        </div>

        <br/>
        <!-- <a href="#" id="cadastrar" onClick="valida_campo();">CADASTRAR</a> -->
        <input type="submit" value="ALTERAR" id="btnInserir" name="btnInserir" />
    </form>
</div>


</body>
</html>