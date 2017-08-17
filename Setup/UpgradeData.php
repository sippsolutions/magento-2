<?php

/**
 * PAYONE Magento 2 Connector is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PAYONE Magento 2 Connector is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with PAYONE Magento 2 Connector. If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @category  Payone
 * @package   Payone_Magento2_Plugin
 * @author    FATCHIP GmbH <support@fatchip.de>
 * @copyright 2003 - 2016 Payone GmbH
 * @license   <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link      http://www.payone.de
 */

namespace Payone\Core\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Sales\Setup\SalesSetupFactory;

/**
 * Class UpgradeData
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * Sales setup factory
     *
     * @var SalesSetupFactory
     */
    protected $salesSetupFactory;

    /**
     * Constructor
     *
     * @param SalesSetupFactory $salesSetupFactory
     */
    public function __construct(SalesSetupFactory $salesSetupFactory)
    {
        $this->salesSetupFactory = $salesSetupFactory;
    }

    /**
     * Upgrade method
     *
     * @param  ModuleDataSetupInterface $setup
     * @param  ModuleContextInterface   $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_reference')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_reference',
                ['type' => 'varchar', 'length' => 64, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_workorder_id')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_workorder_id',
                ['type' => 'varchar', 'length' => 64, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_installment_duration')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_installment_duration',
                ['type' => 'integer', 'length' => null]
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankaccountholder')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankaccountholder',
                ['type' => 'varchar', 'length' => 64, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankcountry')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankcountry',
                ['type' => 'varchar', 'length' => 2, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankaccount')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankaccount',
                ['type' => 'varchar', 'length' => 32, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankcode')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankcode',
                ['type' => 'varchar', 'length' => 32, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankiban')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankiban',
                ['type' => 'varchar', 'length' => 64, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankbic')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankbic',
                ['type' => 'varchar', 'length' => 32, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankcity')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankcity',
                ['type' => 'varchar', 'length' => 64, 'default' => '']
            );
        }
        if (!$setup->getConnection()->tableColumnExists($setup->getTable('sales_order'), 'payone_clearing_bankname')) {
            $salesInstaller = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
            $salesInstaller->addAttribute(
                'order',
                'payone_clearing_bankname',
                ['type' => 'varchar', 'length' => 64, 'default' => '']
            );
        }
        $setup->endSetup();
    }

}