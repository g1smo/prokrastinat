<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Beseda extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="string", unique=true)
     */
    protected $beseda;

    /** @ORM\Column(type="integer") */
    protected $frekvenca;
}
