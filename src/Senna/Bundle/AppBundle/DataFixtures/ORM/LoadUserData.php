<?php

/**
 * This file is part of Gitcolab.
 *
 * (c) Mbechezi mlanawo <mlanawo@mbechezi.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Senna\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Senna\Bundle\AppBundle\Model\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $users = [
            'senna'           => 'Senna bot',
            'john.doe'        => 'John Doe',
            'brian.lester'    => 'Brian Lester',
            'jack.gill'       => 'Jack Gill',
            'olivia.pace'     => 'Olivia Pace',
            'nola weaver'     => 'Nola Weaver',
            'oren tyler'      => 'Oren Tyler',
            'warren.spencer'  => 'Warren Spencer',
            'jacob.gallegos'  => 'Jacob Gallegos',
            'jordan.saunders' => 'Jordan Saunders',
            'xavier.stein'    => 'Xavier Stein',
            'beck.nash'       => 'Beck Nash',
            'ann.perry'       => 'Ann Perry',
            'chase.hoffman'   => 'Chase Hoffman',
            'gregory.joyner'  => 'Gregory Joyner',
            'dexter.schwartz' => 'Dexter Schwartz'
        ];

        foreach ($users as $username => $name) {
            $fullName = explode(' ', $name);

            $account = $this->createUser([
                'username' => $username,
                'email'    => $username . '@test.com',
                //'lastName' => $fullName[1],
                //'firstName' => $fullName[0],
                'plainPassword' => $username,
                'roles' => [User::ROLE_DEFAULT]
            ]);
            $account->setEnabled(true);


            if($username == 'dexter.schwartz') {
                $account->setEnabled(false);
            }

            $this->addReference($username, $account);

            $manager->persist($account);
        }

        $manager->flush();
    }

    public function createUser(array $data = [])
    {
        $user = new User();
        foreach ($data as $methodPart => $value) {
            $method = 'set' . ucfirst($methodPart);
            $user->$method($value);
        }
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }
}