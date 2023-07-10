<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/livestream/v1/resources.proto

namespace Google\Cloud\Video\LiveStream\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Properties of the audio stream.
 *
 * Generated from protobuf message <code>google.cloud.video.livestream.v1.AudioStreamProperty</code>
 */
class AudioStreamProperty extends \Google\Protobuf\Internal\Message
{
    /**
     * Index of this audio stream.
     *
     * Generated from protobuf field <code>int32 index = 1;</code>
     */
    private $index = 0;
    /**
     * Properties of the audio format.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.AudioFormat audio_format = 2;</code>
     */
    private $audio_format = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $index
     *           Index of this audio stream.
     *     @type \Google\Cloud\Video\LiveStream\V1\AudioFormat $audio_format
     *           Properties of the audio format.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Livestream\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Index of this audio stream.
     *
     * Generated from protobuf field <code>int32 index = 1;</code>
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Index of this audio stream.
     *
     * Generated from protobuf field <code>int32 index = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setIndex($var)
    {
        GPBUtil::checkInt32($var);
        $this->index = $var;

        return $this;
    }

    /**
     * Properties of the audio format.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.AudioFormat audio_format = 2;</code>
     * @return \Google\Cloud\Video\LiveStream\V1\AudioFormat|null
     */
    public function getAudioFormat()
    {
        return $this->audio_format;
    }

    public function hasAudioFormat()
    {
        return isset($this->audio_format);
    }

    public function clearAudioFormat()
    {
        unset($this->audio_format);
    }

    /**
     * Properties of the audio format.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.AudioFormat audio_format = 2;</code>
     * @param \Google\Cloud\Video\LiveStream\V1\AudioFormat $var
     * @return $this
     */
    public function setAudioFormat($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\LiveStream\V1\AudioFormat::class);
        $this->audio_format = $var;

        return $this;
    }

}

