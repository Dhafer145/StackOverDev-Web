<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addresse;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $debut_stage;

    /**
     * @ORM\OneToOne(targetEntity=Affectation::class, mappedBy="id_etudiant", cascade={"persist", "remove"})
     */
    private $etudiant_affectation;

    /**
     * @ORM\OneToMany(targetEntity=Affectation::class, mappedBy="id_encadrant_academique")
     */
    private $encadrant_academique_affecation;

    /**
     * @ORM\OneToMany(targetEntity=Affectation::class, mappedBy="id_encadrant_entreprise")
     */
    private $encadrant_entreprise_affectation;

    /**
     * @ORM\OneToMany(targetEntity=JournalProjet::class, mappedBy="etudiantjp")
     */
    private $jpsetudiant;

    /**
     * @ORM\OneToMany(targetEntity=CompteRendu::class, mappedBy="etudiantcr")
     */
    private $crsetudiant;

    /**
     * @ORM\OneToOne(targetEntity=PropositionProjet::class, mappedBy="etudiantpp", cascade={"persist", "remove"})
     */
    private $ppetudiant;

    /**
     * @ORM\OneToMany(targetEntity=Evaluation::class, mappedBy="id_enc_entreprise")
     */
    private $enc_eval;

    /**
     * @ORM\OneToOne(targetEntity=Evaluation::class, mappedBy="eval_etudiant", cascade={"persist", "remove"})
     */
    private $etudiant_ev;

    /**
     * @ORM\OneToMany(targetEntity=Grille::class, mappedBy="enc_academique")
     */
    private $grille_enc;

    /**
     * @ORM\OneToOne(targetEntity=Grille::class, mappedBy="grille_etudiant", cascade={"persist", "remove"})
     */
    private $etud_grille;

    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="reps_etud")
     */
    private $etud_reps;

    /**
     * @ORM\ManyToMany(targetEntity=RendezVous::class, mappedBy="rdvUser")
     */
    private $usr_rdv;

    /**
     * @ORM\OneToMany(targetEntity=ProcesVerbal::class, mappedBy="pv_user")
     */
    private $user_pvs;

    /**
     * @ORM\OneToOne(targetEntity=RapportFinal::class, mappedBy="rapp_etudiant", cascade={"persist", "remove"})
     */
    private $etud_rapport;

    /**
     * @ORM\OneToMany(targetEntity=RapportFinal::class, mappedBy="enc_ac_correction")
     */
    private $enc_ac_rpfs;

    /**
     * @ORM\OneToMany(targetEntity=Soutenance::class, mappedBy="soutenancers")
     */
    private $sout_rs;

    /**
     * @ORM\OneToMany(targetEntity=Soutenance::class, mappedBy="sout_enc_ac")
     */
    private $sout_enc_ac;

    /**
     * @ORM\OneToOne(targetEntity=Soutenance::class, mappedBy="sout_etud", cascade={"persist", "remove"})
     */
    private $etud_sout;

    public function __construct()
    {
        $this->encadrant_academique_affecation = new ArrayCollection();
        $this->encadrant_entreprise_affectation = new ArrayCollection();
        $this->jpsetudiant = new ArrayCollection();
        $this->crsetudiant = new ArrayCollection();
        $this->enc_eval = new ArrayCollection();
        $this->grille_enc = new ArrayCollection();
        $this->etud_reps = new ArrayCollection();
        $this->usr_rdv = new ArrayCollection();
        $this->user_pvs = new ArrayCollection();
        $this->enc_ac_rpfs = new ArrayCollection();
        $this->sout_rs = new ArrayCollection();
        $this->sout_enc_ac = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getDebutStage(): ?\DateTimeInterface
    {
        return $this->debut_stage;
    }

    public function setDebutStage(?\DateTimeInterface $debut_stage): self
    {
        $this->debut_stage = $debut_stage;

        return $this;
    }

    public function getEtudiantAffectation(): ?Affectation
    {
        return $this->etudiant_affectation;
    }

    public function setEtudiantAffectation(Affectation $etudiant_affectation): self
    {
        // set the owning side of the relation if necessary
        if ($etudiant_affectation->getIdEtudiant() !== $this) {
            $etudiant_affectation->setIdEtudiant($this);
        }

        $this->etudiant_affectation = $etudiant_affectation;

        return $this;
    }

    /**
     * @return Collection|Affectation[]
     */
    public function getEncadrantAcademiqueAffecation(): Collection
    {
        return $this->encadrant_academique_affecation;
    }

    public function addEncadrantAcademiqueAffecation(Affectation $encadrantAcademiqueAffecation): self
    {
        if (!$this->encadrant_academique_affecation->contains($encadrantAcademiqueAffecation)) {
            $this->encadrant_academique_affecation[] = $encadrantAcademiqueAffecation;
            $encadrantAcademiqueAffecation->setIdEncadrantAcademique($this);
        }

        return $this;
    }

    public function removeEncadrantAcademiqueAffecation(Affectation $encadrantAcademiqueAffecation): self
    {
        if ($this->encadrant_academique_affecation->removeElement($encadrantAcademiqueAffecation)) {
            // set the owning side to null (unless already changed)
            if ($encadrantAcademiqueAffecation->getIdEncadrantAcademique() === $this) {
                $encadrantAcademiqueAffecation->setIdEncadrantAcademique(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Affectation[]
     */
    public function getEncadrantEntrepriseAffectation(): Collection
    {
        return $this->encadrant_entreprise_affectation;
    }

    public function addEncadrantEntrepriseAffectation(Affectation $encadrantEntrepriseAffectation): self
    {
        if (!$this->encadrant_entreprise_affectation->contains($encadrantEntrepriseAffectation)) {
            $this->encadrant_entreprise_affectation[] = $encadrantEntrepriseAffectation;
            $encadrantEntrepriseAffectation->setIdEncadrantEntreprise($this);
        }

        return $this;
    }

    public function removeEncadrantEntrepriseAffectation(Affectation $encadrantEntrepriseAffectation): self
    {
        if ($this->encadrant_entreprise_affectation->removeElement($encadrantEntrepriseAffectation)) {
            // set the owning side to null (unless already changed)
            if ($encadrantEntrepriseAffectation->getIdEncadrantEntreprise() === $this) {
                $encadrantEntrepriseAffectation->setIdEncadrantEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JournalProjet[]
     */
    public function getJpsetudiant(): Collection
    {
        return $this->jpsetudiant;
    }

    public function addJpsetudiant(JournalProjet $jpsetudiant): self
    {
        if (!$this->jpsetudiant->contains($jpsetudiant)) {
            $this->jpsetudiant[] = $jpsetudiant;
            $jpsetudiant->setEtudiantjp($this);
        }

        return $this;
    }

    public function removeJpsetudiant(JournalProjet $jpsetudiant): self
    {
        if ($this->jpsetudiant->removeElement($jpsetudiant)) {
            // set the owning side to null (unless already changed)
            if ($jpsetudiant->getEtudiantjp() === $this) {
                $jpsetudiant->setEtudiantjp(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CompteRendu[]
     */
    public function getCrsetudiant(): Collection
    {
        return $this->crsetudiant;
    }

    public function addCrsetudiant(CompteRendu $crsetudiant): self
    {
        if (!$this->crsetudiant->contains($crsetudiant)) {
            $this->crsetudiant[] = $crsetudiant;
            $crsetudiant->setEtudiantcr($this);
        }

        return $this;
    }

    public function removeCrsetudiant(CompteRendu $crsetudiant): self
    {
        if ($this->crsetudiant->removeElement($crsetudiant)) {
            // set the owning side to null (unless already changed)
            if ($crsetudiant->getEtudiantcr() === $this) {
                $crsetudiant->setEtudiantcr(null);
            }
        }

        return $this;
    }

    public function getPpetudiant(): ?PropositionProjet
    {
        return $this->ppetudiant;
    }

    public function setPpetudiant(PropositionProjet $ppetudiant): self
    {
        // set the owning side of the relation if necessary
        if ($ppetudiant->getEtudiantpp() !== $this) {
            $ppetudiant->setEtudiantpp($this);
        }

        $this->ppetudiant = $ppetudiant;

        return $this;
    }

    /**
     * @return Collection|Evaluation[]
     */
    public function getEncEval(): Collection
    {
        return $this->enc_eval;
    }

    public function addEncEval(Evaluation $encEval): self
    {
        if (!$this->enc_eval->contains($encEval)) {
            $this->enc_eval[] = $encEval;
            $encEval->setIdEncEntreprise($this);
        }

        return $this;
    }

    public function removeEncEval(Evaluation $encEval): self
    {
        if ($this->enc_eval->removeElement($encEval)) {
            // set the owning side to null (unless already changed)
            if ($encEval->getIdEncEntreprise() === $this) {
                $encEval->setIdEncEntreprise(null);
            }
        }

        return $this;
    }

    public function getEtudiantEv(): ?Evaluation
    {
        return $this->etudiant_ev;
    }

    public function setEtudiantEv(Evaluation $etudiant_ev): self
    {
        // set the owning side of the relation if necessary
        if ($etudiant_ev->getEvalEtudiant() !== $this) {
            $etudiant_ev->setEvalEtudiant($this);
        }

        $this->etudiant_ev = $etudiant_ev;

        return $this;
    }

    /**
     * @return Collection|Grille[]
     */
    public function getGrilleEnc(): Collection
    {
        return $this->grille_enc;
    }

    public function addGrilleEnc(Grille $grilleEnc): self
    {
        if (!$this->grille_enc->contains($grilleEnc)) {
            $this->grille_enc[] = $grilleEnc;
            $grilleEnc->setEncAcademique($this);
        }

        return $this;
    }

    public function removeGrilleEnc(Grille $grilleEnc): self
    {
        if ($this->grille_enc->removeElement($grilleEnc)) {
            // set the owning side to null (unless already changed)
            if ($grilleEnc->getEncAcademique() === $this) {
                $grilleEnc->setEncAcademique(null);
            }
        }

        return $this;
    }

    public function getEtudGrille(): ?Grille
    {
        return $this->etud_grille;
    }

    public function setEtudGrille(Grille $etud_grille): self
    {
        // set the owning side of the relation if necessary
        if ($etud_grille->getGrilleEtudiant() !== $this) {
            $etud_grille->setGrilleEtudiant($this);
        }

        $this->etud_grille = $etud_grille;

        return $this;
    }

    /**
     * @return Collection|Reponses[]
     */
    public function getEtudReps(): Collection
    {
        return $this->etud_reps;
    }

    public function addEtudRep(Reponses $etudRep): self
    {
        if (!$this->etud_reps->contains($etudRep)) {
            $this->etud_reps[] = $etudRep;
            $etudRep->setRepsEtud($this);
        }

        return $this;
    }

    public function removeEtudRep(Reponses $etudRep): self
    {
        if ($this->etud_reps->removeElement($etudRep)) {
            // set the owning side to null (unless already changed)
            if ($etudRep->getRepsEtud() === $this) {
                $etudRep->setRepsEtud(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RendezVous[]
     */
    public function getUsrRdv(): Collection
    {
        return $this->usr_rdv;
    }

    public function addUsrRdv(RendezVous $usrRdv): self
    {
        if (!$this->usr_rdv->contains($usrRdv)) {
            $this->usr_rdv[] = $usrRdv;
            $usrRdv->addRdvUser($this);
        }

        return $this;
    }

    public function removeUsrRdv(RendezVous $usrRdv): self
    {
        if ($this->usr_rdv->removeElement($usrRdv)) {
            $usrRdv->removeRdvUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProcesVerbal[]
     */
    public function getUserPvs(): Collection
    {
        return $this->user_pvs;
    }

    public function addUserPv(ProcesVerbal $userPv): self
    {
        if (!$this->user_pvs->contains($userPv)) {
            $this->user_pvs[] = $userPv;
            $userPv->setPvUser($this);
        }

        return $this;
    }

    public function removeUserPv(ProcesVerbal $userPv): self
    {
        if ($this->user_pvs->removeElement($userPv)) {
            // set the owning side to null (unless already changed)
            if ($userPv->getPvUser() === $this) {
                $userPv->setPvUser(null);
            }
        }

        return $this;
    }

    public function getEtudRapport(): ?RapportFinal
    {
        return $this->etud_rapport;
    }

    public function setEtudRapport(RapportFinal $etud_rapport): self
    {
        // set the owning side of the relation if necessary
        if ($etud_rapport->getRappEtudiant() !== $this) {
            $etud_rapport->setRappEtudiant($this);
        }

        $this->etud_rapport = $etud_rapport;

        return $this;
    }

    /**
     * @return Collection|RapportFinal[]
     */
    public function getEncAcRpfs(): Collection
    {
        return $this->enc_ac_rpfs;
    }

    public function addEncAcRpf(RapportFinal $encAcRpf): self
    {
        if (!$this->enc_ac_rpfs->contains($encAcRpf)) {
            $this->enc_ac_rpfs[] = $encAcRpf;
            $encAcRpf->setEncAcCorrection($this);
        }

        return $this;
    }

    public function removeEncAcRpf(RapportFinal $encAcRpf): self
    {
        if ($this->enc_ac_rpfs->removeElement($encAcRpf)) {
            // set the owning side to null (unless already changed)
            if ($encAcRpf->getEncAcCorrection() === $this) {
                $encAcRpf->setEncAcCorrection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Soutenance[]
     */
    public function getSoutRs(): Collection
    {
        return $this->sout_rs;
    }

    public function addSoutR(Soutenance $soutR): self
    {
        if (!$this->sout_rs->contains($soutR)) {
            $this->sout_rs[] = $soutR;
            $soutR->setSoutenancers($this);
        }

        return $this;
    }

    public function removeSoutR(Soutenance $soutR): self
    {
        if ($this->sout_rs->removeElement($soutR)) {
            // set the owning side to null (unless already changed)
            if ($soutR->getSoutenancers() === $this) {
                $soutR->setSoutenancers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Soutenance[]
     */
    public function getSoutEncAc(): Collection
    {
        return $this->sout_enc_ac;
    }

    public function addSoutEncAc(Soutenance $soutEncAc): self
    {
        if (!$this->sout_enc_ac->contains($soutEncAc)) {
            $this->sout_enc_ac[] = $soutEncAc;
            $soutEncAc->setSoutEncAc($this);
        }

        return $this;
    }

    public function removeSoutEncAc(Soutenance $soutEncAc): self
    {
        if ($this->sout_enc_ac->removeElement($soutEncAc)) {
            // set the owning side to null (unless already changed)
            if ($soutEncAc->getSoutEncAc() === $this) {
                $soutEncAc->setSoutEncAc(null);
            }
        }

        return $this;
    }

    public function getEtudSout(): ?Soutenance
    {
        return $this->etud_sout;
    }

    public function setEtudSout(Soutenance $etud_sout): self
    {
        // set the owning side of the relation if necessary
        if ($etud_sout->getSoutEtud() !== $this) {
            $etud_sout->setSoutEtud($this);
        }

        $this->etud_sout = $etud_sout;

        return $this;
    }
}
