<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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
