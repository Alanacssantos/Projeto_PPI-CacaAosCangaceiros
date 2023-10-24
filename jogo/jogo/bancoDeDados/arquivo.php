<?php
// obter dados (string) enviados pelo JavaScript
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$acertos = filter_input(INPUT_GET, 'acertos', FILTER_SANITIZE_SPECIAL_CHARS);
$erros = filter_input(INPUT_GET, 'erros', FILTER_SANITIZE_SPECIAL_CHARS);

if ($nome || $sobrenome) {
    echo "<br/></br>";
    echo "Meu nome é: ".$nome;
    echo "<br/></br>";
    echo "Meu sobrenome é: ".$sobrenome;
} 



?>