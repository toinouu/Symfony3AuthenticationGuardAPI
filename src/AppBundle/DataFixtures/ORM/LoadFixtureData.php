<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class LoadFixtureData implements FixtureInterface, ContainerAwareInterface
{
	private $container;

    public function load(ObjectManager $manager)
    {
		$this->loadUsers($manager);
    }

	private function loadUsers(ObjectManager $manager)
    {
        $passwordEncoder = $this->container->get('security.password_encoder');

        $user = new User();
        $user->setUsername('tony_admin');
        $user->setEmail('tony_admin@symfony.com');
        $user->setRoles(['ROLE_ADMIN']);
        $encodedPassword = $passwordEncoder->encodePassword($user, 'admin');
        $user->setPassword($encodedPassword);
        $user->setApiToken('happyapi');
		$manager->persist($user);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
