<?php

namespace Lo\Component\BySteps\Tests;

/**
 * Description of FlowTest
 *
 * @author lauwent
 */
class FlowTest extends \PHPUnit_Framework_TestCase {

    public function testAddStep() {
        $flow = $this->getMockForAbstractClass('Lo\Component\ByStep\Flow');
        $this->assertTrue(empty(\PHPUnit_Framework_Assert::readAttribute($flow, 'steps')));

        $step = $this->getMockForAbstractClass('Lo\Component\ByStep\Step');
        $flow->addStep($step);

        $this->assertTrue(!empty(\PHPUnit_Framework_Assert::readAttribute($flow, 'steps')));

        $step2 = $this->getMockForAbstractClass('Lo\Component\ByStep\Step');
        $step3 = $this->getMockForAbstractClass('Lo\Component\ByStep\Step');
        $flow->addStep($step2);
        $flow->addStep($step3);
        $this->assertEquals(3, count(\PHPUnit_Framework_Assert::readAttribute($flow, 'steps')));

        foreach (\PHPUnit_Framework_Assert::readAttribute($flow, 'steps') as $step) {
            $this->assertTrue($step instanceof \Lo\Component\ByStep\Step);
        }
    }

}
