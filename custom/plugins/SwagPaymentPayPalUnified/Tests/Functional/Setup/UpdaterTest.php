<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagPaymentPayPalUnified\Tests\Functional\Setup;

use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;
use SwagPaymentPayPalUnified\PayPalBundle\PaymentType;
use SwagPaymentPayPalUnified\Setup\Updater;
use SwagPaymentPayPalUnified\Tests\Functional\DatabaseTestCaseTrait;

class UpdaterTest extends TestCase
{
    use DatabaseTestCaseTrait;

    public function testUpdateTo303()
    {
        $sql = \file_get_contents(__DIR__ . '/_fixtures/orders.sql');
        Shopware()->Container()->get('dbal_connection')->exec($sql);

        $updater = new Updater(
            Shopware()->Container()->get('shopware_attribute.crud_service'),
            Shopware()->Container()->get('models'),
            Shopware()->Container()->get('dbal_connection')
        );

        $reflectionMethod = (new \ReflectionClass(Updater::class))->getMethod('updateTo303');
        $reflectionMethod->setAccessible(true);

        $reflectionMethod->invoke($updater);

        $orderIds = [100080, 100081, 100082, 100083];
        $result = Shopware()->Container()->get('dbal_connection')->createQueryBuilder()
            ->select(['orderID', 'swag_paypal_unified_payment_type'])
            ->from('s_order_attributes')
            ->where('orderID IN (:orderIds)')
            ->orderBy('orderId')
            ->setParameter('orderIds', $orderIds, Connection::PARAM_INT_ARRAY)
            ->execute()
            ->fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_COLUMN);

        static::assertNull($result[100080][0]); // should be updated from "PayPalClassic" to NULL
        static::assertNull($result[100081][0]); // should be updated from "PayPalClassic" to NULL

        static::assertSame(PaymentType::PAYPAL_CLASSIC, $result[100082][0]); // should not be updated
        static::assertSame(PaymentType::PAYPAL_CLASSIC, $result[100083][0]); // should not be updated
    }

    public function testUpdateTo304()
    {
        $sql = \file_get_contents(__DIR__ . '/_fixtures/orders_invoice.sql');
        Shopware()->Container()->get('dbal_connection')->exec($sql);

        $updater = new Updater(
            Shopware()->Container()->get('shopware_attribute.crud_service'),
            Shopware()->Container()->get('models'),
            Shopware()->Container()->get('dbal_connection')
        );

        $reflectionMethod = (new \ReflectionClass(Updater::class))->getMethod('updateTo304');
        $reflectionMethod->setAccessible(true);

        $reflectionMethod->invoke($updater);

        $orderIds = [100080, 100081, 100082, 100083];
        $result = Shopware()->Container()->get('dbal_connection')->createQueryBuilder()
            ->select(['orderID', 'swag_paypal_unified_payment_type'])
            ->from('s_order_attributes')
            ->where('orderID IN (:orderIds)')
            ->orderBy('orderId')
            ->setParameter('orderIds', $orderIds, Connection::PARAM_INT_ARRAY)
            ->execute()
            ->fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_COLUMN);

        static::assertNull($result[100080][0]); // should remain NULL as this is not PayPal
        static::assertSame(PaymentType::PAYPAL_CLASSIC, $result[100081][0]); // should remain classic
        static::assertSame(PaymentType::PAYPAL_PLUS, $result[100082][0]); // should remain PLUS
        static::assertSame(PaymentType::PAYPAL_INVOICE, $result[100083][0]); // should be updated
    }
}
