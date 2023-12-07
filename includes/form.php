<?php

use App\WebService\ViaCEP;

  $response = "";
  if(isset($_POST['cep'])){
    $cep = str_replace('.','',$_POST['cep']);
    $cep = str_replace('-','',$cep);
    $address = ViaCEP::checkCEP($cep);
    
    if(!$address){
      $response = "<p class='text-center' style='color: #fff; background-color: #f009; border-radius: 8px'> CEP não encontrado! Por favor, verifique o CEP e tente novamente</p>";
    }else{
      $response = "
        <h2 class='mt-3' id='cepFound'>CEP Encontrado</h2>
        <div class='row mt-2'>
          <div class='col-12 mb-3'>
            <label>Logradouro:</label>
            <input type='text' class='form-control' value='$address[logradouro]' readonly />
          </div>
        </div>
        <div class='row'>
          <div class='col-12 mb-3'>
            <label>Complemento:</label>
            <input type='text' class='form-control' value='$address[complemento]' readonly />
          </div>
        </div>
        <div class='row'>
          <div class='col-12 mb-3'>
            <label>Bairro:</label>
            <input type='text' class='form-control' value='$address[bairro]' readonly />
          </div>
        </div>
        <div class='row'>
          <div class='col-md-10 mb-3'>
            <label>Estado:</label>
            <input type='text' class='form-control' value='$address[localidade]' readonly />
          </div>
          <div class='col-md-2 mb-3'>
            <label>UF:</label>
            <input type='text' class='form-control' value='$address[uf]' readonly />
          </div>
        </div>
      ";
    }
  }

?>

<form method="POST" class="m-auto">
  <div class="d-flex justify-content-center" id="titleContainer">
    <h1 class="text-center" id="title">Consultar CEP</h1>
  </div>
  <div class="mt-4 mb-3">
    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep" class="form-control" required />
  </div>
  <div class="mb-3 d-flex justify-content-end">
    <button class="btn btn-primary mt-4">Consultar</button>
  </div>

  <?=$response?>
</form>