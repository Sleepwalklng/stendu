<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/videointelligence/v1beta2/video_intelligence.proto

namespace Google\Cloud\VideoIntelligence\V1beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Video segment level annotation results for face detection.
 *
 * Generated from protobuf message <code>google.cloud.videointelligence.v1beta2.FaceSegment</code>
 */
class FaceSegment extends \Google\Protobuf\Internal\Message
{
    /**
     * Video segment where a face was detected.
     *
     * Generated from protobuf field <code>.google.cloud.videointelligence.v1beta2.VideoSegment segment = 1;</code>
     */
    private $segment = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\VideoIntelligence\V1beta2\VideoSegment $segment
     *           Video segment where a face was detected.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Videointelligence\V1Beta2\VideoIntelligence::initOnce();
        parent::__construct($data);
    }

    /**
     * Video segment where a face was detected.
     *
     * Generated from protobuf field <code>.google.cloud.videointelligence.v1beta2.VideoSegment segment = 1;</code>
     * @return \Google\Cloud\VideoIntelligence\V1beta2\VideoSegment|null
     */
    public function getSegment()
    {
        return $this->segment;
    }

    public function hasSegment()
    {
        return isset($this->segment);
    }

    public function clearSegment()
    {
        unset($this->segment);
    }

    /**
     * Video segment where a face was detected.
     *
     * Generated from protobuf field <code>.google.cloud.videointelligence.v1beta2.VideoSegment segment = 1;</code>
     * @param \Google\Cloud\VideoIntelligence\V1beta2\VideoSegment $var
     * @return $this
     */
    public function setSegment($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\VideoIntelligence\V1beta2\VideoSegment::class);
        $this->segment = $var;

        return $this;
    }

}

