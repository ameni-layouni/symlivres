<?php

namespace App\taxes;
class calcul
{
    public function calculMontantTVA($pu, $tva)
    {
        $mt = $pu * $tva;
        return $mt;
    }
    public function CalculMontantTTC($pu,$tva){
        $mttc=$pu+$pu*$tva;
        return $mttc;
    }

}