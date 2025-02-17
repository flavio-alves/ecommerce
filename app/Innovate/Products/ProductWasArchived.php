<?php
/**
 * Created by Miki Maine Amdu.
 * For : INNOVATE E-COMMERCE
 * User: MIKI$
 * Date: 3/18/2016
 * Time: 10:30 PM
 */

namespace Innovate\Products;


/**
 * Class ProductWasArchived
 * @package Innovate\Products
 */
class ProductWasArchived {

    /**
     * @var Product
     */
    public $product;

    /**
     * @param Product $product
     */
    function __construct(Product $product)
    {
        $this->product = $product;
    }


}