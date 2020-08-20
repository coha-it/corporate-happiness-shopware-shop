<?php

namespace uvalaEmbeddedVideoToPic;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\ConfigReader;

class uvalaEmbeddedVideoToPic extends Plugin {

	/**
	* {@inheritdoc}
	*/
	public function install(InstallContext $installContext) {
		$service = $this->container->get('shopware_attribute.crud_service');
		$service->update('s_articles_img_attributes', 'uv_external_video_outputschema', 'combobox', [
			'label' => 'Video Ausgabeschema',
			'displayInBackend' => true,
			'supportText' => 'Legt fest, welches Ausgabeschema verwendet werden soll',
			'helpText' => 'Die Details des Ausgabeschemas können in den Grundeinstellungen definieren werden',
			'translatable' => true,
			'custom' => false,
			'arrayStore' => [
				['key' => '1', 'value' => 'Youtube'],
				['key' => '2', 'value' => 'Vimeo'],
				['key' => '3', 'value' => 'Facebook'],
				['key' => '4', 'value' => 'Freies Schema (1)'],
				['key' => '5', 'value' => 'Freies Schema (2)']
			]
		]);

		$service->update('s_articles_img_attributes', 'uv_external_video_url', 'string', [
			'label' => 'Video URL',
			'displayInBackend' => true,
			'supportText' => 'URL zu einer externen Quelle wie z.B. Youtube',
			'helpText' => 'Beispiel: https://www.youtube-nocookie.com/embed/in1MLLQsCNI',
			'translatable' => true,
			'custom' => false
		]);

		$service->update('s_articles_img_attributes', 'uv_external_video_thumbnail', 'string', [
			'label' => 'Thumbnail URL',
			'displayInBackend' => true,
			'supportText' => 'Bild-URL zu einer externen Quelle wie z.B. Youtube',
			'helpText' => 'Beispiel: https://img.youtube.com/vi/in1MLLQsCNI/hqdefault.jpg',
			'translatable' => true,
			'custom' => false
		]);

		$metaDataCache = Shopware()->Models()->getConfiguration()->getMetadataCacheImpl();
		$metaDataCache->deleteAll();
		Shopware()->Models()->generateAttributeModels(['s_articles_img_attributes']);
	}

	/**
	* {@inheritdoc}
	*/
	public function activate(ActivateContext $activateContext) {
		$activateContext->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
	}

	/**
	* {@inheritdoc}
	*/
	public function deactivate(DeactivateContext $deactivateContext) {
		$deactivateContext->scheduleClearCache(DeactivateContext::CACHE_LIST_ALL);
	}

	/**
	* {@inheritdoc}
	*/
	public function update(UpdateContext $updateContext) {

		$service = $this->container->get('shopware_attribute.crud_service');
		$service->update('s_articles_img_attributes', 'uv_external_video_outputschema', 'combobox', [
			'label' => 'Video Ausgabeschema',
			'displayInBackend' => true,
			'supportText' => 'Legt fest, welches Ausgabeschema verwendet werden soll',
			'helpText' => 'Die Details des Ausgabeschemas können in den Grundeinstellungen definieren werden',
			'translatable' => true,
			'custom' => false,
			'arrayStore' => [
				['key' => '1', 'value' => 'Youtube'],
				['key' => '2', 'value' => 'Vimeo'],
				['key' => '3', 'value' => 'Facebook'],
				['key' => '4', 'value' => 'Freies Schema (1)'],
				['key' => '5', 'value' => 'Freies Schema (2)']
			]
		]);

		$service->update('s_articles_img_attributes', 'uv_external_video_url', 'string', [
			'label' => 'Video URL',
			'displayInBackend' => true,
			'supportText' => 'URL zu einer externen Quelle wie z.B. Youtube',
			'helpText' => 'Beispiel: https://www.youtube-nocookie.com/embed/in1MLLQsCNI',
			'translatable' => true,
			'custom' => false
		]);

		$service->update('s_articles_img_attributes', 'uv_external_video_thumbnail', 'string', [
			'label' => 'Thumbnail URL',
			'displayInBackend' => true,
			'supportText' => 'Bild-URL zu einer externen Quelle wie z.B. Youtube',
			'helpText' => 'Beispiel: https://img.youtube.com/vi/in1MLLQsCNI/hqdefault.jpg',
			'translatable' => true,
			'custom' => false
		]);

		$metaDataCache = Shopware()->Models()->getConfiguration()->getMetadataCacheImpl();
		$metaDataCache->deleteAll();
		Shopware()->Models()->generateAttributeModels(['s_articles_img_attributes']);

		if (Shopware()->Config()->get( 'Version' ) < '5.5.2') {
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='1' WHERE name='uvemvpluginhandling' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='2' WHERE name='uvemvSettingGlobalSubShopFunctions' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='3' WHERE name='uvemvtopsettings' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='4' WHERE name='uvalaTargetEMVTOPactivateJqueryResizer' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='5' WHERE name='uvalaTargetEMVTOPICViewportWatcher' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='6' WHERE name='uvalaTargetEMVTOPICShowVideoButtons' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='7' WHERE name='uvalaTargetShowMovieBadge' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='8' WHERE name='uvemvtopAddendPopupButtonSetting' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='9' WHERE name='uvalaTargetEMVTOPICPopupButtonStatus' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='10' WHERE name='uvalaTargetEMVTOPICPopupButtonPosition' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='11' WHERE name='uvemvtopyoutube' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='12' WHERE name='uvalaTargetIframeCodeOne' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='13' WHERE name='uvalaTargetThumbnailCodeOne' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='14' WHERE name='uvemvtopvimeo' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='15' WHERE name='uvalaTargetIframeCodeTwo' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='16' WHERE name='uvalaTargetThumbnailCodeTwo' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='17' WHERE name='uvemvtopfacebook' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='18' WHERE name='uvalaTargetIframeCodeThree' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='19' WHERE name='uvalaTargetThumbnailCodeThree' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='20' WHERE name='uvemvtopfreeone' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='21' WHERE name='uvalaTargetIframeCodeFour' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='22' WHERE name='uvalaTargetThumbnailCodeFour' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='23' WHERE name='uvemvtopfreetwo' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='24' WHERE name='uvalaTargetIframeCodeFive' LIMIT 1");
			$this->container->get('dbal_connection')->exec("UPDATE s_core_config_elements SET position='25' WHERE name='uvalaTargetThumbnailCodeFive' LIMIT 1");
		}

		$updateContext->scheduleClearCache(UpdateContext::CACHE_LIST_ALL);

	}

	/**
	* {@inheritdoc}
	*/
	public function uninstall(UninstallContext $uninstallContext) {
		if (!$uninstallContext->keepUserData()) {
			$service = $this->container->get('shopware_attribute.crud_service');
			$service->delete('s_articles_img_attributes', 'uv_external_video_url');
			$service->delete('s_articles_img_attributes', 'uv_external_video_thumbnail');
			$service->delete('s_articles_img_attributes', 'uv_external_video_outputschema');

			$metaDataCache = Shopware()->Models()->getConfiguration()->getMetadataCacheImpl();
			$metaDataCache->deleteAll();
			Shopware()->Models()->generateAttributeModels(['s_articles_img_attributes']);
		}
		$uninstallContext->scheduleClearCache(UninstallContext::CACHE_LIST_ALL);
	}

	/**
	* {@inheritdoc}
	*/
	public static function getSubscribedEvents() {
		return [
			'Enlight_Controller_Action_PostDispatch' => 'addTemplateDir',
			'Enlight_Controller_Action_PostDispatchSecure_Widgets' => 'addTemplateDir',
			'Enlight_Controller_Action_PreDispatch_Widgets_Listing' => 'addTemplateDir',
			'Theme_Inheritance_Template_Directories_Collected' => 'collectDirectory'
		];
	}

	/**
	* @param \Enlight_Controller_ActionEventArgs $args
	*/
	public function addTemplateDir(\Enlight_Controller_ActionEventArgs $args) {

		$uv_config_point = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());
		if ($uv_config_point['uvemvSettingGlobalSubShopFunctions'] == '1') {
			if ($this->container->initialized('shop')) {
				$uvshop_id = $this->container->get('shop');
			} else {
				$uvshop_id = $this->container->get('models')->getRepository(\Shopware\Models\Shop\Shop::class)->getActiveDefault();
			}
			$uv_config_point = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName(), $uvshop_id);
			if (!isset($uv_config_point['uvalaTargetEMVTOPactivateJqueryResizer'])) {
				return;
			}
		}

		$view = $args->getSubject()->View();

		$view->assign('uvCPEmViToPcJqueryResizer', $uv_config_point['uvalaTargetEMVTOPactivateJqueryResizer']);
		$view->assign('uvCPEmViToPcVieWatcher', $uv_config_point['uvalaTargetEMVTOPICViewportWatcher']);
		$view->assign('uvCPEmViToPcAddendButton', $uv_config_point['uvalaTargetEMVTOPICPopupButtonStatus']);
		$view->assign('uvCPEmViToPcAdButPos', $uv_config_point['uvalaTargetEMVTOPICPopupButtonPosition']);
		$view->assign('uvCPEmViToPcVideoButtons', $uv_config_point['uvalaTargetEMVTOPICShowVideoButtons']);
		$view->assign('uvConfigPointShowBadge', $uv_config_point['uvalaTargetShowMovieBadge']);
		$view->assign('uvConfigPointIframeCodeOne', $uv_config_point['uvalaTargetIframeCodeOne']);
		$view->assign('uvConfigPointThumbnailCodeOne', $uv_config_point['uvalaTargetThumbnailCodeOne']);
		$view->assign('uvConfigPointIframeCodeTwo', $uv_config_point['uvalaTargetIframeCodeTwo']);
		$view->assign('uvConfigPointThumbnailCodeTwo', $uv_config_point['uvalaTargetThumbnailCodeTwo']);
		$view->assign('uvConfigPointIframeCodeThree', $uv_config_point['uvalaTargetIframeCodeThree']);
		$view->assign('uvConfigPointThumbnailCodeThree', $uv_config_point['uvalaTargetThumbnailCodeThree']);
		$view->assign('uvConfigPointIframeCodeFour', $uv_config_point['uvalaTargetIframeCodeFour']);
		$view->assign('uvConfigPointThumbnailCodeFour', $uv_config_point['uvalaTargetThumbnailCodeFour']);
		$view->assign('uvConfigPointIframeCodeFive', $uv_config_point['uvalaTargetIframeCodeFive']);
		$view->assign('uvConfigPointThumbnailCodeFive', $uv_config_point['uvalaTargetThumbnailCodeFive']);
		$view->assign('uvCPEmViToPcShowPlayButtonThumbnail', $uv_config_point['uvalaTargetShowMovieOverlayPlayButton']);

	}

	/**
	* @param \Enlight_Event_EventArgs $args
	*/
	public function collectDirectory(\Enlight_Event_EventArgs $args) {

		$directories = $args->getReturn();
		$directories[] = $this->getPath().'/Subscriber/views';

		return $directories;

	}

}