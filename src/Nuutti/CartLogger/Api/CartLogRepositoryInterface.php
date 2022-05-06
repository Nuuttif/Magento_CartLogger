<?php
namespace Nuutti\CartLogger\Api;

use Nuutti\CartLogger\Api\Data\CartLogInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CartLogRepositoryInterface
 *
 * @api
 */
interface CartLogRepositoryInterface
{
    /**
     * Create or update a CartLog.
     *
     * @param CartLogInterface $page
     * @return CartLogInterface
     */
    public function save(CartLogInterface $page);

    /**
     * Get a CartLog by Id
     *
     * @param int $id
     * @return CartLogInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If CartLog with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve CartLogs which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a CartLog
     *
     * @param CartLogInterface $page
     * @return CartLogInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If CartLog with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(CartLogInterface $page);

    /**
     * Delete a CartLog by Id
     *
     * @param int $id
     * @return CartLogInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
