<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $starttime = null;

    #[ORM\Column]
    private ?\DateTime $endtime = null;

    #[ORM\Column(length: 255)]
    private ?string $lessongoal = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'studentlesson')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $student = null;

    #[ORM\ManyToOne(inversedBy: 'instructor')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $instructor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStarttime(): ?\DateTime
    {
        return $this->starttime;
    }

    public function setStarttime(\DateTime $starttime): static
    {
        $this->starttime = $starttime;

        return $this;
    }

    public function getEndtime(): ?\DateTime
    {
        return $this->endtime;
    }

    public function setEndtime(\DateTime $endtime): static
    {
        $this->endtime = $endtime;

        return $this;
    }

    public function getLessongoal(): ?string
    {
        return $this->lessongoal;
    }

    public function setLessongoal(string $lessongoal): static
    {
        $this->lessongoal = $lessongoal;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getStudent(): ?User
    {
        return $this->student;
    }

    public function setStudent(?User $student): static
    {
        $this->student = $student;

        return $this;
    }

    public function getInstructor(): ?User
    {
        return $this->instructor;
    }

    public function setInstructor(?User $instructor): static
    {
        $this->instructor = $instructor;

        return $this;
    }

}
