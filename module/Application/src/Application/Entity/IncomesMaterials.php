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

    /** @ORM\Column(type="integer") */
    protected $donor_id;

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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoriesMainId()
    {
        return $this->categories_main_id;
    }

    /**
     * @param mixed $categories_main_id
     */
    public function setCategoriesMainId($categories_main_id)
    {
        $this->categories_main_id = $categories_main_id;
    }

    /**
     * @return mixed
     */
    public function getCotegoriesSubId()
    {
        return $this->cotegories_sub_id;
    }

    /**
     * @param mixed $cotegories_sub_id
     */
    public function setCotegoriesSubId($cotegories_sub_id)
    {
        $this->cotegories_sub_id = $cotegories_sub_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDonor()
    {
        return $this->donor;
    }

    /**
     * @param mixed $donor
     */
    public function setDonor($donor)
    {
        $this->donor = $donor;
    }

    /**
     * @return mixed
     */
    public function getFullDescription()
    {
        return $this->full_description;
    }

    /**
     * @param mixed $full_description
     */
    public function setFullDescription($full_description)
    {
        $this->full_description = $full_description;
    }

    /**
     * @return mixed
     */
    public function getImageId()
    {
        return $this->image_id;
    }

    /**
     * @param mixed $image_id
     */
    public function setImageId($image_id)
    {
        $this->image_id = $image_id;
    }

    /**
     * @return mixed
     */
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }

    /**
     * @param mixed $tracking_code
     */
    public function setTrackingCode($tracking_code)
    {
        $this->tracking_code = $tracking_code;
    }

} 