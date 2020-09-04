<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\RedirectResponse;
    use Symfony\Component\HttpFoundation\Response;

    class HomeController extends AbstractController
    {
        /**
         * @Route("/", name="index")
         */
        public function index()
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $seed = '';
            for ($i = 0; $i < 20; $i++) {
                $seed .= $characters[rand(0, $charactersLength - 1)];
            }

            return $this->redirectToRoute('print_seed', ['seed' => $seed]);
        }
    }
?>