<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Livros</title>
    <link rel="stylesheet" href="_css/relatorio.css" />
    <script type="text/javascript" src="jQuery/jquery.js" ></script>
    <script type="text/javascript" src="jQuery/menujQuery.js"></script>
    <meta name="emport" content="width=device-width, inicitial-scale=1.0;">
</head>
<body>
    <div class="conteiner">
        <header>
            <a href="#" id="logo"></a>
            <header id="cadeado">
                <img src="_imagens/cadeado.png">
            </header>
            <nav>
                <a href="#" id="menu-icon"></a>
            <ul>
                <li><a href="#" class="current">Home</a></li>
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
            <ul class="menu">
                <li><a href="#">Funcionários</a>

                    <ul>

                        <li><a href="#">Alterar</a></li>
                        <li><a href="#">Pesquisa</a></li>
                        <li><a href="#">Relatório</a></li>

                    </ul>

                </li>
                <li><a href="#">Usuários</a>

                    <ul>

                        <li><a href="#">Alterar</a></li>
                        <li><a href="#">Pesquisa</a></li>
                        <li><a href="#">Relatório</a></li>

                    </ul>

                </li>
                <li><a href="#">livros</a></li>
                <li><a href="#">Emprestimo</a></li>
                <li><a href="#">Reserva</a>

                    <ul>

                        <li><a href="#">Alterar</a></li>
                        <li><a href="#">Pesquisa</a></li>

                    </ul>

                </li>
            </ul>
        </div>

        <div class='relatorioEmp'>


         </div>


        <div class="down">

        </div>

    <footer>

        <div id="quem-somos">

            <h1 id="titulo-rodape">Quem Somos</h1>
            <p id="about">Um enorme shopping estava prestes a ser construído na cidade
                americana de Seatle, mas no meio do terreno havia a casinha de Edith Wilson Macefield, uma velhinha durona que estava decidida a não arredar pé dali. Quando o responsável pela obra, Barry Martin, foi conversae com ela, todos acreditaram que iria convencê - la a mudar de ideia. Mas estavam redondamente enganados. Nesta emocionante e singela história real, Barry conta como nasceu a inusitada amizade entre ele e Edith, e as lições de vida que aprendeu com ela. Um enorme shopping estava pretes a ser construído na cidade americana de Seatle, mas no meio do terreno havia a casinha de Edith Wilson Macefield, uma velhinha durona que estava decidida a não arredar pé dali.</p>
        </div>

        <aside id="lado-baixo">

            <hgroup>
                <form id="bottom" method="POST" action="#">
                    <p><label for="cMsg">Fale Conosco: </label></p>
                    <p><textarea name="tMsg" id="cMsg" cols="52" rows="5" placeholder="DEIXE SUA MENSAGEM AQUI!"></textarea>
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
                    <li><a href="#" onclick="return false;" onmouseup="autoScrollTo('livros');">Catálogo</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#" onclick="return false;" onmouseup="autoScrollTo('noticia');">Notícias</a></li>
                    <li><a href="#">Programação</a></li>
                    <li><a href="#" onclick="return false;" onmouseup="autoScrollTo('publicacoes');">Publicação</a></li>
                    <li><a href="#" onclick="return false;" onmouseup="autoScrollTo('video');">Multimídia</a></li>

                </ul>
            </nav>
        </footer>
    </footer>
    </div>
</body>
</html>