<?php

namespace App\DataFixtures\ORM;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class LoadGroupData extends Fixture {

    /**
     * @var int
     */
    protected $order = 1;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $path = __DIR__ . '/../data/Group.yml';
        $path = realpath($path);
        $data = Yaml::parse(file_get_contents($path));
        $data = array_pop($data);

        foreach($data as $o) {
            $group = new Group();
            $group->setName($o['name']);

            $manager->persist($group);
            $this->setReference('group' . $group->getName(), $group);
        }

        $manager->flush();
    }
}
