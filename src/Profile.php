<?php

class Profile extends Base
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var integer
     */
    private $sex;

    /**
     * @var string
     */
    private $moto;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var integer
     */
    private $read_count;

    /**
     * @var \User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sex
     *
     * @param integer $sex
     *
     * @return Profile
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return integer
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set moto
     *
     * @param string $moto
     *
     * @return Profile
     */
    public function setMoto($moto)
    {
        $this->moto = $moto;

        return $this;
    }

    /**
     * Get moto
     *
     * @return string
     */
    public function getMoto()
    {
        return $this->moto;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Profile
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set readCount
     *
     * @param integer $readCount
     *
     * @return Profile
     */
    public function setReadCount($readCount)
    {
        $this->read_count = $readCount;

        return $this;
    }

    /**
     * Get readCount
     *
     * @return integer
     */
    public function getReadCount()
    {
        return $this->read_count;
    }

    /**
     * Set user
     *
     * @param \User $user
     *
     * @return Profile
     */
    public function setUser(\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User
     */
    public function getUser()
    {
        return $this->user;
    }
}
