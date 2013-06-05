<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBHoliday extends BaseEntity
{
	/** @ORM\Column(length=40) */
	protected $Value;

	/** @ORM\Column(type="Integer") */
	protected $D;

	/** @ORM\Column(type="Integer") */
	protected $M;

	/** @ORM\Column(type="Integer") */
	protected $Begins_At;

	/** @ORM\Column(type="Integer") */
	protected $Duration;

}