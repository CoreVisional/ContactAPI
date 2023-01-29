<?php


use Phinx\Seed\AbstractSeed;

class PostcodeSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $table = $this->table('postcode');

        $data = [
            ["state" => "Perak", "postcode" => "35000"],
            ["state" => "Kuala Lumpur", "postcode" => "50000"],
            ["state" => "Johor", "postcode" => "80000"]
        ];

        $table->insert($data)->save();
    }
}
