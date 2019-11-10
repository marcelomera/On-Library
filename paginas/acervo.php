<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>On-Library</title>
    <meta name="emport" content="width=device-width, inicitial-scale=1.0;">

</head>
<body>
        <div class="window">
            <h1>Emprestimo <span class="titulo-emprestimo">de Livros</span></h1>
            <h3>Preencha nosso cadastro e tenha acesso a reserva de livros, revistas e dvd's. Em poucos minutos você terá acesso a todo nosso acervo.</h3>
            <form method="POST" name="formAcervo" id="formAcervo" action="#">
                <section>
                    <p><label for="tCodigo">Código do Livro</label><br />
                    <input type="text" name="cCodigo" id="tCodigo" maxlength="#" placeholder="xxxxxxxxxxxxxxx"></p>

                    <p><label for="tTitulo">Título</label><br />
                    <input type="text" name="cTitulo" id="tTitulo" maxlength="#" size="35" placeholder="Digite o nome completo do livro"></p>

                    <p><label for="tAutor">Autor</label><br />
                    <input type="text" name="cAutor" id="tAutor" maxlength="#" size="35" placeholder="Digite o nome completo do autor"></p>

                    <p><label for="tEdicao">Edição</label><br />
                    <input type="text" name="cEdicao" id="tEdicao" maxlength="#" size="35" placeholder="Digite a edição do livro"></p>

                </section>

                <section>
                    <p><label for="tAno">Ano</label><br />
                    <input type="text" name="cAno" id="tAno" maxlength="#" size="35" placeholder="Digite o ano do livro"></p>

                    <p><label for="tEditora">Editora</label><br />
                    <input type="text" name="cEditora" id="tEditora" maxlength="#" size="35" placeholder="Selecione o nome da editora"></p>

                    <p><label for="tOrigem">Origem</label><br />
                    <input type="text" name="cOrigem" id="tOrigem" maxlength="#" size="35" placeholder="Seleione o país de origem do livro"></p>

                    <p><label for="tPaginas">Páginas</label><br />
                    <input type="text" name="cPaginas" id="tPaginas" maxlength="#" size="35" placeholder="Digite o numero de páginas"></p>
                </section>

                <section>
                    <p><label for="tIdioma">Idioma</label><br />
                    <input type="text" name="cIdioma" id="tIdioma" maxlength="#" size="35" placeholder="Selecione o idioma do livro"></p>

                    <p><label for="tGenero">Gênero</label><br />
                    <input type="text" name="cGenero" id="tGenero" maxlength="#" size="35" placeholder="Selecione o genero do livro"></p>

                    <p><label for="tFormato">Formato</label><br />
                    <input type="text" name="cFormato" id="tFormato" maxlength="#" size="35" placeholder="Selecione o formato do livro"></p>

                    <p><label for="tQuantidade">Quantidade</label><br />
                    <input type="text" name="cQuantidade" id="tQuantidade" maxlength="#" size="35" placeholder="Digite a quantidade de livros"></p>
                </section>

                  <fieldset><legend>Sinopse</legend>
                      <label for="tSinopse"></label>
                 <textarea name="cSinopse" id="tSinopse" cols="145" rows="5" placeholder="Digite a sinopse do livro"></textarea>

                  </fieldset>

                <div class="status-livro">
                    <section class="formBarra">
                        <p><label for="tBarras">Codigo de Barras</label>
                            <input type="text" name="cBarras" id="tBarras" maxlength="#" size="35" placeholder="Digite o código de barras do livro"></p>
                    </section>

                    <section class="formBarra">
                        <p><label for="tIsbn">ISBN</label>
                        <input type="text" name="cIsbn" id="tIsbn" maxlength="#" size="35" placeholder="Digite o código de barras do livro"></p>
                    </section>

                    <section class="formRadios">
                        <label>Status</label>
                            <p><input type="radio" name="cStatus" id="tAtivo" value="Ativo" checked>Ativo
                            <input type="radio" name="cStatus" id="tInativo" value="Inativo">Inativo</p>
                    </section>
                </div>

                <div class="submit">
                    <input type="submit" name="cSair" id="tSair" value="Sair" />
                    <input type="submit" name="cAlterar" id="tAlterar" value="Alterar" />
                    <input type="submit" name="cSlavar" id="tSalvar" value="Salvar" />
                </div>
            </form>
        </div>
</body>
</html>