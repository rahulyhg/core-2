<?php
/**
 * Copyright 2009-2010 Zikula Foundation - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv2 (or at your option, any later version).
 * @package Zikula
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Driver Abstract.
 *
 * This abstract class contains the basic construct for every driver, which
 * simply gets the FileSystem_Configuration and saves it. all drivers which
 * extend this class must implement FileSystem_Interface.
 */
abstract class FileSystem_Driver implements FileSystem_Interface
{
    /**
     * Configuration object.
     *
     * @var FileSystem_Configuration
     */
    protected $configuration;

    /**
     * The Driver object (facade).
     *
     * @var object
     */
    public $driver;

    /**
     * The error handler.
     *
     * @var object
     */
    public $errorHandler;

    /**
     * Construct the driver with the configuration.
     *
     * @param FileSystem_Configuration $configuration The configuration to be used.
     *
     * @throws InvalidArgumentException If wrong configuration class received.
     */
    public function __construct(FileSystem_Configuration $configuration)
    {
        // validate we get correct configuration class type.
        $type = str_ireplace('FileSystem_', '', get_class($this));
        $validName = "FileSystem_Configuration_{$type}";
        if ($validName != get_class($configuration)) {
            throw new InvalidArgumentException(
                sprintf('Invalid configuration class for %1$s.  Expected %2$s but got %3$s instead.',
                get_class($this), $validName, get_class($configuration)));
        }

        $this->configuration = $configuration;

        $facade = "FileSystem_Facade_{$type}";
        $this->driver = new $facade();
        $this->errorHandler = new FileSystem_Error();
    }

    /**
     * Setter for facade driver.
     *
     * @param object $driver The facade driver.
     *
     * @return void
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }
}