<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.05.2015
 * Time: 20:40
 */

namespace Application\Entity;


use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Images {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $path;
} 