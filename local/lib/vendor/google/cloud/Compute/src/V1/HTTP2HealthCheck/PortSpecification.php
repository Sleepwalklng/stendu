<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\HTTP2HealthCheck;

use UnexpectedValueException;

/**
 * Specifies how a port is selected for health checking. Can be one of the following values: USE_FIXED_PORT: Specifies a port number explicitly using the port field in the health check. Supported by backend services for pass-through load balancers and backend services for proxy load balancers. Not supported by target pools. The health check supports all backends supported by the backend service provided the backend can be health checked. For example, GCE_VM_IP network endpoint groups, GCE_VM_IP_PORT network endpoint groups, and instance group backends. USE_NAMED_PORT: Not supported. USE_SERVING_PORT: Provides an indirect method of specifying the health check port by referring to the backend service. Only supported by backend services for proxy load balancers. Not supported by target pools. Not supported by backend services for pass-through load balancers. Supports all backends that can be health checked; for example, GCE_VM_IP_PORT network endpoint groups and instance group backends. For GCE_VM_IP_PORT network endpoint group backends, the health check uses the port number specified for each endpoint in the network endpoint group. For instance group backends, the health check uses the port number determined by looking up the backend service's named port in the instance group's list of named ports.
 *
 * Protobuf type <code>google.cloud.compute.v1.HTTP2HealthCheck.PortSpecification</code>
 */
class PortSpecification
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_PORT_SPECIFICATION = 0;</code>
     */
    const UNDEFINED_PORT_SPECIFICATION = 0;
    /**
     * The port number in the health check's port is used for health checking. Applies to network endpoint group and instance group backends.
     *
     * Generated from protobuf enum <code>USE_FIXED_PORT = 190235748;</code>
     */
    const USE_FIXED_PORT = 190235748;
    /**
     * Not supported.
     *
     * Generated from protobuf enum <code>USE_NAMED_PORT = 349300671;</code>
     */
    const USE_NAMED_PORT = 349300671;
    /**
     * For network endpoint group backends, the health check uses the port number specified on each endpoint in the network endpoint group. For instance group backends, the health check uses the port number specified for the backend service's named port defined in the instance group's named ports.
     *
     * Generated from protobuf enum <code>USE_SERVING_PORT = 362637516;</code>
     */
    const USE_SERVING_PORT = 362637516;

    private static $valueToName = [
        self::UNDEFINED_PORT_SPECIFICATION => 'UNDEFINED_PORT_SPECIFICATION',
        self::USE_FIXED_PORT => 'USE_FIXED_PORT',
        self::USE_NAMED_PORT => 'USE_NAMED_PORT',
        self::USE_SERVING_PORT => 'USE_SERVING_PORT',
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


