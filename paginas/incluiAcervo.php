<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Inclui Acervo</title> 
</head>
 <body>
    <?php
    //include "verificaLogin.php";
	 // include "classes/Conexao.class.php";
  //verificando se o botao inserir foi clicado

  if(isset($_POST["btnCadastrar"]))
  {
      
      //echo $_POST["origem"];
      //exit;
	 //echo "foi clicado no inserir";  
	 
	 //-------------------------------------------------------------------
	 //informações sobre a imagem selecionada
	 
	 //definindo uma pasta para os arquivos de upload
	 $pastaArquivos = '_imagensAcervo/'; 
	 
	 //coletando o nome e o nome temporario da imagem selecionada
	
	 $nomeArquivo= $_FILES["image"]["name"];
	 $nomeTemporario=$_FILES["image"]["tmp_name"];
	 
	 //echo "$pastaArquivos";
	 //echo "<br /> nome do arquivo:  $nomeArquivo";
	 //echo "<br /> nome temporario:  $nomeTemporario";
	
	 //tentando copiar o temporario para a pasta de Arquivos
	 if (move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo))
	  {
        $titulo = $_POST["txtTitulo"];
        $autor = $_POST["txtAutor"];
        $edicao = $_POST["txtEdicao"];
        
        $ano = $_POST["ano"];
        $editora = $_POST["editora"];
        $origem = $_POST["origem"];
        
        $paginas = $_POST["paginas"];
        $idioma = $_POST["idioma"];
        $generos = $_POST["generos"];
        
        $formato = $_POST["formato"];
        $quantidade = $_POST["quantidade"];
        $sinopse = $_POST["txtSinopse"];
        $codbarras = $_POST["txtCodBarras"];
        $isbn = $_POST["txtIsbn"];

        //instanciando objeto do tipo conexao
        $c= new Conexao();
	
	   //criando o comando sql
	  $comandoSql= "INSERT INTO acervo (
      codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, 
      isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (
      '$generos', '$idioma', '$formato', '$editora', '$origem', '$codbarras', '$titulo', '$autor', 
      '$isbn', '$edicao',  $paginas, $ano, $quantidade, '$sinopse', '$nomeArquivo', 1)";
	 //echo $comandoSql;
     //exit;
	 // realizando a innclusao
	  $c->criarConsulta($comandoSql);
     
        echo "<script> alert('Acervo incluido com sucesso!') </script>";
	 
	 //redirecionando para a consulta
	 //de produtos após uma inclusao
	 //header("Location: consultaProduto.php");	 
	  }
  }   
 ?>
    <div class="window">
        <h1>Cadastro <span class="titulo-emprestimo">de livros</span></h1>
 <form method="POST" name="formAcervo" id="formAcervo" action="" enctype="multipart/form-data">
                <section>

                    <p><label for="tTitulo">Título</label><br />
                    <input type="text" name="txtTitulo" id="txtTitulo" maxlength="150" size="35" placeholder="Digite o titulo" required ></p>

                    <p><label for="tAutor">Autor</label><br />
                    <input type="text" name="txtAutor" id="txtAutor" maxlength="150" size="35" placeholder="Digite o nome do autor" required ></p>

                    <p><label for="tEdicao">Edição</label><br />
                    <input type="number" name="txtEdicao" id="txtEdicao" min="0" maxlength="4" size="35" placeholder="Digite a edição" required ></p>

                </section>

                <section>
                    <p><label for="tAno">Ano</label><br />
                    <input type="number" name="ano" id="ano" min="0" maxlength="9999" size="35" placeholder="Digite o ano" required></p>
                    
                    <!-- Option do BD -->
                    <p><label for="tEditora">Editora</label><br />
                    
                    <?php
                   //include "classes/Conexao.class.php";
	  //include "menu.php";
                    $c = new Conexao();
     // $comandoSqlEditora = "SELECT * from editora order
                     $comandoSql = "SELECT * from editora order by nome"; 
                    $resultado = $c -> criarConsulta($comandoSql);
         
                    # abaixo montamos um formulário em html
                    # e preenchemos o select com dados
                    ?>
                    <p><select name="editora" id="editora">
                    
                    <?php while($editora = mysql_fetch_array($resultado)) { ?>
                    <option value="<?php echo $editora['ideditora'] ?>"><?php echo $editora['nome'] ?></option>
                    <?php } ?>           
			        </select></p>
                    
                    
                    <!-- Inicio Origem -->
                    <p><label for="origem">Origem</label><br />
                    <?php
                    //include "classes/Conexao.class.php";
	                 //include "menu.php";
                    $c = new Conexao();
                    // $comandoSqlEditora = "SELECT * from editora order
                     $comandoSql = "SELECT * from origem order by nome"; 
                    $resultado = $c -> criarConsulta($comandoSql);
         
                    # abaixo montamos um formulário em html
                    # e preenchemos o select com dados
                    ?>
                     <p><select name="origem" id="origem">
                    <?php while($origem = mysql_fetch_array($resultado)) { ?>
                    <option value="<?php echo $origem['idorigem'] ?>"><?php echo $origem['nome'] ?></option>
                    <?php } ?>           
			        </select></p>
                    <!-- Fim Origem -->

                    <p><label for="tPaginas">Páginas</label><br />
                    <input type="number" name="paginas" id="paginas" min="0" maxlength="9999" size="35" placeholder="Digite o numero de páginas"></p>
                </section>
                
                <section>
                    
                    <!-- Inicio Idioma -->
                    <p><label for="idioma">Idioma</label><br />
                    <?php
                    //include "classes/Conexao.class.php";
	                 //include "menu.php";
                    $c = new Conexao();
                    // $comandoSqlEditora = "SELECT * from editora order
                     $comandoSql = "SELECT * from idioma order by nome"; 
                    $resultado = $c -> criarConsulta($comandoSql);
         
                    # abaixo montamos um formulário em html
                    # e preenchemos o select com dados
                    ?>
                     <p><select name="idioma" id="idioma">
                    <?php while($idioma = mysql_fetch_array($resultado)) { ?>
                    <option value="<?php echo $idioma['ididioma'] ?>"><?php echo $idioma['nome'] ?></option>
                    <?php } ?>           
			        </select></p>
                    <!-- Fim Idioma -->
                    
                    <!-- Inicio Generos -->
                    <p><label for="generos">Gênero</label><br />
                    <?php
                    //include "classes/Conexao.class.php";
	                 //include "menu.php";
                    $c = new Conexao();
                    // $comandoSqlEditora = "SELECT * from editora order
                     $comandoSql = "SELECT * from generos order by nome"; 
                    $resultado = $c -> criarConsulta($comandoSql);
         
                    # abaixo montamos um formulário em html
                    # e preenchemos o select com dados
                    ?>
                     <p><select name="generos" id="generos">
                    <?php while($generos = mysql_fetch_array($resultado)) { ?>
                    <option value="<?php echo $generos['idgeneros'] ?>"><?php echo $generos['nome'] ?></option>
                    <?php } ?>           
			        </select></p>

                    <!-- Fim Generos -->
                    
                    <!-- Inicio Formato -->
                    <p><label for="formato">Fomato</label><br />
                    <?php
                    //include "classes/Conexao.class.php";
	                 //include "menu.php";
                    $c = new Conexao();
                    // $comandoSqlEditora = "SELECT * from editora order
                     $comandoSql = "SELECT * from formato order by nome"; 
                    $resultado = $c -> criarConsulta($comandoSql);
         
                    # abaixo montamos um formulário em html
                    # e preenchemos o select com dados
                    ?>
                     <p><select name="formato" id="formato">
                    <?php while($formato = mysql_fetch_array($resultado)) { ?>
                    <option value="<?php echo $formato['idformato'] ?>"><?php echo $formato['nome'] ?></option>
                    <?php } ?>           
			        </select></p>
                    <!-- Fim Formato -->

                    <p><label for="tQuantidade">Quantidade</label><br />
                    <input type="number" name="quantidade" id="quantidade" min="0" maxlength="9999" size="35" placeholder="Digite a quantidade" required></p>
                </section>

                  <fieldset><legend>Sinopse</legend>
                      <label for="tSinopse"></label>
                 <textarea name="txtSinopse" id="txtSinopse" cols="120" rows="5" placeholder="Digite a sinopse" required></textarea>

                  </fieldset>

                <div class="status-livro">
                    <section class="formBarra">
                        <p><label for="tBarras">Codigo de Barras</label>
                            <input type="text" name="txtCodBarras" id="txtCodBarras" maxlength="#" size="35" placeholder="Digite o código de barras do livro" required></p>
                    </section>

                    <section class="formBarra">
                        <p><label for="tIsbn">ISBN</label>
                        <input type="text" name="txtIsbn" id="txtIsbn" maxlength="#" size="35" placeholder="Digite o código de barras do livro" required></p>
                    </section>
                    <fieldset id="imagemLivro"><legend>Imagem</legend>
                    <p><label for="image"></label>
                       <input type="file" name="image" />
                    </fieldset>
                </div>

                <div class="submit">
                    <input type="submit" name="btnCadastrar" id="btnCadastrar" value="Cadastrar" />
                </div>
            </form>
    </div>
 </body>
 </html>