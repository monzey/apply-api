<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * Resume
 *
 * @ApiResource(
 *      attributes={
 *              "normalization_context"={"groups"={"read"}},
 *              "denormalization_context"={"groups"={"write"}}
 *      },
 *      itemOperations={
 *              "get"={"method"="GET"},
 *              "delete"={"method"="DELETE"},
 *              "put"={"method"="PUT"},
 *              "print"={"route_name"="resume_print"}
 *      })
 *
 * @ORM\Table(name="resume")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResumeRepository")
 */
class Resume extends Thing
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"read", "write"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="text")
     * @Groups({"read", "write"})
     */
    private $about;

    /**
     * @ORM\ManyToMany(targetEntity="Experience", mappedBy="resumes")
     * @ApiSubresource
     * @Groups({"read"})
     * @MaxDepth(1)
     */
    private $experiences;

    /**
     * @ORM\ManyToMany(targetEntity="SocialLink", mappedBy="resumes")
     * @ApiSubresource
     * @Groups({"read"})
     * @MaxDepth(1)
     */
    private $socialLinks;

    /**
     * @ORM\ManyToMany(targetEntity="Graduation", mappedBy="resumes")
     * @ApiSubresource
     * @Groups({"read"})
     * @MaxDepth(1)
     */
    private $graduations;

    /**
     * @ORM\ManyToMany(targetEntity="SideProject", mappedBy="resumes")
     * @ApiSubresource
     * @Groups({"read"})
     * @MaxDepth(1)
     */
    private $sideProjects;

    /**
     * @ORM\ManyToMany(targetEntity="Theme", mappedBy="resumes")
     * @ApiSubresource
     * @Groups({"read"})
     * @MaxDepth(1)
     */
    private $themes;

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
     * Constructor
     */
    public function __construct()
    {
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add experience
     *
     * @param \AppBundle\Entity\Experience $experience
     *
     * @return Resume
     */
    public function addExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experiences[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \AppBundle\Entity\Experience $experience
     */
    public function removeExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Add graduation
     *
     * @param \AppBundle\Entity\Graduation $graduation
     *
     * @return Resume
     */
    public function addGraduation(\AppBundle\Entity\Graduation $graduation)
    {
        $this->graduations[] = $graduation;

        return $this;
    }

    /**
     * Remove graduation
     *
     * @param \AppBundle\Entity\Graduation $graduation
     */
    public function removeGraduation(\AppBundle\Entity\Graduation $graduation)
    {
        $this->graduations->removeElement($graduation);
    }

    /**
     * Get graduations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGraduations()
    {
        return $this->graduations;
    }

    /**
     * Add sideProject
     *
     * @param \AppBundle\Entity\SideProject $sideProject
     *
     * @return Resume
     */
    public function addSideProject(\AppBundle\Entity\SideProject $sideProject)
    {
        $this->sideProjects[] = $sideProject;

        return $this;
    }

    /**
     * Remove sideProject
     *
     * @param \AppBundle\Entity\SideProject $sideProject
     */
    public function removeSideProject(\AppBundle\Entity\SideProject $sideProject)
    {
        $this->sideProjects->removeElement($sideProject);
    }

    /**
     * Get sideProjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSideProjects()
    {
        return $this->sideProjects;
    }

    /**
     * Add theme
     *
     * @param \AppBundle\Entity\Theme $theme
     *
     * @return Resume
     */
    public function addTheme(\AppBundle\Entity\Theme $theme)
    {
        $this->themes[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \AppBundle\Entity\Theme $theme
     */
    public function removeTheme(\AppBundle\Entity\Theme $theme)
    {
        $this->themes->removeElement($theme);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * Set parameters
     *
     * @param \AppBundle\Entity\Parameters $parameters
     *
     * @return Resume
     */
    public function setParameters(\AppBundle\Entity\Parameters $parameters = null)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Get parameters
     *
     * @return \AppBundle\Entity\Parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return Resume
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Add socialLink
     *
     * @param \AppBundle\Entity\SocialLink $socialLink
     *
     * @return Resume
     */
    public function addSocialLink(\AppBundle\Entity\SocialLink $socialLink)
    {
        $this->socialLinks[] = $socialLink;

        return $this;
    }

    /**
     * Remove socialLink
     *
     * @param \AppBundle\Entity\SocialLink $socialLink
     */
    public function removeSocialLink(\AppBundle\Entity\SocialLink $socialLink)
    {
        $this->socialLinks->removeElement($socialLink);
    }

    /**
     * Get socialLinks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialLinks()
    {
        return $this->socialLinks;
    }
}
