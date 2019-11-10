<?php
if (isset($_GET["act"])){

    if($_GET["act"]=="sair"){

        session_start();
        session_destroy();

        header("location:index.php");

        //exit();
    }
}
?>

<?php
    include"classes/Conexao.class.php";
    session_start();
    if(isset($_SESSION['tipo']))
    {
        if ($_SESSION['tipo'] == "Funcionario")
        {
            header("location:index.php");
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
    <title>Perfil Usuário</title>
    <link rel="stylesheet" href="_css/_login/login.css"/>
    <link rel="stylesheet" href="_css/_emprestimo/emprestimo.css" />
    <link rel="stylesheet" href="_css/_reserva/reserva.css"/>
    <link rel="stylesheet" href="_css/_cadastroFuncionario/cadastro_funcionario.css"/>
    <link rel="stylesheet" href="_css/_cadastroUsuario/perfil_user.css"/>
    <link rel="stylesheet" href="_css/_cadastroUsuario/usuarios.css"/>
    <link rel="stylesheet" href="_css/_cadastroUsuario/consultaLivro.css"/>
    <link rel="stylesheet" href="_css/_cadastroUsuario/consultaAcervoUser.css"/>
    <script type="text/javascript" src="_js/_menu/jquery.js" ></script>
    <script type="text/javascript" src="_js/_menu/menujQuery.js"></script>
    <meta name="emport" content="width=device-width, inicitial-scale=1.0;">

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
</head>
<body>

    <div class="conteiner">
        <header>
            <a href="index.php" id="logo"></a>
            <header id="cadeado">

                    <img src="_imagens/cadeado.png" />

            </header>
            <nav>
                <a href="#" id="menu-icon"></a>
            <ul>
                <li><a href="user.php" class="current">Home</a></li>
                <li><a href="usuario.php" class="current">Perfil</a></li>
                <li><a href="#">Catálogo</a></li>
                <li><a href="#">Cadastro</a></li>
                <li><a href="#">Notícias</a></li>
                <li><a href="#">Programação</a></li>
                <li><a href="#">Publicação</a></li>
                <li><a href="#">Multimídia</a></li>

            </ul>
            </nav>
        </header>
        <div class="nav">
            <form method="POST" action="usuario.php?act=sair" id="leave" name="leave">
                <ul class="menu">
                    <li><a href="usuario.php?link=perfil_user">Perfil</a></li>
                    <li><a href="usuario.php?link=consultaAcervoUsuario">Emprestimo/Reserva</a></li>
                    <li><a href="usuario.php?link=consultaLivro">Livros</a></li>
                    <li id="sair"><input type="submit" name="btnsair" id="btnsair" value="SAIR"/></a></li>
                    <h2 id="FunLogado">Olá, <?php echo $_SESSION['user_nome'];?></h2>
                </ul>
            </form>
        </div>

        <?php
        //Se n�o clicou para abrir, mostra p�gina home

        if(empty($_SERVER['QUERY_STRING']))
        {
            include "paginas/perfil_user.php";
        }
        else{ //Se n�o abri conte�do especificado no ?link=....
            include "paginas/".$_GET['link'].".php";
        }
        ?>

        <div class="down">

        </div>

    <footer>

        <div id="quem-somos">
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
                    <li><a href="#">Catálogo</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#">Notícias</a></li>
                    <li><a href="#">Programação</a></li>
                    <li><a href="#">Publicação</a></li>
                    <li><a href="#">Multimídia</a></li>
                </ul>
            </nav>
        </footer>
    </footer>
    </div>
</body>
</html>