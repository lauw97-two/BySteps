<?php

namespace Lo\Component\BySteps;

abstract class Step implements StepInterface {

    const STATUS_COMPLETE = 1;

    private $name;
    private $status;

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function execute() {
        ;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function isComplete() {
        return $this->getStatus() === self::STATUS_COMPLETE;
    }

}

?>
