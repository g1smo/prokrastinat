<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTutor extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Tutor_Id;

	/** @ORM\Column(length=40) */
	protected $First_Name;

	/** @ORM\Column(length=40) */
	protected $Last_Name;

	/** @ORM\Column(length=20) */
	protected $Password;

	/** @ORM\Column(length=255) */
	protected $Note;

	/** @ORM\Column(length=20) */
	protected $Code;

	/** @ORM\Column(length=40) */
	protected $Email;

	/** @ORM\Column(type="Integer") */
	protected $Room_Id;

	/** @ORM\Column(type="Integer") */
	protected $City_Id;

	/** @ORM\Column(type="Integer") */
	protected $Flags;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

}