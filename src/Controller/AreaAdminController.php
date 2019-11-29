<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/admin")
 */
class AreaAdminController extends AbstractController
{
    /**
     * @Route("/", name="admin_area")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/homeAdmin.html.twig');
    }
}