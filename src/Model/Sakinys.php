<?php
    namespace App\Model;

    class Sakinys{

        public function formuotiSakini($seed)
        {
            $budvardziai = array("gauruotas", "išsipūtęs", "plaukuotas", "lėta", "aukštielninka", "supuvusi", "išverstaakė", "pasišiaušusi", "gleivėta");
            $daiktavardziai = array("rupūžė", "karvė", "šliužas", "žaltys", "velnias", "gaidys");
            $sakinys = "";
            $randValue = self::stringConverterToInt($seed);
            
            $daiktavardis = $daiktavardziai[$randValue % count($daiktavardziai)];
            $gimine = '';
            //Patikrina paskutine raide, jei s tai vyriska gimine
            if(strcmp(substr($daiktavardis, -1), "s") == 0)
            {
                $gimine = 'V';
            }
            else
            {
                $gimine = 'M';
            }

            $index = $randValue % count($budvardziai);
            //Isrenka budvardi is saraso ir pakeicia gimine, jei reikia
            $budvardis1 = self::budvardzioGiminesKeitimas($gimine, $budvardziai[$index]);

            //Panaikina panaudota budvardi is saraso
            array_splice($budvardziai, $index, 1);
            $index = $randValue % count($budvardziai);

            $budvardis2 = self::budvardzioGiminesKeitimas($gimine, $budvardziai[$index]);

            $sakinys = $budvardis1 . ", " . $budvardis2 . " " . $daiktavardis;

            return $sakinys;
        }
        
        //Is string sugeneruoja skaiciu
        private function stringConverterToInt($str)
        {
            $charValueSum = 0;
            for($i = 0; $i < strlen($str); $i++)
            {
                $char = substr($str, $i, 1);
                $charValueSum += ord($char);
            }
            return $charValueSum;
        }

        //Pakeicia budvardzio gimine(Pradinis variantas, tinka tik su dabartiniais budvardziai, bet ne su visais) (Problemos su lietuviskomis raidemis)
        //Kazkodel viena lietuviska raide skaito kaip 2 characterius
        private function budvardzioGiminesKeitimas($gim, $budv)
        {
            $paskutines_2_raides = substr($budv, -2);
            if($gim == 'V')
            {
                if(strcmp($paskutines_2_raides[1], "a") == 0)
                {
                    $budv = $budv . "s";
                }
                if(strcmp($paskutines_2_raides[1], "ė") == 0)
                {
                    $budv = substr($budv, 0, -2) . "is";
                }
                if(strcmp($paskutines_2_raides, "si") == 0)
                {
                    $budv = substr($budv, 0, -3) . "ęs";
                }
            }
            else
            {
                if(strcmp($paskutines_2_raides, "as") == 0)
                {
                    $budv = substr($budv, 0, -1);
                }
                if(strcmp($paskutines_2_raides, "is") == 0)
                {
                    $budv = substr($budv, 0, -2) . "ė";
                }
                if(strcmp($paskutines_2_raides, "ęs") == 0)
                {
                    $budv = substr($budv, 0, -2) . "usi";
                }
            }

            return $budv;
        }
    }