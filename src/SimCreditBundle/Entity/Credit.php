<?php

namespace SimCreditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credit
 *
 * @ORM\Table(name="credit")
 * @ORM\Entity
 */
class Credit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_credit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCredit;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="interet", type="float", precision=10, scale=0, nullable=false)
     */
    private $interet;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PieceJustificative", inversedBy="idCredit")
     * @ORM\JoinTable(name="detail_credit",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_credit", referencedColumnName="id_credit")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_piece", referencedColumnName="id_piece")
     *   }
     * )
     */
    private $idPiece;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPiece = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

