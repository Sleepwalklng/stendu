<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/tasks/v2/target.proto

namespace Google\Cloud\Tasks\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains information needed for generating an
 * [OAuth token](https://developers.google.com/identity/protocols/OAuth2).
 * This type of authorization should generally only be used when calling Google
 * APIs hosted on *.googleapis.com.
 *
 * Generated from protobuf message <code>google.cloud.tasks.v2.OAuthToken</code>
 */
class OAuthToken extends \Google\Protobuf\Internal\Message
{
    /**
     * [Service account email](https://cloud.google.com/iam/docs/service-accounts)
     * to be used for generating OAuth token.
     * The service account must be within the same project as the queue. The
     * caller must have iam.serviceAccounts.actAs permission for the service
     * account.
     *
     * Generated from protobuf field <code>string service_account_email = 1;</code>
     */
    private $service_account_email = '';
    /**
     * OAuth scope to be used for generating OAuth access token.
     * If not specified, "https://www.googleapis.com/auth/cloud-platform"
     * will be used.
     *
     * Generated from protobuf field <code>string scope = 2;</code>
     */
    private $scope = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $service_account_email
     *           [Service account email](https://cloud.google.com/iam/docs/service-accounts)
     *           to be used for generating OAuth token.
     *           The service account must be within the same project as the queue. The
     *           caller must have iam.serviceAccounts.actAs permission for the service
     *           account.
     *     @type string $scope
     *           OAuth scope to be used for generating OAuth access token.
     *           If not specified, "https://www.googleapis.com/auth/cloud-platform"
     *           will be used.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Tasks\V2\Target::initOnce();
        parent::__construct($data);
    }

    /**
     * [Service account email](https://cloud.google.com/iam/docs/service-accounts)
     * to be used for generating OAuth token.
     * The service account must be within the same project as the queue. The
     * caller must have iam.serviceAccounts.actAs permission for the service
     * account.
     *
     * Generated from protobuf field <code>string service_account_email = 1;</code>
     * @return string
     */
    public function getServiceAccountEmail()
    {
        return $this->service_account_email;
    }

    /**
     * [Service account email](https://cloud.google.com/iam/docs/service-accounts)
     * to be used for generating OAuth token.
     * The service account must be within the same project as the queue. The
     * caller must have iam.serviceAccounts.actAs permission for the service
     * account.
     *
     * Generated from protobuf field <code>string service_account_email = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setServiceAccountEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->service_account_email = $var;

        return $this;
    }

    /**
     * OAuth scope to be used for generating OAuth access token.
     * If not specified, "https://www.googleapis.com/auth/cloud-platform"
     * will be used.
     *
     * Generated from protobuf field <code>string scope = 2;</code>
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * OAuth scope to be used for generating OAuth access token.
     * If not specified, "https://www.googleapis.com/auth/cloud-platform"
     * will be used.
     *
     * Generated from protobuf field <code>string scope = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setScope($var)
    {
        GPBUtil::checkString($var, True);
        $this->scope = $var;

        return $this;
    }

}

