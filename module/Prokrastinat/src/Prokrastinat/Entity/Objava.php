<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="objava")
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Objava extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="User") */
    protected $user;

    /** @ORM\Column(length=100) */
    protected $naslov;

    /** @ORM\Column(length=5000) */
    protected $vsebina;

    /** @ORM\Column(type="datetime") */
    protected $datum_objave;

    /** @ORM\ManyToOne(targetEntity="Kategorija", inversedBy="objave") */
    protected $kategorija;

    /** @ORM\OneToMany(targetEntity="Komentar", mappedBy="objava") */
    protected $komentarji;

    /**
     * @ORM\ManyToMany(targetEntity="Oznaka", mappedBy="objave")
     * @ORM\JoinTable(name="objava_oznaka")
     */
    protected $oznake;
}
