{extends file="parent:frontend/checkout/items/product.tpl"}

{block name='frontend_checkout_cart_item_delete_article'}

	{$smarty.block.parent}

	{if {config namespace="LenzOrderPositionComment" name="show"}}

		{block name="lenz_order_position_comment_frontend_checkout_items_product"}
			{if ({config namespace="LenzOrderPositionComment" name="showOnlyOnSpecificProducts"} == false || ($sBasketItem.additional_details.lenz_order_position_comment_active == true))}

			{* Additional customer comment for the order *}
			<div style="clear: both; margin-bottom: 1rem;">
				{s name="frontend/plugins/lenzorderpositioncomment/comment_pretext" namespace="frontend/plugins/lenzorderpositioncomment"}Kommentar zur Position:{/s}

				{if {config name="commentAsTextarea" namespace="LenzOrderPositionComment"} != true}
					<input type="text"
						   data-lenz-order-position-comment="true"
						   data-url="{url module="widgets" controller="LenzOrderPositionComment" action="saveBasketOrderPositionComment"}"
						   data-basketId="{$sBasketItem.id}"
						   name="user_position_comment[{$sBasketItem.id}]"
						   value="{if $lenzOrderPositionComments[$sBasketItem.id]}{$lenzOrderPositionComments[$sBasketItem.id]}{/if}"
					/>
				{else}
					<textarea data-lenz-order-position-comment="true"
							  data-url="{url module="widgets" controller="LenzOrderPositionComment" action="saveBasketOrderPositionComment"}"
							  data-basketId="{$sBasketItem.id}"
							  name="user_position_comment[{$sBasketItem.id}]"
					>{$lenzOrderPositionComments[$sBasketItem.id]}</textarea>
				{/if}

			</div>

			{/if}

		{/block}

	{/if}

{/block}