<?php

namespace MappedSuperclassesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Site
 *
 * No primary keys
 *
 * @ORM\MappedSuperclass
 */
class Site
{
    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @ORM\OneToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    protected $person;

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Site
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set person
     *
     * @param string $person
     *
     * @return Site
     */
    public function setPerson($person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return string
     */
    public function getPerson()
    {
        return $this->person;
    }
}

