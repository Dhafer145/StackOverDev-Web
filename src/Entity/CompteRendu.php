<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteRendu
 *
 * @ORM\Table(name="compte_rendu")
 * @ORM\Entity
 */
class CompteRendu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cr", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUser = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=400, nullable=false)
     */
    private $fichier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="validation_cr", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $validationCr = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=false)
     */
    private $commentaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_encadrant", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $commentaireEncadrant = 'NULL';


}
