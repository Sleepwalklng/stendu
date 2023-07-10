<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/resourcemanager/v3/tag_bindings.proto

namespace GPBMetadata\Google\Cloud\Resourcemanager\V3;

class TagBindings
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
2google/cloud/resourcemanager/v3/tag_bindings.protogoogle.cloud.resourcemanager.v3google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto#google/longrunning/operations.protogoogle/protobuf/empty.proto"�

TagBinding
name (	B�A
parent (	
	tag_value (	!
tag_value_namespaced_name (	:N�AK
.cloudresourcemanager.googleapis.com/TagBindingtagBindings/{tag_binding}"
CreateTagBindingMetadata"|
CreateTagBindingRequestE
tag_binding (2+.google.cloud.resourcemanager.v3.TagBindingB�A
validate_only (B�A"
DeleteTagBindingMetadata"_
DeleteTagBindingRequestD
name (	B6�A�A0
.cloudresourcemanager.googleapis.com/TagBinding"d
ListTagBindingsRequest
parent (	B	�A�A*
	page_size (B�A

page_token (	B�A"u
ListTagBindingsResponseA
tag_bindings (2+.google.cloud.resourcemanager.v3.TagBinding
next_page_token (	"`
ListEffectiveTagsRequest
parent (	B�A
	page_size (B�A

page_token (	B�A"{
ListEffectiveTagsResponseE
effective_tags (2-.google.cloud.resourcemanager.v3.EffectiveTag
next_page_token (	"�
EffectiveTagD
	tag_value (	B1�A.
,cloudresourcemanager.googleapis.com/TagValue
namespaced_tag_value (	@
tag_key (	B/�A,
*cloudresourcemanager.googleapis.com/TagKey
namespaced_tag_key (	
tag_key_parent_name (	
	inherited (2�
TagBindings�
ListTagBindings7.google.cloud.resourcemanager.v3.ListTagBindingsRequest8.google.cloud.resourcemanager.v3.ListTagBindingsResponse" ���/v3/tagBindings�Aparent�
CreateTagBinding8.google.cloud.resourcemanager.v3.CreateTagBindingRequest.google.longrunning.Operation"[���"/v3/tagBindings:tag_binding�Atag_binding�A&

TagBindingCreateTagBindingMetadata�
DeleteTagBinding8.google.cloud.resourcemanager.v3.DeleteTagBindingRequest.google.longrunning.Operation"\\���*/v3/{name=tagBindings/**}�Aname�A1
google.protobuf.EmptyDeleteTagBindingMetadata�
ListEffectiveTags9.google.cloud.resourcemanager.v3.ListEffectiveTagsRequest:.google.cloud.resourcemanager.v3.ListEffectiveTagsResponse""���/v3/effectiveTags�Aparent��A#cloudresourcemanager.googleapis.com�Aghttps://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/cloud-platform.read-onlyB�
#com.google.cloud.resourcemanager.v3BTagBindingsProtoPZMcloud.google.com/go/resourcemanager/apiv3/resourcemanagerpb;resourcemanagerpb�Google.Cloud.ResourceManager.V3�Google\\Cloud\\ResourceManager\\V3�"Google::Cloud::ResourceManager::V3bproto3'
        , true);

        static::$is_initialized = true;
    }
}

