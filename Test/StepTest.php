<?php

namespace Lo\Component\BySteps\Tests;

use Lo\Component\ByStep\Step;

/**
 * Description of StepTest
 *
 * @author laurent
 */
class StepTest extends \PHPUnit_Framework_TestCase {

    public function testClassStatusConstant() {
        $this->assertNotEquals(Step::STATUS_COMPLETE, Step::STATUS_UNCOMPLETE);
        $this->assertNotSame(Step::STATUS_COMPLETE, Step::STATUS_UNCOMPLETE);
    }

    public function testIsComplete() {

        $step = $this->getMockForAbstractClass('Lo\Component\ByStep\Step');
        $this->assertFalse($step->isComplete());

        $reflectionStep = new \ReflectionClass('Lo\Component\ByStep\Step');
        $property = $reflectionStep->getProperty('status');
        $property->setAccessible(true);

        $property->setValue($step, Step::STATUS_COMPLETE);
        $this->assertTrue($step->isComplete());

        $property->setValue($step, Step::STATUS_UNCOMPLETE);
        $this->assertFalse($step->isComplete());
    }

    public function testGetStatus() {
        $step = $this->getMockForAbstractClass('Lo\Component\ByStep\Step');

        $reflectionStep = new \ReflectionClass('Lo\Component\ByStep\Step');
        $property = $reflectionStep->getProperty('status');
        $property->setAccessible(true);

        $this->assertSame($property->getValue($step), Step:: STATUS_UNCOMPLETE);

        $property->setValue($step, Step:: STATUS_COMPLETE);
        $this->assertSame($property->getValue($step), Step:: STATUS_COMPLETE);

        $property->setValue($step, Step:: STATUS_UNCOMPLETE);
        $this->assertSame($property->getValue($step), Step:: STATUS_UNCOMPLETE);

        $property->setValue($step, 5);
        $this->assertNotSame($property->getValue($step), Step:: STATUS_COMPLETE);
        $this->assertNotSame($property->getValue($step), Step:: STATUS_UNCOMPLETE);
    }

}

?>
