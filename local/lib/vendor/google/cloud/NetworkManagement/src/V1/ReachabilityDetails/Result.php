<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/networkmanagement/v1/connectivity_test.proto

namespace Google\Cloud\NetworkManagement\V1\ReachabilityDetails;

use UnexpectedValueException;

/**
 * The overall result of the test's configuration analysis.
 *
 * Protobuf type <code>google.cloud.networkmanagement.v1.ReachabilityDetails.Result</code>
 */
class Result
{
    /**
     * No result was specified.
     *
     * Generated from protobuf enum <code>RESULT_UNSPECIFIED = 0;</code>
     */
    const RESULT_UNSPECIFIED = 0;
    /**
     * Possible scenarios are:
     * * The configuration analysis determined that a packet originating from
     *   the source is expected to reach the destination.
     * * The analysis didn't complete because the user lacks permission for
     *   some of the resources in the trace. However, at the time the user's
     *   permission became insufficient, the trace had been successful so far.
     *
     * Generated from protobuf enum <code>REACHABLE = 1;</code>
     */
    const REACHABLE = 1;
    /**
     * A packet originating from the source is expected to be dropped before
     * reaching the destination.
     *
     * Generated from protobuf enum <code>UNREACHABLE = 2;</code>
     */
    const UNREACHABLE = 2;
    /**
     * The source and destination endpoints do not uniquely identify
     * the test location in the network, and the reachability result contains
     * multiple traces. For some traces, a packet could be delivered, and for
     * others, it would not be.
     *
     * Generated from protobuf enum <code>AMBIGUOUS = 4;</code>
     */
    const AMBIGUOUS = 4;
    /**
     * The configuration analysis did not complete. Possible reasons are:
     * * A permissions error occurred--for example, the user might not have
     *   read permission for all of the resources named in the test.
     * * An internal error occurred.
     * * The analyzer received an invalid or unsupported argument or was unable
     *   to identify a known endpoint.
     *
     * Generated from protobuf enum <code>UNDETERMINED = 5;</code>
     */
    const UNDETERMINED = 5;

    private static $valueToName = [
        self::RESULT_UNSPECIFIED => 'RESULT_UNSPECIFIED',
        self::REACHABLE => 'REACHABLE',
        self::UNREACHABLE => 'UNREACHABLE',
        self::AMBIGUOUS => 'AMBIGUOUS',
        self::UNDETERMINED => 'UNDETERMINED',
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


