<?php

namespace Lo\Component\BySteps;

/**
 *
 * @author laurent
 */
interface StepInterface {

    /**
     * Returns the identifier of this step.
     *
     * @return string The step's identifier
     */
    public function getIdentifier();

    public function execute();
}

?>
