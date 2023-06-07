<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AtLeastOneDay implements ValidationRule
{
    private $lunes;
    private $martes;
    private $miercoles;
    private $jueves;
    private $viernes;
    private $sabado;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    
     public function __construct($lunes, $martes, $miercoles, $jueves, $viernes, $sabado)
    {
       $this->lunes = $lunes;
       $this->martes = $martes;
       $this->miercoles = $miercoles;
       $this->jueves = $jueves;
       $this->viernes = $viernes;
       $this->sabado = $sabado;
    }
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->lunes==0 && $this->martes==0 && $this->miercoles==0 && 
           $this->jueves==0 && $this->viernes==0 && $this->sabado==0 )
        {
            $fail('Debe seleccionar al menos un día');
        }
    }
}
