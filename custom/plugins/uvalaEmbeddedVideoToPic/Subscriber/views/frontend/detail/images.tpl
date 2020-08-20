{extends file="parent:frontend/detail/images.tpl"}

{block name='frontend_detail_image_thumbs_main_img'}
	{if $sArticle.image.attribute.uv_external_video_url == ''}
		{$smarty.block.parent}
	{else}
		{if $uvCPEmViToPcShowPlayButtonThumbnail == '1'}
			<span class="uv_videooverlay">
		{/if}
				{if $sArticle.image.attribute.uv_external_video_thumbnail == ''}
					{$smarty.block.parent}
				{else}
					{if $sArticle.image.attribute.uv_external_video_outputschema == '2'}
						<img srcset="{$uvConfigPointThumbnailCodeTwo|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{elseif $sArticle.image.attribute.uv_external_video_outputschema == '3'}
						<img srcset="{$uvConfigPointThumbnailCodeThree|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{elseif $sArticle.image.attribute.uv_external_video_outputschema == '4'}
						<img srcset="{$uvConfigPointThumbnailCodeFour|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{elseif $sArticle.image.attribute.uv_external_video_outputschema == '5'}
						<img srcset="{$uvConfigPointThumbnailCodeFive|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{else}
						<img srcset="{$uvConfigPointThumbnailCodeOne|replace:"##thumbnail_to_replace##":$sArticle.image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{/if}
				{/if}
		{if $uvCPEmViToPcShowPlayButtonThumbnail == '1'}
			</span>
		{/if}
	{/if}
{/block}

{block name='frontend_detail_image_thumbs_images_img'}
	{if $image.attribute.uv_external_video_url == ''}
		{$smarty.block.parent}
	{else}
		{if $uvCPEmViToPcShowPlayButtonThumbnail == '1'}
			<span class="uv_videooverlay">
		{/if}
				{if $image.attribute.uv_external_video_thumbnail == ''}
					{$smarty.block.parent}
				{else}
					{if $image.attribute.uv_external_video_outputschema == '2'}
						<img srcset="{$uvConfigPointThumbnailCodeTwo|replace:"##thumbnail_to_replace##":$image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{elseif $image.attribute.uv_external_video_outputschema == '3'}
						<img srcset="{$uvConfigPointThumbnailCodeThree|replace:"##thumbnail_to_replace##":$image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{elseif $image.attribute.uv_external_video_outputschema == '4'}
						<img srcset="{$uvConfigPointThumbnailCodeFour|replace:"##thumbnail_to_replace##":$image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{elseif $image.attribute.uv_external_video_outputschema == '5'}
						<img srcset="{$uvConfigPointThumbnailCodeFive|replace:"##thumbnail_to_replace##":$image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{else}
						<img srcset="{$uvConfigPointThumbnailCodeOne|replace:"##thumbnail_to_replace##":$image.attribute.uv_external_video_thumbnail}"
							alt="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt}"
							title="{s name="DetailThumbnailText" namespace="frontend/detail/index"}{/s}: {$alt|truncate:160}"
							class="thumbnail--image" />
					{/if}
				{/if}
		{if $uvCPEmViToPcShowPlayButtonThumbnail == '1'}
			</span>
		{/if}
	{/if}
{/block}