<?php
/**
 * Copyright 2016 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Amazon\Core\Plugin;

use Amazon\Core\Helper\CategoryExclusion;
use Magento\Checkout\CustomerData\Cart;

class CartSection
{
    /**
     * @var CategoryExclusion
     */
    protected $categoryExclusionHelper;

    /**
     * @param CategoryExclusion $categoryExclusionHelper
     */
    public function __construct(CategoryExclusion $categoryExclusionHelper)
    {
        $this->categoryExclusionHelper = $categoryExclusionHelper;
    }

    /**
     * @param Cart  $subject
     * @param array $result
     *
     * @return mixed
     */
    public function afterGetSectionData(Cart $subject, $result)
    {
        $result['amazon_quote_has_excluded_item'] = $this->categoryExclusionHelper->isQuoteDirty();

        return $result;
    }
}
