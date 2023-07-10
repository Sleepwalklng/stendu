<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/alloydb/v1beta/resources.proto

namespace Google\Cloud\AlloyDb\V1beta\User;

use UnexpectedValueException;

/**
 * Enum that details the user type.
 *
 * Protobuf type <code>google.cloud.alloydb.v1beta.User.UserType</code>
 */
class UserType
{
    /**
     * Unspecified user type.
     *
     * Generated from protobuf enum <code>USER_TYPE_UNSPECIFIED = 0;</code>
     */
    const USER_TYPE_UNSPECIFIED = 0;
    /**
     * The default user type that authenticates via password-based
     * authentication.
     *
     * Generated from protobuf enum <code>ALLOYDB_BUILT_IN = 1;</code>
     */
    const ALLOYDB_BUILT_IN = 1;
    /**
     * Database user that can authenticate via IAM-Based authentication.
     *
     * Generated from protobuf enum <code>ALLOYDB_IAM_USER = 2;</code>
     */
    const ALLOYDB_IAM_USER = 2;

    private static $valueToName = [
        self::USER_TYPE_UNSPECIFIED => 'USER_TYPE_UNSPECIFIED',
        self::ALLOYDB_BUILT_IN => 'ALLOYDB_BUILT_IN',
        self::ALLOYDB_IAM_USER => 'ALLOYDB_IAM_USER',
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


