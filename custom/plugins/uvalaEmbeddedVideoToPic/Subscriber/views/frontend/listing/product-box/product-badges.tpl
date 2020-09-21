{extends file="parent:frontend/listing/product-box/product-badges.tpl"}

{block name="frontend_listing_box_article_discount"}
	{$smarty.block.parent}
	{if $uvConfigPointShowBadge == 1}
		{$uvcheck_playbadge = 0}
		{if $sArticle.image.attribute.uv_external_video_url != ''}
			{$uvcheck_playbadge = 1}
		{/if}
		{if $sArticle.attributes.images}
			{$uvimages_output = $sArticle.attributes.images->get('images')}
			{foreach $uvimages_output as $uvimage_array}
				{if $uvimage_array.attribute.uv_external_video_url != ''}
					{$uvcheck_playbadge = 1}
				{/if}
			{/foreach}
		{/if}
		{if $uvcheck_playbadge == 1}
			<div class="product--badge badge--discount">{s name="product_listing_playbadge" namespace="frontend/listing/box_article"}&#x25BA;{/s}</div>
		{/if}
	{/if}
{/block}