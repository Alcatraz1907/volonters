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
class Volunteers {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="string") */
    protected $surname;

    /** @ORM\Column(type="text") */
    protected $contact_name;

    /** @ORM\Column(type="string") */
    protected $phone;

    /** @ORM\Column(type="string") */
    protected $email;

    /** @ORM\Column(type="string") */
    protected $address;

    /** @ORM\Column(type="text") */
    protected $full_description;

    /** @ORM\Column(type="text") */
    protected $fb;

    /** @ORM\Column(type="text") */
    protected $vk;


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