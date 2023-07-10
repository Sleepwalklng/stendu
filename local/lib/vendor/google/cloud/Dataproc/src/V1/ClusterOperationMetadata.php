<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/operations.proto

namespace Google\Cloud\Dataproc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Metadata describing the operation.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1.ClusterOperationMetadata</code>
 */
class ClusterOperationMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Name of the cluster for the operation.
     *
     * Generated from protobuf field <code>string cluster_name = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $cluster_name = '';
    /**
     * Output only. Cluster UUID for the operation.
     *
     * Generated from protobuf field <code>string cluster_uuid = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $cluster_uuid = '';
    /**
     * Output only. Current operation status.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.ClusterOperationStatus status = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $status = null;
    /**
     * Output only. The previous operation status.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dataproc.v1.ClusterOperationStatus status_history = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $status_history;
    /**
     * Output only. The operation type.
     *
     * Generated from protobuf field <code>string operation_type = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $operation_type = '';
    /**
     * Output only. Short description of operation.
     *
     * Generated from protobuf field <code>string description = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $description = '';
    /**
     * Output only. Labels associated with the operation
     *
     * Generated from protobuf field <code>map<string, string> labels = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $labels;
    /**
     * Output only. Errors encountered during operation execution.
     *
     * Generated from protobuf field <code>repeated string warnings = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $warnings;
    /**
     * Output only. Child operation ids
     *
     * Generated from protobuf field <code>repeated string child_operation_ids = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $child_operation_ids;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $cluster_name
     *           Output only. Name of the cluster for the operation.
     *     @type string $cluster_uuid
     *           Output only. Cluster UUID for the operation.
     *     @type \Google\Cloud\Dataproc\V1\ClusterOperationStatus $status
     *           Output only. Current operation status.
     *     @type array<\Google\Cloud\Dataproc\V1\ClusterOperationStatus>|\Google\Protobuf\Internal\RepeatedField $status_history
     *           Output only. The previous operation status.
     *     @type string $operation_type
     *           Output only. The operation type.
     *     @type string $description
     *           Output only. Short description of operation.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Output only. Labels associated with the operation
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $warnings
     *           Output only. Errors encountered during operation execution.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $child_operation_ids
     *           Output only. Child operation ids
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataproc\V1\Operations::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Name of the cluster for the operation.
     *
     * Generated from protobuf field <code>string cluster_name = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getClusterName()
    {
        return $this->cluster_name;
    }

    /**
     * Output only. Name of the cluster for the operation.
     *
     * Generated from protobuf field <code>string cluster_name = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setClusterName($var)
    {
        GPBUtil::checkString($var, True);
        $this->cluster_name = $var;

        return $this;
    }

    /**
     * Output only. Cluster UUID for the operation.
     *
     * Generated from protobuf field <code>string cluster_uuid = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getClusterUuid()
    {
        return $this->cluster_uuid;
    }

    /**
     * Output only. Cluster UUID for the operation.
     *
     * Generated from protobuf field <code>string cluster_uuid = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setClusterUuid($var)
    {
        GPBUtil::checkString($var, True);
        $this->cluster_uuid = $var;

        return $this;
    }

    /**
     * Output only. Current operation status.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.ClusterOperationStatus status = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Dataproc\V1\ClusterOperationStatus|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function hasStatus()
    {
        return isset($this->status);
    }

    public function clearStatus()
    {
        unset($this->status);
    }

    /**
     * Output only. Current operation status.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.ClusterOperationStatus status = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Dataproc\V1\ClusterOperationStatus $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1\ClusterOperationStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. The previous operation status.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dataproc.v1.ClusterOperationStatus status_history = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getStatusHistory()
    {
        return $this->status_history;
    }

    /**
     * Output only. The previous operation status.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dataproc.v1.ClusterOperationStatus status_history = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Cloud\Dataproc\V1\ClusterOperationStatus>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setStatusHistory($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dataproc\V1\ClusterOperationStatus::class);
        $this->status_history = $arr;

        return $this;
    }

    /**
     * Output only. The operation type.
     *
     * Generated from protobuf field <code>string operation_type = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getOperationType()
    {
        return $this->operation_type;
    }

    /**
     * Output only. The operation type.
     *
     * Generated from protobuf field <code>string operation_type = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setOperationType($var)
    {
        GPBUtil::checkString($var, True);
        $this->operation_type = $var;

        return $this;
    }

    /**
     * Output only. Short description of operation.
     *
     * Generated from protobuf field <code>string description = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Output only. Short description of operation.
     *
     * Generated from protobuf field <code>string description = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Output only. Labels associated with the operation
     *
     * Generated from protobuf field <code>map<string, string> labels = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Output only. Labels associated with the operation
     *
     * Generated from protobuf field <code>map<string, string> labels = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Output only. Errors encountered during operation execution.
     *
     * Generated from protobuf field <code>repeated string warnings = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * Output only. Errors encountered during operation execution.
     *
     * Generated from protobuf field <code>repeated string warnings = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setWarnings($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->warnings = $arr;

        return $this;
    }

    /**
     * Output only. Child operation ids
     *
     * Generated from protobuf field <code>repeated string child_operation_ids = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChildOperationIds()
    {
        return $this->child_operation_ids;
    }

    /**
     * Output only. Child operation ids
     *
     * Generated from protobuf field <code>repeated string child_operation_ids = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChildOperationIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->child_operation_ids = $arr;

        return $this;
    }

}

