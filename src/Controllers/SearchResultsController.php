<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Controllers;

use Pipedrive\APIException;
use Pipedrive\APIHelper;
use Pipedrive\Configuration;
use Pipedrive\Models;
use Pipedrive\Exceptions;
use Pipedrive\Http\HttpRequest;
use Pipedrive\Http\HttpResponse;
use Pipedrive\Http\HttpMethod;
use Pipedrive\Http\HttpContext;
use Pipedrive\OAuthManager;
use Pipedrive\Servers;
use Pipedrive\Utils\CamelCaseHelper;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class SearchResultsController extends BaseController
{
    /**
     * @var SearchResultsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return SearchResultsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Performs a search across the account and returns SearchResults.
     *
     * @param  array  $options    Array with all options for search
     * @param string  $options['term']        Search term to look for, minimum 2 characters.
     * @param string  $options['itemType']    (optional) Search for items of exact type. If omitted, all types of items
     *                                        are searched.
     * @param integer $options['start']       (optional) Pagination start
     * @param integer $options['limit']       (optional) Items shown per page
     * @param int     $options['exactMatch']  (optional) When enabled, only full exact matches against the given term
     *                                        are returned. The minimum 2 character limit for the term is discarded
     *                                        when exact_match is enabled. It will only work if search term is 30
     *                                        characters or less.
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPerformASearch(
        $options
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/searchResults';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'term'        => $this->val($options, 'term'),
            'item_type'   => $this->val($options, 'itemType'),
            'start'       => $this->val($options, 'start', 0),
            'limit'       => $this->val($options, 'limit'),
            'exact_match' => $this->val($options, 'exactMatch'),
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }

    /**
     * Performs a search from a specific field's values. Results can be either the distinct values of the
     * field (useful for searching autocomplete field values), or actual items IDs (deals, persons,
     * organizations or products). Works only with the following field types: varchar, varchar_auto, double,
     * address, text, phone, date.
     *
     * @param  array  $options    Array with all options for search
     * @param string  $options['term']             Search term to look for, minimum 2 characters.
     * @param string  $options['fieldType']        Type of the field to perform the search from.
     * @param string  $options['fieldKey']         Key of the field to search from. Field key can be obtained by
     *                                             fetching the list of fields using any of fields API GET methods
     *                                             (dealFields, personFields, ..).
     * @param int     $options['exactMatch']       (optional) When enabled, only full exact matches against the given
     *                                             term are returned. By default, term can be present anywhere in the
     *                                             resulting field values to be considered a match. The minimum 2
     *                                             character limit for the term is discarded when exact_match is
     *                                             enabled.
     * @param string  $options['returnFieldKey']   (optional) Name of the field in search results from which the search
     *                                             was performed. When omitted, 'value' will be used. You may want to
     *                                             set this parameter to match the field_key.
     * @param int     $options['returnItemIds']    (optional) Whether to return matching items IDs in search results.
     *                                             When omitted or set to 0, only distinct values of the searched field
     *                                             are returned. When enabled, the return_field_key parameter is
     *                                             ignored and the results include the searched field as its own key.
     * @param integer $options['start']            (optional) Pagination start
     * @param integer $options['limit']            (optional) Items shown per page
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPerformASearchUsingASpecificFieldValue(
        $options
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/searchResults/field';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'term'             => $this->val($options, 'term'),
            'field_type'       => $this->val($options, 'fieldType'),
            'field_key'        => $this->val($options, 'fieldKey'),
            'exact_match'      => $this->val($options, 'exactMatch'),
            'return_field_key' => $this->val($options, 'returnFieldKey'),
            'return_item_ids'  => $this->val($options, 'returnItemIds'),
            'start'            => $this->val($options, 'start', 0),
            'limit'            => $this->val($options, 'limit'),
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'     => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }


    /**
    * Array access utility method
     * @param  array          $arr         Array of values to read from
     * @param  string         $key         Key to get the value from the array
     * @param  mixed|null     $default     Default value to use if the key was not found
     * @return mixed
     */
    private function val($arr, $key, $default = null)
    {
        if (isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }
}
