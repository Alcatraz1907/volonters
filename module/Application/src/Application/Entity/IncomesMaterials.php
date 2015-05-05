<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.04.2015
 * Time: 17:07
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class IncomesMaterials {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="integer") */
    protected $categories_main_id;

    /** @ORM\Column(type="integer") */
    protected $cotegories_sub_id;

    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="date") */
    protected $date;

    /** @ORM\Column(type="string") */
    protected $donor;

    /** @ORM\Column(type="text") */
    protected $full_description;

    /** @ORM\Column(type="integer") */
    protected $image_id;

    /** @ORM\Column(type="integer") */
    protected $tracking_code;

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