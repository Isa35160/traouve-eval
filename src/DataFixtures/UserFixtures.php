<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $admin = new User();
        $admin->setEmail("teixeirarisabel@gmail.com");
        $admin->setFirstname("Isa");
        $admin->setLastname("Teix");
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, "123456"));
        $manager->persist($admin);

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setPassword($this->passwordEncoder->encodePassword($user, "pass"));
            $manager->persist($user);
            $this->addReference('user-' . ($i + 1), $user);
        }

        $manager->flush();
    }

}