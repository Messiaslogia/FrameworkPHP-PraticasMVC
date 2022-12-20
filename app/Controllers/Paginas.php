<?php

class Paginas extends Controller{

    public function index()
    {
        $dados = [
            'titulo' => 'Página Inicial',
            'descricao'=> 'PHP7'
        ];
        $this->view('paginas/home', $dados);
    }

    public function sobre()
    {
        $dados = [
            'tituloPagina' => 'Página sobre nós'
        ];
        $this->view('paginas/sobre', $dados);
    }

}