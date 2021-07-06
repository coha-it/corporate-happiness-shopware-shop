<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagPaymentPayPalUnified\Components\Services\RiskManagement;

use Doctrine\DBAL\Connection;
use SwagPaymentPayPalUnified\Components\DependencyProvider;
use SwagPaymentPayPalUnified\Components\PaymentMethodProvider;

class RiskManagement implements RiskManagementInterface
{
    /**
     * @var DependencyProvider
     */
    private $dependencyProvider;

    /**
     * @var Connection
     */
    private $connection;

    public function __construct(DependencyProvider $dependencyProvider, Connection $connection)
    {
        $this->dependencyProvider = $dependencyProvider;
        $this->connection = $connection;
    }

    /**
     * @param int|null $productId
     * @param int|null $categoryId
     *
     * @return bool
     */
    public function isPayPalNotAllowed($productId = null, $categoryId = null)
    {
        $this->dependencyProvider->getSession()->offsetSet(self::PRODUCT_ID_SESSION_NAME, $productId);
        $this->dependencyProvider->getSession()->offsetSet(self::CATEGORY_ID_SESSION_NAME, $categoryId);

        /** @var \sAdmin $sAdmin */
        $sAdmin = $this->dependencyProvider->getModule('Admin');
        /** @var \sBasket $sBasket */
        $sBasket = $this->dependencyProvider->getModule('Basket');

        $paymentId = (new PaymentMethodProvider())->getPaymentId($this->connection);

        return $sAdmin->sManageRisks($paymentId, $sBasket->sGetBasket(), $sAdmin->sGetUserData() ?: []);
    }
}
