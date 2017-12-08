<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Experience
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExperienceRepository")
 */
class Experience extends Thing
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
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $year;

    /**
     * @ORM\ManyToMany(targetEntity="Resume", inversedBy="experiences", cascade={"persist"}, orphanRemoval=true)
     * @ORM\JoinTable(name="resumes_experiences")
     * @Groups({"write"})
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
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return Experience
     */
    public function setJobTitle($jobTitle)
    {
        $this->name = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->name;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Experience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return Experience
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
     * @return Experience
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
