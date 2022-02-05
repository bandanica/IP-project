<?php

namespace DoctrineProxies\__CG__\App\Models\Entities;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Agencija extends \App\Models\Entities\Agencija implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'ida', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'naziv', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'adresa', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'telefon', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'pib', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'idgrada'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'ida', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'naziv', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'adresa', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'telefon', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'pib', '' . "\0" . 'App\\Models\\Entities\\Agencija' . "\0" . 'idgrada'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Agencija $proxy) {
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
    public function getIda()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIda();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIda', []);

        return parent::getIda();
    }

    /**
     * {@inheritDoc}
     */
    public function setIda($ida)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIda', [$ida]);

        return parent::setIda($ida);
    }

    /**
     * {@inheritDoc}
     */
    public function getNaziv()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNaziv', []);

        return parent::getNaziv();
    }

    /**
     * {@inheritDoc}
     */
    public function setNaziv($naziv)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNaziv', [$naziv]);

        return parent::setNaziv($naziv);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdresa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdresa', []);

        return parent::getAdresa();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdresa($adresa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdresa', [$adresa]);

        return parent::setAdresa($adresa);
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
    public function getPib()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPib', []);

        return parent::getPib();
    }

    /**
     * {@inheritDoc}
     */
    public function setPib($pib)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPib', [$pib]);

        return parent::setPib($pib);
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

}
