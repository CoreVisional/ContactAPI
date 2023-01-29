<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCustomersTable extends AbstractMigration
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
        // Create customer table
        $table = $this->table('customers', ['id' => false, 'primary_key' => 'customer_id']);
        $table
            ->addColumn('customer_id', 'biginteger', ['identity' => true])
            ->addColumn("postcode_id", "biginteger")
            ->addForeignKey("postcode_id", "postcode", "postcode_id", ["delete" => "CASCADE", "update" => "CASCADE"])
            ->addColumn("name", "string", ["limit" => 255])
            ->addColumn("dob", "date")
            ->addColumn("address", "string", ["limit" => 255])
            ->addTimestamps()
            ->create();
    }
}
