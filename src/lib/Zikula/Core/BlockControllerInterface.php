<?php
/**
 * Copyright Zikula Foundation 2015 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

namespace Zikula\Core;

use Symfony\Component\HttpFoundation\Request;

interface BlockControllerInterface
{
    /**
     * Get the type of the block (e.g. the 'name').
     * This is displayed to the admin during creation, not to site users.
     * @return string
     */
    public function getType();

    /**
     * Display the block content.
     * @param array|string $content
     * @return string
     */
    public function display($content);

    /**
     * Modify the block content.
     * Do one of the following:
     * 1. Display a form to modify the block's behavior or display.
     *   Return should be the html for the form used to modify the block.
     * 2. Process the form and return data to be stored in block's `content` property.
     *   Return should be an array but can be anything that is serializable.
     * @param Request $request
     * @param array|string $content
     * @return mixed
     */
    public function modify(Request $request, $content);
}
