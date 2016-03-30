<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace GbkSoft\Test\Xml\Document;

use GbkSoft\Xml\Document\Factory;
use GbkSoft\Xml\Document\Merger;

/**
 * Class MergerTest
 *
 * @see \GbkSoft\Xml\Document\Merger
 */
class MergerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private static $search = [" ", "\t", "\n", "\r", "\0", "\x0B"];

    /**
     * Test for merge method
     *
     * @param \DOMDocument[] $documents
     * @param \DOMDocument $expected
     *
     * @dataProvider filesDataProvider
     */
    public function testMerge(array $documents, \DOMDocument $expected)
    {
        $merger = new Merger(
            new Factory(),
            []
        );

        foreach ($documents as $document) {
            $merger->merge($document);
        }

        $actualContent = $this->prepareContent($merger->getDocument()->saveXML());
        $expectedContent = $this->prepareContent($expected->saveXML());

        self::assertEquals($expectedContent, $actualContent);
    }

    /**
     * @param string $content
     * @return string
     */
    private function prepareContent($content)
    {
        $content = str_replace(
            self::$search,
            '',
            $content
        );
        $content = str_replace('>', '>' . PHP_EOL, $content);

        return $content;
    }

    /**
     * @return array
     */
    public function filesDataProvider()
    {
        $documentFactory = new Factory();
        return [
            [ // ID атрибут [name]
                'documents' => [
                    $documentFactory->create(file_get_contents(__DIR__ . '/src/doc-1/doc-1.xml')),
                    $documentFactory->create(file_get_contents(__DIR__ . '/src/doc-1/doc-2.xml')),
                ],
                'expected' => $documentFactory->create(file_get_contents(__DIR__ . '/result/doc-1.xml')),
            ],
        ];
    }
}
