<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class OauthClients extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('oauth_clients', ['engine' => 'MyISAM', 'collation' => 'utf8mb4_unicode_ci', 'comment' => '' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('user_id', 'integer', ['limit' => MysqlAdapter::INT_BIG,'null' => true,'signed' => true,'comment' => '',])
			->addColumn('name', 'string', ['limit' => 191,'null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('secret', 'string', ['limit' => 100,'null' => true,'signed' => false,'comment' => '',])
			->addColumn('provider', 'string', ['limit' => 191,'null' => true,'signed' => false,'comment' => '',])
			->addColumn('redirect', 'text', ['limit' => MysqlAdapter::TEXT_MEDIUM,'null' => false,'signed' => false,'comment' => '',])
			->addColumn('personal_access_client', 'boolean', ['null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('password_client', 'boolean', ['null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('revoked', 'boolean', ['null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('created_at', 'timestamp', ['null' => true,'signed' => false,'comment' => '',])
			->addColumn('updated_at', 'timestamp', ['null' => true,'signed' => false,'comment' => '',])
			->addIndex(['user_id'], ['name' => 'oauth_clients_user_id_index'])
            ->create();
    }
}
