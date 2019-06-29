<?php

namespace SimCreditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PieceJustificative
 *
 * @ORM\Table(name="piece_justificative")
 * @ORM\Entity
 */
class PieceJustificative
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_piece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPiece;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Credit", mappedBy="idPiece")
     */
    private $idCredit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCredit = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

