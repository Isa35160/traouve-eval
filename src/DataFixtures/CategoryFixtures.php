<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    { $categories = [
            ["Clés", "fa-key", "#1480dc" ],
            ["Portefeuille", "fa-wallet", "#dc143c"],
            ["Jouets", "fa-money", "#dccd14" ],
            ["Animaux", "fa-pow", "#777"],
            ["Electronique", "fa-bolt", "#22B24C"],
            ["Vetements", "fa-tshirt", "#e83e8c" ],
            ];


        foreach ($categories as $key => $category) {
            $cat = new Category();
            $cat->setLabel($category[0]);
            $cat->setIcon($category[1]);
            $cat->setColor($category[2]);
            $manager->persist($cat);
            $this->setReference('category-' . ($key + 1), $cat);
        }

        $manager->flush();
    }
}
