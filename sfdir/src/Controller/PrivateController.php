<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\{
    Template, Method
};

/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/private")
 * @Security("has_role('ROLE_USER')")
 */
class PrivateController extends Controller
{
    /**
     * @Route("/dashboard", name="private.dashboard")
     * @Method("GET")
     * @Template()
     */
    public function dashboard(Request $request) {
        return [

        ];
    }
}