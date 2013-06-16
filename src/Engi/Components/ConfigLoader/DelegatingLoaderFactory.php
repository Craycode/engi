<?php

namespace Engi\Components\ConfigLoader;

use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

/**
 * Delegating loader factory.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class DelegatingLoaderFactory
{
    /**
     * Factory getter.
     * 
     * @param string $filename Configuration file name.
     * @param LoaderResolver $resolver Loader resolver.
     * 
     * @return array
     */
    public function get($filename, LoaderResolver $resolver)
    {
        $loader = new DelegatingLoader($resolver);

        return $loader->load($filename);
    }

}