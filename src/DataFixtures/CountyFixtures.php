<?php

namespace App\DataFixtures;

use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CountyFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    { $counties = [
        ["Ille-et-Vilaine", "35000" ],
        ["Finistere", "29000" ],
        ["Morbihan", "56000" ],
        ["Cotes-Armor", "22000" ],

    ];


        foreach ($counties as $key => $county) {
            $cnt = new County();
            $cnt->setLabel($county[0]);
            $cnt->setZipcode($county[1]);
            $manager->persist($cnt);
            $this->setReference('county-' . ($key + 1), $cnt);
        }

        $manager->flush();
    }
}
