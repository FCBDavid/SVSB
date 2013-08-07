<?php

namespace Compufix\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=20,nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=100 , nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="middlename", type="string", length=50 , nullable=true)
     */
    private $middlename;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50 , nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=10,nullable=true)
     */
    private $sex;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date",nullable=true)
     */
    private $birthday;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime", nullable=true)
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="phones", type="array", nullable=true)
     */
    private $phones;

    public function getIdentificacion() {
        return $this->code;
    }

    public function setIdentificacion($identificacion) {
        $this->code = $identificacion;
    }

        public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getMiddlename() {
        return $this->middlename;
    }

    public function setMiddlename($middlename) {
        $this->middlename = $middlename;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getSex() {
        return $this->sex;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function getCreateAt() {
        return $this->createAt;
    }

    public function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    public function getLabel() {

        return $this->middlename . ' ' . $this->lastname . ' ' . $this->firstname . ' ( ' . $this->ruc . ' )';
    }

    public function getPhonesArray() {
        return $this->phones;
    }

    public function getPhones() {
        $tostring = '';
        if (!empty($this->phones) and is_array($this->phones)) {
            foreach ($this->phones as $val) {

                $tostring.=$val . ',';
            }

            return trim($tostring, ',');
        } else {
            return $this->phones;
        }
    }

    public function setPhones($phones) {

        $phones = explode(',', $phones);

        $this->phones = $phones;
    }

    public function __construct() {
        parent::__construct();
        $this->createAt = new \DateTime();
    }

 

}