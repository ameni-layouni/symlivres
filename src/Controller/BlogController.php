<?php

namespace App\Controller;

use App\taxes\calcul;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    private $obj;

    public function __construct()
    {
        $this->obj = new calcul();
    }

    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        $pu = 100;
        $tva = 0.02;
        $mtva = $this->obj->calculMontantTVA($pu, $tva);
        $mttc = $this->obj->CalculMontantTTC($pu, $tva);
        return new Response("<h1>montant tva est $mtva<br> le montant ttc est $mttc</h1>");
    }

}
