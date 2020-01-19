<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Laramore\Elements\{
    RuleElement, RuleManager, Element, ElementManager
};

final class RuleTest extends TestCase
{
    public function testRuleClass()
    {
        $operator = new RuleElement('name', 'native');

        $this->assertTrue($operator instanceof Element);
    }

    public function testRuleManagerClass()
    {
        $manager = new RuleManager();

        $this->assertTrue($manager instanceof ElementManager);

        $manager->set(new RuleElement('name', 'native'));
    }

    public function testWrongRule()
    {
        $manager = new RuleManager();

        $this->expectException(ErrorException::class);

        $manager->set(new class() {});
    }
}
