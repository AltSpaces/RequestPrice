<?php

$this->startSetup();
$this->run(" DROP TABLE IF EXISTS {$this->getTable('requestprice/requests')}");
$table = $this->getConnection()
    ->newTable($this->getTable('requestprice/requests'))
    ->addColumn(
        'entity_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'unsigned'  => true,
            'identity'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Relation ID'
    )
    ->addColumn(
        'customer_name',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => true,
            'default'   => null
        ),
        'Customer Name'
    )

    ->addColumn(
        'customer_email',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => true,
            'default'   => null
        ),
        'Customer Email'
    )
    ->addColumn(
        'product_sku',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => true,
            'default'   => null
        ),
        'Requested Product SKU'
    )
    ->addColumn(
        'customer_comment',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => true,
            'default'   => null
        ),
        'Customer comment'
    )
    ->addColumn(
        'status',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => true,
            'default'   => null
        ),
        'Request status'
    )
    ->addColumn(
        'created_at',
        Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
        null,
        array(
            'nullable'  => false,
        ),
        'Date of creation'
    );

$this->getConnection()->createTable($table);
