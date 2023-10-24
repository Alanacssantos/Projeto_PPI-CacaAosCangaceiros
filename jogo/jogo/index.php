<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de atirar</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="javascript/script.js" defer></script>
    <link rel="shortcut icon" href="images/Ponteiro.png" type="image/x-icon" />
</head>

<body>
    <header id="caixaTitulo">
        <img src="images/Caça aos cangaceiros.png" width="300px" height="150px" id="logo">
        <a href="index.html" class="btn conteudoNav">Jogo</a>
        <a href="prejogo.html" class="btn conteudoNav">Enredo do jogo</a>
    </header>

    <nav>
        <div id="cabecalho">
            <h3>Atire para ganhar pontos:</h3>
        </div>

        <div id="placar">
            <div>
                <h3 class="placarTxt">Erros: </h3>
                <span id="erros" class="placarTxt">0</span>
            </div>
            <div>
                <h3 class="placarTxt">Acertos: </h3>
                <span id="acertos" class="placarTxt">0</span>
            </div>
            <div id="telaTempo">

            </div>
            <div>
                <h3 class="placarTxt">Tentativas: </h3>
                <span id="jogadas" class="placarTxt">0</span>
            </div>
            <div id="divVida">
                <img width="30px" height="30px" src="images/vida.png">
                <span id="vidas" class="placarTxt">0</span>
            </div>
        </div>
    </nav>

    <dialog>
        <form action="" method="get">
            <label for="nome">Nome do(a) jogador(a):</label>
            <input type="text" id="nome" name="nome">
            <input type="submit" id="botaoEnvio">
        </form>
    </dialog>

    <div id="container">
        <div id="canvas">
            <div id="telaGame">
                <img id="alvo" width="72px" height="102px" src="images/alvo.png">
            </div>
            <div id="divDicas">
                <h3 id="dicas"></h3>
            </div>
        </div>
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