<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204224458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rev_student (id INT AUTO_INCREMENT NOT NULL, classroom_id INT DEFAULT NULL, nsc VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_DFF7BE926278D5A8 (classroom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rev_student ADD CONSTRAINT FK_DFF7BE926278D5A8 FOREIGN KEY (classroom_id) REFERENCES rev_classrom (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rev_student');
    }
}
