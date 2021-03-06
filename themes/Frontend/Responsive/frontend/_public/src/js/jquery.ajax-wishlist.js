(function ($, window, undefined) {
    'use strict';

    /**
     * AJAX wishlist plugin
     *
     * The plugin provides the ability to add products to the notepad using AJAX. The benefit
     * using AJAX is that the user doesn't get a page reload and therefor remains at the
     * exact same spot on the page.
     *
     * @example
     * <div class="container" data-ajax-wishlist="true">
     *     ...lots of data
     *     <a href="action--note" data-text="Saved">Note it</a>
     * </div>
     */
    $.plugin('swAjaxWishlist', {

        /** @object Default configuration */
        defaults: {

            /**
             * The DOM selector for the counter.
             *
             * @property counterSelector
             * @type {String}
             */
            counterSelector: '.notes--quantity',

            /**
             * The DOM selector for the wishlist link.
             *
             * @property wishlistSelector
             * @type {String}
             */
            wishlistSelector: '.entry--notepad',

            /**
             * The css class for the check icon.
             *
             * @property iconCls
             * @type {String}
             */
            iconCls: 'icon--check',

            /**
             * The css class for the saved state.
             *
             * @property savedCls
             * @type {String}
             */
            savedCls: 'js--is-saved',

            /**
             * The snippet text for the saved state.
             *
             * @property text
             * @type {String}
             */
            text: 'Gemerkt',

            /**
             * Delay of the toggle back animation of the button
             *
             * @property delay
             * @type {Number}
             */
            delay: 1500
        },

        /**
         * Initializes the plugin
         */
        init: function () {
            this.applyDataAttributes();

            this.$wishlistButton = $(this.opts.wishlistSelector);
            this.$counter = $(this.opts.counterSelector);

            this.registerEvents();
        },

        /**
         * Registers the necessary event listeners for the plugin
         */
        registerEvents: function () {
            this.$el.on(this.getEventName('click'), '.action--note, .link--notepad', $.proxy(this.triggerRequest, this));

            $.publish('plugin/swAjaxWishlist/onRegisterEvents', [this]);
        },

        /**
         * Event listener handler which will be called when the user clicks on the associated element.
         *
         * The handler triggers an AJAX call to add a product to the notepad.
         *
         * @param {object} event - event object
         */
        triggerRequest: function (event) {
            var $target = $(event.currentTarget),
                url = $target.attr('data-ajaxUrl');

            if (typeof url === 'undefined' || $target.hasClass(this.opts.savedCls)) {
                return;
            }

            event.preventDefault();

            $.ajax({
                url: url,
                dataType: 'json',
                method: 'POST',
                success: $.proxy(this.responseHandler, this, $target)
            });

            $.publish('plugin/swAjaxWishlist/onTriggerRequest', [this, event, url]);
        },

        /**
         * Handles the server response and terminates if the AJAX was successful,
         * updates the counter in the head area of the store front and
         * triggers the animation of the associated element.
         *
         * @param {object} $target - The associated element
         * @param {String} json - The ajax response as a JSON string
         */
        responseHandler: function ($target, response) {
            $.publish('plugin/swAjaxWishlist/onTriggerRequestLoaded', [this, $target, response]);

            if (!response.success) {
                return;
            }

            this.updateCounter(response.notesCount);
            this.animateElement($target);

            $.publish('plugin/swAjaxWishlist/onTriggerRequestFinished', [this, $target, response]);
        },

        /**
         * Animates the element when the AJAX request was successful.
         *
         * @param {object} $target - The associated element
         */
        animateElement: function ($target) {
            var me = this,
                $icon = $target.find('i'),
                originalIcon = $icon[0].className,
                $text = $target.find('.action--text'),
                originalText = $text.html();

            $target.addClass(me.opts.savedCls);
            $text.html($target.attr('data-text') || me.opts.text);
            $icon.removeClass(originalIcon).addClass(me.opts.iconCls);

            window.setTimeout(function () {
                $target.removeClass(me.opts.savedCls);
                $text.html(originalText);
                $icon.removeClass(me.opts.iconCls).addClass(originalIcon);

                $.publish('plugin/swAjaxWishlist/onAnimateElementFinished', [me, $target]);
            }, me.opts.delay);

            $.publish('plugin/swAjaxWishlist/onAnimateElement', [me, $target]);
        },

        /**
         * Updates the wishlist badge counter. If the badge isn't available,
         * it will be created on runtime and nicely showed with a transition.
         *
         * @param {String|Number} count
         * @returns {*|HTMLElement|$counter}
         */
        updateCounter: function (count) {
            var $btn = this.$wishlistButton,
                animate = 'transition';

            if (this.$counter.length) {
                this.$counter.html(count);
                return this.$counter;
            }

            // Initial state don't has the badge, so we need to create it
            this.$counter = $('<span>', {
                class: 'badge notes--quantity',
                html: count,
                css: { opacity: 0 }
            }).appendTo($btn.find('a'));

            if (!$.support.transition) {
                animate = 'animate';
            }

            // Show it with a nice transition
            this.$counter[animate]({
                opacity: 1
            }, 500);

            $.publish('plugin/swAjaxWishlist/onUpdateCounter', [this, this.$counter, count]);

            return this.$counter;
        },

        /**
         * Destroys the plugin
         */
        destroy: function () {
            this.$el.off(this.getEventName('click'));
        }
    });
})(jQuery, window);
