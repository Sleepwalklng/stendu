<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gkehub/v1/configmanagement/configmanagement.proto

namespace Google\Cloud\GkeHub\ConfigManagement\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Specific versioning information pertaining to ConfigSync's Pods
 *
 * Generated from protobuf message <code>google.cloud.gkehub.configmanagement.v1.ConfigSyncVersion</code>
 */
class ConfigSyncVersion extends \Google\Protobuf\Internal\Message
{
    /**
     * Version of the deployed importer pod
     *
     * Generated from protobuf field <code>string importer = 1;</code>
     */
    private $importer = '';
    /**
     * Version of the deployed syncer pod
     *
     * Generated from protobuf field <code>string syncer = 2;</code>
     */
    private $syncer = '';
    /**
     * Version of the deployed git-sync pod
     *
     * Generated from protobuf field <code>string git_sync = 3;</code>
     */
    private $git_sync = '';
    /**
     * Version of the deployed monitor pod
     *
     * Generated from protobuf field <code>string monitor = 4;</code>
     */
    private $monitor = '';
    /**
     * Version of the deployed reconciler-manager pod
     *
     * Generated from protobuf field <code>string reconciler_manager = 5;</code>
     */
    private $reconciler_manager = '';
    /**
     * Version of the deployed reconciler container in root-reconciler pod
     *
     * Generated from protobuf field <code>string root_reconciler = 6;</code>
     */
    private $root_reconciler = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $importer
     *           Version of the deployed importer pod
     *     @type string $syncer
     *           Version of the deployed syncer pod
     *     @type string $git_sync
     *           Version of the deployed git-sync pod
     *     @type string $monitor
     *           Version of the deployed monitor pod
     *     @type string $reconciler_manager
     *           Version of the deployed reconciler-manager pod
     *     @type string $root_reconciler
     *           Version of the deployed reconciler container in root-reconciler pod
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Gkehub\V1\Configmanagement\Configmanagement::initOnce();
        parent::__construct($data);
    }

    /**
     * Version of the deployed importer pod
     *
     * Generated from protobuf field <code>string importer = 1;</code>
     * @return string
     */
    public function getImporter()
    {
        return $this->importer;
    }

    /**
     * Version of the deployed importer pod
     *
     * Generated from protobuf field <code>string importer = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setImporter($var)
    {
        GPBUtil::checkString($var, True);
        $this->importer = $var;

        return $this;
    }

    /**
     * Version of the deployed syncer pod
     *
     * Generated from protobuf field <code>string syncer = 2;</code>
     * @return string
     */
    public function getSyncer()
    {
        return $this->syncer;
    }

    /**
     * Version of the deployed syncer pod
     *
     * Generated from protobuf field <code>string syncer = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setSyncer($var)
    {
        GPBUtil::checkString($var, True);
        $this->syncer = $var;

        return $this;
    }

    /**
     * Version of the deployed git-sync pod
     *
     * Generated from protobuf field <code>string git_sync = 3;</code>
     * @return string
     */
    public function getGitSync()
    {
        return $this->git_sync;
    }

    /**
     * Version of the deployed git-sync pod
     *
     * Generated from protobuf field <code>string git_sync = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setGitSync($var)
    {
        GPBUtil::checkString($var, True);
        $this->git_sync = $var;

        return $this;
    }

    /**
     * Version of the deployed monitor pod
     *
     * Generated from protobuf field <code>string monitor = 4;</code>
     * @return string
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * Version of the deployed monitor pod
     *
     * Generated from protobuf field <code>string monitor = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setMonitor($var)
    {
        GPBUtil::checkString($var, True);
        $this->monitor = $var;

        return $this;
    }

    /**
     * Version of the deployed reconciler-manager pod
     *
     * Generated from protobuf field <code>string reconciler_manager = 5;</code>
     * @return string
     */
    public function getReconcilerManager()
    {
        return $this->reconciler_manager;
    }

    /**
     * Version of the deployed reconciler-manager pod
     *
     * Generated from protobuf field <code>string reconciler_manager = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setReconcilerManager($var)
    {
        GPBUtil::checkString($var, True);
        $this->reconciler_manager = $var;

        return $this;
    }

    /**
     * Version of the deployed reconciler container in root-reconciler pod
     *
     * Generated from protobuf field <code>string root_reconciler = 6;</code>
     * @return string
     */
    public function getRootReconciler()
    {
        return $this->root_reconciler;
    }

    /**
     * Version of the deployed reconciler container in root-reconciler pod
     *
     * Generated from protobuf field <code>string root_reconciler = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setRootReconciler($var)
    {
        GPBUtil::checkString($var, True);
        $this->root_reconciler = $var;

        return $this;
    }

}

