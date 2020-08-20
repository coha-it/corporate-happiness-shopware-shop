{extends file="parent:frontend/listing/product-box/box-emotion.tpl"}

{block name="frontend_listing_box_article_image_picture"}

	{if $sArticle.image.attribute.uv_external_video_thumbnail == ''}
		{$smarty.block.parent}
	{else}

		{$desc = $productName|escape}

		{if $sArticle.image.description}
			{$desc = $sArticle.image.description|escape}
		{/if}

		{if $sArticle.image.attribute.uv_external_video_outputschema == '2'}
			<img src="{$uvConfigPointThumbnailCodeTwo|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}" alt="{$desc|strip_tags|truncate:160}" />
		{elseif $sArticle.image.attribute.uv_external_video_outputschema == '3'}
			<img src="{$uvConfigPointThumbnailCodeThree|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}" alt="{$desc|strip_tags|truncate:160}" />
		{elseif $sArticle.image.attribute.uv_external_video_outputschema == '4'}
			<img src="{$uvConfigPointThumbnailCodeFour|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}" alt="{$desc|strip_tags|truncate:160}" />
		{elseif $sArticle.image.attribute.uv_external_video_outputschema == '5'}
			<img src="{$uvConfigPointThumbnailCodeFive|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}" alt="{$desc|strip_tags|truncate:160}" />
		{else}
			<img src="{$uvConfigPointThumbnailCodeOne|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}" alt="{$desc|strip_tags|truncate:160}" />
		{/if}

	{/if}

{/block}