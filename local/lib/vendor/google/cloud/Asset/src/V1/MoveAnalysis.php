<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/asset/v1/asset_service.proto

namespace Google\Cloud\Asset\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A message to group the analysis information.
 *
 * Generated from protobuf message <code>google.cloud.asset.v1.MoveAnalysis</code>
 */
class MoveAnalysis extends \Google\Protobuf\Internal\Message
{
    /**
     * The user friendly display name of the analysis. E.g. IAM, organization
     * policy etc.
     *
     * Generated from protobuf field <code>string display_name = 1;</code>
     */
    private $display_name = '';
    protected $result;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $display_name
     *           The user friendly display name of the analysis. E.g. IAM, organization
     *           policy etc.
     *     @type \Google\Cloud\Asset\V1\MoveAnalysisResult $analysis
     *           Analysis result of moving the target resource.
     *     @type \Google\Rpc\Status $error
     *           Description of error encountered when performing the analysis.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Asset\V1\AssetService::initOnce();
        parent::__construct($data);
    }

    /**
     * The user friendly display name of the analysis. E.g. IAM, organization
     * policy etc.
     *
     * Generated from protobuf field <code>string display_name = 1;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * The user friendly display name of the analysis. E.g. IAM, organization
     * policy etc.
     *
     * Generated from protobuf field <code>string display_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Analysis result of moving the target resource.
     *
     * Generated from protobuf field <code>.google.cloud.asset.v1.MoveAnalysisResult analysis = 2;</code>
     * @return \Google\Cloud\Asset\V1\MoveAnalysisResult|null
     */
    public function getAnalysis()
    {
        return $this->readOneof(2);
    }

    public function hasAnalysis()
    {
        return $this->hasOneof(2);
    }

    /**
     * Analysis result of moving the target resource.
     *
     * Generated from protobuf field <code>.google.cloud.asset.v1.MoveAnalysisResult analysis = 2;</code>
     * @param \Google\Cloud\Asset\V1\MoveAnalysisResult $var
     * @return $this
     */
    public function setAnalysis($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Asset\V1\MoveAnalysisResult::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Description of error encountered when performing the analysis.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 3;</code>
     * @return \Google\Rpc\Status|null
     */
    public function getError()
    {
        return $this->readOneof(3);
    }

    public function hasError()
    {
        return $this->hasOneof(3);
    }

    /**
     * Description of error encountered when performing the analysis.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 3;</code>
     * @param \Google\Rpc\Status $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Google\Rpc\Status::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->whichOneof("result");
    }

}

