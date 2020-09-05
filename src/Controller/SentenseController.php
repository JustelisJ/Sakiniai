<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\DependencyInjection\ContainerBuilder;

    use App\Model\Sakinys;

    class SentenseController{

        /**
         * @Route("/{seed}", name="print_seed")
         */

        public function print(string $seed): Response
        {
            $sakinys = new Sakinys();
            $suformuoluotasSakinys = $sakinys->formuotiSakini($seed);
            return new Response(
                '<html><body>' . $suformuoluotasSakinys .'</body></html>'
            );
        }

        
    }
?>