<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * Graduation
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 *
 * @ORM\Table(name="graduation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GraduationRepository")
 */
class Graduation extends Thing
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
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="school", type="string", length=255)
     */
    private $school;

    /**
     * @ORM\ManyToMany(targetEntity="Resume", inversedBy="graduations", cascade={"persist"})
     * @ORM\JoinTable(name="resumes_graduations")
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
     * Set title
     *
     * @param string $title
     *
     * @return Graduation
     */
    public function setTitle($title)
    {
        $this->name = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->name;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return Graduation
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set school
     *
     * @param string $school
     *
     * @return Graduation
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
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
     * @return Graduation
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
