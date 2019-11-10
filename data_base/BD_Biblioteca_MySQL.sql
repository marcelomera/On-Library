-- Criando o Banco
CREATE DATABASE biblioteca

-- Selecionando o banco para executar os comando
USE biblioteca

-- Criando Tabela Estados (UF)
CREATE TABLE biblioteca.uf
(  
  idestado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  uf VARCHAR(2) NOT NULL
);

-- Inserte dos Estados do Brasil
INSERT INTO uf (uf) VALUES ("AC");
INSERT INTO uf (uf) VALUES ("AL");
INSERT INTO uf (uf) VALUES ("AP");
INSERT INTO uf (uf) VALUES ("AM");
INSERT INTO uf (uf) VALUES ("BA");
INSERT INTO uf (uf) VALUES ("CE");
INSERT INTO uf (uf) VALUES ("DF");
INSERT INTO uf (uf) VALUES ("ES");
INSERT INTO uf (uf) VALUES ("GO");
INSERT INTO uf (uf) VALUES ("MA");
INSERT INTO uf (uf) VALUES ("MT");
INSERT INTO uf (uf) VALUES ("MS");
INSERT INTO uf (uf) VALUES ("MG");
INSERT INTO uf (uf) VALUES ("PA");
INSERT INTO uf (uf) VALUES ("PB");
INSERT INTO uf (uf) VALUES ("PR");
INSERT INTO uf (uf) VALUES ("PE");
INSERT INTO uf (uf) VALUES ("PI");
INSERT INTO uf (uf) VALUES ("RJ");
INSERT INTO uf (uf) VALUES ("RN");
INSERT INTO uf (uf) VALUES ("RS");
INSERT INTO uf (uf) VALUES ("RO");
INSERT INTO uf (uf) VALUES ("RR");
INSERT INTO uf (uf) VALUES ("SC");
INSERT INTO uf (uf) VALUES ("SP");
INSERT INTO uf (uf) VALUES ("SE");
INSERT INTO uf (uf) VALUES ("TO");

-- Criando a tabela Empresa
CREATE TABLE biblioteca.empresa
(  
  idbiblioteca INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nomefantasia VARCHAR(100) NOT NULL,
  razaosocial VARCHAR(100) NOT NULL,
  cnpj VARCHAR(18) NOT NULL,
  ie VARCHAR(18) NOT NULL,
  logradouro VARCHAR(100) NOT NULL,
  numero VARCHAR(10) NOT NULL,
  bairro VARCHAR(40) NOT NULL,
  complemento VARCHAR(20) NOT NULL,
  cidade VARCHAR(50) NOT NULL,
  codestado INT NOT NULL,
  cep VARCHAR(9) NOT NULL,
  telefone VARCHAR(15) NOT NULL,
  fax VARCHAR(15) NOT NULL,
  email VARCHAR(150) NOT NULL,
  site VARCHAR(50) NOT NULL,
  CONSTRAINT fk_codestadoempresa FOREIGN KEY (codestado) 
  REFERENCES biblioteca.uf(idestado)
  ON DELETE NO ACTION
  ON UPDATE CASCADE
);

-- Inserindo a Empresa
INSERT INTO biblioteca.empresa
 ( 
  nomefantasia,
  razaosocial,
  cnpj,
  ie,
  logradouro,
  numero,
  bairro,
  complemento,
  cidade,
  codestado,
  cep,
  telefone,
  fax,
  email,
  site
) 
VALUES
  (
    "Etec Philadelpho Gouvêa Netto",
    "Centro Paula Souza",
    "22.333.444/0001-01",
    "111.111.111.111",
    "Av. dos Estudantes",
    "3278",
    "Jardim Aeroporto",
    "",
    "São José do Rio Preto",
    25,
    "15035-010",
    "(17) 3233-9823",
    "(17) 3233-9266",
    "dir.gouveanetto@centropaulasouza.sp.gov.br",
    "www.philadelpho.com.br"
  );

-- Criando a Tabela de Usuarios do sistema.
CREATE TABLE biblioteca.usuarios
(  
  idusuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_nome VARCHAR(100) NOT NULL,
  user_datanascimento DATE NOT NULL,
  user_sexo VARCHAR(1) NOT NULL,
  user_cpf VARCHAR(18) NOT NULL,
  user_telefone VARCHAR(15),
  user_celular VARCHAR(15) NOT NULL,
  user_email VARCHAR(150) NOT NULL, 
  user_logradouro VARCHAR(150) NOT NULL,
  user_numero VARCHAR(10) NOT NULL,
  user_complemento VARCHAR(20),
  user_bairro VARCHAR(40) NOT NULL,
  user_cidade VARCHAR(50) NOT NULL,
  user_codestado INT NOT NULL,
  user_cep VARCHAR(9) NOT NULL,
  user_senha VARCHAR(20) NOT NULL,
  user_valido Bit NOT NULL,
  user_status Bit NOT NULL,
  CONSTRAINT fk_codestadousuarios FOREIGN KEY (user_codestado) 
  REFERENCES biblioteca.uf(idestado)
  ON DELETE NO ACTION
  ON UPDATE CASCADE
);

-- Inserindo Usuarios
INSERT INTO biblioteca.usuarios
(
  user_nome,
  user_datanascimento,
  user_sexo,
  user_cpf,
  user_telefone,
  user_celular,
  user_email,
  user_logradouro,
  user_numero,
  user_complemento,
  user_bairro,
  user_cidade,
  user_codestado,
  user_cep,
  user_senha,
  user_valido,
  user_status
) 
VALUES
(
    "Marcelo Henrique Mera",
    "1988-10-17",
    "M",
    "368.273.828-26",
    "(17) 3242-7034",
    "(17) 98129-7070",
    "marcelohxp@msn.com",
    "Rua Piratininga",
    "1030",
    "",
    "São José",
    "Mirassol",
    25,
    "15130-000",
    "henrique",
    True,
    True
),
(
    "Junior Pinheiro Martins de Souza",
    "1982-05-19",
    "M",
    "222.769.578-16",
    "(17) 3227-6567",
    "(17) 99175-3453",
    "jrsouza.music@hotmail.com",
    "Av. José da Silva Sé",
    "522",
    "",
    "Parque da Liberdade",
    "São José do Rio Preto",
    25,
    "15056-750",
    "junior",
    True,
    True
);

-- Criando a tabela Funcionarios
CREATE TABLE biblioteca.funcionarios
(  
  idfuncionario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fun_nome VARCHAR(100) NOT NULL,
  fun_datanascimento DATE NOT NULL,
  fun_sexo VARCHAR(1) NOT NULL,
  fun_cpf VARCHAR(18) NOT NULL,
  fun_rg VARCHAR(15) NOT NULL,
  fun_telefone VARCHAR(15),
  fun_celular VARCHAR(15) NOT NULL,
  fun_email VARCHAR(150) NOT NULL, 
  fun_logradouro VARCHAR(150) NOT NULL,
  fun_numero VARCHAR(10) NOT NULL,
  fun_complemento VARCHAR(20),
  fun_bairro VARCHAR(40) NOT NULL,
  fun_cidade VARCHAR(50) NOT NULL,
  fun_codestado INT NOT NULL,
  fun_cep VARCHAR(9) NOT NULL,
  fun_login VARCHAR(20) NOT NULL,
  fun_senha VARCHAR(20) NOT NULL,
  fun_status Bit NOT NULL,
  CONSTRAINT fk_codestadofuncionarios FOREIGN KEY (fun_codestado) 
  REFERENCES biblioteca.uf (idestado)
  ON UPDATE CASCADE
  ON DELETE NO ACTION
);

-- Inserte dos Funcionários
INSERT INTO biblioteca.funcionarios 
(
  fun_nome, 
  fun_datanascimento, 
  fun_sexo, 
  fun_cpf, 
  fun_rg, 
  fun_telefone, 
  fun_celular, 
  fun_email, 
  fun_logradouro, 
  fun_numero, 
  fun_complemento, 
  fun_bairro, 
  fun_cidade, 
  fun_codestado, 
  fun_cep, 
  fun_login, 
  fun_senha, 
  fun_status
)
VALUES
(
  "Admin", 
  "", 
  "M", 
  "", 
  "", 
  "", 
  "", 
  "", 
  "", 
  "", 
  "", 
  "", 
  "São José do Rio Preto", 
  25, 
  "", 
  "admin", 
  "admin", 
  1
);

-- Criando a Tabela de Genero dos Livros (Terror / Suspense / Policial)
CREATE TABLE biblioteca.generos
(  
  idgeneros INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

-- Inserte dos Generos
INSERT INTO generos (nome) VALUES ("Anedotas");
INSERT INTO generos (nome) VALUES ("Artes");
INSERT INTO generos (nome) VALUES ("Auto-Ajuda");
INSERT INTO generos (nome) VALUES ("Conto");
INSERT INTO generos (nome) VALUES ("Cronica");
INSERT INTO generos (nome) VALUES ("Direito");
INSERT INTO generos (nome) VALUES ("Economia");
INSERT INTO generos (nome) VALUES ("Educação");
INSERT INTO generos (nome) VALUES ("Eletrônica");
INSERT INTO generos (nome) VALUES ("Enciclopédia");
INSERT INTO generos (nome) VALUES ("Ética");
INSERT INTO generos (nome) VALUES ("Fantasia");
INSERT INTO generos (nome) VALUES ("Guerra");
INSERT INTO generos (nome) VALUES ("História");
INSERT INTO generos (nome) VALUES ("Jogos");
INSERT INTO generos (nome) VALUES ("Linguistica");
INSERT INTO generos (nome) VALUES ("Literatura Estrangeira");
INSERT INTO generos (nome) VALUES ("Literatual Infantil");
INSERT INTO generos (nome) VALUES ("Literatura Brasileira");
INSERT INTO generos (nome) VALUES ("Medicina");
INSERT INTO generos (nome) VALUES ("Música");
INSERT INTO generos (nome) VALUES ("Poema");
INSERT INTO generos (nome) VALUES ("Poesia");
INSERT INTO generos (nome) VALUES ("Política");
INSERT INTO generos (nome) VALUES ("Psicologia");
INSERT INTO generos (nome) VALUES ("Quadrinhos");
INSERT INTO generos (nome) VALUES ("Religião");
INSERT INTO generos (nome) VALUES ("Romance");
INSERT INTO generos (nome) VALUES ("Saúde");
INSERT INTO generos (nome) VALUES ("Terror");
INSERT INTO generos (nome) VALUES ("Vestibular");
INSERT INTO generos (nome) VALUES ("Cinema");
INSERT INTO generos (nome) VALUES ("Biografia");
INSERT INTO generos (nome) VALUES ("Administração");
INSERT INTO generos (nome) VALUES ("Marketing");
INSERT INTO generos (nome) VALUES ("Arquitetura");
INSERT INTO generos (nome) VALUES ("Produção");
INSERT INTO generos (nome) VALUES ("Ficção Juvenil");
INSERT INTO generos (nome) VALUES ("Estrategia");
INSERT INTO generos (nome) VALUES ("Informática");

-- Criando a Tabela de Formato (Livro / Revista / CD/DVD)
CREATE TABLE biblioteca.formato
(  
  idformato INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(20) NOT NULL
);

-- Inserte dos Formatos
INSERT INTO formato (nome) VALUES ("Livro");
INSERT INTO formato (nome) VALUES ("Revista");
INSERT INTO formato (nome) VALUES ("DVD/BlueRay");

-- Criando a Tabela de Origem
CREATE TABLE biblioteca.origem
(  
  idorigem INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL
);

-- Inserte de Origem dos Livros
INSERT INTO origem (nome) VALUES ("Nacional");
INSERT INTO origem (nome) VALUES ("Estrangeiro");
INSERT INTO origem (nome) VALUES ("Estados Unidos");
INSERT INTO origem (nome) VALUES ("Russia");
INSERT INTO origem (nome) VALUES ("Irlanda");
INSERT INTO origem (nome) VALUES ("França");

-- Criando a Tabela de Idioma do Livro
CREATE TABLE biblioteca.idioma
(  
  ididioma INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(20) NOT NULL
);

-- Inserte de Idiomas dos Livros
INSERT INTO idioma (nome) VALUES ("Português");
INSERT INTO idioma (nome) VALUES ("Inglês");
INSERT INTO idioma (nome) VALUES ("Espanhol");
INSERT INTO idioma (nome) VALUES ("Alemão");
INSERT INTO idioma (nome) VALUES ("Francês");
INSERT INTO idioma (nome) VALUES ("Italiano");
INSERT INTO idioma (nome) VALUES ("Russo");

-- Criando a Tabela de Editora
CREATE TABLE biblioteca.editora
(
  ideditora INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(40) NOT NULL
);

-- Inserte de Editoras
INSERT INTO editora (nome) VALUES ("Abril");
INSERT INTO editora (nome) VALUES ("AP Cultural");
INSERT INTO editora (nome) VALUES ("Artenova");
INSERT INTO editora (nome) VALUES ("Ática");
INSERT INTO editora (nome) VALUES ("Blucher");
INSERT INTO editora (nome) VALUES ("Bruguera");
INSERT INTO editora (nome) VALUES ("Calibán");
INSERT INTO editora (nome) VALUES ("Cejup");
INSERT INTO editora (nome) VALUES ("Centauro editora");
INSERT INTO editora (nome) VALUES ("Circo Editorial");
INSERT INTO editora (nome) VALUES ("Cléofas");
INSERT INTO editora (nome) VALUES ("Codecri");
INSERT INTO editora (nome) VALUES ("Conrad Editora");
INSERT INTO editora (nome) VALUES ("Liberato");
INSERT INTO editora (nome) VALUES ("Claridade");
INSERT INTO editora (nome) VALUES ("Editora Forense");
INSERT INTO editora (nome) VALUES ("Vitória");
INSERT INTO editora (nome) VALUES ("Alto Astral");
INSERT INTO editora (nome) VALUES ("Moderna");
INSERT INTO editora (nome) VALUES ("Movimento");
INSERT INTO editora (nome) VALUES ("Prumo");
INSERT INTO editora (nome) VALUES ("Hemus");
INSERT INTO editora (nome) VALUES ("Revisão");
INSERT INTO editora (nome) VALUES ("Virgo");
INSERT INTO editora (nome) VALUES ("Imago");
INSERT INTO editora (nome) VALUES ("Livraria Garnier");
INSERT INTO editora (nome) VALUES ("Meca");
INSERT INTO editora (nome) VALUES ("Objetiva");
INSERT INTO editora (nome) VALUES ("Universa");
INSERT INTO editora (nome) VALUES ("Perspectiva");
INSERT INTO editora (nome) VALUES ("Sabiá");
INSERT INTO editora (nome) VALUES ("Sá");
INSERT INTO editora (nome) VALUES ("Elevação");
INSERT INTO editora (nome) VALUES ("Quadrante");
INSERT INTO editora (nome) VALUES ("Deriva");
INSERT INTO editora (nome) VALUES ("Paulus");
INSERT INTO editora (nome) VALUES ("Moraes");
INSERT INTO editora (nome) VALUES ("Tipografia Universal");
INSERT INTO editora (nome) VALUES ("Grupo Lund");
INSERT INTO editora (nome) VALUES ("Livraria Moderna");
INSERT INTO editora (nome) VALUES ("FTD");
INSERT INTO editora (nome) VALUES ("Luzeiro");
INSERT INTO editora (nome) VALUES ("Nórdica");
INSERT INTO editora (nome) VALUES ("Geração");
INSERT INTO editora (nome) VALUES ("Nova Sampa");
INSERT INTO editora (nome) VALUES ("Transvias");
INSERT INTO editora (nome) VALUES ("VestSeller");
INSERT INTO editora (nome) VALUES ("Sextante");
INSERT INTO editora (nome) VALUES ("Universo dos Livros ");
INSERT INTO editora (nome) VALUES ("L&PM");
INSERT INTO editora (nome) VALUES ("Jardim dos Livros");
INSERT INTO editora (nome) VALUES ("Editora Única");
INSERT INTO editora (nome) VALUES ("Ciranda Cultural");
INSERT INTO editora (nome) VALUES ("Martins Fontes");
INSERT INTO editora (nome) VALUES ("Martin Claret");
INSERT INTO editora (nome) VALUES ("Campus");
INSERT INTO editora (nome) VALUES ("Intrinseca");
INSERT INTO editora (nome) VALUES ("Arqueiro");

-- Criando a tabela Acervo
CREATE TABLE biblioteca.acervo
(  
  idacervo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  codgeneros INT NOT NULL,
  codidioma INT NOT NULL,
  codformato INT NOT NULL,
  codeditora INT NOT NULL,
  codorigem INT NOT NULL,
  codbarras VARCHAR(25) NOT NULL,
  titulo VARCHAR(150) NOT NULL,
  autor VARCHAR(150) NOT NULL,
  isbn VARCHAR(25) NOT NULL,
  edicao VARCHAR(4) NOT NULL,
  paginas INT(5) NOT NULL,
  ano INT(4) NOT NULL,
  quantidade INT(5) NOT NULL,
  sinopse Text NOT NULL,
  imagem varchar(100),
  status bit not null, -- Caso não tenha mais o livro
  CONSTRAINT fk_codgenerosacervo FOREIGN KEY (codgeneros) 
  REFERENCES biblioteca.generos (idgeneros)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_codidiomaacervo FOREIGN KEY (codidioma) 
  REFERENCES biblioteca.idioma (ididioma)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_codformatoacervo FOREIGN KEY (codformato) 
  REFERENCES biblioteca.formato (idformato)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_codeditoraacervo FOREIGN KEY (codeditora) 
  REFERENCES biblioteca.editora (ideditora)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_codorigemacervo FOREIGN KEY (codorigem) 
  REFERENCES biblioteca.origem (idorigem)
  ON UPDATE CASCADE
  ON DELETE NO ACTION
);

-- Inserte dos Acervos
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (28, 1, 1, 49, 3, '9788579306860', 'Obstinada: Até Onde Vai o Desejo de Um Homem', 'Day Sylvia', '9788579306860', '1',  296, 2014, 10, 'Londres  1770. Debaixo de toda a seda e renda da sociedade londrina se encontra uma organização secreta de espiões de elite. Proteger a Coroa de seus inimigos é uma tarefa árdua  mas  para Marcus Ashford  proteger seu coração de uma obstinada paixão é um perigo ainda maior.Como agente da Coroa  Marcus Ashford  o Conde de Westfield  já enfrentou inúmeros duelos de espada  foi atingido por dois tiros e se esquivou de mais disparos de canhão do que poderia contar. Porém  nada o excita mais do que o primitivo apetite sexual de sua ex-noiva  Elizabeth. Anos atrás  ela o preteriu pelo charmoso Lorde Hawthorne. Mas agora  Marcus deve defender a elegante viúva  e o fará ao mesmo tempo em que cuida de suas outras  mais carnais  necessidades  mostrando a ela até onde vai o real desejo de um homem.', '1.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (33, 1, 1, 48, 1, '9788575429105', 'Sonho Grande', 'Correa Cristiane', '9788575429105', '1', 264, 2013, 10, 'Jorge Paulo Lemann  Marcel Telles e Beto Sicupira ergueram  em pouco mais de quatro décadas  o maior império da história do capitalismo brasileiro e ganharam uma projeção sem precedentes no cenário mundial. Nos últimos cinco anos eles compraram nada menos que três marcas americanas conhecidas globalmente: Budweiser  Burger King e Heinz. Tudo isso na mais absoluta discrição  esforçando-se para ficar longe dos holofotes. A fórmula de gestão que desenvolveram  seguida com fervor por seus funcionários  se baseia em meritocracia  simplicidade e busca incessante por redução de custos. Uma cultura tão eficiente quanto implacável  em que não há espaço para o desempenho medíocre. Por outro lado  quem traz resultados excepcionais tem a chance de se tornar sócio de suas companhias e fazer fortuna.Sonho grande é o relato detalhado dos bastidores da trajetória desses empresários desde a fundação do banco Garantia  nos anos 70  até os dias de hoje.', '2.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (28, 1, 1, 50, 4, '9788525416759', 'Caixa Especial Guerra e Paz - 4 Volumes', 'Lev Nikolayevich Tolstoi', '9788525416759', '1', 1492, 1859, 10, 'A imensidão da obra torna-a difícil de resumir de forma clara e concisa. Além disso  oautor alinhava sua narrativa com muitas reflexões pessoais que tendem a quebrar o ritmo da leitura. A ação se instala entre 1805 e 1820  ainda que  em realidade  a essência da obra se concentre em determinados momentos-chave: a Guerra da Terceira Coalizão 1805 a Paz de Tilsit 1807 e enfim a Campanha da Rússia 1812. No entanto seria falso acreditar que Guerra e Paz trate apenas das relações franco-russas à época. Além das batalhas de Schoengraben  Austerlitz e de Borodino  Tolstói descreve com bastante cuidado e precisão os milhares de nobres da Rússia czarista  abordando diversos temas então em moda a questão dos servos as sociedades secretas e a guerra. Os personagens de Guerra e Paz são tão abundantes e ricamente detalhados que é difícil encontrar na obra um herói apesar de ser Pierre Bézoukhov o personagem mais recorrente.', '3.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (39, 1, 1, 51, 2, '9788537001943', 'A Arte Da Guerra', 'Sun Tzu', '9788537001943', '50', 124, 2011, 5, 'A Arte da Guerra é um tratado militar escrito durante o século IV a.C. pelo estrategista conhecido como Sun Tzu . O tratado é composto por treze capítulos  onde em cada capítulo é abordado um aspecto da estratégia de guerra  de modo a compor um panorama de todos os eventos e estratégias que devem ser abordados em um combate racional. Acredita-se que o livro tenha sido usado por diversos estrategistas militares através da história como Napoleão Adolf Hitler e Mao Tse Tung.', '4.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (38, 1, 1, 53, 2, '1234567891011', 'A Bela Adormecida', 'Amanda Askew', '1234567891011', '1', 40, 2011, 5, 'conto de fadas cuja personagem principal é uma princesa que é enfeitiçada por uma maléfica feiticeira (por vezes descrita como uma bruxa  ou como uma fada maligna) para cair num sono profundo  até que um príncipe encantado a desperte com um beijo provindo de um amor verdadeiro. É um dos contos mais famosos da humanidade atualmente.', '5.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (18, 1, 1, 54, 5, '9788578270698', 'As Crônicas de Nárnia', 'Clive Staples Lewis', '9788578270698', '2', 752, 2009, 5, 'As Crônicas de Nárnia é uma série de 7 livros para crianças  jovens e adultos criada por Clive Stapleton Lewis  umautor Inglês do século XX e diferencia-se pelo fato de conduzir as crianças a reflexões sobre conduta  ética  religião  fé  entre outras questões que sempre instigaram os filósofos antigos  bem como os contemporâneos. A série encantou milhões de leitores nos últimos 50 anos e os acontecimentos mágicos descritos na prosa imortal de C. S. Lewis inscreveram-se para sempre em suas memórias. Ele criou um mundo em que uma feiticeira decreta inverno perpétuo  onde há mais animais falantes do que gente e onde as batalhas são travadas por centauros  gigantes e faunos.', '6.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (17, 1, 1, 57, 3, '9788580576979', 'Toda Luz que não Podemos Ver', 'Anthony Doeer', '9788580576979', '1', 528, 2015, 4, 'Um romance sobre autopreservação e generosidade em meio às atrocidades de uma guerra que jamais deve ser esquecida. Marie-Laure vive em Paris perto do Museu de História Natural  onde seu pai é o chaveiro responsável por cuidar de milhares de fechaduras. Quando a menina fica cega  aos seis anos  o pai constrói uma maquete em miniatura do bairro onde moram para que ela seja capaz de memorizar os caminhos. Na ocupação nazista em Paris pai e filha fogem para a cidade de Saint-Malo e levam consigo o que talvez seja o mais valioso tesouro do museu. Em uma região de minas na Alemanha  o órfão Werner cresce com a irmã mais nova encantado pelo rádio que certo dia encontram em uma pilha de lixo. Com a prática acaba se tornando especialista no aparelho talento que lhe vale uma vaga em uma escola nazista e logo depois uma missão especial: descobrir a fonte das transmissões de rádio responsáveis pela chegada dos Aliados na Normandia.', '7.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (38, 1, 1, 52, 3, '9788567028477', 'A Formatura - O teste 3', 'Joelle Charbonneau', '9788567028477', '2', 318, 2014, 2, 'O futuro nunca foi tão incerto e desesperador. Cia Vale jamais imaginaria que as coisas pudessem chegar a esse ponto. Ela tem uma importante missão: liderar as ações para a verdadeira reconstrução do mundo pós-guerra  um caminho sem volta. Agora  ela é a peça-chave para concretizar o plano de pôr fim ao Teste  para o bem das pessoas. Diante de um horizonte cheio de cicatrizes brutais  uma guerra prestes a começar e um governo cruel e corrompido  Cia não tem escolha a não ser se preparar para chegar às últimas consequências – se for preciso.', '8.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (38, 1, 1, 52, 3, '9788567028231', 'O teste - O teste 1', 'Joelle Charbonneau', '9788567028231', '2', 318, 2014, 2, 'o dia de formatura de Malencia Cia Vale  e dos jovens da colônia de Five Lakes  tudo o que ela consegue imaginar - e esperar - é ser escolhida para O Teste  um programa elaborado pela United Commonwealth que seleciona os melhores e mais brilhantes recém-formados para que se tornem líderes na demorada reconstrução do mundo pós-guerra. Ela sabe que é um caminho árduo mas existe pouca informação a respeito desta seleção. Mas então ela é finalmente escolhida e seu pai  que também havia participado da seleção  se mostra preocupado. Desconfiada sobre o seu futuro  ela corajosamente segue para longe dos amigos e da família  talvez para sempre. O perigo e o terror a aguardam. Será que uma jovem é capaz de enfrentar um governo que a escolheu para se defender?', '9.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (38, 1, 1, 52, 3, '9788567028347', 'Estudo Independente - O teste 2', 'Joelle Charbonneau', '9788567028347', '2', 320, 2014, 2, 'Bia Vale tem dezessete anos e tem tudo o que sempre sonhou: um amor perfeito  um lugar na universidade e um futuro como uma das líderes da Comunidade das Nações Unificadas. No entanto  apesar de todos os esforços do governo para apagar a memória de Cia  ela ainda lembra o que aconteceu. Ela precisa escolher entre ficar em silêncio e proteger a si mesma e as pessoas que ama ou expor o Teste e o que ele na verdade é  um programa assassino que deve ser impedido. O futuro da Comunidade depende dela. No segundo volume da saga de Joelle Charbonneau  a chance de fazer parte da revitalização de uma civilização pós-guerra colide com o desejo de fazer o que o coração manda.', '10.jpg' 1); 
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (17, 1, 1, 58, 3, '9788580412994', 'O doador de Memórias', 'Lois Lowry', '9788580412994', '1', 224, 2014, 2, 'Em O Doador de Memórias  a premiadaautora Lois Lowry constrói um mundo aparentemente ideal onde não existem dor  desigualdade  guerra nem qualquer tipo de conflito. Por outro lado  também não há amor  desejo ou alegria genuína.', '11.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (40, 1, 1, 56, 3, '9788535236996', 'Algorismos Teoria e Prática', 'Thomas H. Cormen Charles E. Leiserson Ronald L. Rivest e Clifford Stei', '9788535236996', '3', 944, 2012, 2, 'Este livro apresenta um texto abrangente sobre o moderno estudo de algoritmos para computadores. É uma obra clássica  cuja primeira edição tornou-se amplamente adotada nas melhores universidades em todo o mundo  bem como padrão de referência para profissionais da área. Nesta terceira edição  totalmente revista e ampliada  as mudanças são extensivas e incluem novos capítulos exercícios e problemas revisão de pseudocódigos e um estilo de redação mais claro. A edição brasileira conta ainda com nova tradução e revisão técnica do Prof. Arnaldo Mandel  do Departamento de Ciência da Computação do Instituto de Matemática e Estatística da Universidade de São Paulo. Elaborado para ser ao mesmo tempo versátil e completo  o livro atende alunos dos cursos de graduação e pós-graduação em algoritmos ou estruturas de dados.', '12.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (17, 1, 1, 55, 6, '9788544000007', 'Os miseráveis', 'Victor hugo', '9788544000007', '1', 1511, 2014, 1, 'Esta obra é uma poderosa denúncia a todos os tipos de injustiça humana. Narra a emocionante história de Jean Valjean  o homem que  por ter roubado um pão  é condenado a dezenove anos de prisão. Os Miseráveis é um livro inquietantemente religioso e político.', '13.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (19, 1, 1, 48, 1, '9788575421628', 'O Futuro da Humanidade - A Saga de um Pensador', 'Augusto Cury', '9788575421628', '1', 256, 2005, 1, 'Futuro da Humanidade conta a trajetória de Marco Polo  um jovem estudante de medicina de espírito livre e aventureiro como o do navegador veneziano do Século XIII  em quem seu pai se inspirou ao escolher seu nome. Ao entrar na faculdade cheio de sonhos e expectativas  Marco Polo se vê diante de uma realidade dura e fria: a falta de respeito e sensibilidade dos professores em relação aos pacientes com transtornos psíquicos  que são marginalizados e tratados como se não tivessem identidade. Indignado  o jovem desafia profissionais de renome internacional para provar que os pacientes com problemas psiquiátricos merecem mais atenção  respeito e dedicação - e menos remédios. Acreditando na força do diálogo e da psicologia  ele acaba causando uma verdadeira revolução nas mentes e nos corações das pessoas com quem convive. Uma história de esperança e de luta contra as injustiças  este livro é a saga de um desbravador de sonhos  de um poeta da vida  de um homem disposto a correr todos os riscos em nome daquilo que ama e acredita.', '14.jpg', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 15, 1, '3421', '1932', 'VILLA Marco Antonio', '3421', '1', 300, 2013, 2, 'História - Brasil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (6, 1, 3, 16, 1, '1151', '1° Curso de especialização em direito constitucional', 'SILVA Carlos de Arnaldo', '1151', '1', 656, 198, 1, 'Direito', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (2, 1, 1, 1, 1, '73151', '10 anos com Mafalda', 'QUINO', '73151', '1', 188, 1997, 2, 'Artes', '',1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 14, 1, '22421', '100 anos da imigração japonesa no Brasil', 'ARAI Jhony HIRASAKI Cesar', '22421', '1', 287, 2008, 1, 'História - Japão', '',1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (10, 1, 1, 17, 1, '27201', '1000 maiores esportistas do século 20', 'ALZUGARAY Domingo', '27201', '1', 300, 2001, 1, 'Enciclopédia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 22, 1, '48551', ' 1000 palavras de negócios', 'HORNER D. AZAOLA-BLAMONT I.', '48551', '1', 256, 2004, 3, 'Educação - Espanhol', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (10, 1, 1, 25, 1, '27221', '1000 que fizeram 100 anos de cinema', 'ALZUGARAY Domingo', '27221', '1', 304, 2002, 1, 'Enciclopédia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (10, 1, 1, 27, 1, '27211', '1000 que fizeram o século 20', 'ALZUGARAY Domingo', '27211', '1', 244, 2002, 1, 'Enciclopédia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (9, 1, 1, 28, 1, '22401', ' 101 usos para o seu gerador de sinais', 'MIDDLETON Robert G.', '22401', '1', 208, 2009, 1, 'Eletrônica', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (9, 1, 1, 19, 1, '12111', ' 101 usos para o seu osciloscópio', 'MIDDLETON Robert G.', '12111', '1', 400, 2008, 2, 'Eletrônica', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 19, 1, '29921', '123 respostas sobre drogas', 'TIBA Içami', '29921', '3', 112, 2004, 2, 'Drogas', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (18, 1, 1, 19, 1, '31111', 'Os 13 porquês', 'ASHER Jay', '31111', '1', 98, 2006, 1, 'Literatura infanto-juvenil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (9, 1, 1, 26, 1, '43611', ' 1300 esquemas e circuitos eletrônicos', 'OURGERON R.', '43611', '1', 389, 2009, 4, 'Eletrônica', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (23, 1, 1, 26, 1, '46662', '14º festival de poesias', 'COSTA FILHO Durval', '46662', '1', 187, 2005, 1, 'Poesias', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (24, 1, 1, 31, 1, '22471', '1924 o diário da revolução', 'PEREIRA Duarte Pacheco', '22471', '1', 495, 2010, 1, 'Política', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 29, 1, '10721', '1932: o Brasil se revolta', 'PONTES José Alfredo Vidigal', '10721', '1', 208, 2004, 1, 'História', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (24, 1, 1, 24, 1, '32351', '1984 / George Orwell', 'dire', '32351', '1', 416, 1949, 1, 'Literatura inglesa', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (24, 1, 1, 24, 1, '17701', '1988-2008: 20 anos da Constituição cidadão', 'TAVARES, André Ramos', '17701', '1', 312, 2008, 1, 'Direito Constitucional - Brasil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 30, 1, '70461', ' 1ª Enfermagem Produções Artísticas: Eu quero votar', 'Ariane Heidinara Juliana', '70461', '1', 218, 2004, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 30, 1, '10441', ' 20.000 Léguas Matemáticas', 'DEWDNEY A. K.', '10441', '1', 236, 2000, 2, 'Matemática', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (5, 1, 1, 11, 1, '35911', ' 200 crônicas escolhidas', 'BRAGA Rubem', '35911', '28', 301, 2007, 1, 'Crônicas brasileiras', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (4, 1, 1, 36, 1, '33741', ' 23 histórias de um viajante', 'COLASANTI Marina', '33741', '1', 224, 2005, 2, 'Contos brasileiros', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (25, 1, 1, 37, 1, '16871', '25 erros na educação das crianças', 'LA RIVIÈRE André', '16871', '1', 154, 2001, 1, 'Psicologia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (5, 1, 1, 21, 1, '2151', '3 peças inéditas de Carlos Lacerda', 'LACERDA Carlos', '2151', '1', 306, 2003, 1, 'Literatura brasileira', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 37, 1, '37131', '50 coisas simples que as crianças podem fazer para salvar a terra', 'GUARANY Reynaldo', '37131', '7', 105, 2000, 1, 'Ecologia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (5, 1, 1, 11, 1, '3302', '50 crônicas escolhidas', 'BRAGA Rubem', '3302', '1', 168, 2009, 1, 'Literatura brasileira', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (4, 1, 1, 41, 1, '31201', '7 contos crus', 'GÓMEZ Ricardo', '31201', '1', 88, 2010, 1, 'Literatura infanto-juvenil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (12, 1, 1, 44, 1, '45341', 'Os 7 falcões', 'BORGES Marcio', '45341', '3', 194, 2001, 1, 'Literatura infanto-juvenil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 33, 1, '44271', '75 anos da insulina hoechst', 'FEDERLIN Konrad F.', '44271', '1', 144, 1999, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 40, 1, '42731', '96 respostas sobre aids', 'RUBIO Alfonso Delgado', '42731', '1', 187, 2000, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 41, 1, '70641', 'Abandono: quem vai ficar com a mamãe!!!', 'Rafaela Andreia Cristiane. et al', '70641', '1', 124, 1998, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (33, 1, 1, 23, 1, '25861', 'ABC de Castro Alves', 'AMADO Jorge', '25861', '5', 304, 2010, 1, 'Biografia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (22, 1, 1, 5, 1, '29951', 'ABC do mundo árabe', 'FARAH Paulo Daniel', '29951', '1', 48, 2006, 1, 'Literatura infanto-juvenil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 45, 1, '22361', 'ABC do rádio moderno', 'SALM Walter G.', '22361', '1', 102, 1969, 1, 'Telecomunicações', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (9, 1, 1, 8, 1, '22331', 'ABC dos transformadores & bobinas', 'BUKSTEIN Edward J.', '22331', '2', 106, 1995, 1, 'Eletrônica', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 30, 1, '25841', 'O Abolicionismo', 'NABUCO Joaquim', '25841', '1', 224, 2010, 1, 'Emancipação', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 32, 1, '46781', 'Abraão e as frutas', 'MENDONÇA Luciana V. P. de', '46781', '1', 91, 2000, 4, 'Poesia brasileira', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (16, 1, 1, 42, 1, '29731', 'A Academia de São Paulo', 'NOGUEIRA Almeida', '29731', '3', 135, 2007, 3, 'Educação - Universidade', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (35, 1, 1, 10, 1, '13461', 'Accelerate', 'LODGE Patricia WRIGHT-WATSON Beth', '13461', '1', 224, 2010, 1, 'Educação - Inglês', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (2, 1, 1, 43, 1, '19271', 'Acervo artístico dos palácios', 'CARVALHO Ana Cristina', '19271', '1', 90, 2011, 1, 'Artes', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 13, 1, '20881', 'Acessos temporários de madeira', 'MONTICUCO Deogledes KOPELOWICZ Mauro', '20881', '1', 36, 2003, 1, 'Edificações', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 30, 1, '41601', 'Acionamentos eletromagnéticos', 'LELUDAK Jorge Assade', '41601', '1', 45, 2006, 3, 'Eletrotécnica', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (36, 1, 1, 46, 1, '20691', 'Aço e arquitetura', 'DIAS Luís Andrade de Mattos', '20691', '1', 87, 2001, 1, 'Edificações', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (19, 1, 1, 47, 1, '77331', 'Acriter: tomo uno di aequoris', 'LEPE Gustavo', '77331', '1', 54, 2004, 2, 'Literatura brasileira', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (12, 1, 1, 30, 1, '45951', 'Adeus conto de fadas', 'BRASILIENSE Leonardo', '45951', '2', 80, 2013, 1, 'Conto infanto-juvenil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 47, 1, '36481', 'Administração', 'UHLMANN Günter Wilhelm', '36481', '1', 244, 2001, 12, 'Administração', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 13, 1, '8061', 'Administração da produção', 'SLACK Nigel CHAMBERS Stuart JOHNSTON Robert', '8061', '3',  706, 2009,  10, 'Administração', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (7, 1, 1, 33, 1, '8022', 'A Administração de custos preços e lucros', 'BRUNI Adriano Leal', '8022', '4', 424, 2012, 4, 'Contabilidade de custos', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (35, 1, 1, 36, 1, '89515', 'Administração de marketing', 'COBRA Marcos', '89515', '2', 288, 2004, 7, 'Administração mercadológica', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 38, 1, '21513', 'Administração de materiais e do patrimônio', 'FRANCISCHINI Paulino G. GURGEL Floriano do Amaral', '21513', '1',432, 2014,  5, 'Administração de materiais', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 43, 1, '23811', 'Administração de materiais e recursos patrimoniais', 'MARTINS Petrônio Garcia ALT Paulo Renato Campos', '23811', '3', 441, 2009, 5, 'Administração de materiais', '' 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 20, 1, '40341', 'Administração de medicamentos', 'FIGUEIREDO Nébia Maria A. de', '40341', '4',   219, 2008,  1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 29, 1, '35131', 'Administração de operações de serviço', 'JOHNSTON Robert CLARK Graham', '35131', '1',  568, 2002, 10, 'Administração', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 20, 1, '5521', 'Administração de recursos humanos', 'MARRAS Jean Pierre', '5521', '13', 345, 1989, 5, 'Administração de empresas',   '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 29, 1, '21451', 'Administração de recursos materiais e patrimoniais', 'POZO Hamilton', '21451', '5',  254, 1980, 5, 'Administração de materiais', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 2, 1, '41201', 'Administração e liderança em enfermagem', 'MARQUIS Bessie L. HUSTON Carol J.', '41201', '4', 124, 1999,  1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 34, 1, '41191', 'Administração e serviços de enfermagem', 'FINER Herman', '41191', '1',  456, 2001, 1, 'Serviços de enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 2, 1, '40031', 'Administração em enfermagem', 'KURCGANT Paulina. et al', '40031', '1', 353, 1981, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (35, 1, 1, 13, 1, '33961', 'Administração em publicidade', 'LUPETTI Marcélia', '33961', '2' ,294 , 2011, 5, 'Esta obra é destinada aos publicitários, fornecedores, agências, gráficas, estúdios, empresas de pesquisa, consultorias em marketing, além de estudantes e professores universitários. É um livro que, com uma linguagem prática e sem vocábulos jurídicos, apresenta as leis e normas que cercam o mundo da publicidade, tratando desde regulamentação profissional até a normas do CENP. Oautor procurou usar toda a sua experiência obtida no atendimento de agências publicitárias e seus fornecedores. O objetivo do livro é contribuir para aprimorar as relações entre empresas e consumidores do mercado publicitário.', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 41, 1, '10071', 'A Administração entre a tradição e a renovação', 'AKTOUF Omar', '10071', '1',  184, 1996, 5, 'Administração', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 35, 1, '128711', 'Administração estratégica', 'WRIGHT Peter KROLL Mark J. PARNELL John', '128711', '1', 134, 2010, 5, 'Administração estratégica mantém a característica que faz da obra um sucesso há quase duas décadas: uma primorosa estrutura didática que, ao abordar o processo como ele de fato ocorre nas organizações, facilita a compreensão do tema. Com estudos de caso atualizados, que tratam desde empresas como Banco do Brasil, Magazine Luiza, Kopenhagen e Grupo Abril até a escola de samba Beija-Flor de Nilópolis, a obra evidencia os desafios enfrentados pela empresa em todos os seus níveis organizacionais, o que a torna indispensável a todos os graduandos em administração.', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 24, 1, '10863', 'Administração industrial e geral', 'FAYOL Henri', '10863', '10', 122, 1990, 5, 'Administração', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (34, 1, 1, 32, 1, '89549', 'Administrando para o futuro ', 'DRUCKER Peter Ferdinand ', '89549', '1', 250, 1998  ,   5, 'Administração de empresas', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (3, 1, 1, 11, 1, '8011', 'Administrando para obter resultados', 'DRUCKER Peter Ferdinand', '8011', '1', 214, 2002, 5  , 'Este livro não pretende ser original ou profundo . Mas ele é, até onde sei, a primeira tentativa para uma apresentação organizada das tarefas econômicas do executivo de empresa e ou primeiro passo no sentido de uma disciplina de desempenho econômico da empresa.', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (33, 1, 1, 32, 1, '45071', 'Adolfo Caminha', 'ALBUQUERQUE Claudia', '45071', '2', 245, 2008, 1, 'Biografia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (19, 1, 1, 23, 1, '5961', 'Aeroporto', 'HAILEY Arthur', '5961', '15', 340, 2010 , 1, 'Literatura', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 39, 1, '10581', 'África e Brasil africano', 'SOUZA Marina de Mello', '10581', '2' ,  172, 2007,  1, 'África e Brasil africano', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 41, 1, '70601', 'Agentes contra a pneumonia', 'Aline Ana Camila Sabrina.et al', '70601', '1', 219, 1978, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 10, 1, '17361', 'Agora nós! chronica da revolução paulista,com os perfis de alguns heroes da retaguarda', 'DUARTE Paulo', '17361', '1', 184, 2001, 1, 'História', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 5, 1, '31261', 'Água hoje e sempre', 'SECRETARIA DA EDUCAÇÃO', '31261', '1', 129, 2009, 1, 'Educação ambiental', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (36, 1, 1, 23, 1, '16622', 'Águas de chuva', 'BOTELHO Manoel Henrique Campos', '16622', '2', 321, 1998, 2, 'Este livro contém - a//s necessidades e funções dos sistemas pluviais nas cidades e nas estradas explicação dos vários componentes dos sistemas pluviais (bocas de lobo, tubulações, rampas, escadarias hidráulicas etc.) especificações de projeto mais comumente adotadas nas prefeituras das mais importantes cidades e pelos vários órgãos ligados...', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 8, 1, '48451', 'Águas doces no Brasil', 'REBOUÇAS Aldo da Cunha.', '48451', '3', 732, 2002, 1, 'Ecologia', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (15, 1, 1, 37, 1, '43171', 'Ah descobri!', 'GARDNER Martin', '43171', '2', 45, 2009, 1, 'Jogos', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (18, 1, 1, 42, 1, '40461', 'Aids e agora?', 'CARDOSO Luiz Claudio', '40461', '3', 98, 2008, 2, 'Literatura infanto-juvenil', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 1, 39, 1, '42081', 'Aids infecção pelo hiv', 'FLASKERUD Jacquelyn Haak', '42081', '1', 75, 2004, 1, 'Enfermagem', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (17, 1, 1, 30, 1, '70511', 'Aladas ondas ao nada', 'VIVO Vieira', '70511', '1', 103, 2000, 1, 'Literatura', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (32, 1, 1, 34, 1, '3411', 'Alain Resnais ou a criação no cinema', 'PINGAUD Bernard SAMSON Pierre', '3411', '1', 201, 1969, 1, 'Cinema', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (19, 1, 1, 35, 1, '31101', 'O Albatroz azul ', 'RIBEIRO João Ubaldo', '31101', '1', 256, 1969, 1, 'Vida, morte, renovação. Temas universais que são o eixo em torno do qual se desenrola a trama simples deste belo romance. É a história de um homem que, diante da morte, busca o sentido da vida. Um romance magnífico cuja mágica se abre ao leitor desde a primeira página.', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (19, 1, 1, 20, 1, '32141', 'O Albatroz', 'VIEIRA José Geraldo', '32141', '1', 198, 2009, 1,'', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (14, 1, 1, 33, 1, '31771', 'Alberto Santos-Dumont', 'COSTA Fernando Hippólyto', '31771', '1', 233, 1996, 1, 'História', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (8, 1, 1, 18, 1, '22661', 'Alceu Amoroso Lima', 'CURY Carlos Roberto Jamil', '22661', '1',  243, 2001,  2, 'Educação', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (37, 1, 1, 18, 1, '5242', 'Álcool e gasolina', 'SILVA Eduardo Roberto da SILVA Ruth Rumiko H. da', '5242', '3', 88, 1999, 2, 'Geociências', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 3, 21, 1, '47631', 'Alcoolismo na adolescencia', 'MARIA Eliana Aparecida', '47631', '1', 93, 2006, 1, 'Alcoolismo', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (20, 1, 3, 23, 1, '18092', 'Alcoolismo na adolescência', 'ROMANI Mileide Soares SANTOS Wander Alves dos', '18092', '1', 87, 2003, 1, 'Enfermagem',  '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (1, 1, 1, 21, 1, '6551', 'Alcova e salão', 'CAMPOS Humberto de', '6551', '1', 349, 1988, 1, 'Anedotas', '', 1);
INSERT INTO acervo (codgeneros, codidioma, codformato, codeditora, codorigem, codbarras, titulo, autor, isbn, edicao, paginas, ano, quantidade, sinopse, imagem, STATUS) VALUES (18, 1, 1, 5, 1, '69921', 'A Aldeia sagrada', 'MARINS Francisco', '69921', '31',  450, 2012, 1, 'Literatura infanto-juvenil', '', 1);

-- Tabela reserva
CREATE TABLE biblioteca.reserva
(
  idreserva int (5) not null auto_increment primary key,
  codusuario int (5) not null,
  codfuncionario int (5) not null, 
  data_reserva datetime not null, -- Data em que foi feita a reserva do livro
  data_prevista datetime not null, -- Data em que o livro será disponibilizado novamente
  status bit not null,
  constraint fk_codusuarioreserva foreign key (codusuario)
  references biblioteca.usuarios (idusuario)
  on update CASCADE
  on delete no action,
  constraint fk_codfuncionarioreserva foreign key (codfuncionario)
  references biblioteca.funcionarios (idfuncionario)
  on update CASCADE
  on delete no action
);

-- TABELA ONDE VAI FICAR OS DIVERSOS LIVROS PARA O MESMO USUARIO - RESERVA
-- Tabela onde vai ficar os livros emprestados por Reservas
CREATE TABLE biblioteca.reserva_acervo_usuario
(
  id_reserva_acervo_usuario int not null AUTO_INCREMENT PRIMARY key,
  codreserva int not null, -- Vai puxar o numero da reserva (idreserva)
  codacervo int not null,  -- O livro em si reservado
  status bit not null, -- Ativo/Cancelado a reserva
  constraint fk_codreservareservaacervousuario FOREIGN key (codreserva)
  references biblioteca.reserva (idreserva)
  on update CASCADE
  on delete NO ACTION,
  constraint fk_codacervoreservaacervousuario FOREIGN key (codacervo)
  references biblioteca.acervo (idacervo)
  on update CASCADE
  on delete no action
);

-- Tabela emprestimo
CREATE TABLE biblioteca.emprestimo
(
  idemprestimo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  codusuario int (5) not null,
  codfuncionario int (5) not null,
  codreserva int (5) not null,
  data_emprestimo datetime NOT null, -- Data e hora do momento em que está inserindo no banco
  data_prevista_devolucao datetime not null, -- Quantidade de dias XX após a data de emprestimo
  status bit not null,
  CONSTRAINT fk_codusuarioemprestimo FOREIGN KEY (codusuario)
  REFERENCES biblioteca.usuarios (idusuario)
  ON UPDATE CASCADE
  on DELETE NO ACTION,
  constraint fk_codfuncionarioemprestimo FOREIGN key (codfuncionario)
  references biblioteca.funcionarios (idfuncionario)
  on update CASCADE
  on DELETE no ACTION,
  constraint fk_codreservaemprestimo foreign key (codreserva)
  references biblioteca.reserva (idreserva)
  on update CASCADE
  on delete no action
);

-- TABELA ONDE VAI FICAR DIVERSOS LIVROS PARA O MESMO USUARIO - EMPRESTIMO
-- Tabela onde vai ficar os livros emprestados por Emprestimo
CREATE TABLE biblioteca.emprestimo_acervo_usuario
(
  id_emprestimo_acervo_usuario int not null AUTO_INCREMENT PRIMARY key,
  codemprestimo int not null, -- Vai puxar o numero do emprestimo (idemprestimo)
  codacervo int not null, -- O livro em si emprestado
  data_devolucao datetime not null, -- Data em que o livro está sendo devolvido
  status bit not null, -- Valida se o livro foi devolvido ou não
  constraint fk_codemprestimoemprestimoacervousuario FOREIGN key (codemprestimo)
  references biblioteca.emprestimo (idemprestimo)
  on update CASCADE
  on delete NO ACTION,
  constraint fk_codacervoemprestimoacervousuario FOREIGN key (codacervo)
  references biblioteca.acervo (idacervo)
  on update CASCADE
  on delete no action
);

