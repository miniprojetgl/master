<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailPieceJointe
 *
 * @ORM\Table(name="detail_piece_jointe", indexes={@ORM\Index(name="id_client", columns={"id_client"}), @ORM\Index(name="id_credit", columns={"id_credit"}), @ORM\Index(name="id_piece", columns={"id_piece"})})
 * @ORM\Entity
 */
class DetailPieceJointe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_detail_PJ", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDetailPj;

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
     * @var \PieceJointe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="PieceJointe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_piece", referencedColumnName="id_Piece")
     * })
     */
    private $idPiece;


}

