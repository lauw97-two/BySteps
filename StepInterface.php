<?php

namespace Lo\Component\ByStep;

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

    /**
     * Write down all the logic to execute
     * in this step
     */
    public function execute();
}
