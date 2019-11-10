    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Emprestimo de Livros</title>
</head>
<body>

        <div class="window_emprestimo">
            <h1>reserva <span class="titulo-emprestimo">de Livros</span></h1>
            <h3>Preencha nosso cadastro e tenha acesso a reserva de livros, revistas e dvd's. Em poucos minutos você terá acesso a todo nosso acervo.</h3>

            <table id="historico">
                <tr id="head">
                    <td>CÓDIGO</td>
                    <td>NOME DO LIVRO</td>
                    <td>AUTOR</td>
                    <td>REMOVER</td>
                </tr>

                <tr id="corpo">
                    <td>52214</td>
                    <td>A VOLTA DOS QUE NÃO FORAM</td>
                    <td>BATMAN</td>
                    <td>REMOVER</td>
                </tr>

            </table>

            <a href="reserva.php"> <input type="submit" name="empEscolher" id="empEscolher" value="ESCOLHER MAIS LIVROS"/> </a>
            <a href="home.php"> <input type="submit" name="empCancelar" id="empCancelar" value="CANCELAR" /> </a>
            <a href="home.php"> <input type="submit" name="empFinalizar" id="empFinalizar" value="FINALIZAR" /> </a>

        </div>
</body>
</html>