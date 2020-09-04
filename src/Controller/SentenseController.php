<?php
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class SentenseController{

        /**
         * @Route("/{seed}")
         */

        public function generator(string $seed): Response
        {

            return new Response(
                '<html><body>Seed: '.$seed.'</body></html>'
            );
        }
    }
?>