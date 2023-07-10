<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/workflows/executions/v1/executions.proto

namespace Google\Cloud\Workflows\Executions\V1\Execution;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single stack element (frame) where an error occurred.
 *
 * Generated from protobuf message <code>google.cloud.workflows.executions.v1.Execution.StackTraceElement</code>
 */
class StackTraceElement extends \Google\Protobuf\Internal\Message
{
    /**
     * The step the error occurred at.
     *
     * Generated from protobuf field <code>string step = 1;</code>
     */
    private $step = '';
    /**
     * The routine where the error occurred.
     *
     * Generated from protobuf field <code>string routine = 2;</code>
     */
    private $routine = '';
    /**
     * The source position information of the stack trace element.
     *
     * Generated from protobuf field <code>.google.cloud.workflows.executions.v1.Execution.StackTraceElement.Position position = 3;</code>
     */
    private $position = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $step
     *           The step the error occurred at.
     *     @type string $routine
     *           The routine where the error occurred.
     *     @type \Google\Cloud\Workflows\Executions\V1\Execution\StackTraceElement\Position $position
     *           The source position information of the stack trace element.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Workflows\Executions\V1\Executions::initOnce();
        parent::__construct($data);
    }

    /**
     * The step the error occurred at.
     *
     * Generated from protobuf field <code>string step = 1;</code>
     * @return string
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * The step the error occurred at.
     *
     * Generated from protobuf field <code>string step = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setStep($var)
    {
        GPBUtil::checkString($var, True);
        $this->step = $var;

        return $this;
    }

    /**
     * The routine where the error occurred.
     *
     * Generated from protobuf field <code>string routine = 2;</code>
     * @return string
     */
    public function getRoutine()
    {
        return $this->routine;
    }

    /**
     * The routine where the error occurred.
     *
     * Generated from protobuf field <code>string routine = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRoutine($var)
    {
        GPBUtil::checkString($var, True);
        $this->routine = $var;

        return $this;
    }

    /**
     * The source position information of the stack trace element.
     *
     * Generated from protobuf field <code>.google.cloud.workflows.executions.v1.Execution.StackTraceElement.Position position = 3;</code>
     * @return \Google\Cloud\Workflows\Executions\V1\Execution\StackTraceElement\Position|null
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function hasPosition()
    {
        return isset($this->position);
    }

    public function clearPosition()
    {
        unset($this->position);
    }

    /**
     * The source position information of the stack trace element.
     *
     * Generated from protobuf field <code>.google.cloud.workflows.executions.v1.Execution.StackTraceElement.Position position = 3;</code>
     * @param \Google\Cloud\Workflows\Executions\V1\Execution\StackTraceElement\Position $var
     * @return $this
     */
    public function setPosition($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Workflows\Executions\V1\Execution\StackTraceElement\Position::class);
        $this->position = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StackTraceElement::class, \Google\Cloud\Workflows\Executions\V1\Execution_StackTraceElement::class);

