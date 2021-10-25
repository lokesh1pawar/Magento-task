<?php


namespace Techiq\Driver\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Creating table techiq_driver_table
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('techiq_driver_table')
        )->addColumn( // id
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Driver ID'
        )->addColumn( // name
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


        )->addColumn( // unknown
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            11,
            ['nullable' => true,'default' => 1],
            'Status'
        )->addColumn( // unknown 2
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false],
            'Created At'
        )->addColumn(  // unk
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false],
            'Updated At'
        )->setComment( // comment
            'Drivers Table'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}