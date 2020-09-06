<?php
namespace App\Tests\Model;

use App\Model\Sakinys;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SakinysTest extends WebTestCase
{
    
    public function testSakinioGramatika()
    {
        $sakinys = new Sakinys();
        $client = static::createClient();

        $client->request('GET', '/xyz');
        $content = $client->getResponse()->getContent();

        //Gauna sakini is body ir suskaido i zodzius
        $zodziai = explode(" ", $sakinys->get_string_between($content, "<body>", "</body>"));
        $zodziai[0] = substr($zodziai[0], 0, -1);

        //Is daiktavardzio gauna gimine
        $gimine = "";
        if(strcmp(substr($zodziai[2], -1), "s") == 0)
        {
             $gimine = 'V';
        }
        else
        {
             $gimine = 'M';
        }
        $this->assertEquals($gimine, "V");

        $atitinkaGimine = true;
        //Pagal gimine patikrina budvardziu galunes
        for($i = 0; $i <= 1; $i++)
        {
            $paskutines_2_raides = substr($zodziai[$i], -2);
            if($gimine == 'V')
            {
                if(strcmp($paskutines_2_raides[1], "a") == 0)
                {
                    $atitinkaGimine = false;
                }
                if(strcmp($paskutines_2_raides[1], "ė") == 0)
                {
                    $atitinkaGimine = false;
                }
                if(strcmp($paskutines_2_raides, "si") == 0)
                {
                    $atitinkaGimine = false;
                }
            }
            else
            {
                if(strcmp($paskutines_2_raides, "as") == 0)
                {
                    $atitinkaGimine = false;
                }
                if(strcmp($paskutines_2_raides, "is") == 0)
                {
                    $atitinkaGimine = false;
                }
                if(strcmp($paskutines_2_raides, "ęs") == 0)
                {
                    $atitinkaGimine = false;
                }
            }
        }

        $this->assertEquals($atitinkaGimine, true);
    }
    
}