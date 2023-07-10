<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/alloydb/v1beta/service.proto

namespace GPBMetadata\Google\Cloud\Alloydb\V1Beta;

class Service
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
        \GPBMetadata\Google\Cloud\Alloydb\V1Beta\Resources::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�t
)google/cloud/alloydb/v1beta/service.protogoogle.cloud.alloydb.v1betagoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto+google/cloud/alloydb/v1beta/resources.proto#google/longrunning/operations.protogoogle/protobuf/duration.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.protogoogle/rpc/status.proto"�
ListClustersRequest6
parent (	B&�A�A alloydb.googleapis.com/Cluster
	page_size (B�A

page_token (	
filter (	B�A
order_by (	B�A"|
ListClustersResponse6
clusters (2$.google.cloud.alloydb.v1beta.Cluster
next_page_token (	
unreachable (	"�
GetClusterRequest4
name (	B&�A�A 
alloydb.googleapis.com/Cluster;
view (2(.google.cloud.alloydb.v1beta.ClusterViewB�A"�
CreateSecondaryClusterRequest6
parent (	B&�A�A alloydb.googleapis.com/Cluster

cluster_id (	B�A:
cluster (2$.google.cloud.alloydb.v1beta.ClusterB�A

request_id (	B�A
validate_only (B�A"�
CreateClusterRequest6
parent (	B&�A�A alloydb.googleapis.com/Cluster

cluster_id (	B�A:
cluster (2$.google.cloud.alloydb.v1beta.ClusterB�A

request_id (	B�A
validate_only (B�A"�
UpdateClusterRequest4
update_mask (2.google.protobuf.FieldMaskB�A:
cluster (2$.google.cloud.alloydb.v1beta.ClusterB�A

request_id (	B�A
validate_only (B�A
allow_missing (B�A"�
DeleteClusterRequest4
name (	B&�A�A 
alloydb.googleapis.com/Cluster

request_id (	B�A
etag (	B�A
validate_only (B�A
force (B�A"�
PromoteClusterRequest4
name (	B&�A�A 
alloydb.googleapis.com/Cluster

request_id (	B�A
etag (	B�A
validate_only (B�A"�
RestoreClusterRequestB
backup_source (2).google.cloud.alloydb.v1beta.BackupSourceH W
continuous_backup_source (23.google.cloud.alloydb.v1beta.ContinuousBackupSourceH 6
parent (	B&�A�A alloydb.googleapis.com/Cluster

cluster_id (	B�A:
cluster (2$.google.cloud.alloydb.v1beta.ClusterB�A

request_id (	B�A
validate_only (B�AB
source"�
ListInstancesRequest7
parent (	B\'�A�A!alloydb.googleapis.com/Instance
	page_size (B�A

page_token (	
filter (	B�A
order_by (	B�A"
ListInstancesResponse8
	instances (2%.google.cloud.alloydb.v1beta.Instance
next_page_token (	
unreachable (	"�
GetInstanceRequest5
name (	B\'�A�A!
alloydb.googleapis.com/Instance7
view (2).google.cloud.alloydb.v1beta.InstanceView"�
CreateInstanceRequest7
parent (	B\'�A�A!alloydb.googleapis.com/Instance
instance_id (	B�A<
instance (2%.google.cloud.alloydb.v1beta.InstanceB�A

request_id (	B�A
validate_only (B�A"�
CreateSecondaryInstanceRequest7
parent (	B\'�A�A!alloydb.googleapis.com/Instance
instance_id (	B�A<
instance (2%.google.cloud.alloydb.v1beta.InstanceB�A

request_id (	B�A
validate_only (B�A"s
CreateInstanceRequestsY
create_instance_requests (22.google.cloud.alloydb.v1beta.CreateInstanceRequestB�A"�
BatchCreateInstancesRequest7
parent (	B\'�A�A!alloydb.googleapis.com/InstanceJ
requests (23.google.cloud.alloydb.v1beta.CreateInstanceRequestsB�A

request_id (	B�A"X
BatchCreateInstancesResponse8
	instances (2%.google.cloud.alloydb.v1beta.Instance"�
BatchCreateInstancesMetadata
instance_targets (	j
instance_statuses (2O.google.cloud.alloydb.v1beta.BatchCreateInstancesMetadata.InstanceStatusesEntryo
InstanceStatusesEntry
key (	E
value (26.google.cloud.alloydb.v1beta.BatchCreateInstanceStatus:8"�
BatchCreateInstanceStatusK
state (2<.google.cloud.alloydb.v1beta.BatchCreateInstanceStatus.State
	error_msg (	!
error (2.google.rpc.Status@
type (22.google.cloud.alloydb.v1beta.Instance.InstanceType"v
State
STATE_UNSPECIFIED 
PENDING_CREATE	
READY
CREATING
DELETING

FAILED
ROLLED_BACK"�
UpdateInstanceRequest4
update_mask (2.google.protobuf.FieldMaskB�A<
instance (2%.google.cloud.alloydb.v1beta.InstanceB�A

request_id (	B�A
validate_only (B�A
allow_missing (B�A"�
DeleteInstanceRequest5
name (	B\'�A�A!
alloydb.googleapis.com/Instance

request_id (	B�A
etag (	B�A
validate_only (B�A"�
FailoverInstanceRequest5
name (	B\'�A�A!
alloydb.googleapis.com/Instance

request_id (	B�A
validate_only (B�A"�
InjectFaultRequestR

fault_type (29.google.cloud.alloydb.v1beta.InjectFaultRequest.FaultTypeB�A5
name (	B\'�A�A!
alloydb.googleapis.com/Instance

request_id (	B�A
validate_only (B�A"4
	FaultType
FAULT_TYPE_UNSPECIFIED 
STOP_VM"�
RestartInstanceRequest5
name (	B\'�A�A!
alloydb.googleapis.com/Instance

request_id (	B�A
validate_only (B�A"�
ListBackupsRequest5
parent (	B%�A�Aalloydb.googleapis.com/Backup
	page_size (

page_token (	
filter (	
order_by (	"y
ListBackupsResponse4
backups (2#.google.cloud.alloydb.v1beta.Backup
next_page_token (	
unreachable (	"G
GetBackupRequest3
name (	B%�A�A
alloydb.googleapis.com/Backup"�
CreateBackupRequest5
parent (	B%�A�Aalloydb.googleapis.com/Backup
	backup_id (	B�A8
backup (2#.google.cloud.alloydb.v1beta.BackupB�A

request_id (	B�A
validate_only (B�A"�
UpdateBackupRequest4
update_mask (2.google.protobuf.FieldMaskB�A8
backup (2#.google.cloud.alloydb.v1beta.BackupB�A

request_id (	B�A
validate_only (B�A
allow_missing (B�A"�
DeleteBackupRequest3
name (	B%�A�A
alloydb.googleapis.com/Backup

request_id (	B�A
validate_only (B�A
etag (	B�A"�
!ListSupportedDatabaseFlagsRequestD
parent (	B4�A�A.,alloydb.googleapis.com/SupportedDatabaseFlag
	page_size (

page_token (	"�
"ListSupportedDatabaseFlagsResponseT
supported_database_flags (22.google.cloud.alloydb.v1beta.SupportedDatabaseFlag
next_page_token (	"�
 GenerateClientCertificateRequest6
parent (	B&�A�A 
alloydb.googleapis.com/Cluster

request_id (	B�A
pem_csr (	B�A5
cert_duration (2.google.protobuf.DurationB�A

public_key (	B�A"{
!GenerateClientCertificateResponse
pem_certificate (	B�A"
pem_certificate_chain (	B�A
ca_cert (	B�A"l
GetConnectionInfoRequest7
parent (	B\'�A�A!
alloydb.googleapis.com/Instance

request_id (	B�A"�
OperationMetadatai
batch_create_instances_metadata (29.google.cloud.alloydb.v1beta.BatchCreateInstancesMetadataB�AH 4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�A
target (	B�A
verb (	B�A
status_message (	B�A#
requested_cancellation (B�A
api_version (	B�AB
request_specific"�
ListUsersRequest3
parent (	B#�A�Aalloydb.googleapis.com/User
	page_size (B�A

page_token (	B�A
filter (	B�A
order_by (	B�A"s
ListUsersResponse0
users (2!.google.cloud.alloydb.v1beta.User
next_page_token (	
unreachable (	"C
GetUserRequest1
name (	B#�A�A
alloydb.googleapis.com/User"�
CreateUserRequest3
parent (	B#�A�Aalloydb.googleapis.com/User
user_id (	B�A4
user (2!.google.cloud.alloydb.v1beta.UserB�A

request_id (	B�A
validate_only (B�A"�
UpdateUserRequest4
update_mask (2.google.protobuf.FieldMaskB�A4
user (2!.google.cloud.alloydb.v1beta.UserB�A

request_id (	B�A
validate_only (B�A
allow_missing (B�A"{
DeleteUserRequest1
name (	B#�A�A
alloydb.googleapis.com/User

request_id (	B�A
validate_only (B�A2�4
AlloyDBAdmin�
ListClusters0.google.cloud.alloydb.v1beta.ListClustersRequest1.google.cloud.alloydb.v1beta.ListClustersResponse"A���20/v1beta/{parent=projects/*/locations/*}/clusters�Aparent�

GetCluster..google.cloud.alloydb.v1beta.GetClusterRequest$.google.cloud.alloydb.v1beta.Cluster"?���20/v1beta/{name=projects/*/locations/*/clusters/*}�Aname�
CreateCluster1.google.cloud.alloydb.v1beta.CreateClusterRequest.google.longrunning.Operation"|���;"0/v1beta/{parent=projects/*/locations/*}/clusters:cluster�Aparent,cluster,cluster_id�A
ClusterOperationMetadata�
UpdateCluster1.google.cloud.alloydb.v1beta.UpdateClusterRequest.google.longrunning.Operation"~���C28/v1beta/{cluster.name=projects/*/locations/*/clusters/*}:cluster�Acluster,update_mask�A
ClusterOperationMetadata�
DeleteCluster1.google.cloud.alloydb.v1beta.DeleteClusterRequest.google.longrunning.Operation"l���2*0/v1beta/{name=projects/*/locations/*/clusters/*}�Aname�A*
google.protobuf.EmptyOperationMetadata�
PromoteCluster2.google.cloud.alloydb.v1beta.PromoteClusterRequest.google.longrunning.Operation"i���="8/v1beta/{name=projects/*/locations/*/clusters/*}:promote:*�Aname�A
ClusterOperationMetadata�
RestoreCluster2.google.cloud.alloydb.v1beta.RestoreClusterRequest.google.longrunning.Operation"b���="8/v1beta/{parent=projects/*/locations/*}/clusters:restore:*�A
ClusterOperationMetadata�
CreateSecondaryCluster:.google.cloud.alloydb.v1beta.CreateSecondaryClusterRequest.google.longrunning.Operation"����K"@/v1beta/{parent=projects/*/locations/*}/clusters:createsecondary:cluster�Aparent,cluster,cluster_id�A
ClusterOperationMetadata�
ListInstances1.google.cloud.alloydb.v1beta.ListInstancesRequest2.google.cloud.alloydb.v1beta.ListInstancesResponse"M���></v1beta/{parent=projects/*/locations/*/clusters/*}/instances�Aparent�
GetInstance/.google.cloud.alloydb.v1beta.GetInstanceRequest%.google.cloud.alloydb.v1beta.Instance"K���></v1beta/{name=projects/*/locations/*/clusters/*/instances/*}�Aname�
CreateInstance2.google.cloud.alloydb.v1beta.CreateInstanceRequest.google.longrunning.Operation"����H"</v1beta/{parent=projects/*/locations/*/clusters/*}/instances:instance�Aparent,instance,instance_id�A
InstanceOperationMetadata�
CreateSecondaryInstance;.google.cloud.alloydb.v1beta.CreateSecondaryInstanceRequest.google.longrunning.Operation"����X"L/v1beta/{parent=projects/*/locations/*/clusters/*}/instances:createsecondary:instance�Aparent,instance,instance_id�A
InstanceOperationMetadata�
BatchCreateInstances8.google.cloud.alloydb.v1beta.BatchCreateInstancesRequest.google.longrunning.Operation"����T"H/v1beta/{parent=projects/*/locations/*/clusters/*}/instances:batchCreate:requests�A1
BatchCreateInstancesResponseOperationMetadata�
UpdateInstance2.google.cloud.alloydb.v1beta.UpdateInstanceRequest.google.longrunning.Operation"����Q2E/v1beta/{instance.name=projects/*/locations/*/clusters/*/instances/*}:instance�Ainstance,update_mask�A
InstanceOperationMetadata�
DeleteInstance2.google.cloud.alloydb.v1beta.DeleteInstanceRequest.google.longrunning.Operation"x���>*</v1beta/{name=projects/*/locations/*/clusters/*/instances/*}�Aname�A*
google.protobuf.EmptyOperationMetadata�
FailoverInstance4.google.cloud.alloydb.v1beta.FailoverInstanceRequest.google.longrunning.Operation"w���J"E/v1beta/{name=projects/*/locations/*/clusters/*/instances/*}:failover:*�Aname�A
InstanceOperationMetadata�
InjectFault/.google.cloud.alloydb.v1beta.InjectFaultRequest.google.longrunning.Operation"����M"H/v1beta/{name=projects/*/locations/*/clusters/*/instances/*}:injectFault:*�Afault_type,name�A
InstanceOperationMetadata�
RestartInstance3.google.cloud.alloydb.v1beta.RestartInstanceRequest.google.longrunning.Operation"v���I"D/v1beta/{name=projects/*/locations/*/clusters/*/instances/*}:restart:*�Aname�A
InstanceOperationMetadata�
ListBackups/.google.cloud.alloydb.v1beta.ListBackupsRequest0.google.cloud.alloydb.v1beta.ListBackupsResponse"@���1//v1beta/{parent=projects/*/locations/*}/backups�Aparent�
	GetBackup-.google.cloud.alloydb.v1beta.GetBackupRequest#.google.cloud.alloydb.v1beta.Backup">���1//v1beta/{name=projects/*/locations/*/backups/*}�Aname�
CreateBackup0.google.cloud.alloydb.v1beta.CreateBackupRequest.google.longrunning.Operation"w���9"//v1beta/{parent=projects/*/locations/*}/backups:backup�Aparent,backup,backup_id�A
BackupOperationMetadata�
UpdateBackup0.google.cloud.alloydb.v1beta.UpdateBackupRequest.google.longrunning.Operation"y���@26/v1beta/{backup.name=projects/*/locations/*/backups/*}:backup�Abackup,update_mask�A
BackupOperationMetadata�
DeleteBackup0.google.cloud.alloydb.v1beta.DeleteBackupRequest.google.longrunning.Operation"k���1*//v1beta/{name=projects/*/locations/*/backups/*}�Aname�A*
google.protobuf.EmptyOperationMetadata�
ListSupportedDatabaseFlags>.google.cloud.alloydb.v1beta.ListSupportedDatabaseFlagsRequest?.google.cloud.alloydb.v1beta.ListSupportedDatabaseFlagsResponse"O���@>/v1beta/{parent=projects/*/locations/*}/supportedDatabaseFlags�Aparent�
GenerateClientCertificate=.google.cloud.alloydb.v1beta.GenerateClientCertificateRequest>.google.cloud.alloydb.v1beta.GenerateClientCertificateResponse"`���Q"L/v1beta/{parent=projects/*/locations/*/clusters/*}:generateClientCertificate:*�Aparent�
GetConnectionInfo5.google.cloud.alloydb.v1beta.GetConnectionInfoRequest+.google.cloud.alloydb.v1beta.ConnectionInfo"^���OM/v1beta/{parent=projects/*/locations/*/clusters/*/instances/*}/connectionInfo�Aparent�
	ListUsers-.google.cloud.alloydb.v1beta.ListUsersRequest..google.cloud.alloydb.v1beta.ListUsersResponse"I���:8/v1beta/{parent=projects/*/locations/*/clusters/*}/users�Aparent�
GetUser+.google.cloud.alloydb.v1beta.GetUserRequest!.google.cloud.alloydb.v1beta.User"G���:8/v1beta/{name=projects/*/locations/*/clusters/*/users/*}�Aname�

CreateUser..google.cloud.alloydb.v1beta.CreateUserRequest!.google.cloud.alloydb.v1beta.User"\\���@"8/v1beta/{parent=projects/*/locations/*/clusters/*}/users:user�Aparent,user,user_id�

UpdateUser..google.cloud.alloydb.v1beta.UpdateUserRequest!.google.cloud.alloydb.v1beta.User"^���E2=/v1beta/{user.name=projects/*/locations/*/clusters/*/users/*}:user�Auser,update_mask�

DeleteUser..google.cloud.alloydb.v1beta.DeleteUserRequest.google.protobuf.Empty"G���:*8/v1beta/{name=projects/*/locations/*/clusters/*/users/*}�AnameJ�Aalloydb.googleapis.com�A.https://www.googleapis.com/auth/cloud-platformB�
com.google.cloud.alloydb.v1betaBServiceProtoPZ9cloud.google.com/go/alloydb/apiv1beta/alloydbpb;alloydbpb�Google.Cloud.AlloyDb.V1Beta�Google\\Cloud\\AlloyDb\\V1beta�Google::Cloud::AlloyDB::V1betabproto3'
        , true);

        static::$is_initialized = true;
    }
}

