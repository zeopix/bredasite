<?php

namespace Jet\BredaBundle\Model;



class Contact
{

    public $persona;
    public $telefono;
    public $email;    
    public $consulta;

    public function toArray(){
    	return Array(
    		'persona' => $this->persona,
    		'telefono' => $this->telefono,
    		'email' => $this->email,
    		'consulta' => $this->consulta
    	);
    }
}