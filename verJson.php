<?php
	// Atribui o conteúdo do arquivo para variável $arquivo
	$arquivo = file_get_contents('cadastro.json');
					 
	// Decodifica o formato JSON e retorna um Objeto
	$json = json_decode($arquivo, true);

	//Imprime Array Json
	var_dump($json);
?>