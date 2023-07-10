<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/admin/v1alpha/event_create_and_edit.proto

namespace GPBMetadata\Google\Analytics\Admin\V1Alpha;

class EventCreateAndEdit
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�	
:google/analytics/admin/v1alpha/event_create_and_edit.protogoogle.analytics.admin.v1alphagoogle/api/resource.proto"I
ParameterMutation
	parameter (	B�A
parameter_value (	B�A"�
EventCreateRule
name (	B�A
destination_event (	B�AP
event_conditions (21.google.analytics.admin.v1alpha.MatchingConditionB�A
source_copy_parameters (N
parameter_mutations (21.google.analytics.admin.v1alpha.ParameterMutation:��A�
-analyticsadmin.googleapis.com/EventCreateRuleTproperties/{property}/dataStreams/{data_stream}/eventCreateRules/{event_create_rule}"�
MatchingCondition
field (	B�A^
comparison_type (2@.google.analytics.admin.v1alpha.MatchingCondition.ComparisonTypeB�A
value (	B�A
negated ("�
ComparisonType
COMPARISON_TYPE_UNSPECIFIED 

EQUALS
EQUALS_CASE_INSENSITIVE
CONTAINS
CONTAINS_CASE_INSENSITIVE
STARTS_WITH 
STARTS_WITH_CASE_INSENSITIVE
	ENDS_WITH
ENDS_WITH_CASE_INSENSITIVE
GREATER_THAN	
GREATER_THAN_OR_EQUAL

	LESS_THAN
LESS_THAN_OR_EQUAL
REGULAR_EXPRESSION\'
#REGULAR_EXPRESSION_CASE_INSENSITIVEBf
"com.google.analytics.admin.v1alphaPZ>cloud.google.com/go/analytics/admin/apiv1alpha/adminpb;adminpbbproto3'
        , true);

        static::$is_initialized = true;
    }
}

