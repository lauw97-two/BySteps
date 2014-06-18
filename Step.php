<?php

namespace Lo\Component\BySteps;

class Step {

    const STATUS_COMPLETE = 1;

    private $name;
    private $identifier;
    private $status;

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

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function isComplete() {
        return $this->getStatus() == self::STATUS_COMPLETE;
    }

}

?>
