<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", uniqueConstraints={@ORM\UniqueConstraint(name="cin", columns={"cin"}), @ORM\UniqueConstraint(name="address_Mail", columns={"address_Mail"}), @ORM\UniqueConstraint(name="tel", columns={"tel"}), @ORM\UniqueConstraint(name="Pseudo", columns={"Pseudo"})})
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable=false)
     */
    private $cin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_Naiss", type="date", nullable=true)
     */
    private $dateNaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="address_Mail", type="string", length=255, nullable=false)
     */
    private $addressMail;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Pseudo", type="string", length=255, nullable=false)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="Mot de passe", type="string", length=255, nullable=false)
     */
    private $motDePasse;


}

