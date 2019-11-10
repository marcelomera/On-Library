<?php

if(isset($_POST["btnSalva_admin"]))
{
    //echo "foi clicado no alterar";

    //instanciando um objeto do tipo conexao
    $c= new Conexao();

    //comando sql do select
    $comandoSql= "update funcionarios set
     fun_telefone = '".$_POST["fun_telefone"]."',
     fun_celular = '".$_POST["fun_celular"]."',
     fun_logradouro = '".$_POST["fun_logradouro"]."',
     fun_numero = '".$_POST["fun_numero"]."',
     fun_complemento = '".$_POST["fun_complemento"]."',
     fun_bairro = '".$_POST["fun_bairro"]."',
     fun_cidade = '".$_POST["fun_cidade"]."',
     fun_codestado = '".$_POST["fun_codestado"]."',
     fun_cep = '".$_POST["fun_cep"]."',
     fun_login = '".$_POST["fun_login"]."',
     fun_senha = '".$_POST["fun_senha"]."',
     fun_status = 1
     where idfuncionario = '".$_SESSION["idfuncionario"]."'";

    //atribuindo  o resultado do comando sql na
    //variavel $resultado
    $resultado= $c->criarConsulta($comandoSql);

    //fazendo a variavel de sessao receber
    //atualizacao do nome caso tenha sido alterado

    $_SESSION["fun_nome"] = $_POST["fun_nome"];

    //fazendo a variavel de sessao receber
    //atualizacao da senha caso tenha sido alterada
    // $_SESSION["tipo"] = $_POST["rdbTipo"];

    //-----------------------------------------

    //redirecionando para o consulta de usuario
    //echo "<script> alert ('Usuário alterado com sucesso!') </script>";
    header("Location:admin.php");

}
?>

<?php
// include"classes/Conexao.class.php";
//session_start();
$id = $_SESSION["idfuncionario"];

$c= new Conexao();

//comando sql do select
$comandoSql="select * from funcionarios where idfuncionario = '$id'";
//atribuindo  o resultado do comando sql na
//variavel $resultado
$resultado= $c->criarConsulta($comandoSql);

//usando a funcao mysql_fetch_array
if($linha= mysql_fetch_array($resultado))
{
    //armazenando em variaveis os
    //registros vindos do banco
    $nome = $linha["fun_nome"];
    $datanascimento = $linha["fun_datanascimento"];
    $sexo = $linha["fun_sexo"];
    $cpf = $linha["fun_cpf"];
    $rg = $linha["fun_rg"];
    $telefone = $linha["fun_telefone"];
    $celular = $linha["fun_celular"];
    $email = $linha["fun_email"];
    $logradouro = $linha["fun_logradouro"];
    $numero = $linha["fun_numero"];
    $complemento = $linha["fun_complemento"];
    $bairro = $linha["fun_bairro"];
    $cidade = $linha["fun_cidade"];
    $estado = $linha["fun_codestado"];
    $cep = $linha["fun_cep"];
    $login = $linha["fun_login"];
    $senha = $linha["fun_senha"];
}
//------------------------------------------------------------------
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8 " />
    <title>Perfil de Funcionários</title>

</head>
<body>
<div class="window_perfilAdmin">
    <h1>Perfil <span class="titulo-emprestimo">de Funcionários</span></h1>
<form id="formularioCadastroFuncionario" method="post" action="#">
    <div id="formulario">
        <div id="pessoais"> <!-- DIV DOS DADOS PESSOAIS-->
            <h4>Dados Pessoais</h4>
            <p class="dado"> <label for="fun_nome"> nome completo </label></p>
            <p><input type="text" name="fun_nome" id="fun_nome" size="25" maxlength="100" required oninvalid="this.setCustomValidity(\'Campo requerido\')" placeholder="SEU NOME COMPLETO" disabled="desabled" required value="<?php echo $nome; ?>"></p>
            <p class="dado"> <label for="fun_rg">RG</label></p>
            <p><input type="text" name="fun_rg" id="fun_rg" size="25" maxlength="14" placeholder="APENAS NÚMEROS" disabled="desabled" required value="<?php echo $rg; ?>"> </p>

            <p class="dado"> <label for="fun_cpf">cpf</label></p>
            <p><input type="text" name="fun_cpf" id="fun_cpf" size="25" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder="APENAS NÚMEROS" disabled="desabled" required value="<?php echo $cpf; ?>"> </p>

            <p class="dado"> <label for="fun_datanascimento">Data Nascimento</label></p>
            <p><input type="date" name="fun_datanascimento" id="fun_datanascimento" size="25" placeholder="DIGITE SEU RG SEM TRAÇO" disabled="desabled" required value="<?php echo $datanascimento; ?>"> </p>

            <p class="dado">Sexo</p>
            <p><input type="radio" name="fun_sexo" id="fun_sexo_M" value="M" checked="desabled"
                    <?php
                    if($sexo == "M")
                    {
                        echo "checked=checked";
                    }
                    ?>>MASCULINO &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="fun_sexo" id="fun_sexo_F" value="F" disabled="desabled"
                    <?php
                    if($sexo == "F")
                    {
                        echo "checked=checked";
                    }
                    ?>>FEMININO</p>

            <p class="dado"><label for="fun_telefone"> Telefone </label></p>
            <p><input type="text" name="fun_telefone" id="fun_telefone" OnKeyPress="formatar('##-####-####', this)" placeholder="DIGITE APENAS NÚMEROS" maxlength="12" size="25" required value="<?php echo $telefone; ?>"></p>

            <p class="dado"><label for="fun_celular"> Celular </label></p>
            <p><input type="text" name="fun_celular" id="fun_celular" OnKeyPress="formatar('##-#####-####', this)" placeholder="DIGITE APENAS NÚMEROS" maxlength="13" size="25" required value="<?php echo $celular; ?>"></p>
        </div> <!-- FIM DA DIV DOS DADOS PESSOAIS-->

        <div id="acesso"> <!-- DIV DE DADOS DE ACESSO -->
            <h4>Dados de Acesso</h4>
            <p class="dado"> <label for="fun_email"> E-mail </label></p>
            <p><input type="email" name="fun_email" id="fun_email" size="25" maxlength="150" placeholder="DIGITE SEU E-MAIL" disabled="desabled" required value="<?php echo $email; ?>"></p>
            <p class="dado"> <label for="fun_login"> login </label></p>
            <p><input type="text" name="fun_login" id="fun_login" size="25" maxlength="20" placeholder="DIGITE SEU USUÁRIO" disabled="desabled" required value="<?php echo $login; ?>"></p>
            <p class="dado"> <label for="fun_senha"> Senha </label></p>
            <p><input type="password" name="fun_senha" id="fun_senha" size="25" maxlength="20" placeholder="DIGITE SUA SENHA" required value="<?php echo $senha; ?>"></p>
            <!--
           <p class="dado"> <label for="fun_senha_confirmar"> Confirmar Senha </label></p>
           <p><input type="password" name="fun_senha_confirmar" id="fun_senha_confirmar" size="25" maxlength="20" placeholder="DIGITE SUA SENHA NOVAMENTE"></p>
           -->
        </div> <!-- FIM DA DIV DE DADOS DE ACESSO-->


        <div id="endereco"> <!--DIV DE ENDEREÇO -->
            <h4>Endereço</h4>
            <p class="dado"> <label for="fun_cep"> CEP </label></p>
            <p><input type="text" name="fun_cep" id="fun_cep" size="25" maxlength="9" OnKeyPress="formatar('#####-###', this)" placeholder="DIGITE SEU CEP" required value="<?php echo $cep; ?>"></p>
            <p class="dado"> <label for="fun_logradouro"> Logradouro </label></p>
            <p><input type="text" name="fun_logradouro" id="fun_logradouro" size="25" maxlength="150" placeholder="EX: RUA JOSÉ ANTÔNIO..." required value="<?php echo $logradouro; ?>"></p>
            <p class="dado"> <label for="fun_numero"> Número  </label></p>
            <p id="numero"><input type="number" name="fun_numero" id="fun_numero" size="25" maxlength="10" placeholder="EX: 1234" required value="<?php echo $numero; ?>"></p>
            <div id="complemento">
                <p class="dado"><label for="fun_complemento">Complemento</label></p>
                <p><input type="text" name="fun_complemento" id="fun_complemento" size="25" maxlength="20" placeholder="APTO, BLOCO, ANDAR..." value="<?php echo $complemento; ?>"></p>
            </div>
            <div id="bairro">
                <p class="dado"><label for="fun_bairro">Bairro</label></p>
                <p><input type="text" name="fun_bairro" id="fun_bairro" size="25" maxlength="40" placeholder="DIGITE O SEU BAIRRO" required value="<?php echo $bairro; ?>"></p>
            </div>
            <div id="estado">
                <p class="dado"><label for="fun_codestado">Estado</label></p>
                <p><select name="fun_codestado" id="fun_codestado">
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
            </div>
            <div id="cidade">
                <p class="dado"><label for="fun_cidade">Cidade</label></p>
                <p><input type="text" name="fun_cidade" id="fun_cidade" size="25" maxlength="50" placeholder="DIGITE A CIDADE" required value="<?php echo $cidade; ?>"></p>
            </div>

        </div> <!-- FIM DA DIV ENDEREÇO-->
    </div>

    <br/>
    <p><input type="submit" name="btnSalva_admin" id="btnSalva_admin" value="SALVAR"></p>
</form>
</div>
</body>
</html>