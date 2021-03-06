<?php

namespace Veniva\Lbs;

use Veniva\Lbs\Adapters\Interfaces\ITranslator;

class Result
{
    public $message;
    public $status;

    public $fields = [];

    /** @var \Veniva\Lbs\Adapters\Interfaces\ITranslator */
    protected $translator;

    public function __get($name)
    {
        if(array_key_exists($name, $this->fields))
            return $this->fields[$name];

        return null;
    }

    public function __set($name, $value)
    {
        $this->fields[$name] = $value;
    }

    public function __construct(ITranslator $translator = null)
    {
        if($translator)
            $this->translator = $translator;
    }

    public function set($status, string $message = null, array $array = []):self
    {
        $this->status = $status;
        if($message){
            $this->message = $this->translator ? $this->translator->translate($message) : $message;
        }

        foreach($array as $key => $value){
            $this->fields[$key] = $value;
        }

        return $this;
    }
    
    public function get($key)
    {
        if(array_key_exists($key, $this->fields)){
            return $this->fields[$key];
        }
        
        return null;
    }
    
    public function has($key)
    {
        return array_key_exists($key, $this->fields);
    }

    /**
     * @return \Veniva\Lbs\Adapters\Interfaces\ITranslator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * @param \Veniva\Lbs\Adapters\Interfaces\ITranslator $translator
     * @return Result
     */
    public function setTranslator(ITranslator $translator)
    {
        $this->translator = $translator;
        return $this;
    }
    
}