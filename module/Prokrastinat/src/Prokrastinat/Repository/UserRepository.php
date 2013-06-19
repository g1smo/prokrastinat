<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Crypt\Password\Bcrypt;

class UserRepository extends EntityRepository
{
    static function hashPassword($user, $password) {
        $bcrypt = new Bcrypt();
        if ($user->enabled && $bcrypt->verify($password, $user->password))
            return true;
        else
            return false;
    }
    
    public function changePass($user, $pass)
    {
        $bcrypt = new Bcrypt();
        $hashed = $bcrypt->create($pass);
        $user->password = $hashed;
        $this->em = $this->getEntityManager();
        $this->em->persist($user);
    }
    
    public function updateUser(\Prokrastinat\Entity\User $user, $form)
    {
        $this->em = $this->getEntityManager();
        
        if ($val = $form->get('ime')->getValue())
            $user->ime = $val;
        if ($val = $form->get('priimek')->getValue())
            $user->priimek = $val;
        if ($val = $form->get('vpisna_st')->getValue())
            $user->vpisna_st = $val;
        if ($roles = $form->get('vloge')->getValue())
        {
            foreach($roles as $role)
            {
                $exists = false;
                foreach($user->roles as $uroles)
                {
                    if($role == $uroles->id)
                        $exists = true;
                }
                if(!$exists)
                {
                    $newRole = $this->em->find('Prokrastinat\Entity\Role', $role);
                    $user->roles->add($newRole);
                }
            }
            $roleArray = array();
            foreach($user->roles as $uroles)
            {
                array_push($roleArray, "$uroles->id");
            }
            $results = array_diff($roleArray, $roles);
            foreach($results as $res)
            {
                $remRole = $this->em->find('Prokrastinat\Entity\Role', $res);
                $user->roles->removeElement($remRole);
            }
        }
        
        
            
        $user->email = $form->get('email')->getValue();
        $user->naslov = $form->get('naslov')->getValue();
        $user->mesto = $form->get('mesto')->getValue();
        $user->drzava = $form->get('drzava')->getValue();
        $user->opis = $form->get('opis')->getValue();
        $user->splet = $form->get('splet')->getValue();
        $user->telefon = $form->get('telefon')->getValue();
            
        $this->em->persist($user);
    }

    public function syncUser(\Prokrastinat\EntityAips\Studij $aips_user, \Prokrastinat\Entity\User $user)
    {
        $user->username = $aips_user->VpisnaStevilka;
        $user->vpisna_st = $aips_user->VpisnaStevilka;

        $p = explode(' ', $aips_user->PriimekIme);
        $user->ime = mb_convert_case(array_pop($p), MB_CASE_TITLE, "UTF-8");
        $user->priimek = mb_convert_case(implode(' ', $p), MB_CASE_TITLE, "UTF-8");

        $this->changePass($user, $aips_user->Geslo);
        $this->em->persist($user);
    }
}