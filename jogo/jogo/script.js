let alvo = document.getElementById("alvo");
let mouse = document.getElementById("mouse");
let telaGame = document.getElementById("telaGame");
let placaAcertos = document.getElementById("acertos");
let placaErros = document.getElementById("erros");
let placaJogadas = document.getElementById("jogadas");
let temporizador = document.getElementById("tempo");
let acertos = 0, erros = 0, jogadas = 0;
let tempo = 15;
let estaClicado = false;
let gamerOver = false;

//Pegando o Height e Widht
let alturaTela = document.getElementById("telaGame").clientHeight;
let larguraTela = document.getElementById("telaGame").clientWidth;

let alturaAlvo = document.getElementById("alvo").clientHeight;
let larguraAlvo = document.getElementById("alvo").clientWidth;


setInterval(()=>{

    alvo.style.top = Math.floor(Math.random() * (alturaTela - alturaAlvo)) + "px";
    alvo.style.left = Math.floor(Math.random() * (larguraTela - larguraAlvo)) + "px";
    alvo.style.display = "block";
    
    alvo.onclick = function() {
        alvo.style.display = "none";
    };
}, 1000);

alvo.onmousedown = () => {
    estaClicado = true;
}
alvo.onmouseout = () => {
    estaClicado = false;
}

telaGame.onclick = () => {
    if (estaClicado == false) {
        erros += 1;
        jogadas += 1;
        tempo -= 3;
        placaErros.innerHTML = erros;
        placaJogadas.innerHTML = jogadas;
    }
    else {
        acertos += 1;
        jogadas += 1;
        tempo += 3;
        placaAcertos.innerHTML = acertos;
        placaJogadas.innerHTML = jogadas;
    }
}

if (tempo <= 0) {
    gameOver = true;
}
setInterval(() => {tempo -= 1; temporizador.innerHTML= tempo;}, 1000);

telaGame.onmousemove = (event) => {
    mouse.style.left = event.pageX + "px";
    mouse.style.top = event.pageY + "px";
}