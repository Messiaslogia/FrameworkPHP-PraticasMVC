<?php

class Rota {

    /**
      * Recebe os dados do controlador
    */
    private $controlador = 'Paginas';

    /**
      * Seta um valor default no metodo
    */
    private $metodo = 'index';

    /**
      * Seta os valores dos parametros
    */
    private $parametros = [];

    public function __construct()
    {
      // Verifica se a url existe se não retorna um array no indice 0
       $url = $this->url() ? $this->url() : [0];

      //  Verifica se o arquivo controlador existe e seta o valor na variavel "controlador"
       if (file_exists('../app/Controllers/'.ucwords($url[0].'.php'))) : //UCWORDS: Pega o primeiro caracter e transforma em maiusculo 
            $this->controlador = ucwords($url[0]); 
            unset($url[0]);
       endif;

      //  Se o controlador existir ele requisita o arquivo
       require_once '../app/Controllers/'. $this->controlador.'.php';
       $this->controlador = new $this->controlador;




       // Verifica se existe um metodo na url  e seta o valor na variavel "metodo"
       if(isset($url[1])):
            if(method_exists($this->controlador, $url[1])): //Verifica se o metodo existe dentro do controlador
                $this->metodo = $url[1];
                unset($url[1]);
            endif;
        endif;



        //Verifica se existe parametros na URL e seta o valor na variavel "parametros"
        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

        // var_dump($this);
    }

    /**
     * Recupera a URL
     * 
     * @return array $url
     */
    private function url()
    {
      $url = filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL); //Filtra os dados aártir da url
      if (isset($url)):

        //TRIM: Remova caracteres de ambos os lados de uma string
        //RTRIM: Remove espaços em branco ou outros caracteres predefinidos do lado direito de uma string
        $url = trim(rtrim($url, '/')); 
        $url = explode('/', $url); //Divide a string em arrays pelo separador "/"

        return $url;
      endif;
    }
}