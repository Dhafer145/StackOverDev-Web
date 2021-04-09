<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropositionProjet
 *
 * @ORM\Table(name="proposition_projet")
 * @ORM\Entity
 */
class PropositionProjet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_sujet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSujet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUser = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_sujet", type="string", length=255, nullable=false)
     */
    private $nomSujet;

    /**
     * @var string
     *
     * @ORM\Column(name="cahier_charge", type="string", length=50, nullable=false)
     */
    private $cahierCharge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="validation_pp", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $validationPp = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_pp", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $commentairePp = 'NULL';


}
