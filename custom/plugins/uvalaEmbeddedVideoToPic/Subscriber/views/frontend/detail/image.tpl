{extends file="parent:frontend/detail/image.tpl"}

{block name='frontend_detail_image_box'}
	{$uvembvid_tmpval_spancss_output = ''}
	{if $uvCPEmViToPcJqueryResizer == '1'}
		{$uvembvid_tmpval_spancss_output = $uvembvid_tmpval_spancss_output|cat:' uvemvitp_jqresactive'}
	{/if}
	{if $uvCPEmViToPcVieWatcher == '1'}
		{$uvembvid_tmpval_spancss_output = $uvembvid_tmpval_spancss_output|cat:' uvemvitp_jqswitchwatch'}
	{elseif $uvCPEmViToPcVieWatcher == '2'}
		{$uvembvid_tmpval_spancss_output = $uvembvid_tmpval_spancss_output|cat:' uvemvitp_jqscrollwatch uvemvitp_jqswitchwatch'}
	{/if}
	{$uvembvid_tmpval_activate_button_corner = 0}
	{if $uvCPEmViToPcAddendButton == '1'}
		{$uvembvid_tmpval_activate_button_corner = 1}
	{elseif $uvCPEmViToPcAddendButton == '2'}
		{$uvembvid_tmpval_activate_button_corner = 1}
		{$uvembvid_tmpval_spancss_output = $uvembvid_tmpval_spancss_output|cat:' uvemvitp_jqcobuonif'}
	{/if}
	{if $uvCPEmViToPcVideoButtons == '1'}
		{$uvembvid_tmpval_spancss_output = $uvembvid_tmpval_spancss_output|cat:' uvemvitp_jqshowbtns'}
	{/if}
	{$uvembvid_tmpval_addend_button = ''}
	{if $uvembvid_tmpval_activate_button_corner == 1}
		{if $uvCPEmViToPcAdButPos == '1'}
			{$uvembvid_tmpval_addend_button_class = 'uvembviadb_topleft'}
		{elseif $uvCPEmViToPcAdButPos == '2'}
			{$uvembvid_tmpval_addend_button_class = 'uvembviadb_bottomright'}
		{elseif $uvCPEmViToPcAdButPos == '3'}
			{$uvembvid_tmpval_addend_button_class = 'uvembviadb_bottomleft'}
		{else}
			{$uvembvid_tmpval_addend_button_class = 'uvembviadb_topright'}
		{/if}
		{capture name="uvembvid_tmpcapture_addend_button"}<div class="uvemvitp_addendbutton {$uvembvid_tmpval_addend_button_class}">{s name="embvid_popup_button" namespace="frontend/detail/image"}{/s}</div>{/capture}
		{$uvembvid_tmpval_addend_button = $smarty.capture.uvembvid_tmpcapture_addend_button}
	{/if}
	{$smarty.block.parent}
{/block}

{block name='frontend_detail_image_default_image_element'}
	{if $sArticle.image.attribute.uv_external_video_url == ''}
		{$smarty.block.parent}
	{else}
		<span class="image--element uvcurrent_video">
			<span class="image--media{$uvembvid_tmpval_spancss_output}">
				{$uvembvid_tmpval_addend_button}
				{if $sArticle.image.attribute.uv_external_video_outputschema == '2'}
					{$uvConfigPointIframeCodeTwo|replace:"##url_to_replace##":$sArticle.image.attribute.uv_external_video_url}
				{elseif $sArticle.image.attribute.uv_external_video_outputschema == '3'}
					{$uvConfigPointIframeCodeThree|replace:"##url_to_replace##":$sArticle.image.attribute.uv_external_video_url}
				{elseif $sArticle.image.attribute.uv_external_video_outputschema == '4'}
					{$uvConfigPointIframeCodeFour|replace:"##url_to_replace##":$sArticle.image.attribute.uv_external_video_url}
				{elseif $sArticle.image.attribute.uv_external_video_outputschema == '5'}
					{$uvConfigPointIframeCodeFive|replace:"##url_to_replace##":$sArticle.image.attribute.uv_external_video_url}
				{else}
					{$uvConfigPointIframeCodeOne|replace:"##url_to_replace##":$sArticle.image.attribute.uv_external_video_url}
				{/if}
			</span>
		</span>
	{/if}
{/block}

{block name='frontend_detail_images_image_element'}
	{if $image.attribute.uv_external_video_url == ''}
		{$smarty.block.parent}
	{else}
		<span class="image--element uvcurrent_video">
			<span class="image--media{$uvembvid_tmpval_spancss_output}">
				{$uvembvid_tmpval_addend_button}
				{if $image.attribute.uv_external_video_outputschema == '2'}
					{$uvConfigPointIframeCodeTwo|replace:"##url_to_replace##":$image.attribute.uv_external_video_url}
				{elseif $image.attribute.uv_external_video_outputschema == '3'}
					{$uvConfigPointIframeCodeThree|replace:"##url_to_replace##":$image.attribute.uv_external_video_url}
				{elseif $image.attribute.uv_external_video_outputschema == '4'}
					{$uvConfigPointIframeCodeFour|replace:"##url_to_replace##":$image.attribute.uv_external_video_url}
				{elseif $image.attribute.uv_external_video_outputschema == '5'}
					{$uvConfigPointIframeCodeFive|replace:"##url_to_replace##":$image.attribute.uv_external_video_url}
				{else}
					{$uvConfigPointIframeCodeOne|replace:"##url_to_replace##":$image.attribute.uv_external_video_url}
				{/if}
			</span>
		</span>
	{/if}
{/block}