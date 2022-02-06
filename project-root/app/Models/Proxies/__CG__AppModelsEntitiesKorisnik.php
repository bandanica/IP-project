<?php

namespace App\Models\Proxies\__CG__\App\Models\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Korisnik extends \App\Models\Entities\Korisnik implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'idK', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'korIme', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'ime', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'prezime', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'lozinka', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'datumRodjenja', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'telefon', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'eMail', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'brLicence', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'idgrada', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'tip', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'idagencije', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'status'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'idK', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'korIme', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'ime', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'prezime', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'lozinka', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'datumRodjenja', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'telefon', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'eMail', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'brLicence', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'idgrada', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'tip', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'idagencije', '' . "\0" . 'App\\Models\\Entities\\Korisnik' . "\0" . 'status'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Korisnik $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdK()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdK();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdK', []);

        return parent::getIdK();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdK($idk)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdK', [$idk]);

        return parent::setIdK($idk);
    }

    /**
     * {@inheritDoc}
     */
    public function getKorIme()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKorIme', []);

        return parent::getKorIme();
    }

    /**
     * {@inheritDoc}
     */
    public function setKorIme($korIme)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKorIme', [$korIme]);

        return parent::setKorIme($korIme);
    }

    /**
     * {@inheritDoc}
     */
    public function getIme()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIme', []);

        return parent::getIme();
    }

    /**
     * {@inheritDoc}
     */
    public function setIme($ime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIme', [$ime]);

        return parent::setIme($ime);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrezime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrezime', []);

        return parent::getPrezime();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrezime($prezime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrezime', [$prezime]);

        return parent::setPrezime($prezime);
    }

    /**
     * {@inheritDoc}
     */
    public function getLozinka()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLozinka', []);

        return parent::getLozinka();
    }

    /**
     * {@inheritDoc}
     */
    public function setLozinka($lozinka)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLozinka', [$lozinka]);

        return parent::setLozinka($lozinka);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatumRodjenja()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDatumRodjenja', []);

        return parent::getDatumRodjenja();
    }

    /**
     * {@inheritDoc}
     */
    public function setDatumRodjenja($datumRodjenja)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDatumRodjenja', [$datumRodjenja]);

        return parent::setDatumRodjenja($datumRodjenja);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefon', []);

        return parent::getTelefon();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefon($telefon)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefon', [$telefon]);

        return parent::setTelefon($telefon);
    }

    /**
     * {@inheritDoc}
     */
    public function getEMail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEMail', []);

        return parent::getEMail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEMail($eMail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEMail', [$eMail]);

        return parent::setEMail($eMail);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrLicence()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrLicence', []);

        return parent::getBrLicence();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrLicence($brLicence)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrLicence', [$brLicence]);

        return parent::setBrLicence($brLicence);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdgrada()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdgrada', []);

        return parent::getIdgrada();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdgrada($idgrada)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdgrada', [$idgrada]);

        return parent::setIdgrada($idgrada);
    }

    /**
     * {@inheritDoc}
     */
    public function getTip()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTip', []);

        return parent::getTip();
    }

    /**
     * {@inheritDoc}
     */
    public function setTip($tip)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTip', [$tip]);

        return parent::setTip($tip);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdagencije()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdagencije', []);

        return parent::getIdagencije();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdagencije($idagencije)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdagencije', [$idagencije]);

        return parent::setIdagencije($idagencije);
    }

    /**
     * {@inheritDoc}
     */
    public function getOmiljene()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOmiljene', []);

        return parent::getOmiljene();
    }

    /**
     * {@inheritDoc}
     */
    public function setOmiljene($omiljene)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOmiljene', [$omiljene]);

        return parent::setOmiljene($omiljene);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(int $status): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        parent::setStatus($status);
    }

}
