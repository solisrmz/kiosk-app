<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MutuallyExclusiveLanguages implements ValidationRule
{
    private $idioma1;
    private $idioma2;
    private $idioma3;
    private $idioma4;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     public function __construct($idioma1, $idioma2, $idioma3, $idioma4)
     {
        $this->idioma1 = $idioma1;
        $this->idioma2 = $idioma2;
        $this->idioma3 = $idioma3;
        $this->idioma4 = $idioma4;
     }
     
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {   
        if(($this->idioma1==$this->idioma2 && $this->idioma2!="") || 
           ($this->idioma1==$this->idioma3 && $this->idioma3!="") || 
           ($this->idioma1==$this->idioma4 && $this->idioma4!="") || 
           ($this->idioma2!="" && $this->idioma3!="" && $this->idioma2==$this->idioma3) || 
           ($this->idioma2!="" && $this->idioma4!="" && $this->idioma2==$this->idioma4) || 
           ($this->idioma3!="" && $this->idioma4!="" && $this->idioma3==$this->idioma4))        
        {
            $fail('Los idiomas deben ser diferentes entre si');
        }
    }
}
