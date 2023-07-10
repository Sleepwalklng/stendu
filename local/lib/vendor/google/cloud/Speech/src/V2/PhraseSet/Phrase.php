<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/speech/v2/cloud_speech.proto

namespace Google\Cloud\Speech\V2\PhraseSet;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Phrase contains words and phrase "hints" so that the speech recognition
 * is more likely to recognize them. This can be used to improve the accuracy
 * for specific words and phrases, for example, if specific commands are
 * typically spoken by the user. This can also be used to add additional words
 * to the vocabulary of the recognizer.
 * List items can also include CustomClass references containing groups of
 * words that represent common concepts that occur in natural language.
 *
 * Generated from protobuf message <code>google.cloud.speech.v2.PhraseSet.Phrase</code>
 */
class Phrase extends \Google\Protobuf\Internal\Message
{
    /**
     * The phrase itself.
     *
     * Generated from protobuf field <code>string value = 1;</code>
     */
    private $value = '';
    /**
     * Hint Boost. Overrides the boost set at the phrase set level.
     * Positive value will increase the probability that a specific phrase will
     * be recognized over other similar sounding phrases. The higher the boost,
     * the higher the chance of false positive recognition as well. Negative
     * boost values would correspond to anti-biasing. Anti-biasing is not
     * enabled, so negative boost values will return an error. Boost values must
     * be between 0 and 20. Any values outside that range will return an error.
     * We recommend using a binary search approach to finding the optimal value
     * for your use case as well as adding phrases both with and without boost
     * to your requests.
     *
     * Generated from protobuf field <code>float boost = 2;</code>
     */
    private $boost = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $value
     *           The phrase itself.
     *     @type float $boost
     *           Hint Boost. Overrides the boost set at the phrase set level.
     *           Positive value will increase the probability that a specific phrase will
     *           be recognized over other similar sounding phrases. The higher the boost,
     *           the higher the chance of false positive recognition as well. Negative
     *           boost values would correspond to anti-biasing. Anti-biasing is not
     *           enabled, so negative boost values will return an error. Boost values must
     *           be between 0 and 20. Any values outside that range will return an error.
     *           We recommend using a binary search approach to finding the optimal value
     *           for your use case as well as adding phrases both with and without boost
     *           to your requests.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Speech\V2\CloudSpeech::initOnce();
        parent::__construct($data);
    }

    /**
     * The phrase itself.
     *
     * Generated from protobuf field <code>string value = 1;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * The phrase itself.
     *
     * Generated from protobuf field <code>string value = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

    /**
     * Hint Boost. Overrides the boost set at the phrase set level.
     * Positive value will increase the probability that a specific phrase will
     * be recognized over other similar sounding phrases. The higher the boost,
     * the higher the chance of false positive recognition as well. Negative
     * boost values would correspond to anti-biasing. Anti-biasing is not
     * enabled, so negative boost values will return an error. Boost values must
     * be between 0 and 20. Any values outside that range will return an error.
     * We recommend using a binary search approach to finding the optimal value
     * for your use case as well as adding phrases both with and without boost
     * to your requests.
     *
     * Generated from protobuf field <code>float boost = 2;</code>
     * @return float
     */
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * Hint Boost. Overrides the boost set at the phrase set level.
     * Positive value will increase the probability that a specific phrase will
     * be recognized over other similar sounding phrases. The higher the boost,
     * the higher the chance of false positive recognition as well. Negative
     * boost values would correspond to anti-biasing. Anti-biasing is not
     * enabled, so negative boost values will return an error. Boost values must
     * be between 0 and 20. Any values outside that range will return an error.
     * We recommend using a binary search approach to finding the optimal value
     * for your use case as well as adding phrases both with and without boost
     * to your requests.
     *
     * Generated from protobuf field <code>float boost = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setBoost($var)
    {
        GPBUtil::checkFloat($var);
        $this->boost = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Phrase::class, \Google\Cloud\Speech\V2\PhraseSet_Phrase::class);

