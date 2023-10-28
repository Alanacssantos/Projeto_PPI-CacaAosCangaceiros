<?php
// obter dados (string) enviados pelo JavaScript
$acertosTxt = filter_input(INPUT_GET, 'acertos', FILTER_SANITIZE_SPECIAL_CHARS);
$errosTxt = filter_input(INPUT_GET, 'erros', FILTER_SANITIZE_SPECIAL_CHARS);

$timezone = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);
$agoraFormatado = $agora->format('d/m/Y H:i');

$array = explode(' ', $agoraFormatado);

//variáveis a serem manipuladas:
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$acertos = intval($acertosTxt);
$erros = intval($errosTxt);
$dataAtual = $array[0];
$tempoAtual = $array[1];

// Conexão com o banco 
$hostname = 'localhost';
$username = 'root';
$password = 'Juvam20041103';
$database = 'cangaceiros_db';

$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Inserir na tabela
$preparo = $pdo->prepare("INSERT into jogador (nome, acertos, erros, data_atual, tempo_atual)
values (:nome, :acertos, :erros, :data_atual, :tempo_atual);");

$preparo->bindParam(":nome", $nome);
$preparo->bindParam(":acertos", $acertos);
$preparo->bindParam(":erros", $erros);
$preparo->bindParam(":data_atual", $dataAtual);
$preparo->bindParam(":tempo_atual", $tempoAtual);

$preparo->execute();

header("Location:../tabela.php");

?>

