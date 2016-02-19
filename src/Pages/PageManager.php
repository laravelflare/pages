<?php

namespace LaravelFlare\Pages;

class PageManager
{
    /**
     * Handle dynamic method calls into the Manager Class.
     *
     * Allows us to create a newQuery when attempting to access
     * data which the Manager Class does not have methods for.
     *
     * @param string $method
     * @param array  $parameters
     * 
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $parameters);
        }

        $query = (new Page())->newQuery();

        return call_user_func_array([$query, $method], $parameters);
    }
}
