<?php

namespace Drupal\crl_dictionary\Services;

define("API_CLIENT", "https://api.dictionaryapi.dev/api/v2/entries/en/");

use Drupal\Core\Config\ConfigFactory;

class CRLDictionaryAPI {

  protected string $apiClient;

  public function __construct(){
    $this->apiClient =  API_CLIENT;
  }

  public function getDefinitions($word){
    $response = file_get_contents($this->apiClient.$word);
    if($response){
      return json_decode($response);
    }
    else{
      return false;
    }

  }
}
