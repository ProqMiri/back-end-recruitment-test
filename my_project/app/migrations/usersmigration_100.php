<?php

use Phalcon\Db\Column as Column;
use Phalcon\Db\Index as Index;
use Phalcon\Db\Reference as Reference;
use Phalcon\Mvc\Model\Migration;

class UsersMigration_100 extends Migration
{
    public function up()
    {
        $this->morphTable(
            'users',
            [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type'          => Column::TYPE_INTEGER,
                            'size'          => 10,
                            'unsigned'      => true,
                            'notNull'       => true,
                            'autoIncrement' => true,
                            'first'         => true,
                        ]
                    ),
                    new Column(
                        'name',
                        [
                            'type'     => Column::TYPE_VARCHAR,
                            'size'     => 100,
                            'notNull'  => true,
                            'after'    => 'id',
                        ]
                    ),
                    new Column(
                        'username',
                        [
                            'type'     => Column::TYPE_VARCHAR,
                            'size'     => 100,
                            'notNull'  => true,
                            'after'    => 'name',
                        ]
                    ),
                    new Column(
                        'password',
                        [
                            'type'     => Column::TYPE_VARCHAR,
                            'size'     => 128,
                            'notNull'  => true,
                            'after'    => 'username',
                        ]
                    ),
                    new Column(
                        'password',
                        [
                            'type'     => Column::TYPE_TIMESTAMP,
                            'notNull'  => true,
                            'after'    => 'password',
                        ]
                    ),
                ],
                'indexes' => [
                    new Index(
                        'PRIMARY',
                        [
                            'id',
                        ]
                    )
                ],
            ]
        );
    }
}