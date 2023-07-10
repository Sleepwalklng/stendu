<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/notebooks/v1/execution.proto

namespace Google\Cloud\Notebooks\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The description a notebook execution workload.
 *
 * Generated from protobuf message <code>google.cloud.notebooks.v1.ExecutionTemplate</code>
 */
class ExecutionTemplate extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Scale tier of the hardware used for notebook execution.
     * DEPRECATED Will be discontinued. As right now only CUSTOM is supported.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.ScaleTier scale_tier = 1 [deprecated = true, (.google.api.field_behavior) = REQUIRED];</code>
     * @deprecated
     */
    protected $scale_tier = 0;
    /**
     * Specifies the type of virtual machine to use for your training
     * job's master worker. You must specify this field when `scaleTier` is set to
     * `CUSTOM`.
     * You can use certain Compute Engine machine types directly in this field.
     * The following types are supported:
     * - `n1-standard-4`
     * - `n1-standard-8`
     * - `n1-standard-16`
     * - `n1-standard-32`
     * - `n1-standard-64`
     * - `n1-standard-96`
     * - `n1-highmem-2`
     * - `n1-highmem-4`
     * - `n1-highmem-8`
     * - `n1-highmem-16`
     * - `n1-highmem-32`
     * - `n1-highmem-64`
     * - `n1-highmem-96`
     * - `n1-highcpu-16`
     * - `n1-highcpu-32`
     * - `n1-highcpu-64`
     * - `n1-highcpu-96`
     * Alternatively, you can use the following legacy machine types:
     * - `standard`
     * - `large_model`
     * - `complex_model_s`
     * - `complex_model_m`
     * - `complex_model_l`
     * - `standard_gpu`
     * - `complex_model_m_gpu`
     * - `complex_model_l_gpu`
     * - `standard_p100`
     * - `complex_model_m_p100`
     * - `standard_v100`
     * - `large_model_v100`
     * - `complex_model_m_v100`
     * - `complex_model_l_v100`
     * Finally, if you want to use a TPU for training, specify `cloud_tpu` in this
     * field. Learn more about the [special configuration options for training
     * with
     * TPU](https://cloud.google.com/ai-platform/training/docs/using-tpus#configuring_a_custom_tpu_machine).
     *
     * Generated from protobuf field <code>string master_type = 2;</code>
     */
    private $master_type = '';
    /**
     * Configuration (count and accelerator type) for hardware running notebook
     * execution.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.SchedulerAcceleratorConfig accelerator_config = 3;</code>
     */
    private $accelerator_config = null;
    /**
     * Labels for execution.
     * If execution is scheduled, a field included will be 'nbs-scheduled'.
     * Otherwise, it is an immediate execution, and an included field will be
     * 'nbs-immediate'. Use fields to efficiently index between various types of
     * executions.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4;</code>
     */
    private $labels;
    /**
     * Path to the notebook file to execute.
     * Must be in a Google Cloud Storage bucket.
     * Format: `gs://{bucket_name}/{folder}/{notebook_file_name}`
     * Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook.ipynb`
     *
     * Generated from protobuf field <code>string input_notebook_file = 5;</code>
     */
    private $input_notebook_file = '';
    /**
     * Container Image URI to a DLVM
     * Example: 'gcr.io/deeplearning-platform-release/base-cu100'
     * More examples can be found at:
     * https://cloud.google.com/ai-platform/deep-learning-containers/docs/choosing-container
     *
     * Generated from protobuf field <code>string container_image_uri = 6;</code>
     */
    private $container_image_uri = '';
    /**
     * Path to the notebook folder to write to.
     * Must be in a Google Cloud Storage bucket path.
     * Format: `gs://{bucket_name}/{folder}`
     * Ex: `gs://notebook_user/scheduled_notebooks`
     *
     * Generated from protobuf field <code>string output_notebook_folder = 7;</code>
     */
    private $output_notebook_folder = '';
    /**
     * Parameters to be overridden in the notebook during execution.
     * Ref https://papermill.readthedocs.io/en/latest/usage-parameterize.html on
     * how to specifying parameters in the input notebook and pass them here
     * in an YAML file.
     * Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook_params.yaml`
     *
     * Generated from protobuf field <code>string params_yaml_file = 8;</code>
     */
    private $params_yaml_file = '';
    /**
     * Parameters used within the 'input_notebook_file' notebook.
     *
     * Generated from protobuf field <code>string parameters = 9;</code>
     */
    private $parameters = '';
    /**
     * The email address of a service account to use when running the execution.
     * You must have the `iam.serviceAccounts.actAs` permission for the specified
     * service account.
     *
     * Generated from protobuf field <code>string service_account = 10;</code>
     */
    private $service_account = '';
    /**
     * The type of Job to be used on this execution.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.JobType job_type = 11;</code>
     */
    private $job_type = 0;
    /**
     * Name of the kernel spec to use. This must be specified if the
     * kernel spec name on the execution target does not match the name in the
     * input notebook file.
     *
     * Generated from protobuf field <code>string kernel_spec = 14;</code>
     */
    private $kernel_spec = '';
    /**
     * The name of a Vertex AI [Tensorboard] resource to which this execution
     * will upload Tensorboard logs.
     * Format:
     * `projects/{project}/locations/{location}/tensorboards/{tensorboard}`
     *
     * Generated from protobuf field <code>string tensorboard = 15 [(.google.api.resource_reference) = {</code>
     */
    private $tensorboard = '';
    protected $job_parameters;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $scale_tier
     *           Required. Scale tier of the hardware used for notebook execution.
     *           DEPRECATED Will be discontinued. As right now only CUSTOM is supported.
     *     @type string $master_type
     *           Specifies the type of virtual machine to use for your training
     *           job's master worker. You must specify this field when `scaleTier` is set to
     *           `CUSTOM`.
     *           You can use certain Compute Engine machine types directly in this field.
     *           The following types are supported:
     *           - `n1-standard-4`
     *           - `n1-standard-8`
     *           - `n1-standard-16`
     *           - `n1-standard-32`
     *           - `n1-standard-64`
     *           - `n1-standard-96`
     *           - `n1-highmem-2`
     *           - `n1-highmem-4`
     *           - `n1-highmem-8`
     *           - `n1-highmem-16`
     *           - `n1-highmem-32`
     *           - `n1-highmem-64`
     *           - `n1-highmem-96`
     *           - `n1-highcpu-16`
     *           - `n1-highcpu-32`
     *           - `n1-highcpu-64`
     *           - `n1-highcpu-96`
     *           Alternatively, you can use the following legacy machine types:
     *           - `standard`
     *           - `large_model`
     *           - `complex_model_s`
     *           - `complex_model_m`
     *           - `complex_model_l`
     *           - `standard_gpu`
     *           - `complex_model_m_gpu`
     *           - `complex_model_l_gpu`
     *           - `standard_p100`
     *           - `complex_model_m_p100`
     *           - `standard_v100`
     *           - `large_model_v100`
     *           - `complex_model_m_v100`
     *           - `complex_model_l_v100`
     *           Finally, if you want to use a TPU for training, specify `cloud_tpu` in this
     *           field. Learn more about the [special configuration options for training
     *           with
     *           TPU](https://cloud.google.com/ai-platform/training/docs/using-tpus#configuring_a_custom_tpu_machine).
     *     @type \Google\Cloud\Notebooks\V1\ExecutionTemplate\SchedulerAcceleratorConfig $accelerator_config
     *           Configuration (count and accelerator type) for hardware running notebook
     *           execution.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Labels for execution.
     *           If execution is scheduled, a field included will be 'nbs-scheduled'.
     *           Otherwise, it is an immediate execution, and an included field will be
     *           'nbs-immediate'. Use fields to efficiently index between various types of
     *           executions.
     *     @type string $input_notebook_file
     *           Path to the notebook file to execute.
     *           Must be in a Google Cloud Storage bucket.
     *           Format: `gs://{bucket_name}/{folder}/{notebook_file_name}`
     *           Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook.ipynb`
     *     @type string $container_image_uri
     *           Container Image URI to a DLVM
     *           Example: 'gcr.io/deeplearning-platform-release/base-cu100'
     *           More examples can be found at:
     *           https://cloud.google.com/ai-platform/deep-learning-containers/docs/choosing-container
     *     @type string $output_notebook_folder
     *           Path to the notebook folder to write to.
     *           Must be in a Google Cloud Storage bucket path.
     *           Format: `gs://{bucket_name}/{folder}`
     *           Ex: `gs://notebook_user/scheduled_notebooks`
     *     @type string $params_yaml_file
     *           Parameters to be overridden in the notebook during execution.
     *           Ref https://papermill.readthedocs.io/en/latest/usage-parameterize.html on
     *           how to specifying parameters in the input notebook and pass them here
     *           in an YAML file.
     *           Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook_params.yaml`
     *     @type string $parameters
     *           Parameters used within the 'input_notebook_file' notebook.
     *     @type string $service_account
     *           The email address of a service account to use when running the execution.
     *           You must have the `iam.serviceAccounts.actAs` permission for the specified
     *           service account.
     *     @type int $job_type
     *           The type of Job to be used on this execution.
     *     @type \Google\Cloud\Notebooks\V1\ExecutionTemplate\DataprocParameters $dataproc_parameters
     *           Parameters used in Dataproc JobType executions.
     *     @type \Google\Cloud\Notebooks\V1\ExecutionTemplate\VertexAIParameters $vertex_ai_parameters
     *           Parameters used in Vertex AI JobType executions.
     *     @type string $kernel_spec
     *           Name of the kernel spec to use. This must be specified if the
     *           kernel spec name on the execution target does not match the name in the
     *           input notebook file.
     *     @type string $tensorboard
     *           The name of a Vertex AI [Tensorboard] resource to which this execution
     *           will upload Tensorboard logs.
     *           Format:
     *           `projects/{project}/locations/{location}/tensorboards/{tensorboard}`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Notebooks\V1\Execution::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Scale tier of the hardware used for notebook execution.
     * DEPRECATED Will be discontinued. As right now only CUSTOM is supported.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.ScaleTier scale_tier = 1 [deprecated = true, (.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     * @deprecated
     */
    public function getScaleTier()
    {
        @trigger_error('scale_tier is deprecated.', E_USER_DEPRECATED);
        return $this->scale_tier;
    }

    /**
     * Required. Scale tier of the hardware used for notebook execution.
     * DEPRECATED Will be discontinued. As right now only CUSTOM is supported.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.ScaleTier scale_tier = 1 [deprecated = true, (.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     * @deprecated
     */
    public function setScaleTier($var)
    {
        @trigger_error('scale_tier is deprecated.', E_USER_DEPRECATED);
        GPBUtil::checkEnum($var, \Google\Cloud\Notebooks\V1\ExecutionTemplate\ScaleTier::class);
        $this->scale_tier = $var;

        return $this;
    }

    /**
     * Specifies the type of virtual machine to use for your training
     * job's master worker. You must specify this field when `scaleTier` is set to
     * `CUSTOM`.
     * You can use certain Compute Engine machine types directly in this field.
     * The following types are supported:
     * - `n1-standard-4`
     * - `n1-standard-8`
     * - `n1-standard-16`
     * - `n1-standard-32`
     * - `n1-standard-64`
     * - `n1-standard-96`
     * - `n1-highmem-2`
     * - `n1-highmem-4`
     * - `n1-highmem-8`
     * - `n1-highmem-16`
     * - `n1-highmem-32`
     * - `n1-highmem-64`
     * - `n1-highmem-96`
     * - `n1-highcpu-16`
     * - `n1-highcpu-32`
     * - `n1-highcpu-64`
     * - `n1-highcpu-96`
     * Alternatively, you can use the following legacy machine types:
     * - `standard`
     * - `large_model`
     * - `complex_model_s`
     * - `complex_model_m`
     * - `complex_model_l`
     * - `standard_gpu`
     * - `complex_model_m_gpu`
     * - `complex_model_l_gpu`
     * - `standard_p100`
     * - `complex_model_m_p100`
     * - `standard_v100`
     * - `large_model_v100`
     * - `complex_model_m_v100`
     * - `complex_model_l_v100`
     * Finally, if you want to use a TPU for training, specify `cloud_tpu` in this
     * field. Learn more about the [special configuration options for training
     * with
     * TPU](https://cloud.google.com/ai-platform/training/docs/using-tpus#configuring_a_custom_tpu_machine).
     *
     * Generated from protobuf field <code>string master_type = 2;</code>
     * @return string
     */
    public function getMasterType()
    {
        return $this->master_type;
    }

    /**
     * Specifies the type of virtual machine to use for your training
     * job's master worker. You must specify this field when `scaleTier` is set to
     * `CUSTOM`.
     * You can use certain Compute Engine machine types directly in this field.
     * The following types are supported:
     * - `n1-standard-4`
     * - `n1-standard-8`
     * - `n1-standard-16`
     * - `n1-standard-32`
     * - `n1-standard-64`
     * - `n1-standard-96`
     * - `n1-highmem-2`
     * - `n1-highmem-4`
     * - `n1-highmem-8`
     * - `n1-highmem-16`
     * - `n1-highmem-32`
     * - `n1-highmem-64`
     * - `n1-highmem-96`
     * - `n1-highcpu-16`
     * - `n1-highcpu-32`
     * - `n1-highcpu-64`
     * - `n1-highcpu-96`
     * Alternatively, you can use the following legacy machine types:
     * - `standard`
     * - `large_model`
     * - `complex_model_s`
     * - `complex_model_m`
     * - `complex_model_l`
     * - `standard_gpu`
     * - `complex_model_m_gpu`
     * - `complex_model_l_gpu`
     * - `standard_p100`
     * - `complex_model_m_p100`
     * - `standard_v100`
     * - `large_model_v100`
     * - `complex_model_m_v100`
     * - `complex_model_l_v100`
     * Finally, if you want to use a TPU for training, specify `cloud_tpu` in this
     * field. Learn more about the [special configuration options for training
     * with
     * TPU](https://cloud.google.com/ai-platform/training/docs/using-tpus#configuring_a_custom_tpu_machine).
     *
     * Generated from protobuf field <code>string master_type = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMasterType($var)
    {
        GPBUtil::checkString($var, True);
        $this->master_type = $var;

        return $this;
    }

    /**
     * Configuration (count and accelerator type) for hardware running notebook
     * execution.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.SchedulerAcceleratorConfig accelerator_config = 3;</code>
     * @return \Google\Cloud\Notebooks\V1\ExecutionTemplate\SchedulerAcceleratorConfig|null
     */
    public function getAcceleratorConfig()
    {
        return $this->accelerator_config;
    }

    public function hasAcceleratorConfig()
    {
        return isset($this->accelerator_config);
    }

    public function clearAcceleratorConfig()
    {
        unset($this->accelerator_config);
    }

    /**
     * Configuration (count and accelerator type) for hardware running notebook
     * execution.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.SchedulerAcceleratorConfig accelerator_config = 3;</code>
     * @param \Google\Cloud\Notebooks\V1\ExecutionTemplate\SchedulerAcceleratorConfig $var
     * @return $this
     */
    public function setAcceleratorConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Notebooks\V1\ExecutionTemplate\SchedulerAcceleratorConfig::class);
        $this->accelerator_config = $var;

        return $this;
    }

    /**
     * Labels for execution.
     * If execution is scheduled, a field included will be 'nbs-scheduled'.
     * Otherwise, it is an immediate execution, and an included field will be
     * 'nbs-immediate'. Use fields to efficiently index between various types of
     * executions.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Labels for execution.
     * If execution is scheduled, a field included will be 'nbs-scheduled'.
     * Otherwise, it is an immediate execution, and an included field will be
     * 'nbs-immediate'. Use fields to efficiently index between various types of
     * executions.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Path to the notebook file to execute.
     * Must be in a Google Cloud Storage bucket.
     * Format: `gs://{bucket_name}/{folder}/{notebook_file_name}`
     * Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook.ipynb`
     *
     * Generated from protobuf field <code>string input_notebook_file = 5;</code>
     * @return string
     */
    public function getInputNotebookFile()
    {
        return $this->input_notebook_file;
    }

    /**
     * Path to the notebook file to execute.
     * Must be in a Google Cloud Storage bucket.
     * Format: `gs://{bucket_name}/{folder}/{notebook_file_name}`
     * Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook.ipynb`
     *
     * Generated from protobuf field <code>string input_notebook_file = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setInputNotebookFile($var)
    {
        GPBUtil::checkString($var, True);
        $this->input_notebook_file = $var;

        return $this;
    }

    /**
     * Container Image URI to a DLVM
     * Example: 'gcr.io/deeplearning-platform-release/base-cu100'
     * More examples can be found at:
     * https://cloud.google.com/ai-platform/deep-learning-containers/docs/choosing-container
     *
     * Generated from protobuf field <code>string container_image_uri = 6;</code>
     * @return string
     */
    public function getContainerImageUri()
    {
        return $this->container_image_uri;
    }

    /**
     * Container Image URI to a DLVM
     * Example: 'gcr.io/deeplearning-platform-release/base-cu100'
     * More examples can be found at:
     * https://cloud.google.com/ai-platform/deep-learning-containers/docs/choosing-container
     *
     * Generated from protobuf field <code>string container_image_uri = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setContainerImageUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->container_image_uri = $var;

        return $this;
    }

    /**
     * Path to the notebook folder to write to.
     * Must be in a Google Cloud Storage bucket path.
     * Format: `gs://{bucket_name}/{folder}`
     * Ex: `gs://notebook_user/scheduled_notebooks`
     *
     * Generated from protobuf field <code>string output_notebook_folder = 7;</code>
     * @return string
     */
    public function getOutputNotebookFolder()
    {
        return $this->output_notebook_folder;
    }

    /**
     * Path to the notebook folder to write to.
     * Must be in a Google Cloud Storage bucket path.
     * Format: `gs://{bucket_name}/{folder}`
     * Ex: `gs://notebook_user/scheduled_notebooks`
     *
     * Generated from protobuf field <code>string output_notebook_folder = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setOutputNotebookFolder($var)
    {
        GPBUtil::checkString($var, True);
        $this->output_notebook_folder = $var;

        return $this;
    }

    /**
     * Parameters to be overridden in the notebook during execution.
     * Ref https://papermill.readthedocs.io/en/latest/usage-parameterize.html on
     * how to specifying parameters in the input notebook and pass them here
     * in an YAML file.
     * Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook_params.yaml`
     *
     * Generated from protobuf field <code>string params_yaml_file = 8;</code>
     * @return string
     */
    public function getParamsYamlFile()
    {
        return $this->params_yaml_file;
    }

    /**
     * Parameters to be overridden in the notebook during execution.
     * Ref https://papermill.readthedocs.io/en/latest/usage-parameterize.html on
     * how to specifying parameters in the input notebook and pass them here
     * in an YAML file.
     * Ex: `gs://notebook_user/scheduled_notebooks/sentiment_notebook_params.yaml`
     *
     * Generated from protobuf field <code>string params_yaml_file = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setParamsYamlFile($var)
    {
        GPBUtil::checkString($var, True);
        $this->params_yaml_file = $var;

        return $this;
    }

    /**
     * Parameters used within the 'input_notebook_file' notebook.
     *
     * Generated from protobuf field <code>string parameters = 9;</code>
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Parameters used within the 'input_notebook_file' notebook.
     *
     * Generated from protobuf field <code>string parameters = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setParameters($var)
    {
        GPBUtil::checkString($var, True);
        $this->parameters = $var;

        return $this;
    }

    /**
     * The email address of a service account to use when running the execution.
     * You must have the `iam.serviceAccounts.actAs` permission for the specified
     * service account.
     *
     * Generated from protobuf field <code>string service_account = 10;</code>
     * @return string
     */
    public function getServiceAccount()
    {
        return $this->service_account;
    }

    /**
     * The email address of a service account to use when running the execution.
     * You must have the `iam.serviceAccounts.actAs` permission for the specified
     * service account.
     *
     * Generated from protobuf field <code>string service_account = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setServiceAccount($var)
    {
        GPBUtil::checkString($var, True);
        $this->service_account = $var;

        return $this;
    }

    /**
     * The type of Job to be used on this execution.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.JobType job_type = 11;</code>
     * @return int
     */
    public function getJobType()
    {
        return $this->job_type;
    }

    /**
     * The type of Job to be used on this execution.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.JobType job_type = 11;</code>
     * @param int $var
     * @return $this
     */
    public function setJobType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Notebooks\V1\ExecutionTemplate\JobType::class);
        $this->job_type = $var;

        return $this;
    }

    /**
     * Parameters used in Dataproc JobType executions.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.DataprocParameters dataproc_parameters = 12;</code>
     * @return \Google\Cloud\Notebooks\V1\ExecutionTemplate\DataprocParameters|null
     */
    public function getDataprocParameters()
    {
        return $this->readOneof(12);
    }

    public function hasDataprocParameters()
    {
        return $this->hasOneof(12);
    }

    /**
     * Parameters used in Dataproc JobType executions.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.DataprocParameters dataproc_parameters = 12;</code>
     * @param \Google\Cloud\Notebooks\V1\ExecutionTemplate\DataprocParameters $var
     * @return $this
     */
    public function setDataprocParameters($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Notebooks\V1\ExecutionTemplate\DataprocParameters::class);
        $this->writeOneof(12, $var);

        return $this;
    }

    /**
     * Parameters used in Vertex AI JobType executions.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.VertexAIParameters vertex_ai_parameters = 13;</code>
     * @return \Google\Cloud\Notebooks\V1\ExecutionTemplate\VertexAIParameters|null
     */
    public function getVertexAiParameters()
    {
        return $this->readOneof(13);
    }

    public function hasVertexAiParameters()
    {
        return $this->hasOneof(13);
    }

    /**
     * Parameters used in Vertex AI JobType executions.
     *
     * Generated from protobuf field <code>.google.cloud.notebooks.v1.ExecutionTemplate.VertexAIParameters vertex_ai_parameters = 13;</code>
     * @param \Google\Cloud\Notebooks\V1\ExecutionTemplate\VertexAIParameters $var
     * @return $this
     */
    public function setVertexAiParameters($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Notebooks\V1\ExecutionTemplate\VertexAIParameters::class);
        $this->writeOneof(13, $var);

        return $this;
    }

    /**
     * Name of the kernel spec to use. This must be specified if the
     * kernel spec name on the execution target does not match the name in the
     * input notebook file.
     *
     * Generated from protobuf field <code>string kernel_spec = 14;</code>
     * @return string
     */
    public function getKernelSpec()
    {
        return $this->kernel_spec;
    }

    /**
     * Name of the kernel spec to use. This must be specified if the
     * kernel spec name on the execution target does not match the name in the
     * input notebook file.
     *
     * Generated from protobuf field <code>string kernel_spec = 14;</code>
     * @param string $var
     * @return $this
     */
    public function setKernelSpec($var)
    {
        GPBUtil::checkString($var, True);
        $this->kernel_spec = $var;

        return $this;
    }

    /**
     * The name of a Vertex AI [Tensorboard] resource to which this execution
     * will upload Tensorboard logs.
     * Format:
     * `projects/{project}/locations/{location}/tensorboards/{tensorboard}`
     *
     * Generated from protobuf field <code>string tensorboard = 15 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getTensorboard()
    {
        return $this->tensorboard;
    }

    /**
     * The name of a Vertex AI [Tensorboard] resource to which this execution
     * will upload Tensorboard logs.
     * Format:
     * `projects/{project}/locations/{location}/tensorboards/{tensorboard}`
     *
     * Generated from protobuf field <code>string tensorboard = 15 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setTensorboard($var)
    {
        GPBUtil::checkString($var, True);
        $this->tensorboard = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getJobParameters()
    {
        return $this->whichOneof("job_parameters");
    }

}

