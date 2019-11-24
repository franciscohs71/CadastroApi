
<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$cod = time();

			//Cria um array dos dados do formulário
			$dados = array(
			    'codigo'   => $cod,
			    'nome'     => $_POST['nome'],
			    'telefone' => $_POST['fone'],
				);

			// Atribui o conteúdo do arquivo para variável $arquivo
			$string = file_get_contents('cadastro.json');

			// Decodifica o formato JSON e retorna um Objeto
			$json = json_decode($string, true);

			//Inserre o array com os novos dados ao cadastro
			$json['cadastro'][] = $dados;

			//Abre o arquivo em modo de escrita
			$fp = fopen('cadastro.json', 'w');

			//Escreve no arquivo em Json
			fwrite($fp, json_encode($json));

			//Fecha o arquivo
			fclose($fp);
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script language="javascript" type="text/javascript">
		function validar() {
			var nome = form1.nome.value;
			var fone = form1.fone.value;
			 
			if ((nome == "") || (fone == "")) {
				alert('Nenhum capo pode ficar vazio.');
				form1.nome.focus();
				return false;
			}
		}
	</script>
</head>
<body>
	<div class="banner">
		<h1>Desenvolvimento de uma API com PHP e Json</h1>
	</div>

	<div class="container">
		
		<div class="esquerda">

			<fieldset>
				<label>Cadastrar</label><br><br>
				<form method="POST" class="form-contact" name="form1">
					<label>Nome: </label>
					<input type="text" name="nome" class="form-contact-input"><br><br>
					<label>Telefone: </label>
					<input type="text" name="fone" class="form-contact-input"><br><br>
					<input type="submit" name="" value="Cadastrar" class="form-contact-button" onclick="return validar()"><br><br>
				</form>
			</fieldset>

			<fieldset>
				<label>Listar Cadastros</label><br><br>
				<a href="">Atualizar Lista</a> <a href="verJson.php" target="_blank">Ver arquivo JSON</a><br><br>
			<?php
				if($_SERVER['REQUEST_METHOD'] == 'GET'){
					// Atribui o conteúdo do arquivo para variável $arquivo
					$arquivo = file_get_contents('cadastro.json');
					 
					// Decodifica o formato JSON e retorna um Objeto
					$json = json_decode($arquivo, true);

					echo "
						<table>
							<thead>
								<tr>
									<th>Código</th>
									<th>Nome</th>
									<th>telefone</th>
								</tr>
							</thead>
					";

					// Loop para percorrer o Objeto
					foreach ($json['cadastro'] as $registro) {
						echo "
								<tr>
									<td>{$registro['codigo']}</td>
									<td>{$registro['nome']}</td>
									<td>{$registro['telefone']}</td>
								</tr>
							";
					}
				}
			?>
				</table>
			</fieldset>
		</div>

		<div class="direita">
			<h4>O que é API?</h4>
			<p>
				&nbsp;&nbsp;&nbsp;API é um conjunto de rotinas e padrões de programação para acesso a um aplicativo de software ou plataforma baseado na Web. A sigla API refere-se ao termo em inglês "Application Programming Interface" que significa em tradução para o português "Interface de Programação de Aplicativos".
			</p>
			<h4>O Que é Json?</h4>
			<p>
				&nbsp;&nbsp;&nbsp;JSON, em seu significado teórico é "Javascript Object Notation", do qual nada mais é que o formato mais leve de transferência/intercâmbio de dados, ele é similar ao XML, e tem a mesma utilidade, mesmo intuito, porém é mais leve, o detalhe é que não necessariamente, apesar do nome, você tem que usa-lo com Javascript. Muitas linguagens hoje em dia dão suporte ao JSON, é meio que um novo método, substituto do antigo e conhecido XML. Ele é muito usado para retornar dados vindos de um servidor utilizando requisições AJAX para atualizar dados em tempo real.
			</p>

			<a href="CadastroApi.zip">Baixar os arquivo do projeto.</a>
			<p>
				Os arquivos estão em uma pasta do tipo zip, basta descompactar a pasta.<br>
				Arquivos do projeto:
			</p>
				<ul>
					<li>index.php (Página inicial do projeto)</li>
					<li>verJson.php (Página para visualizar o array em JSON)</li>
					<li>estilo.css (Folhas de estilo em CSS)</li>
					<li>cadastro.json (Dados armazenados em formato JSON)</li>
					</li>
				</ul>
			
		</div>

		<div class="clear"></div>
	</div>
	<div class="rodape">
			<P>Desenvolvido por: Francisco Henrique da Silva</P>
			<p>sistema criado para o Forum 2 da cadeira de Programação para Web 1</p>
		</div>
</body>
</html>
