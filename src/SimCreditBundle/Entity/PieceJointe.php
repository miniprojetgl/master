<?php

namespace SimCreditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PieceJointe
 *
 * @ORM\Table(name="piece_jointe")
 * @ORM\Entity
 */
class PieceJointe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_Piece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPiece;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;


}

