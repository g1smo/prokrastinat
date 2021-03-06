<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Prokrastinat\Repository\StudijRepository")
 * @ORM\Table(name="pisum.Studij")
 */
class Studij extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $StudijID;

    /** @ORM\Column(type="integer") */
    protected $StudentID;

    /** @ORM\Column(type="string1252", length=60) */
    protected $PriimekIme;

    /** @ORM\Column(type="string1252", length=8) */
    protected $VpisnaStevilka;

    /** @ORM\Column(type="string1252", length=2) */
    protected $ZavodID;

    /** @ORM\Column(type="integer") */
    protected $LetoPrvegaVpisa;

    /** @ORM\Column(type="string1252", length=1) */
    protected $Stanje;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumZakljucka;

    /** @ORM\Column(type="string1252", length=1) */
    protected $VpisDiplomant;

    /** @ORM\Column(type="integer") */
    protected $Izkaznica;

    /** @ORM\Column(type="string1252", length=1) */
    protected $SocasnostStudija;

    /** @ORM\Column(type="string1252", length=2) */
    protected $SocasniStudijFakultetaID;

    /** @ORM\Column(type="integer") */
    protected $ReferentID;

    /** @ORM\Column(type="msdatetime") */
    protected $ZadnjaSprememba;

    /** @ORM\Column(type="string1252", length=40) */
    protected $Geslo;

    /** @ORM\Column(type="msdatetime") */
    protected $ZadnjaPrijava;

    /** @ORM\Column(type="string1252", length=1) */
    protected $BlokadaPrijave;

    /** @ORM\Column(type="string1252", length=1) */
    protected $BlokadaPrijaveIzpit;

    /** @ORM\Column(type="integer") */
    protected $MISPartnerskaFakultetaID;

    /** @ORM\Column(type="integer") */
    protected $MISVrstaProgramaID;

    /** @ORM\Column(type="string1252", length=20) */
    protected $StevPogodbe;

    /** @ORM\Column(type="text") */
    protected $Opombe;

    /** @ORM\Column(type="string1252", length=2) */
    protected $MaticnaFakultetaID;

    /** @ORM\Column(type="string1252", length=2) */
    protected $FakultetaVpisaID;

    /** @ORM\Column(type="string1252", length=1) */
    protected $VzporedniStudij;

    /** @ORM\Column(type="integer") */
    protected $KlasiusSRVPredhodnaIzbrID;

    /** @ORM\Column(type="integer") */
    protected $KlasiusSRVLetoPredhodneIzbr;

    /** @ORM\Column(type="integer") */
    protected $KlasiusSRVDrzavaPredhodneIzbrID;

    /** @ORM\Column(type="integer") */
    protected $KlasiusSRVNajvisjaIzbrID;

    /** @ORM\Column(type="float") */
    protected $KlasiusSRVOcena;

    /** @ORM\Column(type="integer") */
    protected $KategorijaStudijaID;

    /** @ORM\Column(type="integer") */
    protected $PrviVpisLetnikID;

    /** @ORM\Column(type="integer") */
    protected $VpisMerilaZaPrehode;

    /**
     * @ORM\OneToMany(targetEntity="Prokrastinat\EntityAips\Vpis", mappedBy="studij")
     */
    protected $vpisi;
    
    public function getVpisi() {
        return $this->vpisi;
    }
    public function __construct() {
        $this->vpisi = new Doctrine\Common\Collections\ArrayCollection();
    }
}
