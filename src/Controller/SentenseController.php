<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\RedirectResponse;

    class SentenseController{

        /**
         * @Route("/{seed}", name="print_seed")
         */

        public function print(string $seed): Response
        {

            return new Response(
                '<html><body>Seed: '.$seed.'</body></html>'
            );
        }

        
    }
?>