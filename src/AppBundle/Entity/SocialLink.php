<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * SocialLink
 *
 * @ApiResource
 * @ORM\Table(name="social_link")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SocialLinkRepository")
 */
class SocialLink extends Thing
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
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\ManyToMany(targetEntity="Resume", inversedBy="socialLinks", cascade={"persist"})
     * @ORM\JoinTable(name="resumes_social_links")
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
     * Set icon
     *
     * @param string $icon
     *
     * @return SocialLink
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
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
     * @return SocialLink
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
