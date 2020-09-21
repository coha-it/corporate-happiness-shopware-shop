<?php

namespace uvalaEmbeddedVideoToPic\Subscriber;

use Enlight\Event\SubscriberInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Theme\LessDefinition;
use Shopware\Components\Theme\JavascriptDefinition;

class addlessandjs implements SubscriberInterface {

	/**
	* @return array
	*/
	public static function getSubscribedEvents() {
		return ['Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles',
				'Theme_Compiler_Collect_Plugin_Javascript' => 'addJSFiles'];
	}

	/**
	* Provides the less files for compression
	*
	* @return ArrayCollection
	*/
	public function addLessFiles() {
		$less = new LessDefinition([], [__DIR__ . '/views/frontend/_public/src/less/all.less'], __DIR__);
		return new ArrayCollection([$less]);
	}

	/**
	* Provides the JS files for compression
	*
	* @return ArrayCollection
	*/
	public function addJSFiles() {
		return new ArrayCollection([__DIR__ . '/views/frontend/_public/src/js/javascript.js', ]);
	}

}