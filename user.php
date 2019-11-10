<?php
if (isset($_GET["act"]))
    {

        if($_GET["act"]=="sair")
        {
            session_start();
            session_destroy();
            header("location:index.php");
            //exit();
        }
        if($_GET["act"]=="cadastro")
        {
          include "classes/Conexao.class.php";
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
    }
else if ($_GET["act"]=="login")
        {
            //echo "<script>alert('oi');</script>";
        include "classes/Conexao.class.php";
    
        if (isset($_POST["btnLogar"]))
        {
            //echo "Botao logar foi clicado";
            //Armazenando nas variaveis o login e a senha digitado
            $email = $_POST["txtLogin"];
            $senha = $_POST["txtSenha"];
    
            //Instancia o objeto do tipo conexao
            $c = new Conexao();
            //Comando Sql para verificar se o usuario e senha estão cadastrados.
            $comandoSql = "SELECT * FROM usuarios WHERE user_email = '$email' AND user_senha = '$senha' AND user_status = 1";
            //echo $comandoSql;
            //Atribuindo o resultado do comando sql na variavel $resultado
            $resultado = $c->criarConsulta($comandoSql);
            
            if ($linha = mysql_fetch_array($resultado))
            {
    
                $id = $linha["idusuario"];
                $nome = $linha["user_nome"];
                $email = $linha["user_email"];
                $tipo = "Usuario";
    
                //Startando a sessao
                session_start();
    
                //Atribuindo valor para a variavel de sessao nome e e-mail
                $_SESSION["user_nome"]=$nome;
                $_SESSION["user_email"]=$email;
                //Atribuindo valor para a variavel de sessao tipo
                $_SESSION["tipo"]=$tipo;
                header("location:user.php");
            }
            else
                {
                    //Comando Sql para verificar se o funcionario e senha estão cadastrados.
                    $comandoSql = "SELECT * FROM funcionarios WHERE fun_login = '$email' AND fun_senha = '$senha' AND fun_status = 1";
                    //echo $comandoSql;
                    //Atribuindo o resultado do comando sql na variavel $resultado
                    $resultado = $c->criarConsulta($comandoSql);
                    echo "<script> alert ('Teste') </SCRIPT>";
                    if ($linha = mysql_fetch_array($resultado))
                    {
                        $id = $linha["idfuncionario"];
                        $nome = $linha["fun_nome"];
                        $email = $linha["fun_email"];
                        $tipo = "Funcionario";
                        
                        //Startando a sessao
                        session_start();
            
                        //Atribuindo valor para a variavel de sessao nome
                        $_SESSION["fun_nome"]=$nome;
                        $_SESSION["fun_email"]=$email;
                
                        //Atribuindo valor para a variavel de sessao tipo
                        $_SESSION["tipo"]=$tipo;
                        header("location:admin.php");
                }
    
                //Caso não exista funcionario e nem usuario volta para a index.
                
                header("location:index.php");
            }
        }
        }
    }

?>
        <!-- FINAL PROGRAMAÇÃO CADASTRO USUÁRIO -->

<?php
include"classes/Conexao.class.php";

session_start();

if(isset($_SESSION["tipo"])) 
{
    if ($_SESSION["tipo"] == "Funcionario") 
    {
        header("location:admin.php");
    } 
    else 
    {

    }
}
else 
{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>On-Library - Usuário</title>

    <!-- CSS Code -->
    <link rel="stylesheet" href="_css/_cadastroUsuario/user.css" />
    <link rel="stylesheet" href="_css/_login/login.css"/>
    <link rel="stylesheet" href="carouselTopo/css/carrossel.css" />
    <link rel="stylesheet" href="_js/carrossel_Noticias/css/carrossel.css" />
    <link rel="stylesheet" href="_css/_cadastroUsuario/estilo_cadastro.css"/>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <meta name="emport" content="width=device-width, inicitial-scale=1.0;">

    <!-- MODAL LOGIN -->
    
    <div class="window_Login" id="janela" rel="modal">
        <a href="#" class="fechar" id="x">X</a>
        <h4>ACESSE SUA CONTA</h4>
        <form method="POST" action="index.php?act=login" name="formProject" id="formProject">
        <p><label for="txt_email"><input type="text" name="txtLogin" id="txtLogin" size="25" maxlength="40" placeholder="LOGIN"> </label></p>
        <p><label for="cSenha"> <input type="password" name="txtSenha" id="txtSenha" size="25" maxlength="10" placeholder="SENHA"> </label></p>
        <br/>
        <a href="#"><span class="cadastro">Esqueci a senha</span></a><br/>
        <a href="#janela1" rel="modal1"><span class="cadastro">Não tenho cadastro</span></a>
        <input type="submit" name="btnLogar" id="btnLogar" value="Entrar">
        </form>
    </div>
    <!--FIM MODAL LOGIN-->

    <script language="javascript" type="text/javascript" src="_js/_login/jquery-1.2.6.js"></script>
    <script language="JavaScript" type="text/javascript" src="_js/_login/funcao.js"></script>
    <!--

    <script src="_jquery/jquery.library.js"></script>
    <script src="_jquery/jquery-1.11.3.min.js"></script>

    -->

    <link rel="stylesheet" type="text/css" href="_css/_galeria/gallery.css" />
    <!--[if IE]>

    <![endif]-->
    <script src="_js/jQuery_galeria/TweenMax.min.js"></script>
    <script src="_js/jQuery_galeria/jquery.min.js"></script>

    <!--FIM CARROSSEL GALERIA -->

    <!--MORAL USUÁRIO-->

    <script language="javascript" type="text/javascript" src="_js/_cadastroUsuario/jquery-1.2.6.js"></script>
    <script language="JavaScript" type="text/javascript" src="_js/_cadastroUsuario/funcao.js"></script>

    <script type="text/javascript">
        function formatar(mascara, documento)
        {
            var i = documento.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(i);
            if (texto.substring(0,1) != saida)
            {
                documento.value += texto.substring(0,1);
            }
        }
    </script>
    <!--FIM MORAL USUÁRIO-->

    <!-- INICIO CARROSSEL TOPO -->

    <script type="text/javascript" src="carouselTopo/js/infinitecarousel/jquery.infinitecarousel.js"></script>

    <!-- FIM CARROSSEL TOPO -->


    <!--CARROSSEL NOTICIAS -->

    <script type="text/javascript">
        $(function(){
            $('#carrossel').infiniteCarousel2();
        });

    </script>

    <script type="text/javascript" src="_js/carrossel_Noticias/js/infinitecarousel/jquery.infinitecarousel2.js"></script>

    <!--FIM CARROSSEL NOTICIAS -->

    <!-- INICIO CARROSSEL TOPO -->

    <script type="text/javascript" src="carouselTopo/js/infinitecarousel/jquery.infinitecarousel.js"></script>

    <script type="text/javascript">
        $(function(){
            $('#carrossel-topo').infiniteCarousel();
        });

    </script>

    <style>
        div.contentbox {
            width: auto;
            height: auto;
            background: #FFF;
        }
    </style>
    <script src="_js/autoScrollTo.js"></script>
</head>
<body>


<!--********************************************************************************************************************
                                                   FORMATAÇÃO HOME
*********************************************************************************************************************-->

<div id="home" class="contentbox">
    <header>
    <a href="user.php" id="logo"></a>
    <header id="cadeado">
        <a href="#janela" rel="modal"><img src="_imagens/cadeado.png"></a>
    </header>
    <nav>
        <a href="#" id="menu-icon"></a>

        <ul id="myheading">

            <li><a href="user.php" class="active">Home</a></li>
            <li><a href="usuario.php">Perfil</a></li>
            <li><a href="#livros">Catálogo</a></li>
            <li><a href="#janela1" rel="modal1">Cadastro</a></li>
            <li><a href="#noticia">Notícias</a></li>
            <li><a href="#programacao">Programação</a></li>
            <li><a href="#publicacoes">Publicação</a></li>
            <li><a href="#multimidia">Multimídia</a></li>

        </ul>
    </nav>
</header>
    <div class="doc">
    <div id="carrossel-topo">
        <ul>
            <li>
                <img src="_imagens/01-hq.jpg"/>
                <h3 class="titulo-carrossel">Biblioteca portuguesa de Belém pede apoio</h3>
                <p>Para a bibliotecária Nazaré Góes, trabalhar rodeada desses títulos é uma viagem no tempo. “Estou há 23 anos aqui e tudo me remete ao passado. Infelizmente, desde que entrei obras já se perderam, mas o que temos hoje é um tesouro. Aqui sei que consigo um mundo de informações que podem ajudar muita gente. Recebemos pessoas de outros países, vez ou outra, para fazer pesquisas. Eles conhecem mais esse lugar do que quem mora aqui”, comenta.</p>
            </li>

            <li>
                <img src="_imagens/02-hq.jpg"/>
                <p>Para a bibliotecária Nazaré Góes, trabalhar rodeada desses títulos é uma viagem no tempo. “Estou há 23 anos aqui e tudo me remete ao passado. Infelizmente, desde que entrei obras já se perderam, mas o que temos hoje é um tesouro. Aqui sei que consigo um mundo de informações que podem ajudar muita gente. Recebemos pessoas de outros países, vez ou outra, para fazer pesquisas. Eles conhecem mais esse lugar do que quem mora aqui”, comenta.</p>
            </li>

            <li>
                <img src="_imagens/03.jpg"/>
                <p>Para a bibliotecária Nazaré Góes, trabalhar rodeada desses títulos é uma viagem no tempo. “Estou há 23 anos aqui e tudo me remete ao passado. Infelizmente, desde que entrei obras já se perderam, mas o que temos hoje é um tesouro. Aqui sei que consigo um mundo de informações que podem ajudar muita gente. Recebemos pessoas de outros países, vez ou outra, para fazer pesquisas. Eles conhecem mais esse lugar do que quem mora aqui”, comenta.</p>
            </li>

            <li>
                <img src="_imagens/biblioteca-02.jpg"/>
                <p>Para a bibliotecária Nazaré Góes, trabalhar rodeada desses títulos é uma viagem no tempo. “Estou há 23 anos aqui e tudo me remete ao passado. Infelizmente, desde que entrei obras já se perderam, mas o que temos hoje é um tesouro. Aqui sei que consigo um mundo de informações que podem ajudar muita gente. Recebemos pessoas de outros países, vez ou outra, para fazer pesquisas. Eles conhecem mais esse lugar do que quem mora aqui”, comenta.</p>
            </li>

            <li>
                <img src="_imagens/biblioteca-05.jpg"/>
                <p>Para a bibliotecária Nazaré Góes, trabalhar rodeada desses títulos é uma viagem no tempo. “Estou há 23 anos aqui e tudo me remete ao passado. Infelizmente, desde que entrei obras já se perderam, mas o que temos hoje é um tesouro. Aqui sei que consigo um mundo de informações que podem ajudar muita gente. Recebemos pessoas de outros países, vez ou outra, para fazer pesquisas. Eles conhecem mais esse lugar do que quem mora aqui”, comenta.</p>
            </li>
        </ul>
        </div>
    </div>

             <a href="#" onclick="return false;" onmousedown="resetScroller('myheading');">
                 go back to top</a>

    <!--MODAL LOGIN-->

    <div class="window_Login" id="janela" rel="modal">
        <a href="#" class="fechar" id="x">x</a>
        <h4>ACESSE SUA CONTA</h4>
            <form method="POST" action="#" name="formProject" id="formProject">
                <p><label for="txtLogin"> <input type="text" name="txtLogin" id="txtLogin" size="25" maxlength="40" placeholder="LOGIN"> </label></p>
                <p><label for="txtSenha"> <input type="password" name="txtSenha" id="txtSenha" size="25" maxlength="10" placeholder="SENHA"> </label></p>
                <br/>
                <a href="#"><span class="cadastro">Esqueci a senha</span></a><br/>
                <a href="#janela1" rel="modal1"><span class="cadastro">Não tenho cadastro</span></a>
                <input type="submit" name="btnLogar" id="btnLogar" value="Entrar">
            </form>
        </div>
    <!--FIM MODAL LOGIN-->


    <!-- mascara para cobrir o site -->
    <div id="mascara"></div>


      <!--MODAL CADASTRO USUÁRIO-->

    <div class="window" id="janela1" rel="modal1">
        <form id="formularioCadastroUsuario" name="formularioCadastroUsuario" method="post" action="index.php?act=cadastro">
            <a href="#" class="fechar" id="x">X</a>
            <h1>Cadastro <span class="titulo-emprestimo">de Usuário</span></h1>

           <h3>Preencha nosso cadastro e tenha acesso a reserva de livros, revistas e dvd's. Em poucos minutos você terá acesso a todo nosso acervo. Em poucos minutos você terá acesso a todo nosso acervo.</h3>

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

                    <p class="dado">Termos de uso</p>
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
                        <p><input type="text" name="user_complemento" id="user_complemento" size="25" maxlength="20" placeholder="APTO, BLOCO, ANDAR..."></p>
                        <div id="erroUser_Complemento" class="msg_erro"></div>
                    </div>
                    <div id="bairro">
                        <p class="dado"><label for="user_bairro">Bairro</label></p>
                        <p><input type="text" name="user_bairro" id="user_bairro" size="25" maxlength="40" placeholder="DIGITE O NOME DO SEU BAIRRO" required></p>
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

            <br/>
            <!-- <a href="#" id="cadastrar" onClick="valida_campo();">CADASTRAR</a> -->
            <input type="submit" value="CADASTRAR" id="btnInserir" name="btnInserir" />
        </form>
    </div>

    <!-- mascara para cobrir o site -->
    <div id="mascara"></div>
    <!--FIM MODAL CADASTRO USUÁRIO-->
<!--********************************************************************************************************************
                                                 FORMATAÇÃO LIVROS NOVOS
*********************************************************************************************************************-->

<div id="livros" class="contentbox">

    <div class="clear"></div>

    <div id="corpo1">

        <h2 class="title-book2">Livros Novos</h2>

        <div class="clear"></div>

        <section class="l-novos">
            <img src="_imagens/livro1.jpg" />
            <h1>Boyhood - Da Infância a Juventude!</h1>

        </section>

        <section class="l-novos">
            <img src="_imagens/livro - 01.jpg" />
            <h1>gladiator - Batalha Nas Ruas</h1>

        </section>

        <section class="l-novos">
            <img src="_imagens/livro - 02.jpg" />
            <h1>Capitães <br/>da Areia</h1>

        </section>

        <section class="l-novos">
            <img src="_imagens/livro - 03.jpg" />
            <h1>Amor De <br/>Pai</h1>


        </section>

        <section class="l-novos">
            <img src="_imagens/livro - 04.jpg" />
            <h1>Quero Ser <br/>Seu</h1>

        </section>
        <div class="clear"></div>
    </div>
<!--********************************************************************************************************************
                                                  FORMATAÇÃO MAIS LIDOS
*********************************************************************************************************************-->

    <div class="corpo2">

        <h2 class="title-book">Mais Lidos</h2>

        <div class="clear"></div>

        <section class="lidos">
            <img src="_imagens/livro - 05.jpg" />
            <h1>São <br/>Bernardo</h1>

        </section>

        <section class="lidos">
            <img src="_imagens/livro - 06.jpg" />
            <h1>Assassin´S Creed - Renascença</h1>

        </section>

        <section class="lidos">
            <img src="_imagens/livro - 07.jpg" />
            <h1>The Twilight saga breaking dawn</h1>

        </section>

        <section class="lidos">
            <img src="_imagens/livro1.jpg" />
            <h1>Boyhood - Da Infância a Juventudo!</h1>

        </section>

        <section class="lidos">
            <img src="_imagens/livro - 01.jpg" />
            <h1>gladiator - Batalha Nas Ruas</h1>
        </section>
        <div class="clear"></div>
        <div class="clear"></div>

    </div>

    </div>
    <div class="clear"></div>

<!--********************************************************************************************************************
                                                     FORMATAÇÃO NOTÍCIAS
*********************************************************************************************************************-->

<div id="noticia" class="contentbox">
    <div id="carrossel">
    <h2 id="noticias">Notícias</h2>

    <div class="clear"></div>

    <div class="carrossel">

        <ul>
            <li><img src="_imagens/NOT-01.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-02.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-03.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-04.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-05.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-06.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-07.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-08.jpg" alt="" /></li>
            <li><img src="_imagens/NOT-09.jpg" alt="" /></li>
        </ul>
        </div>

    </div>

</div>

    <div class="clear"></div>


<!--********************************************************************************************************************
                                                 FORMATAÇÃO PROGRAMAÇÃO
*********************************************************************************************************************-->

    <div id="programacao" class="contentbox">

        <h2 class="pgm">Programação</h2>

        <section class="pgm01">
            <h3>O Senac Itaquera apresenta, de 22 a 26 de outubro, o evento Leitura, Arte e Cultura.</h3>
            <figure class="foto-legenda">
                <img src="_imagens/img-pgm.jpg"/>
                <figcaption>
                    <h3>On-Library</h3>
                    <p>Uma nova maneira de ver o mundo.</p>
                </figcaption>
            </figure>
            <p>A ação tem como objetivo reforçar aos participantes o prazer e a importância da literatura e da apreciação das artes, como teatro, música, artes plásticas, cinema e dança.<br/>
                Na ocasião, haverá troca de livros, apresentações, exibições de filmes e oficinas. Nessa edição, as atividades serão voltadas para a reflexão do tema Cultura de Paz.
                O evento é gratuito e direcionado para alunos, ex-alunos, funcionários e comunidade local. Não é necessário realizar inscrição para participar das atividades.</p>
        </section>

        <section class="pgm02">
            <p><img src="_imagens/NOT-01.jpg" /></p>
            <h3>Tô em Outra explora temas polêmicos em 'Filosofia da Revolução'.</h3>
        </section>

        <section class="pgm02">
            <p><img src="_imagens/NOT-02.jpg" /></p>
            <h3>9ª ‘Semana Ticket Cultura’ reúne programação cultural gratuita.</h3>
        </section>

        <section class="pgm03">
            <p><img src="_imagens/NOT-03.jpg" /></p>
            <h3>MASP apresenta espetáculo 'Uma Espécie de Alasca'.</h3>
        </section>

        <section class="pgm03">
            <p><img src="_imagens/NOT-04.jpg" /></p>
            <h3>LCCBB recebe a exposição 'ComCiência',  com criaturas hiperreali.</h3>
        </section>

        <div class="clear"></div>

    </div>

    <div class="clear"></div>


    <!--********************************************************************************************************************
                                                     FORMATAÇÃO PUBLICAÇÕES
    *********************************************************************************************************************-->

<div id="publicacoes" class="contentbox">

        <h2 class="public">Publicações</h2>

        <section class="publicacao">

            <h1>Sem convênio, Cicc vai encerrar atividades</h1>

            <p class="public">O Centro Integrado de Ciência e Cultura (Cicc) de Rio Preto vai fechar as suas portas. Cerca de 40 funcionários que trabalham no local, por meio de convênio firmado entre a Fundação de Apoio à Pesquisa e Extensão de Rio Preto (Faperp) e a Prefeitura, já assinaram o aviso prévio. De acordo com o presidente da Faperp, Luiz Carlos Baida, o convênio que a instituição possui com a Secretaria de Educação não será renovado. “Esse convênio está se findando e não foi renovado. Não sei se será. Neste ano, não mais”, afirmou Baida, que lamenta que a parceria com o Executivo foi interrompido.<br/>

O coordenador do Cicc, Alexandre Neves, afirmou que a visitação e as atividades com os equipamentos de física, astronomia entre outros terão as atividades encerradas por causa do fim do repasse de recursos pelo município. “Todo mundo já assinou aviso prévio. São cerca de 40 pessoas entre monitores e funcionários”, disse Neves ao dizer que a Unesp local também participa do atual projeto a aproximadamente sete anos.<br/>
</p>
<!-- Linkhttp://www.diariodaregiao.com.br/politica/sem-conv%C3%AAnio-cicc-vai-encerrar-atividades-1.377193 -->
        </section>

    <section class="pgm04">
        <h3>Amazon inaugura sua primeira livraria física nos Estados Unidos<br/>
Gigante do varejo americano começou vendendo livros pela internet</h3>
        <p>	Uma gigante da internet, que começou como livraria on-line, agora, mais de 20 anos depois, passará a vender livros à moda antiga. Nesta terça-feira, a Amazon inaugura sua primeira loja física, a Amazon Books.<br/>
        Mas nem tudo será feito à moda antiga.</p>
        <!-- Link - http://oglobo.globo.com/cultura/livros/amazon-inaugura-sua-primeira-livraria-fisica-nos-estados-unidos-17949391-->
    </section>

    <section class="pgm04">
        <h3>Disputa entre Nintendo e Sega inspira livro, documentário e filme</h3>
        <p>De uma disputa que se estende até hoje, agora envolvendo Sony (Playstation) e Microsoft (X-Box) por um mercado de bilhões de dólares, a escolha de Sonic — das características ao desenho — envolveu uma disputa interna entre a matriz e a filial dos Estados Unidos. A opção pelo visual “fofo”, defendida pelo segundo time, foi uma vitória particular de Tom Kalinske, o executivo que é protagonista incidental de “A guerra dos consoles.<br/>
        </p>
<!-- link - http://oglobo.globo.com/cultura/livros/disputa-entre-nintendo-sega-inspira-livro-documentario-filme-17938205-->
    </section>

    <div class="clear"></div>

    <section class="pgm05">
        <h3>Seminário aprofunda relação entre Cultura e Cidades</h3>
        <p>	A relação entre cultura e cidade será tema de debate nesta quarta-feira (4), em São Paulo, durante seminário do Programa Cultura e Pensamento, desenvolvido pela Secretaria de Políticas Culturais do Ministério da Cultura (MinC) em parceria com a Fundação Casa de Rui Barbosa.</p>
        <!-- Link - http://www.cultura.gov.br/noticias-destaques/-/asset_publisher/OiKX3xlR9iTn/content/seminario-aprofunda-relacao-entre-cultura-e-cidades/10883?redirect=http%3A%2F%2Fwww.cultura.gov.br%2Fnoticias-destaques%3Fp_p_id%3D101_INSTANCE_OiKX3xlR9iTn%26p_p_lifecycle%3D0%26p_p_state%3Dnormal%26p_p_mode%3Dview%26p_p_col_id%3Dcolumn-1%26p_p_col_count%3D1-->
    </section>

    <section class="pgm05">
        <h3>Brasil e UE: maior cooperação para acervos digitais culturais</h3>
        <p>	Trocar experiências entre Brasil e Europa sobre digitalização de acervos culturais. Esse será um dos objetivos da missão internacional de representantes do Ministério da Cultura (MinC) em Amsterdã, na Holanda, entre 1 e 8 de novembro. A viagem ocorre no âmbito do Projeto Apoio aos Diálogos Setoriais União Europeia-Brasil.</p> 
        <!-- -Linkhttp://www.cultura.gov.br/noticias-destaques/-/asset_publisher/OiKX3xlR9iTn/content/brasil-e-ue-maior-cooperacao-para-acervos-digitais-culturais/10883?redirect=http%3A%2F%2Fwww.cultura.gov.br%2Fnoticias-destaques%3Fp_p_id%3D101_INSTANCE_OiKX3xlR9iTn%26p_p_lifecycle%3D0%26p_p_state%3Dnormal%26p_p_mode%3Dview%26p_p_col_id%3Dcolumn-1%26p_p_col_count%3D1-->
    </section>

    <section class="pgm06">

        <h1>Conheça a Biblioteca Nacional do Brasil</h1>

        <p class="public">Considerada pela UNESCO uma das dez maiores bibliotecas nacionais do mundo, é também a maior biblioteca da América Latina. O núcleo original de seu poderoso acervo, calculado hoje em cerca de dez milhões de itens, é a antiga livraria de D. José organizada sob a inspiração de Diogo Barbosa Machado, Abade de Santo Adrião de Sever, para substituir a Livraria Real, cuja origem remontava às coleções de livros de D. João I e de seu filho D. Duarte, e que foi consumida pelo incêndio que se seguiu ao terremoto de Lisboa de 1º de novembro de 1755.<br/></p>
    </section>

        <div class="clear"></div>

</div>

    <div class="clear"></div>


<!--********************************************************************************************************************
                                                 FORMATAÇÃO MULTIMÍDIA
*********************************************************************************************************************-->

<div id="video" class="contentbox">
                <div id="multimidia">
                    <section id="corpo-multimidia">
                        <h1>Multimídia : Vídeos e Fotos</h1>

                        <hgroup>
                            <video id="materia" controls="controls" poster="#">
                                <source src="_media/Manifesto a leitura.mp4" type="video/mp4"/>
                            </video>
                            <p id="v1">Manifesto a leitura Vídeo desenvolvido na cadeira de oficina I, do curso de Serviço Social da Universidade Estadual do Ceará </p>
                        </hgroup>
                    </section>

                    <section class="video2">
                        <video class="movie1" controls="controls" poster="#">
                            <source src="_media/Ler devia ser proibido.mp4" type="video/mp4"/>
                        </video>
                        <p>"Ler devia ser proibido". Campanha de incentivo à leitura.</p>
                    </section>

                    <section class="video2">
                        <video class="movie1" controls="controls" poster="#">
                            <source src="_media/Campanha de incentivo à leitura - POR QUE LER.mp4" type="video/mp4"/>
                        </video>
                        <p>Campanha de incentivo à leitura - POR QUE LER?</p>
                    </section>

                    <section class="video2">
                        <video class="movie1" controls="controls" poster="#">
                            <source src="_media/Incentivo à leitura.mp4" type="video/mp4"/>
                        </video>
                        <p>Incentivo à leitura. Como e quando incentivar seu filho a ler.</p>
                    </section>

                    <section class="video3">
                        <video class="movie1" controls="controls" poster="#">
                            <source src="_media/A menina que nao sabia ler.mp4" type="video/mp4"/>
                        </video>
                        <p>A menina que nao sabia ler.</p>
                    </section>

                    <section class="video3">
                        <video class="movie1" controls="controls" poster="#">
                            <source src="_media/O Livro que só queria ser lido.mp4" type="video/mp4"/>
                        </video>
                        <p>«O Livro que só queria ser lido» Uma adaptação do conto homónimo de José Jorge Letria</p>
                    </section>

                    <section class="video3">
                        <video class="movie1" controls="controls" poster="">
                            <source src="_media/O Assunto É Leitura - Formação de Leitores.mp4" type="video/mp4"/>
                        </video>
                        <p>O Assunto É "Leitura" - Formação de Leitores</p>

                    </section>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="filters hidden">
        <defs>
            <filter id="blur">
                <feGaussianBlur in="SourceGraphic" stdDeviation="0,0" />
            </filter>
        </defs>
    </svg>
    <div class="conteiner_Gallery">
        <div class="gallery">
            <div class="menuGallery">
                <a class="current-menu" href="index.php">Image Gallery</a>
            </div>
            <ul class="gallery-pictures">
                <li class="gallery-picture">
                    <img src="_imagens/01.jpg" alt="img01">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/02.jpg" alt="img02">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/03.jpg" alt="img03">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/04.jpg" alt="img04">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/05.jpg" alt="img05">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/06.jpg" alt="img06">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/07.jpg" alt="img07">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/08.jpg" alt="img08">
                </li>
                <li class="gallery-picture">
                    <img src="_imagens/09.jpg" alt="img09">
                </li>
            </ul>
            <div class="gallery-pagination">
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
                <button class="gallery-pagination-dot"></button>
            </div>
            <script src="_js/jQuery_galeria/gallery.js"></script>

        </div>
    </div>
</div>

<!--********************************************************************************************************************
                                                 FORMATAÇÃO RODAPÉ
*********************************************************************************************************************-->

    <footer>

        <div id="quem-somos"><br/>

            <h1 id="titulo-rodape">Quem Somos</h1>
                <p id="about"><em>OnLibrary</em> tem como objetivo de promover o desenvolvimento intelectual, cultural, democratizar o acesso ao catálogo público através de redes locais, à leitura informativa e de lazer para a comunidade, independentemente da idade, raça, religião, grau de escolaridade e nível social. À internet como uma das principais fontes de informação do mundo globalizado.<br/><br/>
                    A Biblioteca Pública tem como missão proporcionar oportunidades para o desenvolvimento sócio educacional, criativo e estimular o hábito de leitura, imaginação, promovendo o acesso, uso dos produtos, serviços e a geração da informação.
</p>
        </div>


        <aside id="lado-baixo">

            <hgroup>
            <form id="bottom" method="POST" action="#">
            <p><label for="cMsg">Fale Conosco: </label></p>
                <p><textarea name="tMsg" id="cMsg" cols="52" rows="15" placeholder="DEIXE SUA MENSAGEM AQUI!"></textarea>
             <input type="button" id="fEnviar" name="fEnviar" value="Enviar" /></p>
            </form>
            </hgroup>


    <nav id="social">
        <ul id="icons">
            <li><a href="https://www.facebook.com/" target="_blank"><img src="_imagens/facebook.png" /></a></li>
            <li><a href="http://www.google.com.br" target="_blank"><img src="_imagens/google+.png" /></a></li>
            <li><a href="https://twitter.com/?lang=pt" target="_blank"><img src="_imagens/twitter.png" /></a></li>
            <li><a href="https://br.linkedin.com/" target="_blank"><img src="_imagens/likedin.png" /></a></li>
        </ul>
    </nav>
        </aside>

<footer class="second">
    <nav id="menu-down">
        <a href="#" id="menu-icon3"></a>
        <ul id="myheading2">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="#livros">Catálogo</a></li>
            <li><a href="#janela1" rel="modal1">Cadastro</a></li>
            <li><a href="#noticia">Notícias</a></li>
            <li><a href="#programacao">Programação</a></li>
            <li><a href="#publicacoes">Publicação</a></li>
            <li><a href="#multimidia">Multimídia</a></li>

        </ul>
    </nav>
    </footer>
</footer>
</div>
</body>
</html>