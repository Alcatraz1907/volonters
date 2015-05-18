<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class AddDonation {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="CategoriesMain",  inversedBy="id")
     */
    protected $categories_main_id;

    /** @ORM\Column(type="integer") */
    protected $categories_sub_id;

    /** @ORM\Column(type="string") */
    protected $sum;

    /** @ORM\Column(type="integer") */
    protected $donor_id;

    /** @ORM\Column(type="text") */
    protected $full_description;

    /** @ORM\Column(type="integer") */
    protected $image_id;

    /** @ORM\Column(type="integer") */
    protected $number;

//
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
    public function getCategoriesSubId()
    {
        return $this->categories_sub_id;
    }

    /**
     * @param mixed $cotegories_sub_id
     */
    public function setCategoriesSubId($cotegories_sub_id)
    {
        $this->categories_sub_id = $cotegories_sub_id;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getDonorId()
    {
        return $this->donor_id;
    }

    /**
     * @param mixed $donor_id
     */
    public function setDonorId($donor_id)
    {
        $this->donor_id = $donor_id;
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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->$number = $number;
    }

} 