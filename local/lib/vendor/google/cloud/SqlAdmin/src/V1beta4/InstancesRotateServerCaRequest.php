<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/sql/v1beta4/cloud_sql_resources.proto

namespace Google\Cloud\Sql\V1beta4;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Rotate Server CA request.
 *
 * Generated from protobuf message <code>google.cloud.sql.v1beta4.InstancesRotateServerCaRequest</code>
 */
class InstancesRotateServerCaRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Contains details about the rotate server CA operation.
     *
     * Generated from protobuf field <code>.google.cloud.sql.v1beta4.RotateServerCaContext rotate_server_ca_context = 1;</code>
     */
    private $rotate_server_ca_context = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Sql\V1beta4\RotateServerCaContext $rotate_server_ca_context
     *           Contains details about the rotate server CA operation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Sql\V1Beta4\CloudSqlResources::initOnce();
        parent::__construct($data);
    }

    /**
     * Contains details about the rotate server CA operation.
     *
     * Generated from protobuf field <code>.google.cloud.sql.v1beta4.RotateServerCaContext rotate_server_ca_context = 1;</code>
     * @return \Google\Cloud\Sql\V1beta4\RotateServerCaContext|null
     */
    public function getRotateServerCaContext()
    {
        return $this->rotate_server_ca_context;
    }

    public function hasRotateServerCaContext()
    {
        return isset($this->rotate_server_ca_context);
    }

    public function clearRotateServerCaContext()
    {
        unset($this->rotate_server_ca_context);
    }

    /**
     * Contains details about the rotate server CA operation.
     *
     * Generated from protobuf field <code>.google.cloud.sql.v1beta4.RotateServerCaContext rotate_server_ca_context = 1;</code>
     * @param \Google\Cloud\Sql\V1beta4\RotateServerCaContext $var
     * @return $this
     */
    public function setRotateServerCaContext($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Sql\V1beta4\RotateServerCaContext::class);
        $this->rotate_server_ca_context = $var;

        return $this;
    }

}

