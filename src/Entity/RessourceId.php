<?php
declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

trait RessourceId
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"article_read","article_details_read","user_details_read","user_read"})
     */
    private int $id;
    
    public function getId(): ?int
    {
        return $this->id;
    }
}