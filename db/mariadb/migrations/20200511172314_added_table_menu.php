<?php

use Phinx\Migration\AbstractMigration;

class AddedTableMenu extends AbstractMigration
{
    public function up()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `menu` (
          `id` INT NOT NULL AUTO_INCREMENT,
          `parent_id` INT NULL,
          `name` VARCHAR(255) NOT NULL,
          `description` VARCHAR(255) NOT NULL,
          `type` INT NOT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (parent_id) REFERENCES menu (id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = 'DROP TABLE `menu`';

        $this->execute($sql);
    }
}
