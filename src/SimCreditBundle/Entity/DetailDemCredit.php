<?php

namespace SimCreditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailDemCredit
 *
 * @ORM\Table(name="detail_dem_credit", indexes={@ORM\Index(name="id_client", columns={"id_client"}), @ORM\Index(name="id_credit", columns={"id_credit"}), @ORM\Index(name="id_piece", columns={"id_piece"})})
 * @ORM\Entity
 */
class DetailDemCredit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dem_credit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDemCredit;

    /**
     * @var string
     *
     * @ORM\Column(name="URL_PJ", type="string", length=255, nullable=true)
     */
    private $urlPj;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id_utilisateur")
     * })
     */
    private $idClient;

    /**
     * @var \Credit
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Credit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_credit", referencedColumnName="id_credit")
     * })
     */
    private $idCredit;

    /**
     * @var \PieceJustificative
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="PieceJustificative")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_piece", referencedColumnName="id_piece")
     * })
     */
    private $idPiece;


}

