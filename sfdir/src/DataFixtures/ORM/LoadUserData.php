<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class LoadUserData extends Fixture
{

    /**
     * @var int
     */
    protected $order = 2;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $path = __DIR__.'/../data/User.yml';

        $path = realpath($path);
        $data = Yaml::parse(file_get_contents($path));
        $data = array_pop($data);

        foreach ($data as $o) {
            $user = new User();
            $user->setEnabled($o['enabled']);
            $user->setEmail($o['email']);
            $user->setPassword($o['password']);
            $user->setSalt(md5(microtime()));
            $user->setFirstName($o['firstname']);
            $user->setLastName($o['lastname']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
