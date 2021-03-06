<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Product implements JsonSerializable
{
    /**
     * Name of the product.
     * @var string|null $name public property
     */
    public $name;

    /**
     * Product code.
     * @var string|null $code public property
     */
    public $code;

    /**
     * Unit in which this product is sold
     * @var string|null $unit public property
     */
    public $unit;

    /**
     * Tax percentage
     * @var double|null $tax public property
     */
    public $tax;

    /**
     * Whether this product will be made active or not.
     * @maps active_flag
     * @var int|null $activeFlag public property
     */
    public $activeFlag;

    /**
     * Visibility of the product. If omitted, visibility will be set to the default visibility setting of
     * this item type for the authorized user.<dl class="fields-list"><dt>1</dt><dd>Owner &amp; followers
     * (private)</dd><dt>3</dt><dd>Entire company (shared)</dd></dl>
     * @maps visible_to
     * @var int|null $visibleTo public property
     */
    public $visibleTo;

    /**
     * ID of the user who will be marked as the owner of this product. When omitted, the authorized user ID
     * will be used.
     * @maps owner_id
     * @var integer|null $ownerId public property
     */
    public $ownerId;

    /**
     * Array of objects, each containing: currency (string), price (number), cost (number, optional),
     * overhead_cost (number, optional). Note that there can only be one price per product per currency.
     * When 'prices' is omitted altogether, no prices will be set up for the product.
     * @var string|null $prices public property
     */
    public $prices;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $name       Initialization value for $this->name
     * @param string  $code       Initialization value for $this->code
     * @param string  $unit       Initialization value for $this->unit
     * @param double  $tax        Initialization value for $this->tax
     * @param int     $activeFlag Initialization value for $this->activeFlag
     * @param int     $visibleTo  Initialization value for $this->visibleTo
     * @param integer $ownerId    Initialization value for $this->ownerId
     * @param string  $prices     Initialization value for $this->prices
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 8:
                $this->name       = func_get_arg(0);
                $this->code       = func_get_arg(1);
                $this->unit       = func_get_arg(2);
                $this->tax        = func_get_arg(3);
                $this->activeFlag = func_get_arg(4);
                $this->visibleTo  = func_get_arg(5);
                $this->ownerId    = func_get_arg(6);
                $this->prices     = func_get_arg(7);
                break;

            default:
                $this->tax = 0;
                break;
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name']        = $this->name;
        $json['code']        = $this->code;
        $json['unit']        = $this->unit;
        $json['tax']         = $this->tax;
        $json['active_flag'] = $this->activeFlag;
        $json['visible_to']  = $this->visibleTo;
        $json['owner_id']    = $this->ownerId;
        $json['prices']      = $this->prices;

        return $json;
    }
}
