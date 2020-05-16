<?php


use Phinx\Seed\AbstractSeed;

class TreeDataFake extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        $sql = "INSERT INTO tree (parent_id, text, description, type) VALUES 
        (NULL, 'root', 'root', 0),(1,'firstelement', 'first', 0),";

        $data = [];
        for ($i = 1; $i < 200; $i++) {
            $data[] = [1, "'$faker->city'", "'$faker->year'", 0];
        }


        foreach ($data as $datum) {
            $sql .= '(' .(implode(',',$datum)) . '),';
        }

        $string = substr($sql,0,-1);

        $this->execute($string);

    }
}
