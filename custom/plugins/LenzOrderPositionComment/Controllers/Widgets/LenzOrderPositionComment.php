<?php

use Shopware\Bundle\AttributeBundle\Service\DataLoader;
use Shopware\Bundle\AttributeBundle\Service\DataPersister;

class Shopware_Controllers_Widgets_LenzOrderPositionComment extends Enlight_Controller_Action {

    public function saveBasketOrderPositionCommentAction() {
        $basketId = $this->Request()->getPost('basketId');
        $comment = $this->Request()->getPost('comment');
        /** @var DataLoader $dataLoader */
        $dataLoader = $this->container->get('shopware_attribute.data_loader');
        /** @var DataPersister $dataPersister */
        $dataPersister = $this->container->get('shopware_attribute.data_persister');

        try {
            $attributes = $dataLoader->load('s_order_basket_attributes', $basketId);
            $oldComment = $attributes['lenz_order_position_comment'];


            $dataPersister->persist(
                [
                    'lenz_order_position_comment' => $comment,
                ],
                's_order_basket_attributes',
                $basketId
            );

            if (Shopware()->Config()->getByNamespace('LenzOrderPositionComment', 'positionCommentInBasketName', false)) {
                $qb = Shopware()->Container()->get('dbal_connection')->createQueryBuilder();
                $qb->update('s_order_basket');
                $qb->set('articlename', 'REPLACE(articlename, :oldComment, :newComment)');
                $qb->setParameter('oldComment', '[' . $oldComment . ']');
                $qb->setParameter('newComment', '[' . $comment . ']');

                $qb->execute();
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        die();
    }
}