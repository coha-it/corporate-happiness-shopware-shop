{extends file="parent:frontend/listing/actions/action-filter-button.tpl"}


{* Filter button which will be included in the "listing/listing_actions.tpl" *}
{namespace name="frontend/listing/listing_actions"}

{block name="frontend_listing_actions_filter_button"}

    {$preopened_filter = $sCategoryContent.attribute.coha_preopened_filter}

    {if $facets|count > 0}
        <div class="action--filter-btn">
            <a href="#"
               class="filter--trigger btn is--small {if $preopened_filter}is--active{/if}"
               data-filter-trigger="true"
               data-offcanvas="true"
               data-offCanvasSelector=".action--filter-options"
               data-closeButtonSelector=".filter--close-btn">
                <i class="icon--filter"></i>
                {s name='ListingFilterButton'}{/s}
                <span class="action--collapse-icon"></span>
            </a>
        </div>
    {/if}

{/block}
