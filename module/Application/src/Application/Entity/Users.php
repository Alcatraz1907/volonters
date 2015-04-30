<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.04.2015
 * Time: 17:10
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Users {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $mail;

    /** @ORM\Column(type="string") */
    protected $password;

    /** @ORM\Column(type="integer") */
    protected $role;


    public function exchangeArray($data)
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = (!empty($val)) ? $val : null;
            }
        }
    }
    /**
     * Helper function
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
} 