<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class FailedJobs extends Migrator
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
        $table = $this->table('failed_jobs', ['engine' => 'MyISAM', 'collation' => 'utf8mb4_unicode_ci', 'comment' => '' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('connection', 'text', ['limit' => MysqlAdapter::TEXT_MEDIUM,'null' => false,'signed' => false,'comment' => '',])
			->addColumn('queue', 'text', ['limit' => MysqlAdapter::TEXT_MEDIUM,'null' => false,'signed' => false,'comment' => '',])
			->addColumn('payload', 'text', ['limit' => 100,'null' => false,'signed' => false,'comment' => '',])
			->addColumn('exception', 'text', ['limit' => 100,'null' => false,'signed' => false,'comment' => '',])
			->addColumn('failed_at', 'timestamp', ['null' => false,'default' => 'CURRENT_TIMESTAMP','signed' => false,'comment' => '',])
            ->create();
    }
}
