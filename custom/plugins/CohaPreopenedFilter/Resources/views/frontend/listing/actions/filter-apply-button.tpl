{extends file="parent:frontend/listing/actions/filter-apply-button.tpl"}


{namespace name="frontend/listing/listing_actions"}

{block name="frontend_listing_actions_filter_submit_button"}

    {$preopened_filter = $sCategoryContent.attribute.coha_preopened_filter}


    <div class="filter--actions{if $clsSuffix} {$clsSuffix}{/if}" {if $preopened_filter} style="display: block;" {/if}>
        <button type="submit"
                class="btn is--primary filter--btn-apply is--large is--icon-right"
                disabled="disabled">
            <span class="filter--count"></span>
            {s name="ListingFilterApplyButton"}{/s}
            <i class="icon--cycle"></i>
        </button>
    </div>

    {if $preopened_filter}
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                // Your code to run since DOM is loaded and ready
                jQuery(document).ready(function($) {
                    $('.action--filter-options').addClass('is--collapsed');
                });
            });
        </script>
    {/if}

{/block}