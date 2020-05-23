<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class OauthRefreshTokens extends Migrator
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
        $table = $this->table('oauth_refresh_tokens', ['engine' => 'MyISAM', 'collation' => 'utf8mb4_unicode_ci', 'comment' => '' ,'id' => false ,'primary_key' => ['id']]);
        $table->addColumn('id', 'string', ['limit' => 100,'null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('access_token_id', 'string', ['limit' => 100,'null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('revoked', 'boolean', ['null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('expires_at', 'datetime', ['null' => true,'signed' => false,'comment' => '',])
            ->create();
    }
}
