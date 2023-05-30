<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\CatalogGraphQl\Plugin\Product\Gallery;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Gallery\DeleteHandler as GalleryDeleteHandler;

/**
 * This is a plugin to \Magento\Catalog\Model\Product\Gallery\DeleteHandler.
 * It is to set product media gallery changed when such change happens.
 */
class DeleteHandler
{
    /**
     * Set product media gallery changed after a product's media gallory is deleted
     *
     * @param GalleryDeleteHandler $subject
     * @param callable $proceed
     * @param Product $product
     * @param array $arguments
     * @return void
     */
    public function aroundExecute(
        GalleryDeleteHandler $subject,
        callable $proceed,
        Product $product,
        array $arguments
    ): void {
        $proceed($product, $arguments);
        $product->setData('is_media_gallery_changed', true);
    }
}
