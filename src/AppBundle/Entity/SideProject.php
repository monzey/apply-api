<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * SideProject
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 *
 * @ORM\Table(name="side_project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SideProjectRepository")
 */
class SideProject extends Thing
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Resume", inversedBy="sideProjects", cascade={"persist"})
     * @ORM\JoinTable(name="resumes_side_projects")
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
     * @return SideProject
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
