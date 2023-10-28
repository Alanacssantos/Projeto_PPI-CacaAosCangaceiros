<?php
// Conexão com o banco 
$hostname = 'localhost';
$username = 'root';
$password = 'Juvam20041103';
$database = 'cangaceiros_db';

$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once "classes/Partida.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de atirar</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="images/Ponteiro.png" type="image/x-icon" />
</head>

<body>
    <header id="caixaTitulo">
        <img src="images/Caça aos cangaceiros.png" width="300px" height="150px" id="logo">
        <a href="index.php" class="btn conteudoNav">Jogo</a>
        <a href="prejogo.html" class="btn conteudoNav">Enredo do jogo</a>
        <a href="tabela.php" class="btn conteudoNav">Ranking</a>
    </header>

    <div id="divTable">
        <table border="1">
            <thead>
                <tr>
                    <td><strong>ID:</strong></td>
                    <td><strong>Nome:</strong></td>
                    <td><strong>Acertos:</strong></td>
                    <td><strong>Erros:</strong></td>
                    <td><strong>Data atual:</strong></td>
                    <td><strong>Tempo atual:</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php
                //Select
                $partidas = new Partida();
                $arrayPartidas = $partidas->mostrarRanking();

                foreach ($arrayPartidas as $p) :
                ?>
                    <tr>
                        <td><?= $p->getId() ?></td>
                        <td><?= $p->getNome() ?></td>
                        <td><?= $p->getAcertos() ?></td>
                        <td><?= $p->getErros() ?></td>
                        <td><?= $p->getDataAtual() ?></td>
                        <td><?= $p->getTempoAtual() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <footer>
        <div class="creditos">
            <strong>Atividade de tiro ao alvo</strong>
            <p>Disciplina: Programação para internet <br>
                Professor: Marcelo Figueiredo Barbosa Júnior <br>
                IFRN - Campus Santa Cruz - RN
            </p>
        </div>
        <div class="creditos">
            <p>Todos direitos reservado à <strong>JuvaLana - Entreteniments</strong></p>
        </div>
        <div class="creditos">
            <strong>Desenvolvido por:</strong>
            <div class="nomes">
                <img src="images/PontoDaLista.png" width="15px" height="15px" alt="">
                Alana Costa Soares Santos
            </div>
            <div class="nomes">
                <img src="images/PontoDaLista.png" width="15px" height="15px" alt="">
                Juvam Rodrigues do Nascimento Neto
            </div>

        </div>
    </footer>

</body>

</html>