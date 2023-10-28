<?php

class Partida
{


    private int $id;
    private string $nome;
    private int $acertos;
    private int $erros;
    private string $dataAtual;
    private string $tempoAtual;

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of acertos
     */
    public function getAcertos(): int
    {
        return $this->acertos;
    }

    /**
     * Set the value of acertos
     */
    public function setAcertos(int $acertos): self
    {
        $this->acertos = $acertos;

        return $this;
    }

    /**
     * Get the value of erros
     */
    public function getErros(): int
    {
        return $this->erros;
    }

    /**
     * Set the value of erros
     */
    public function setErros(int $erros): self
    {
        $this->erros = $erros;

        return $this;
    }

    /**
     * Get the value of dataAtual
     */
    public function getDataAtual(): string
    {
        return $this->dataAtual;
    }

    /**
     * Set the value of dataAtual
     */
    public function setDataAtual(string $dataAtual): self
    {
        $this->dataAtual = $dataAtual;

        return $this;
    }

    /**
     * Get the value of tempoAtual
     */
    public function getTempoAtual(): string
    {
        return $this->tempoAtual;
    }

    /**
     * Set the value of tempoAtual
     */
    public function setTempoAtual(string $tempoAtual): self
    {
        $this->tempoAtual = $tempoAtual;

        return $this;
    }

    public function mostrarRanking()
    {
        // Conexão com o banco 
        $hostname = 'localhost';
        $username = 'root';
        $password = 'Juvam20041103';
        $database = 'cangaceiros_db';

        $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Select
        $q = $pdo->query("SELECT id, nome, acertos, erros, data_atual, tempo_atual
        FROM jogador ORDER BY acertos DESC, data_atual DESC, tempo_atual DESC;"); //Essa função query vai receber uma instrução do bd;
        $jogador = $q->fetchAll(); //jogador, o qual será um array, vai receber o valor da query. 

        $partidas = [];

        foreach($jogador as $j){
            $partida = new Partida();
            $partida->setId($j[0]);
            $partida->setAcertos($j[2]);
            $partida->setNome($j[1]);
            $partida->setErros($j[3]);
            $partida->setDataAtual($j[4]);
            $partida->setTempoAtual($j[5]);
            array_push($partidas, $partida);
        }
        return $partidas;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
