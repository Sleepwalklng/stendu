<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/admin/instance/v1/spanner_instance_admin.proto

namespace Google\Cloud\Spanner\Admin\Instance\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request for
 * [DeleteInstanceConfigRequest][InstanceAdmin.DeleteInstanceConfigRequest].
 *
 * Generated from protobuf message <code>google.spanner.admin.instance.v1.DeleteInstanceConfigRequest</code>
 */
class DeleteInstanceConfigRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the instance configuration to be deleted.
     * Values are of the form
     * `projects/<project>/instanceConfigs/<instance_config>`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';
    /**
     * Used for optimistic concurrency control as a way to help prevent
     * simultaneous deletes of an instance config from overwriting each
     * other. If not empty, the API
     * only deletes the instance config when the etag provided matches the current
     * status of the requested instance config. Otherwise, deletes the instance
     * config without checking the current status of the requested instance
     * config.
     *
     * Generated from protobuf field <code>string etag = 2;</code>
     */
    private $etag = '';
    /**
     * An option to validate, but not actually execute, a request,
     * and provide the same response.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     */
    private $validate_only = false;

    /**
     * @param string $name Required. The name of the instance configuration to be deleted.
     *                     Values are of the form
     *                     `projects/<project>/instanceConfigs/<instance_config>`
     *                     Please see {@see InstanceAdminClient::instanceConfigName()} for help formatting this field.
     *
     * @return \Google\Cloud\Spanner\Admin\Instance\V1\DeleteInstanceConfigRequest
     *
     * @experimental
     */
    public static function build(string $name): self
    {
        return (new self())
            ->setName($name);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The name of the instance configuration to be deleted.
     *           Values are of the form
     *           `projects/<project>/instanceConfigs/<instance_config>`
     *     @type string $etag
     *           Used for optimistic concurrency control as a way to help prevent
     *           simultaneous deletes of an instance config from overwriting each
     *           other. If not empty, the API
     *           only deletes the instance config when the etag provided matches the current
     *           status of the requested instance config. Otherwise, deletes the instance
     *           config without checking the current status of the requested instance
     *           config.
     *     @type bool $validate_only
     *           An option to validate, but not actually execute, a request,
     *           and provide the same response.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\Admin\Instance\V1\SpannerInstanceAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the instance configuration to be deleted.
     * Values are of the form
     * `projects/<project>/instanceConfigs/<instance_config>`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The name of the instance configuration to be deleted.
     * Values are of the form
     * `projects/<project>/instanceConfigs/<instance_config>`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Used for optimistic concurrency control as a way to help prevent
     * simultaneous deletes of an instance config from overwriting each
     * other. If not empty, the API
     * only deletes the instance config when the etag provided matches the current
     * status of the requested instance config. Otherwise, deletes the instance
     * config without checking the current status of the requested instance
     * config.
     *
     * Generated from protobuf field <code>string etag = 2;</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Used for optimistic concurrency control as a way to help prevent
     * simultaneous deletes of an instance config from overwriting each
     * other. If not empty, the API
     * only deletes the instance config when the etag provided matches the current
     * status of the requested instance config. Otherwise, deletes the instance
     * config without checking the current status of the requested instance
     * config.
     *
     * Generated from protobuf field <code>string etag = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

    /**
     * An option to validate, but not actually execute, a request,
     * and provide the same response.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * An option to validate, but not actually execute, a request,
     * and provide the same response.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

