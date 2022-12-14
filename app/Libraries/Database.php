<?php

class Database{

    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'framework';
    private $porta = '3306';
    private $dbh;

    public function __construct()
    {
        //Fonte de dados ou DNS contém as informações necessarias para conectar ao banco de dados
        $dns = 'mysql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            //Armazena em cache a conexão para ser reutilizada, evita a sobre carga de uma nova conexão,
            //resultando em um app mais rapido
            PDO::ATTR_PERSISTENT => true,
            //Lança uma PDOException se ocorrer um erro
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            //cria a instancia do PDO
            $this->dbh = new PDO($dns, $this->usuario, $this->senha, $opcoes);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}