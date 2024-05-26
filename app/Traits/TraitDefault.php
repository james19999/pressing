<?php
namespace App\Traits;
Trait TraitDefault{

    public  function code_generate($n = 3)
    {
        $characters = "0123456789";
        $randomString = "Lav"."-" . '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

}
