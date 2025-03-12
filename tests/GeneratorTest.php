<?php

namespace Iritesh37\RandomWordGenerator\Tests;

use Iritesh37\RandomWordGenerator\Generator;
use LengthException;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    /** @test */
    public function testAcceptsACustomSeparator(): void
    {
        $wordA = Generator::generate('-');
        $wordB = Generator::generate('%');

        $partsA = explode('-', $wordA);
        $this->assertCount(2, $partsA);
        $this->assertNotNull($partsA[0]);
        $this->assertNotNull($partsA[1]);

        $partsB = explode('%', $wordB);
        $this->assertCount(2, $partsB);
        $this->assertNotNull($partsB[0]);
        $this->assertNotNull($partsB[1]);

        $this->assertCount(1, explode('%', $wordA));
        $this->assertCount(1, explode('-', $wordB));
    }

    /** @test */
    public function testSeparatesUsingASpaceByDefault(): void
    {
        $word = Generator::generate();

        $parts = explode(' ', $word);
        $this->assertCount(2, $parts);
        $this->assertNotNull($parts[0]);
        $this->assertNotNull($parts[1]);
    }

    /** @test */
    public function testGeneratesADifferentCombinationEachTime(): void
    {
        $wordA = Generator::generate();
        $wordB = Generator::generate();

        $this->assertNotSame($wordA, $wordB);
    }

    /** @test */
    public function testCanUseCustomWordLists(): void
    {
        Generator::setWordLists(['foo'], ['bar']);

        $this->assertSame('foo bar', Generator::generate());
    }

    /** @test */
    public function testCanResetTheCustomWordLists(): void
    {
        Generator::setWordLists(['foo'], ['bar']);

        Generator::reset();

        $this->assertNotSame('foo bar', Generator::generate());
    }

    /** @test */
    public function testCanGenerateWordsOfVaryingLength(): void
    {
        $this->assertCount(2, \explode(' ', Generator::generate(' ')));
        $this->assertCount(3, \explode(' ', Generator::generate(' ', 3)));
        $this->assertCount(4, \explode(' ', Generator::generate(' ', 4)));
        $this->assertCount(5, \explode(' ', Generator::generate(' ', 5)));
        $this->assertCount(6, \explode(' ', Generator::generate(' ', 6)));
    }

    /** @test */
    public function testThrowsAnErrorOnInvalidLength(): void
    {
        $this->expectException(LengthException::class);

        Generator::generate(' ', 1);
    }
}
