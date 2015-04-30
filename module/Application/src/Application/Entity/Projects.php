<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.04.2015
 * Time: 17:09
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Projects {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="integer") */
    protected $v_group_id;

    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="integer") */
    protected $image_id;


    /** @ORM\Column(type="text") */
    protected $description;

    /** @ORM\Column(type="text") */
    protected $full_description;

    /** @ORM\Column(type="float") */
    protected $goal;

    /** @ORM\Column(type="float") */
    protected $content_money;

    /** @ORM\Column(type="integer") */
    protected $n_of_donors;


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