<?php

namespace Mikeevstropov\SoftArray;

class SoftArray implements \ArrayAccess, \Iterator, \Countable
{
    private $container = [];

    public function __construct(array $array)
    {
        $this->container = $array;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return $offset ? true : false;
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }


    public function rewind()
    {
        return reset($this->container);
    }

    public function current()
    {
        return current($this->container);
    }

    public function key()
    {
        return key($this->container);
    }

    public function next()
    {
        return next($this->container);
    }

    public function valid()
    {
        return !is_null(key($this->container));
    }

    public function count()
    {
        return count($this->container);
    }
}
