<?php

namespace GetThingsDone\DynamicConfig;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Arr;

class DynamicConfig implements Repository
{
    protected array $config = [];
    
    public function __construct(\GetThingsDone\DynamicConfig\Models\DynamicConfig $model)
    {
        $config = $model->get();
        
        $this->config = $config->pluck('key')->combine($config->pluck('value'))->toArray();
    }

    
    /**
     * Determine if the given configuration value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function has($key)
    {
        return Arr::has($this->config, $key);
    }

    /**
     * Get the specified configuration value.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Arr::get($this->config, $key, $default);
    }

    /**
     * Get all of the dynamic configuration items for the application.
     *
     * @return array
     */
    public function all()
    {
        return $this->config;
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @param  mixed  $value
     * @return void
     */
    public function set($key, $value = null)
    {
        $this->config = Arr::add($this->config, $key, $value);
    }

    /**
     * Prepend a value onto an array configuration value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function prepend($key, $value)
    {
        $this->config = Arr::prepend($this->config, $value, $key);
    }

    /**
     * Push a value onto an array configuration value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function push($key, $value)
    {
        $this->config[$key] = $value;
    }
}
