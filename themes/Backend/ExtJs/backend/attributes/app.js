/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 *
 * @category   Shopware
 * @package    ProductStream
 * @version    $Id$
 * @author shopware AG
 */

//{namespace name="backend/attributes/main"}
//{block name="backend/attributes/app"}
Ext.define('Shopware.apps.Attributes', {
    name: 'Shopware.apps.Attributes',
    extend: 'Enlight.app.SubApplication',
    bulkLoad: true,
    loadPath: '{url action=load}',

    views: ['Window', 'Listing', 'Detail', 'ArrayStoreField'],
    models: ['Table', 'Types'],
    stores: ['Table', 'Column', 'Types', 'Entities', 'DependingTable'],

    controllers: [ 'Main' ],

    launch: function() {
        var me = this,
            mainController = me.getController('Main');

        return mainController.mainWindow;
    }
});
//{/block}
