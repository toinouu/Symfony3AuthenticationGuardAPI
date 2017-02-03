<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface ApiUserInterface extends UserInterface
{
    /**
     * @return string
     */
    public function getApiToken();

}
