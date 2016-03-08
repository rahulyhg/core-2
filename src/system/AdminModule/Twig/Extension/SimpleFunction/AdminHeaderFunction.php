<?php
/**
 * Copyright Zikula Foundation 2015 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPv3 (or at your option any later version).
 * @package Zikula
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

namespace Zikula\AdminModule\Twig\Extension\SimpleFunction;

use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\Fragment\FragmentHandler;

class AdminHeaderFunction
{
    /**
     * @var FragmentHandler
     */
    private $handler;

    /**
     * AdminHeaderFunction constructor.
     * @param FragmentHandler $handler
     */
    public function __construct(FragmentHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Inserts admin header.
     *
     * This has NO configuration options.
     *
     * Examples:
     *
     * <samp>{{ adminHeader() }}</samp>
     *
     * @return string
     */
    public function display()
    {
        $ref = new ControllerReference('ZikulaAdminModule:AdminInterface:header');

        return $this->handler->render($ref, 'inline', []);
    }
}
