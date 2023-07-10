<?php
/*
 * Copyright 2023 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/monitoring/v3/metric_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Monitoring\V3\Client\BaseClient;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Api\MetricDescriptor;
use Google\Api\MonitoredResourceDescriptor;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Monitoring\V3\CreateMetricDescriptorRequest;
use Google\Cloud\Monitoring\V3\CreateTimeSeriesRequest;
use Google\Cloud\Monitoring\V3\DeleteMetricDescriptorRequest;
use Google\Cloud\Monitoring\V3\GetMetricDescriptorRequest;
use Google\Cloud\Monitoring\V3\GetMonitoredResourceDescriptorRequest;
use Google\Cloud\Monitoring\V3\ListMetricDescriptorsRequest;
use Google\Cloud\Monitoring\V3\ListMonitoredResourceDescriptorsRequest;
use Google\Cloud\Monitoring\V3\ListTimeSeriesRequest;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: Manages metric descriptors, monitored resource descriptors, and
 * time series data.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * This class is currently experimental and may be subject to changes. See {@see
 * \Google\Cloud\Monitoring\V3\MetricServiceClient} for the stable implementation
 *
 * @internal
 *
 * @method PromiseInterface createMetricDescriptorAsync(CreateMetricDescriptorRequest $request, array $optionalArgs = [])
 * @method PromiseInterface createServiceTimeSeriesAsync(CreateTimeSeriesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface createTimeSeriesAsync(CreateTimeSeriesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteMetricDescriptorAsync(DeleteMetricDescriptorRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getMetricDescriptorAsync(GetMetricDescriptorRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getMonitoredResourceDescriptorAsync(GetMonitoredResourceDescriptorRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listMetricDescriptorsAsync(ListMetricDescriptorsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listMonitoredResourceDescriptorsAsync(ListMonitoredResourceDescriptorsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listTimeSeriesAsync(ListTimeSeriesRequest $request, array $optionalArgs = [])
 */
abstract class MetricServiceBaseClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.monitoring.v3.MetricService';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'monitoring.googleapis.com';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/monitoring',
        'https://www.googleapis.com/auth/monitoring.read',
        'https://www.googleapis.com/auth/monitoring.write',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../../resources/metric_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../../resources/metric_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../../resources/metric_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../../resources/metric_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder
     * resource.
     *
     * @param string $folder
     *
     * @return string The formatted folder resource.
     */
    public static function folderName(string $folder): string
    {
        return self::getPathTemplate('folder')->render([
            'folder' => $folder,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * folder_metric_descriptor resource.
     *
     * @param string $folder
     * @param string $metricDescriptor
     *
     * @return string The formatted folder_metric_descriptor resource.
     */
    public static function folderMetricDescriptorName(string $folder, string $metricDescriptor): string
    {
        return self::getPathTemplate('folderMetricDescriptor')->render([
            'folder' => $folder,
            'metric_descriptor' => $metricDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * folder_monitored_resource_descriptor resource.
     *
     * @param string $folder
     * @param string $monitoredResourceDescriptor
     *
     * @return string The formatted folder_monitored_resource_descriptor resource.
     */
    public static function folderMonitoredResourceDescriptorName(string $folder, string $monitoredResourceDescriptor): string
    {
        return self::getPathTemplate('folderMonitoredResourceDescriptor')->render([
            'folder' => $folder,
            'monitored_resource_descriptor' => $monitoredResourceDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * metric_descriptor resource.
     *
     * @param string $project
     * @param string $metricDescriptor
     *
     * @return string The formatted metric_descriptor resource.
     */
    public static function metricDescriptorName(string $project, string $metricDescriptor): string
    {
        return self::getPathTemplate('metricDescriptor')->render([
            'project' => $project,
            'metric_descriptor' => $metricDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * monitored_resource_descriptor resource.
     *
     * @param string $project
     * @param string $monitoredResourceDescriptor
     *
     * @return string The formatted monitored_resource_descriptor resource.
     */
    public static function monitoredResourceDescriptorName(string $project, string $monitoredResourceDescriptor): string
    {
        return self::getPathTemplate('monitoredResourceDescriptor')->render([
            'project' => $project,
            'monitored_resource_descriptor' => $monitoredResourceDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a organization
     * resource.
     *
     * @param string $organization
     *
     * @return string The formatted organization resource.
     */
    public static function organizationName(string $organization): string
    {
        return self::getPathTemplate('organization')->render([
            'organization' => $organization,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * organization_metric_descriptor resource.
     *
     * @param string $organization
     * @param string $metricDescriptor
     *
     * @return string The formatted organization_metric_descriptor resource.
     */
    public static function organizationMetricDescriptorName(string $organization, string $metricDescriptor): string
    {
        return self::getPathTemplate('organizationMetricDescriptor')->render([
            'organization' => $organization,
            'metric_descriptor' => $metricDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * organization_monitored_resource_descriptor resource.
     *
     * @param string $organization
     * @param string $monitoredResourceDescriptor
     *
     * @return string The formatted organization_monitored_resource_descriptor resource.
     */
    public static function organizationMonitoredResourceDescriptorName(string $organization, string $monitoredResourceDescriptor): string
    {
        return self::getPathTemplate('organizationMonitoredResourceDescriptor')->render([
            'organization' => $organization,
            'monitored_resource_descriptor' => $monitoredResourceDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a project
     * resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     */
    public static function projectName(string $project): string
    {
        return self::getPathTemplate('project')->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * project_metric_descriptor resource.
     *
     * @param string $project
     * @param string $metricDescriptor
     *
     * @return string The formatted project_metric_descriptor resource.
     */
    public static function projectMetricDescriptorName(string $project, string $metricDescriptor): string
    {
        return self::getPathTemplate('projectMetricDescriptor')->render([
            'project' => $project,
            'metric_descriptor' => $metricDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * project_monitored_resource_descriptor resource.
     *
     * @param string $project
     * @param string $monitoredResourceDescriptor
     *
     * @return string The formatted project_monitored_resource_descriptor resource.
     */
    public static function projectMonitoredResourceDescriptorName(string $project, string $monitoredResourceDescriptor): string
    {
        return self::getPathTemplate('projectMonitoredResourceDescriptor')->render([
            'project' => $project,
            'monitored_resource_descriptor' => $monitoredResourceDescriptor,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a workspace
     * resource.
     *
     * @param string $project
     *
     * @return string The formatted workspace resource.
     */
    public static function workspaceName(string $project): string
    {
        return self::getPathTemplate('workspace')->render([
            'project' => $project,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - folder: folders/{folder}
     * - folderMetricDescriptor: folders/{folder}/metricDescriptors/{metric_descriptor=**}
     * - folderMonitoredResourceDescriptor: folders/{folder}/monitoredResourceDescriptors/{monitored_resource_descriptor}
     * - metricDescriptor: projects/{project}/metricDescriptors/{metric_descriptor=**}
     * - monitoredResourceDescriptor: projects/{project}/monitoredResourceDescriptors/{monitored_resource_descriptor}
     * - organization: organizations/{organization}
     * - organizationMetricDescriptor: organizations/{organization}/metricDescriptors/{metric_descriptor=**}
     * - organizationMonitoredResourceDescriptor: organizations/{organization}/monitoredResourceDescriptors/{monitored_resource_descriptor}
     * - project: projects/{project}
     * - projectMetricDescriptor: projects/{project}/metricDescriptors/{metric_descriptor=**}
     * - projectMonitoredResourceDescriptor: projects/{project}/monitoredResourceDescriptors/{monitored_resource_descriptor}
     * - workspace: projects/{project}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'monitoring.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates a new metric descriptor.
     * The creation is executed asynchronously and callers may check the returned
     * operation to track its progress.
     * User-created metric descriptors define
     * [custom metrics](https://cloud.google.com/monitoring/custom-metrics).
     *
     * The async variant is {@see self::createMetricDescriptorAsync()} .
     *
     * @param CreateMetricDescriptorRequest $request     A request to house fields associated with the call.
     * @param array                         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return MetricDescriptor
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createMetricDescriptor(CreateMetricDescriptorRequest $request, array $callOptions = []): MetricDescriptor
    {
        return $this->startApiCall('CreateMetricDescriptor', $request, $callOptions)->wait();
    }

    /**
     * Creates or adds data to one or more service time series. A service time
     * series is a time series for a metric from a Google Cloud service. The
     * response is empty if all time series in the request were written. If any
     * time series could not be written, a corresponding failure message is
     * included in the error response. This endpoint rejects writes to
     * user-defined metrics.
     * This method is only for use by Google Cloud services. Use
     * [projects.timeSeries.create][google.monitoring.v3.MetricService.CreateTimeSeries]
     * instead.
     *
     * The async variant is {@see self::createServiceTimeSeriesAsync()} .
     *
     * @param CreateTimeSeriesRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createServiceTimeSeries(CreateTimeSeriesRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('CreateServiceTimeSeries', $request, $callOptions)->wait();
    }

    /**
     * Creates or adds data to one or more time series.
     * The response is empty if all time series in the request were written.
     * If any time series could not be written, a corresponding failure message is
     * included in the error response.
     *
     * The async variant is {@see self::createTimeSeriesAsync()} .
     *
     * @param CreateTimeSeriesRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createTimeSeries(CreateTimeSeriesRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('CreateTimeSeries', $request, $callOptions)->wait();
    }

    /**
     * Deletes a metric descriptor. Only user-created
     * [custom metrics](https://cloud.google.com/monitoring/custom-metrics) can be
     * deleted.
     *
     * The async variant is {@see self::deleteMetricDescriptorAsync()} .
     *
     * @param DeleteMetricDescriptorRequest $request     A request to house fields associated with the call.
     * @param array                         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteMetricDescriptor(DeleteMetricDescriptorRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('DeleteMetricDescriptor', $request, $callOptions)->wait();
    }

    /**
     * Gets a single metric descriptor. This method does not require a Workspace.
     *
     * The async variant is {@see self::getMetricDescriptorAsync()} .
     *
     * @param GetMetricDescriptorRequest $request     A request to house fields associated with the call.
     * @param array                      $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return MetricDescriptor
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getMetricDescriptor(GetMetricDescriptorRequest $request, array $callOptions = []): MetricDescriptor
    {
        return $this->startApiCall('GetMetricDescriptor', $request, $callOptions)->wait();
    }

    /**
     * Gets a single monitored resource descriptor. This method does not require a Workspace.
     *
     * The async variant is {@see self::getMonitoredResourceDescriptorAsync()} .
     *
     * @param GetMonitoredResourceDescriptorRequest $request     A request to house fields associated with the call.
     * @param array                                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return MonitoredResourceDescriptor
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getMonitoredResourceDescriptor(GetMonitoredResourceDescriptorRequest $request, array $callOptions = []): MonitoredResourceDescriptor
    {
        return $this->startApiCall('GetMonitoredResourceDescriptor', $request, $callOptions)->wait();
    }

    /**
     * Lists metric descriptors that match a filter. This method does not require a Workspace.
     *
     * The async variant is {@see self::listMetricDescriptorsAsync()} .
     *
     * @param ListMetricDescriptorsRequest $request     A request to house fields associated with the call.
     * @param array                        $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listMetricDescriptors(ListMetricDescriptorsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListMetricDescriptors', $request, $callOptions);
    }

    /**
     * Lists monitored resource descriptors that match a filter. This method does not require a Workspace.
     *
     * The async variant is {@see self::listMonitoredResourceDescriptorsAsync()} .
     *
     * @param ListMonitoredResourceDescriptorsRequest $request     A request to house fields associated with the call.
     * @param array                                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listMonitoredResourceDescriptors(ListMonitoredResourceDescriptorsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListMonitoredResourceDescriptors', $request, $callOptions);
    }

    /**
     * Lists time series that match a filter. This method does not require a Workspace.
     *
     * The async variant is {@see self::listTimeSeriesAsync()} .
     *
     * @param ListTimeSeriesRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listTimeSeries(ListTimeSeriesRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListTimeSeries', $request, $callOptions);
    }
}
