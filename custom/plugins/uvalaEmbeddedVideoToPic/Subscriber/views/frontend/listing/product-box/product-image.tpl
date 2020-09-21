{extends file="parent:frontend/listing/product-box/product-image.tpl"}

{block name="frontend_listing_box_article_image_media"}

	{if $sArticle.image.attribute.uv_external_video_thumbnail == ''}
		{$smarty.block.parent}
	{else}
		<span class="image--media">

			{$desc = $sArticle.articleName|escape}

			{if $sArticle.image.description}
				{$desc = $sArticle.image.description|escape}
			{/if}

			{if $sArticle.image.attribute.uv_external_video_outputschema == '2'}
				<img srcset="{$uvConfigPointThumbnailCodeTwo|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
					alt="{$desc}" title="{$desc|truncate:160}" />
			{elseif $sArticle.image.attribute.uv_external_video_outputschema == '3'}
				<img srcset="{$uvConfigPointThumbnailCodeThree|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
					alt="{$desc}" title="{$desc|truncate:160}" />
			{elseif $sArticle.image.attribute.uv_external_video_outputschema == '4'}
				<img srcset="{$uvConfigPointThumbnailCodeFour|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
					alt="{$desc}" title="{$desc|truncate:160}" />
			{elseif $sArticle.image.attribute.uv_external_video_outputschema == '5'}
				<img srcset="{$uvConfigPointThumbnailCodeFive|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
					alt="{$desc}" title="{$desc|truncate:160}" />
			{else}
				<img srcset="{$uvConfigPointThumbnailCodeOne|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
					alt="{$desc}" title="{$desc|truncate:160}" />
			{/if}

		</span>
	{/if}

{/block}