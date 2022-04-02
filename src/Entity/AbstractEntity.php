<?php 

namespace App\Entity;

abstract class AbstractEntity {
    
    public function __construct($datas) {
       $this->datas = $datas; 

       if (!empty($this->datas)) {
           $this->hydrate($this->datas);
       }
    }
   
    public function hydrate($datas) 
    {
        foreach ($datas as $attribut => $data) {
            $method = 'set'.ucfirst($attribut);
            if (is_callable(array($this,$method))) {
                $this->$method($data);
            }
        }
    }
  
}