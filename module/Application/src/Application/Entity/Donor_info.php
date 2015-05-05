<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05.05.2015
 * Time: 16:16
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Donor_info {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $phone;

    /** @ORM\Column(type="string") */
    protected $skype;

    /** @ORM\Column(type="string") */
    protected $facebook;

    /** @ORM\Column(type="string") */
    protected $vkontakte;

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