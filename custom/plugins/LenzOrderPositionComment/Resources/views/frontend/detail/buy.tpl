{extends file="parent:frontend/detail/buy.tpl"}

{block name="frontend_detail_buy_button_container"}

	{if {config namespace="LenzOrderPositionComment" name="show"} && {config namespace="LenzOrderPositionComment" name="showPositionCommentOnDetail"} == true}

		{if {config namespace="LenzOrderPositionComment" name="showOnlyOnSpecificProducts"} == false || ({config namespace="LenzOrderPositionComment" name="showOnlyOnSpecificProducts"} && $sArticle.lenz_order_position_comment_active == true)}

			<div class="lenz-order-position-comment">
				<label>
					{if $sArticle.lenz_order_position_comment_text}
						{$sArticle.lenz_order_position_comment_text}
					{else}
					{s name="frontend/plugins/lenzorderpositioncomment/comment_pretext" namespace="frontend/plugins/lenzorderpositioncomment"}Kommentar zur Position:{/s}
					{/if}
				</label>
				{if {config name="commentAsTextarea" namespace="LenzOrderPositionComment"} != true}
				<input type="text" name="lenz_order_position_comment" value="" {if {config namespace="LenzOrderPositionComment" name="commentRequired"} == 1}required="required"{/if}	/>
				{else}
					<textarea name="lenz_order_position_comment" value="" {if {config namespace="LenzOrderPositionComment" name="commentRequired"} == 1}required="required"{/if}></textarea>
				{/if}
			</div>

		{/if}

	{/if}

	{$smarty.block.parent}
{/block}