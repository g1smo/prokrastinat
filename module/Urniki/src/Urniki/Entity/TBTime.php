<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTime extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Time_Id;

	/** @ORM\Column(length=20) */
	protected $Start_Hour;

	/** @ORM\Column(length=20) */
	protected $End_Hour;

}