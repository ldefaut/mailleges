<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\User\Professor;
use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
#[ApiResource]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Grade::class)]
    private Collection $grades;

    #[ORM\ManyToMany(targetEntity: Professor::class, inversedBy: 'courses')]
    private Collection $professor;

    public function __construct()
    {
        $this->grades = new ArrayCollection();
        $this->professor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Grade>
     */
    public function getGrades(): Collection
    {
        return $this->grades;
    }

    public function addGrade(Grade $grade): self
    {
        if (!$this->grades->contains($grade)) {
            $this->grades->add($grade);
            $grade->setCourse($this);
        }

        return $this;
    }

    public function removeGrade(Grade $grade): self
    {
        if ($this->grades->removeElement($grade)) {
            // set the owning side to null (unless already changed)
            if ($grade->getCourse() === $this) {
                $grade->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Professor>
     */
    public function getProfessor(): Collection
    {
        return $this->professor;
    }

    public function addProfessor(Professor $professor): self
    {
        if (!$this->professor->contains($professor)) {
            $this->professor->add($professor);
        }

        return $this;
    }

    public function removeProfessor(Professor $professor): self
    {
        $this->professor->removeElement($professor);

        return $this;
    }
}
