<?php


use Phinx\Seed\AbstractSeed;

class TreeData extends AbstractSeed
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
        $sql = "INSERT INTO tree (parent_id, text, description, type) VALUES 
        (NULL, 'root', 'root', 0),
        (1, 'Книги', 'Книги', 0),
        (1, 'Журналы', 'Журналы', 0),
        (1, 'Музыка', 'Музыка', 0),
        (1, 'Фильмы', 'Фильмы', 0),
        (2, 'Программирование', 'Программирование', 0),
        (6, 'Linux', 'Linux', 0),
        (7, 'Робачевский', 'Робачевский', 1),
        (3, 'Наука и жизнь', 'Наука и жизнь', 1)
        ";

        $this->execute($sql);
    }
}
