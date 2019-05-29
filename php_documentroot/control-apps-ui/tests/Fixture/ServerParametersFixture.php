<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServerParametersFixture
 */
class ServerParametersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => 'id', 'precision' => null, 'unsigned' => null],
        'server_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => '対象サーバーID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'application_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => 'アプリケーションID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'parameter_type_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => '属性タイプID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'value' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => '値', 'precision' => null, 'fixed' => null],
        'comment' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => 'コメント', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => '作成日時', 'precision' => null],
        'updated' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => '更新日時', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'server_parameters_fk1' => ['type' => 'foreign', 'columns' => ['application_id'], 'references' => ['applications', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'server_parameters_fk2' => ['type' => 'foreign', 'columns' => ['parameter_type_id'], 'references' => ['parameter_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'server_parameters_fk3' => ['type' => 'foreign', 'columns' => ['server_id'], 'references' => ['servers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'server_id' => 1,
                'application_id' => 1,
                'parameter_type_id' => 1,
                'value' => 'Lorem ipsum dolor sit amet',
                'comment' => 'Lorem ipsum dolor sit amet',
                'created' => '2019-05-27',
                'updated' => '2019-05-27'
            ],
        ];
        parent::init();
    }
}
