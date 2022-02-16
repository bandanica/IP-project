<?php

namespace App\Models\Proxies\__CG__\App\Models\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Karakteristike extends \App\Models\Entities\Karakteristike implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'idkarakteristike', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'terasa', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'lodja', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'lift', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'franc_balkon', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'podrum', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'garaza', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'saBastom', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'klima', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'internet', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'interfon', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'telefon', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'parking'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'idkarakteristike', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'terasa', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'lodja', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'lift', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'franc_balkon', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'podrum', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'garaza', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'saBastom', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'klima', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'internet', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'interfon', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'telefon', '' . "\0" . 'App\\Models\\Entities\\Karakteristike' . "\0" . 'parking'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Karakteristike $proxy) {
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
    public function getIdkarakteristike()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdkarakteristike();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdkarakteristike', []);

        return parent::getIdkarakteristike();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdkarakteristike($idkarakteristike)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdkarakteristike', [$idkarakteristike]);

        return parent::setIdkarakteristike($idkarakteristike);
    }

    /**
     * {@inheritDoc}
     */
    public function getTerasa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTerasa', []);

        return parent::getTerasa();
    }

    /**
     * {@inheritDoc}
     */
    public function setTerasa($terasa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTerasa', [$terasa]);

        return parent::setTerasa($terasa);
    }

    /**
     * {@inheritDoc}
     */
    public function getLodja()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLodja', []);

        return parent::getLodja();
    }

    /**
     * {@inheritDoc}
     */
    public function setLodja($lodja)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLodja', [$lodja]);

        return parent::setLodja($lodja);
    }

    /**
     * {@inheritDoc}
     */
    public function getLift()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLift', []);

        return parent::getLift();
    }

    /**
     * {@inheritDoc}
     */
    public function setLift($lift)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLift', [$lift]);

        return parent::setLift($lift);
    }

    /**
     * {@inheritDoc}
     */
    public function getFrancBalkon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFrancBalkon', []);

        return parent::getFrancBalkon();
    }

    /**
     * {@inheritDoc}
     */
    public function setFrancBalkon($franc_balkon)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFrancBalkon', [$franc_balkon]);

        return parent::setFrancBalkon($franc_balkon);
    }

    /**
     * {@inheritDoc}
     */
    public function getPodrum()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPodrum', []);

        return parent::getPodrum();
    }

    /**
     * {@inheritDoc}
     */
    public function setPodrum($podrum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPodrum', [$podrum]);

        return parent::setPodrum($podrum);
    }

    /**
     * {@inheritDoc}
     */
    public function getGaraza()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGaraza', []);

        return parent::getGaraza();
    }

    /**
     * {@inheritDoc}
     */
    public function setGaraza($garaza)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGaraza', [$garaza]);

        return parent::setGaraza($garaza);
    }

    /**
     * {@inheritDoc}
     */
    public function getSaBastom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSaBastom', []);

        return parent::getSaBastom();
    }

    /**
     * {@inheritDoc}
     */
    public function setSaBastom($saBastom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSaBastom', [$saBastom]);

        return parent::setSaBastom($saBastom);
    }

    /**
     * {@inheritDoc}
     */
    public function getKlima()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKlima', []);

        return parent::getKlima();
    }

    /**
     * {@inheritDoc}
     */
    public function setKlima($klima)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKlima', [$klima]);

        return parent::setKlima($klima);
    }

    /**
     * {@inheritDoc}
     */
    public function getInternet()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInternet', []);

        return parent::getInternet();
    }

    /**
     * {@inheritDoc}
     */
    public function setInternet($internet)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInternet', [$internet]);

        return parent::setInternet($internet);
    }

    /**
     * {@inheritDoc}
     */
    public function getInterfon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInterfon', []);

        return parent::getInterfon();
    }

    /**
     * {@inheritDoc}
     */
    public function setInterfon($interfon)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInterfon', [$interfon]);

        return parent::setInterfon($interfon);
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
    public function getParking()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParking', []);

        return parent::getParking();
    }

    /**
     * {@inheritDoc}
     */
    public function setParking($parking)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParking', [$parking]);

        return parent::setParking($parking);
    }

}
