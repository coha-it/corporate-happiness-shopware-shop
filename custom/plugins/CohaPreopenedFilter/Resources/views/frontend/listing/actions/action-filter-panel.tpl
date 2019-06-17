{extends file="parent:frontend/listing/actions/action-filter-panel.tpl"}

{block name="frontend_listing_actions_filter_form_facets"}
    {$preopened_filter = $sCategoryContent.attribute.coha_preopened_filter}

    <!-- coha_preopened_filter -->
    <div class="filter--facet-container" {if $preopened_filter} style="display: block;" {/if} >
        {include file="frontend/listing/actions/action-filter-facets.tpl" facets=$facets}
    </div>
{/block}

