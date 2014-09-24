<?php

namespace Lo\Component\ByStep;

abstract class Step implements StepInterface {

    const STATUS_COMPLETE = 1;
    const STATUS_UNCOMPLETE = 0;

    private $name;
    private $status;

    function __construct() {
        $this->status = self::STATUS_UNCOMPLETE;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function execute();

    /**
     * {@inheritdoc}
     */
    abstract public function getIdentifier();

    public function getStatus() {
        return $this->status;
    }

    public function isComplete() {
        return $this->getStatus() === self::STATUS_COMPLETE;
    }

}
