<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tickets", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ticketId;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTicketId(): ?Tickets
    {
        return $this->ticketId;
    }

    public function setTicketId(?Tickets $ticketId): self
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->emailOrder;
    }

    public function setEmail(string $emailOrder): self
    {
        $this->emailOrder = $emailOrder;

        return $this;
    }

    public function getPrice(): ?Tickets
    {
        return $this->price;
    }

    public function setPrice(?Tickets $price): self
    {
        $this->price = $price;

        return $this;
    }

}
