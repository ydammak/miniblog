<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201105104304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE author_id author_id INT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD status TINYINT(1) NOT NULL, ADD age INT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE author_id author_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user DROP status, DROP age, CHANGE created_at created_at DATETIME NOT NULL');
    }
}
