<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/v1/spanner.proto

namespace Google\Cloud\Spanner\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request for [BeginTransaction][google.spanner.v1.Spanner.BeginTransaction].
 *
 * Generated from protobuf message <code>google.spanner.v1.BeginTransactionRequest</code>
 */
class BeginTransactionRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The session in which the transaction runs.
     *
     * Generated from protobuf field <code>string session = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $session = '';
    /**
     * Required. Options for the new transaction.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions options = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $options = null;
    /**
     * Common options for this request.
     * Priority is ignored for this request. Setting the priority in this
     * request_options struct will not do anything. To set the priority for a
     * transaction, set it on the reads and writes that are part of this
     * transaction instead.
     *
     * Generated from protobuf field <code>.google.spanner.v1.RequestOptions request_options = 3;</code>
     */
    private $request_options = null;

    /**
     * @param string                                      $session Required. The session in which the transaction runs. Please see
     *                                                             {@see SpannerClient::sessionName()} for help formatting this field.
     * @param \Google\Cloud\Spanner\V1\TransactionOptions $options Required. Options for the new transaction.
     *
     * @return \Google\Cloud\Spanner\V1\BeginTransactionRequest
     *
     * @experimental
     */
    public static function build(string $session, \Google\Cloud\Spanner\V1\TransactionOptions $options): self
    {
        return (new self())
            ->setSession($session)
            ->setOptions($options);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $session
     *           Required. The session in which the transaction runs.
     *     @type \Google\Cloud\Spanner\V1\TransactionOptions $options
     *           Required. Options for the new transaction.
     *     @type \Google\Cloud\Spanner\V1\RequestOptions $request_options
     *           Common options for this request.
     *           Priority is ignored for this request. Setting the priority in this
     *           request_options struct will not do anything. To set the priority for a
     *           transaction, set it on the reads and writes that are part of this
     *           transaction instead.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\V1\Spanner::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The session in which the transaction runs.
     *
     * Generated from protobuf field <code>string session = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Required. The session in which the transaction runs.
     *
     * Generated from protobuf field <code>string session = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setSession($var)
    {
        GPBUtil::checkString($var, True);
        $this->session = $var;

        return $this;
    }

    /**
     * Required. Options for the new transaction.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions options = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Spanner\V1\TransactionOptions|null
     */
    public function getOptions()
    {
        return $this->options;
    }

    public function hasOptions()
    {
        return isset($this->options);
    }

    public function clearOptions()
    {
        unset($this->options);
    }

    /**
     * Required. Options for the new transaction.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions options = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Spanner\V1\TransactionOptions $var
     * @return $this
     */
    public function setOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\TransactionOptions::class);
        $this->options = $var;

        return $this;
    }

    /**
     * Common options for this request.
     * Priority is ignored for this request. Setting the priority in this
     * request_options struct will not do anything. To set the priority for a
     * transaction, set it on the reads and writes that are part of this
     * transaction instead.
     *
     * Generated from protobuf field <code>.google.spanner.v1.RequestOptions request_options = 3;</code>
     * @return \Google\Cloud\Spanner\V1\RequestOptions|null
     */
    public function getRequestOptions()
    {
        return $this->request_options;
    }

    public function hasRequestOptions()
    {
        return isset($this->request_options);
    }

    public function clearRequestOptions()
    {
        unset($this->request_options);
    }

    /**
     * Common options for this request.
     * Priority is ignored for this request. Setting the priority in this
     * request_options struct will not do anything. To set the priority for a
     * transaction, set it on the reads and writes that are part of this
     * transaction instead.
     *
     * Generated from protobuf field <code>.google.spanner.v1.RequestOptions request_options = 3;</code>
     * @param \Google\Cloud\Spanner\V1\RequestOptions $var
     * @return $this
     */
    public function setRequestOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\RequestOptions::class);
        $this->request_options = $var;

        return $this;
    }

}

