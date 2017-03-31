<?php

class User
{
    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $birthdate;
    private $phone;
    private $street;
    private $zipcode;
    private $city;

    public function __construct($firstname) // Constructeur demandant 1 paramètres
    {
    $this->setFirstname($firstname);
    }
    /**
     * Gets the value of firstname.
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets the value of firstname.
     *
     * @param mixed $firstname the firstname
     *
     * @return self
     */
    private function _setFirstname($olivier)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Gets the value of lastname.
     *
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets the value of lastname.
     *
     * @param mixed $lastname the lastname
     *
     * @return self
     */
    private function _setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Gets the value of username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the value of username.
     *
     * @param mixed $username the username
     *
     * @return self
     */
    private function _setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    private function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of birthdate.
     *
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Sets the value of birthdate.
     *
     * @param mixed $birthdate the birthdate
     *
     * @return self
     */
    private function _setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Gets the value of phone.
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the value of phone.
     *
     * @param mixed $phone the phone
     *
     * @return self
     */
    private function _setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Gets the value of street.
     *
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the value of street.
     *
     * @param mixed $street the street
     *
     * @return self
     */
    private function _setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Gets the value of zipcode.
     *
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Sets the value of zipcode.
     *
     * @param mixed $zipcode the zipcode
     *
     * @return self
     */
    private function _setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Gets the value of city.
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the value of city.
     *
     * @param mixed $city the city
     *
     * @return self
     */
    private function _setCity($city)
    {
        $this->city = $city;

        return $this;
    }
}
