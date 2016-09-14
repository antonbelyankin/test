<?php

namespace AppBundle\Entity;

/**
 * Region
 */
class Region
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $rId;

    /**
     * @var string
     */
    private $rName;

    /**
     * @var string
     */
    private $rDescription;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rId
     *
     * @param integer $rId
     *
     * @return Region
     */
    public function setRId($rId)
    {
        $this->rId = $rId;

        return $this;
    }

    /**
     * Get rId
     *
     * @return int
     */
    public function getRId()
    {
        return $this->rId;
    }

    /**
     * Set rName
     *
     * @param string $rName
     *
     * @return Region
     */
    public function setRName($rName)
    {
        $this->rName = $rName;

        return $this;
    }

    /**
     * Get rName
     *
     * @return string
     */
    public function getRName()
    {
        return $this->rName;
    }

    /**
     * Set rDescription
     *
     * @param string $rDescription
     *
     * @return Region
     */
    public function setRDescription($rDescription)
    {
        $this->rDescription = $rDescription;

        return $this;
    }

    /**
     * Get rDescription
     *
     * @return string
     */
    public function getRDescription()
    {
        return $this->rDescription;
    }
}

