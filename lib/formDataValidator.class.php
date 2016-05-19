<?php
class FormDataValidator {

  private $required = null;
  private $accepted = array();
  private $submitted = array();
  private $errors = array();
  private $validated = array();

  public function __construct($submitted, $accepted, $required = null) {
    $this->submitted = $submitted;
    $this->accepted = $accepted;
    $this->required = $required;
  }

  public function validate() {
    $this->errors = array();
    if (is_array($this->submitted) && count($this->submitted) > 0) {
      $this->required();
      foreach ($this->submitted as $fkey => $fdata) {
        if ($this->isAcceptable($fkey)) {
          if (!isset($this->errors[$fkey])) {
            $preval = $this->preValidateFromKey($fkey, $fdata);
            if ($preval['found'] && !is_null($preval['message'])) {
              $this->addError($fkey, $preval['message']);
            }
            else {
              $this->validated[$fkey] = (!is_null(@$preval['data']) ? @$preval['data'] : $fdata);
            }
          }
          else {
            $this->addError($fkey, $this->getErrorMessage($fkey));
          }
        }
      }
    }
    return array('errors' => $this->errors, 'validated' => $this->validated);
  }

  private function required() {
    if (!is_null($this->required)) {
      foreach ($this->required as $rkey) {
        if (!isset($this->submitted[$rkey]) || empty($this->submitted[$rkey])) {
          $this->addError($rkey, $this->getErrorMessage($rkey, true));
        }
      }
    }
  }

  private function addError($key, $msg) {
    if (!isset($this->errors[$key])) {
      $this->errors[$key] = $msg;
    }
  }

  private function isAcceptable($key) {
    if (is_array($this->accepted)) {
      return in_array($key, $this->accepted);
    }
    return false;
  }

  private function isRequired($key) {
    if (is_array($this->required)) {
      return in_array($key, $this->required);
    }
  }

  private function preValidateFromKey($key, $value) {
    $ret = array(
      'found' => false,
      'message' => null,
    );
    
    
    switch ($key) {
        case "email":
        if (filter_var($value, FILTER_VALIDATE_EMAIL) ||empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
        }
        break;
        case "nom":
         
             
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
        
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "ville":
         
             
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
        
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "code_fournisseur":
        
             if (is_numeric($value) || empty($value)) {
                $ret = array(
                'found' => true,
                'message' => null,
          );
        }
        
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "code_client":
        
             if (is_numeric($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
        
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "adresse":
        
             
             if (is_string($value) || !empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
        
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "capital":
        
             
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
        
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "telephone":
        
             
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
       
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "rc":
    
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
       
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "ninea":
      
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
       
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "chiffre_d_affaire":
             $value = intval($value);
             if (is_numeric($value) || empty($value) ) {
                 
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "autres_sources":
        
             if (is_numeric($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "produits_services":
        
             if (is_string($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "achat_mois":
             $value = filter_var($value, FILTER_VALIDATE_FLOAT);
             if ($value > -1 || empty($value) ) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "autres_charges":
        
             if (is_numeric($value) || empty($value)) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "revenu_personnel":
            
            $value = filter_var($value, FILTER_VALIDATE_FLOAT);
             if(1) {
                $ret = array(
                    'found' => true,
                    'message' => null,
                );
            }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
        case "besoins_credit":
            $value = filter_var($value, FILTER_VALIDATE_FLOAT);
             if ($value > -1 || empty($value) ) {
          $ret = array(
            'found' => true,
            'message' => null,
          );
        }
      
        else {
          $ret = array(
            'found' => true,
            'message' => $this->getErrorMessage($key),
          );
         }   
        break;
      
        
    }
    return $ret;
  }

  private function getErrorMessage($fieldName, $required = false) {
    $ret = false;
    switch ($fieldName) {
      case "libelle":
        $ret = $required ? "Ce champ est requis!" : "Ce format n'est pas valide!";
        break;
      default:
        $ret = $required ? "Ce champ est requis!" : "Le format du  du champs n'est valide!";
        break;
    }
    return $ret;
  }

}
