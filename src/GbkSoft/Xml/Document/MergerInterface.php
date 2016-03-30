<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace GbkSoft\Xml\Document;

/**
 * Interface MergerInterface
 */
interface MergerInterface
{
    /**
     * @param \DOMDocument $document
     */
    public function merge(\DOMDocument $document);

    /**
     * @return \DOMDocument
     */
    public function getDocument();
}
