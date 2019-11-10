<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Usuário</title>

</head>
<?php
          //include "classes/Conexao.class.php";
          if(isset($_POST["btnInserir"]))
          {
              //echo "Botao inserir foi clicado.";
              //1 - Atribuindo as variaveis os valores digitados
              $nome = $_POST["user_nome"];
              $datanascimento = $_POST["user_datanascimento"];
              $sexo = $_POST["user_sexo"];
              $cpf = $_POST["user_cpf"];
              $telefone = $_POST["user_telefone"];
              $celular = $_POST["user_celular"];
              $email = $_POST["user_email"];
              $logradouro = $_POST["user_logradouro"];
              $numero = $_POST["user_numero"];
              $complemento = $_POST["user_complemento"];
              $bairro = $_POST["user_bairro"];
              $cidade = $_POST["user_cidade"];
              $estado = $_POST["user_codestado"];
              $cep = $_POST["user_cep"];
              $senha = $_POST["user_senha"];
              //2 - Instanciando um objeto do tipo conexao
              $c = new Conexao();
              //3 - Criando o comando SQL
              $comandoSql = ("insert into usuarios (user_nome, user_datanascimento, user_sexo,
            user_cpf, user_telefone, user_celular, user_email, user_logradouro, user_numero,
            user_complemento, user_bairro, user_cidade, user_codestado, user_cep, user_senha,
            user_valido, user_status)
			 values ('$nome', '$datanascimento','$sexo', '$cpf', '$telefone', '$celular', '$email', '$logradouro', $numero, '$complemento',
			 '$bairro', '$cidade', $estado, '$cep', '$senha', 0, 1)"); //0 - valido(false) / 1 - status(true)
              //4 - Executando o comando SQL
              $c -> criarConsulta($comandoSql);
              echo "<script>alert('Usuario cadastrado com sucesso! Por favor efetue o Login!')</script>";
          }
?>

<body>
    <div class="cad_Usuarios">
        <form id="formularioCadastroUsuario" name="formularioCadastroUsuario" method="post" action="">
            <h1>Cadastro <span class="titulo-usuario">de Usuário</span></h1>
            <div id="formulario">
                <div id="pessoais"> <!-- DIV DOS DADOS PESSOAIS-->
                    <h4>Dados Pessoais</h4>
                    <p class="dado"> <label for="user_nome"> nome completo </label></p>
                    <p><input type="text" name="user_nome" id="user_nome" size="25" maxlength="100" placeholder="SEU NOME COMPLETO" required></p>

                    <div id="erroUser_Nome" class="msg_erro"></div>
                    <p class="dado"> <label for="user_cpf">cpf</label></p>

                    <p><input type="text" name="user_cpf" id="user_cpf" size="25" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder="APENAS NÚMEROS" required></p>

                    <div id="erroUser_Cpf" class="msg_erro"></div>
                    <p class="dado"> <label for="user_datanascimento">data de nascimento</label></p>

                    <p><input type="date" name="user_datanascimento" id="user_datanascimento" size="25" required> </p>
                    <div id="erroUser_Datanascimento" class="msg_erro"></div>

                    <p class="dado">Sexo</p>
                    <p><input type="radio" name="user_sexo" id="user_sexo_M" value="M" checked>MASCULINO  <!-- FAZER PROGRAMAÇÃO PARA SEXO-->
                        &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="user_sexo" id="user_sexo_F" value="F">FEMININO</p>   <!-- FAZER PROGRAMAÇÃO PARA SEXO-->
                    <p class="dado"><label for="user_telefone"> Telefone </label></p>

                    <p><input type="text" name="user_telefone" id="user_telefone" OnKeyPress="formatar('##-####-####', this)" placeholder="DIGITE APENAS NÚMEROS" maxlength="12" size="25" required></p>

                    <div id="erroUser_Telefone" class="msg_erro"></div>
                    <p class="dado"><label for="user_celular"> Celular </label></p>

                    <p><input type="text" name="user_celular" id="user_celular" OnKeyPress="formatar('##-#####-####', this)" placeholder="DIGITE APENAS NÚMEROS" maxlength="13" size="25" required></p>
                    <div id="erroUser_Celular" class="msg_erro"></div>
                </div> <!-- FIM DA DIV DOS DADOS PESSOAIS-->

                <div id="acesso"> <!-- DIV DE DADOS DE ACESSO -->
                    <h4>Dados de Acesso</h4>
                    <p class="dado"> <label for="user_email"> E-mail </label></p>
                    <p><input type="email" name="user_email" id="user_email" size="25" maxlength="150" placeholder="DIGITE SEU E-MAIL" required></p>
                    <div id="erroUser_Email" class="msg_erro"></div>
                    <p class="dado"> <label for="user_senha"> Senha </label></p>
                    <p><input type="password" name="user_senha" id="user_senha" size="25" maxlength="20" placeholder="DIGITE SUA SENHA" required></p>

                    <!-- <div id="erroUser_Senha" class="msg_erro"></div>
                     <p class="dado"> <label for="user_senha_confirmar"> Confirmar Senha </label></p>
                     <p><input type="password" name="user_senha_confirmar" id="user_senha_confirmar" size="25" maxlength="20" placeholder="DIGITE SUA SENHA NOVAMENTE" required></p>
                     <div id="erroUser_Senha_Confirmar" class="msg_erro"></div>-->

                    <p class="dado">Termos de uso</p><br />
                    <!--Termo de Aceite - Favor pegar um simples e curso para colocar aqui -->
                    <div id="termo-de-uso">
                        <p>Por este <strong>TERMO DE USO</strong>, o <strong>USUÁRIO</strong> do <strong>ONLIBRARY</strong> fica ciente e concorda que ao utilizar o sistema do ONLIBRARY, automaticamente aderirá e concordará em se submeter integralmente às condições do presente TERMO DE USO e qualquer de suas alterações futuras.</p>

                        <p>As palavras grafadas neste instrumento com letras maiúsculas terão o significado que a elas é atribuído de acordo com o estabelecido abaixo:</p>

                        <p><strong>USUÁRIO(S):</strong> são as pessoas físicas ou jurídicas que acessam e usam os serviços providos pelo ONLIBRARY.</p>
                        <p><strong>SITE:</strong> conjunto de páginas ou lugar no ambiente da Internet ocupado com CONTEÚDO de uma empresa ou de uma pessoa.</p>
                        <p><strong>SITE ONLIBRARY:</strong> é o SITE de internet registrado no Núcleo de Informação e Coordenação do Ponto BR (www.registro.br) sob o domínio onlibrary.com.br, com todos os recursos e ferramentas relacionadas a este, bem como outros SITES e domínios da marca ONLIBRARY registrados nos respectivos órgãos responsáveis pela classificação e registro do domínio.</p>
                        <p><strong>ANUNCIANTE(S):</strong> são as pessoas físicas ou jurídicas que veiculam seus anúncios ou publicidade no ONLIBRARY.</p>
                        <p><strong>COOKIE(S):</strong> pequeno arquivo de texto armazenado nos navegadores. Este recurso possibilita a identificação de USUÁRIOS e o direcionamento de documentos de acordo com parâmetros pré-estabelecidos.</p>
                        <p><strong>LINK(S):</strong> significa um acesso eletrônico, seja por meio de imagens ou palavras, que permite a conexão a outras telas de um mesmo SITE, ou, ainda, de outros SITES.</p>
                        <p><strong>SPAM:</strong> são e-mails enviados a um grupo de USUÁRIOS sem a sua devida permissão.</p>
                        <p><strong>CONTEÚDO:</strong> inclui livros, cd's, fotos, imagens, fotos, vídeos, combinações audiovisuais, animações, recursos interativos e outros materiais que o(s) USUÁRIO(S), têm acesso ou submetem a um SITE.</p>
                    </div>
                    <p><input type="checkbox" name="user_aceito" id="aceito" required>Aceito termos de uso</p>
                    <span id="erroUser_Aceito" class="msg_erro"></span>

                </div> <!-- FIM DA DIV DE DADOS DE ACESSO-->

                <div id="endereco"> <!--DIV DE ENDEREÇO -->
                    <h4>Endereço</h4>
                    <p class="dado"> <label for="user_cep"> CEP </label></p>
                    <p><input type="text" name="user_cep" id="user_cep" size="25" maxlength="9" OnKeyPress="formatar('#####-###', this)" placeholder="DIGITE SEU CEP" required="Informar CEP!"></p>
                    <div id="erroUser_Cep" class="msg_erro"></div>
                    <p class="dado"> <label for="user_logradouro"> Logradouro </label></p>
                    <p><input type="text" name="user_logradouro" id="user_logradouro" size="25" maxlength="150" placeholder="EX: RUA JOSÉ ANTÔNIO..." required></p>
                    <div id="erroUser_Logradouro" class="msg_erro"></div>
                    <p class="dado"> <label for="user_numero"> Número  </label></p>
                    <p id="numero"><input type="number" name="user_numero" id="user_numero" size="25" maxlength="10" placeholder="EX: 1234" required=""></p>
                    <div id="erroUser_Numero" class="msg_erro"></div>
                    <div id="complemento">
                        <p class="dado"><label for="user_complemento">Complemento</label></p>
                        <p><input type="text" name="user_complemento" id="user_complemento" size="20" maxlength="20" placeholder="APTO, BLOCO, ANDAR..."></p>
                        <div id="erroUser_Complemento" class="msg_erro"></div>
                    </div>
                    <div id="bairro">
                        <p class="dado"><label for="user_bairro">Bairro</label></p>
                        <p><input type="text" name="user_bairro" id="user_bairro" size="20" maxlength="40" placeholder="DIGITE O NOME DO SEU BAIRRO" required></p>
                        <div id="erroUser_Bairro" class="msg_erro"></div>
                    </div>
                    <div id="estado">
                        <p class="dado"><label for="user_codestado">Estado</label></p>
                        <p><select name="user_codestado" id="user_codestado">
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
                        <span id="erroUser_Estado" class="msg_erro"></span>
                    </div>
                    <div id="cidade">
                        <p class="dado"><label for="user_cidade">Cidade</label></p>
                        <p><input type="text" name="user_cidade" id="user_cidade" size="25" maxlength="50" placeholder="DIGITE A CIDADE" required></p>
                        <div id="erroUser_Cidade" class="msg_erro"></div>
                    </div>

                </div> <!-- FIM DA DIV ENDEREÇO-->
            </div>

            <!-- <a href="#" id="cadastrar" onClick="valida_campo();">CADASTRAR</a> -->
            <p><input type="submit" value="CADASTRAR" id="btnInserir" name="btnInserir" /></p>
        </form>
    </div>

    <!--FIM MODAL CADASTRO USUÁRIO-->
</body>
</html>