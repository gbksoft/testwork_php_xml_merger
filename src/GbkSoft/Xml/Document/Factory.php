<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace GbkSoft\Xml\Document;

/**
 * Class Factory
 */
class Factory
{
    const VERSION = '1.0';

    const ENCODING = 'UTF-8';

    /**
     * @param string $content
     * @return \DOMDocument
     */
    public function create($content)
    {
        $document = new \DOMDocument(self::VERSION, self::ENCODING);
        $document->loadXML($content);

        return $document;
    }
}
