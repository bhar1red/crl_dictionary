<?php

namespace Drupal\crl_dictionary\Services;

use Drupal\Core\Config\ConfigFactory;

class CRLDictionaryAPI {

  protected string $apiClient;

  public function __construct(){
    $this->apiClient =  "https://api.dictionaryapi.dev/api/v2/entries/en/";
  }

  public function getDefinitions($word){
    $response = file_get_contents($this->apiClient.$word);
    return json_decode($response);
  }
}
