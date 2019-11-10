
<?php
header('Content-Type: text/html; charset=utf-8');

	class Conexao

	{


	//Atributos privados da classe que terao get e set

	private $local, $usuario, $senha, $banco;
	
	//Atributos publicos da classe que nao precisa de get e set

	public $con, $result, $comandoSql;
	
	//Metodo construtor que determina valores para os atributos privados

        function __construct()
	{
		$this -> local = "localhost";
		$this -> usuario = "root";
		$this -> senha = "";
		$this -> banco = "biblioteca";
	}
	//Metodos set e get para os atributos privados
	
	public function setLocal($novoLocal)
	{
		$this -> local = $novoLocal;
	}
	public function getLocal()
	{
		return $this -> local;
	}
	public function setUsuario($novoUsuario)
	{
		$this -> usuario = $novoUsuario;
	}
	public function getUsuario()
	{
		return $this -> usuario;
	}
	public function setSenha($novaSenha)
	{
		$this -> senha = $novaSenha;
	}
	public function getSenha()
	{
		return $this -> senha;
	}
	public function setBanco($novoBanco)
	{
		$this -> banco = $novoBanco;
	}
	public function getBanco()
	{
		return $this -> banco;
	}
	//Função conectarBd()
	//responsavel por realizar a conexao do banco de dados atraves da função
	//mysql_pconnect() e definir o banco a ser utilizado atraves da função mysql_select_db()

	public function conectarBd()
	{
		//$con=@mysql_pconnect($local,$usuario,$senha);

		$this -> con = @mysql_connect($this->getLocal(), $this->getUsuario(), $this->getSenha());
		if (!$this->con)
		{
			echo "Problema ao conectar ao banco de dados.";
			die();
		}
		else 
		{
			// mysql_select_db ("bdexercicio2",$con)
			if (!mysql_select_db($this->getBanco(),$this->con))
			{
				echo "Problemas ao selecionar o banco de dados.";
				die();
			}
		}
	} //Fim da function conectarBd();
	
	//Função criar consulta()
	//sql passado como parametro
	public function criarConsulta($sql)
	{
		$this -> conectarBd();
		$this -> comandoSql = $sql;
		
		// $result = mysql_query($comandoSql,$con)
		if ($this -> result=mysql_query($this -> comandoSql, $this -> con))
		{
			return $this->result;
			$this -> desconectarBd();
		}
		else 
		{
			echo "Nao foi possivel realizar o comando Sql.";
			die();
			$this -> desconectarBd();
		}
	}
	//Funcao desconectarBd() - responsavel por finalizar a conexao
	public function desconectarBd()
	{
		return mysql_close($this->con);
		echo "Desconexao Ok";
	}



}

?>