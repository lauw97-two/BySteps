<?php

namespace Lo\Component\BySteps\Tests;

use Lo\Component\BySteps\Step;

/**
 * Description of StepTest
 *
 * @author laurent
 */
class StepTest extends \PHPUnit_Framework_TestCase {

    public function testClassConstant(){
        $this->assertTrue(Step::STATUS_COMPLETE === 1);
    }
    
    public function testIsComplete() {
        $step = $this->getMockForAbstractClass('Lo\Component\BySteps\Step');
        $this->assertFalse($step->isComplete());
        
        $step->setStatus(Step::STATUS_COMPLETE);
        $this->assertTrue($step->isComplete());
    }

}

?>
