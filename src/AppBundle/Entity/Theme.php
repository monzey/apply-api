<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * Theme
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThemeRepository")
 */
class Theme extends Thing
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="css", type="text")
     */
    private $css;

    /**
     * @ORM\ManyToMany(targetEntity="Resume", inversedBy="themes", cascade={"persist"})
     * @ORM\JoinTable(name="resumes_themes")
     * @Groups({"write", "read"})
     * @MaxDepth(2)
     */
    private $resumes;

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
     * Set css
     *
     * @param string $css
     *
     * @return Theme
     */
    public function setCss($css)
    {
        $this->css = $css;

        return $this;
    }

    /**
     * Get css
     *
     * @return string
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resumes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add resume
     *
     * @param \AppBundle\Entity\Resume $resume
     *
     * @return Theme
     */
    public function addResume(\AppBundle\Entity\Resume $resume)
    {
        $this->resumes[] = $resume;

        return $this;
    }

    /**
     * Remove resume
     *
     * @param \AppBundle\Entity\Resume $resume
     */
    public function removeResume(\AppBundle\Entity\Resume $resume)
    {
        $this->resumes->removeElement($resume);
    }

    /**
     * Get resumes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResumes()
    {
        return $this->resumes;
    }
}
