<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/contactcenterinsights/v1/contact_center_insights.proto

namespace Google\Cloud\ContactCenterInsights\V1\CalculateStatsResponse\TimeSeries;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single interval in a time series.
 *
 * Generated from protobuf message <code>google.cloud.contactcenterinsights.v1.CalculateStatsResponse.TimeSeries.Interval</code>
 */
class Interval extends \Google\Protobuf\Internal\Message
{
    /**
     * The start time of this interval.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1;</code>
     */
    private $start_time = null;
    /**
     * The number of conversations created in this interval.
     *
     * Generated from protobuf field <code>int32 conversation_count = 2;</code>
     */
    private $conversation_count = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Timestamp $start_time
     *           The start time of this interval.
     *     @type int $conversation_count
     *           The number of conversations created in this interval.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Contactcenterinsights\V1\ContactCenterInsights::initOnce();
        parent::__construct($data);
    }

    /**
     * The start time of this interval.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    public function hasStartTime()
    {
        return isset($this->start_time);
    }

    public function clearStartTime()
    {
        unset($this->start_time);
    }

    /**
     * The start time of this interval.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setStartTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->start_time = $var;

        return $this;
    }

    /**
     * The number of conversations created in this interval.
     *
     * Generated from protobuf field <code>int32 conversation_count = 2;</code>
     * @return int
     */
    public function getConversationCount()
    {
        return $this->conversation_count;
    }

    /**
     * The number of conversations created in this interval.
     *
     * Generated from protobuf field <code>int32 conversation_count = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setConversationCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->conversation_count = $var;

        return $this;
    }

}


