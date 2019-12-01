<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Laramore\Exceptions\LockException;
use Laramore\Elements\{
    Type, TypeManager, Element, ElementManager
};

final class TypeTest extends TestCase
{
    public function testRuleClass()
    {
        $operator = new Type('name', 'native');

        $this->assertTrue($operator instanceof Element);
    }

    public function testRuleManagerClass()
    {
        $manager = new TypeManager();

        $this->assertTrue($manager instanceof ElementManager);

        $manager->set(new Type('name', 'native'));
    }

    public function testWrongType()
    {
        $manager = new TypeManager();

        $this->expectException(ErrorException::class);

        $manager->set(new class() {});
    }
}
