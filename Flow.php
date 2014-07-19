<?php

namespace Lo\Component\BySteps;

use Lo\Component\BySteps\StepInterface;

class Flow {

    private $name;
    private $identifier;
    private $steps;
    private $strictIdentifier;

    function __construct() {
        $this->steps = array();
        $this->strictIdentifier = true;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getIdentifier() {
        return $this->identifier;
    }

    public function setIdentifier($identifier) {
        $this->identifier = $identifier;
    }

    public function addStep(StepInterface $step) {
        $this->steps[] = $step;
    }

    public function getStep($identifier) {

        if (!$this->strictIdentifier && preg_match("/^(s(tep|)\d+|\d+)$/", $identifier)) {
            return $this->getStepByPosition($position = preg_replace("/[^\d+]/", "", $identifier));
        } else {
            foreach ($this->steps as $step) {
                if ($step->getIdentifier() == $identifier) {
                    return $step;
                }
            }
        }

        return null;
    }

    public function getStepByPosition($position) {
        if (empty($this->steps)) {
            throw new \Exception("No step found in the flow");
        } else if (isset($this->steps[$key = $position - 1])) {
            return $this->steps[$key];
        }

        return null;
    }

    public function getFirstStep() {
        if (empty($this->steps)) {
            throw new \Exception("No step found in the flow");
        }

        return $this->steps[0];
    }

    public function getLastCompleteStep() {
        foreach (array_reverse($this->steps) as $step) {
            if ($step->getStatus() == Step::STATUS_COMPLETE) {
                return $step;
            }
        }

        return null;
    }

    public function getPreviousStepFrom($identifier) {
        $pKey = array_search($this->getStep($identifier), $this->steps) - 1;
        if (isset($this->steps[$pKey])) {
            return $this->steps[$pKey];
        }

        return null;
    }

    public function getNextStepToComplete() {
        foreach (array_reverse($this->steps, true) as $key => $step) {
            if ($step->getStatus() == Step::STATUS_COMPLETE && isset($this->steps[$key + 1])) {
                return $this->steps[$key + 1];
            }
        }

        return $this->getFirstStep();
    }

    public function stepExists($identifier) {
        return $this->getStep($identifier) ? true : false;
    }

}

?>
