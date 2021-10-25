<?php


namespace Techiq\Driver\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Creating table techiq_driver_table
         */
        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('techiq_driver_table')
            )->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Driver Id'
            )->addColumn( //name
                'fname',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'NAME'
                )->addColumn( // email
                    'email',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'EMAIL'
                )->addColumn( // adrress
                    'address',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'ADDRESS'
                )->addColumn( // phone no
                    'phone',
                    \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                    255,
                    ['nullable' => false],
                    'PHONE'
                    
        

            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => true,'default' => 1],
                'Status'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Created At'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Updated At'
            )->setComment(
                'Drivers Table'
            );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}