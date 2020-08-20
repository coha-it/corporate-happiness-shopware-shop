<?php

namespace uvalaEmbeddedVideoToPic\Subscriber;

use Shopware\Bundle\StoreFrontBundle\Service\ListProductServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Service\MediaServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Struct;

class ListProductService implements ListProductServiceInterface {

	private $service;
	private $mediaService;

	public function __construct(ListProductServiceInterface $service, MediaServiceInterface $mediaService) {

		$this->service = $service;
		$this->mediaService = $mediaService;

	}

	public function getList(array $numbers, Struct\ProductContextInterface $context) {

		$products = $this->service->getList($numbers, $context);
		$media = $this->mediaService->getProductsMedia($products, $context);

		/**@var $product Struct\ListProduct */
		foreach ($numbers as $number) {

			$product = $products[$number];

			if (isset($media[$number])) {

				$image_array = null;

				foreach ($media[$number] as $key => $image) {
					$image_array[$key] = Shopware()->Container()->get('legacy_struct_converter')->convertMediaStruct($image);
				}

				$attribute = new Struct\Attribute(['images' => $image_array]);
				$product->addAttribute('images', $attribute);

			}

		}

		return $products;
	}

	public function get($number, Struct\ProductContextInterface $context) {
		$products = $this->getList([$number], $context);
		return array_shift($products);
	}

}