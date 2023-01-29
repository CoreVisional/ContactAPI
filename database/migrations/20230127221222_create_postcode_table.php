<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePostcodeTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // Create postcode table
        $table = $this->table('postcode', ['id' => false, 'primary_key' => 'postcode_id']);
        $table
            ->addColumn('postcode_id', 'biginteger', ['identity' => true])
            ->addColumn("state", "string", ["limit" => 50])
            ->addColumn("postcode", "string", ["limit" => 5])
            ->addTimestamps()
            ->create();
    }
}
