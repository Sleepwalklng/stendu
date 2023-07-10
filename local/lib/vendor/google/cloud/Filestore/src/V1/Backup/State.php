<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/filestore/v1/cloud_filestore_service.proto

namespace Google\Cloud\Filestore\V1\Backup;

use UnexpectedValueException;

/**
 * The backup state.
 *
 * Protobuf type <code>google.cloud.filestore.v1.Backup.State</code>
 */
class State
{
    /**
     * State not set.
     *
     * Generated from protobuf enum <code>STATE_UNSPECIFIED = 0;</code>
     */
    const STATE_UNSPECIFIED = 0;
    /**
     * Backup is being created.
     *
     * Generated from protobuf enum <code>CREATING = 1;</code>
     */
    const CREATING = 1;
    /**
     * Backup has been taken and the operation is being finalized. At this
     * point, changes to the file share will not be reflected in the backup.
     *
     * Generated from protobuf enum <code>FINALIZING = 2;</code>
     */
    const FINALIZING = 2;
    /**
     * Backup is available for use.
     *
     * Generated from protobuf enum <code>READY = 3;</code>
     */
    const READY = 3;
    /**
     * Backup is being deleted.
     *
     * Generated from protobuf enum <code>DELETING = 4;</code>
     */
    const DELETING = 4;

    private static $valueToName = [
        self::STATE_UNSPECIFIED => 'STATE_UNSPECIFIED',
        self::CREATING => 'CREATING',
        self::FINALIZING => 'FINALIZING',
        self::READY => 'READY',
        self::DELETING => 'DELETING',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


