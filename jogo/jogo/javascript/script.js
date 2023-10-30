let alvo = document.getElementById("alvo");
let telaGame = document.getElementById("telaGame");
let telaVida = document.getElementById("vidas");
let modal = document.querySelector("dialog");
let placaAcertos = document.getElementById("acertos");
let placaErros = document.getElementById("erros");
let placaJogadas = document.getElementById("jogadas");
let dicas = document.getElementById("dicas");
let botaoEnvio = document.getElementById("botaoEnvio");
let acertos = 0, erros = 0, jogadas = 0, vidas = 3, acertoVid = 0;
let estaClicado = false;
let gameOver = false;
let mostrou = false;
let audioTiro = new Audio("../sons/SomDeTiro.mp3");

//Pegando o nome da pessoa
let inputNome = document.getElementById("nome");


//Pegando o Height e Widht
let alturaTela = document.getElementById("telaGame").clientHeight;
let larguraTela = document.getElementById("telaGame").clientWidth;

let alturaAlvo = document.getElementById("alvo").clientHeight;
let larguraAlvo = document.getElementById("alvo").clientWidth;


setInterval(() => {
    if (!gameOver) {
        alvo.style.top = Math.floor(Math.random() * (alturaTela - alturaAlvo)) + "px";
        alvo.style.left = Math.floor(Math.random() * (larguraTela - larguraAlvo)) + "px";
        alvo.style.display = "block";

        alvo.onclick = function () {
            alvo.style.display = "none";
        };
        telaVida.innerHTML = vidas;
        if (acertoVid == 5) {
            vidas += 1;
            acertoVid = 0;
            var intervalo = setInterval(function () {
                dicas.innerHTML = "Vida extra ganha!";

            }, 600);

            //Depois de 4 segundos desapaerece
            setTimeout(function () {
                clearInterval(intervalo);
                dicas.innerHTML = "";
            }, 2400);

        }
    } else {
        alvo.onclick = function () {
            alvo.style.display = "block";
        };
    }
    if (vidas <= 0) {
        gameOver = true;
        dicas.innerHTML = "Você perdeu! Clique em jogo para começar novamente!";

        if (!mostrou) {
            modal.showModal();
        }
        mostrou = true;
    }
}, 1000);

alvo.onmousedown = () => {
    estaClicado = true;
}
alvo.onmouseout = () => {
    estaClicado = false;
}

telaGame.onclick = () => {
    if (!gameOver) {
        if (estaClicado == false) {
            erros += 1;
            vidas -= 1;
            jogadas += 1;
            placaErros.innerHTML = erros;
            placaJogadas.innerHTML = jogadas;
        }
        else {
            acertos += 1;
            acertoVid += 1;
            jogadas += 1;
            placaAcertos.innerHTML = acertos;
            placaJogadas.innerHTML = jogadas;

            var intervalo = setInterval(function () {
                alvo.setAttribute("src", "images/alvoMorto.png");
            }, 600);

            //Depois de 1 segundo, para o intervalo e atribui a imagem normal novamente ao alvo.
            setTimeout(function () {
                clearInterval(intervalo);
                alvo.setAttribute("src", "images/alvo.png");
            }, 1000);
        }
        audioTiro.play();
    }
}
function startTempo(duracao, telaDeTempo) {
    var tempo = duracao, minutos, segundos;

    var intervaloTempoJogo = setInterval(function () {
        minutos = parseInt(tempo / 60, 10); //convertendo minutos em segundos
        segundos = parseInt(tempo % 60, 10); //convertendo minutos em 

        minutos = minutos < 10 ? "0" + minutos : minutos;
        segundos = segundos < 10 ? "0" + segundos : segundos;

        telaDeTempo.textContent = minutos + ":" + segundos;

        if (--tempo < 0) {
            gameOver = true;
            tempo = 0;
            dicas.innerHTML = "Você perdeu! Clique em jogo para começar novamente!";

            if (!mostrou) {
                modal.showModal();
            }
            mostrou = true;
        }
        if (vidas <= 0) {
            pararTempo();
        }

    }, 1000);

    function pararTempo() {
        clearInterval(intervaloTempoJogo);
    }
}
window.onload = function () {
    var duracao = 90 * 1; //Conversão de tempo para segundos
    var telaDeTempo = document.querySelector("#telaTempo");
    startTempo(duracao, telaDeTempo);
}
botaoEnvio.onclick = function () {
    var nome = inputNome.value
    document.location.href = "../bancoDeDados/arquivo.php?nome=" + nome + "&erros=" + erros + "&acertos=" + acertos;
}

