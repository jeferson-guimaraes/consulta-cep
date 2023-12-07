<?php

namespace App\WebService;

class ViaCEP{

  /**
   * Método responsável por consultar o cep
   *
   * @param string $cep
   * @return array
   */
  public static function checkCEP($cep){
    //INICIANDO O CURL
    $curl = curl_init();

    //CONFIGURANDO O CURL
    curl_setopt_array($curl, [
      CURLOPT_URL => "viacep.com.br/ws/$cep/json/",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "GET"
    ]);

    //EXECUTANDO CURL
    $response = curl_exec($curl);

    //FECHANDO A CONEXÃO
    curl_close($curl);

    //CONVERTENDO JSON PARA ARRAY
    $result = json_decode($response, true);

    //RETORNANDO RESULTADO
    return isset($result['cep']) ? $result : false ;
  }

}