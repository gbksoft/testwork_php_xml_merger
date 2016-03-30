<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace GbkSoft\Xml\Document;

/**
 * Class Merger
 */
class Merger implements MergerInterface
{
    /**
     * @var \GbkSoft\Xml\Document\Factory
     */
    private $documentFactory;

    /**
     * @var array
     */
    private $config;

    /**
     * Merger constructor
     *
     * @param Factory $documentFactory
     * @param array $config
     */
    public function __construct(Factory $documentFactory, array $config)
    {
        $this->documentFactory = $documentFactory;
        $this->config = $config;
    }

    /**
     * @param \DOMDocument $document
     */
    public function merge(\DOMDocument $document)
    {

    }

    /**
     * @return \DOMDocument
     */
    public function getDocument()
    {
        return $this->documentFactory->create('<?xml version="1.0" encoding="UTF-8" ?><config></config>');
    }
}
