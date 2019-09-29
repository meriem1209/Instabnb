<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190927121201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__annoncement AS SELECT id, title, price, content, created_at FROM annoncement');
        $this->addSql('DROP TABLE annoncement');
        $this->addSql('CREATE TABLE annoncement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, price INTEGER NOT NULL, created_at DATETIME NOT NULL, content VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO annoncement (id, title, price, content, created_at) SELECT id, title, price, content, created_at FROM __temp__annoncement');
        $this->addSql('DROP TABLE __temp__annoncement');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TEMPORARY TABLE __temp__annoncement AS SELECT id, title, price, content, created_at FROM annoncement');
        $this->addSql('DROP TABLE annoncement');
        $this->addSql('CREATE TABLE annoncement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price INTEGER NOT NULL, created_at DATETIME NOT NULL, content VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO annoncement (id, title, price, content, created_at) SELECT id, title, price, content, created_at FROM __temp__annoncement');
        $this->addSql('DROP TABLE __temp__annoncement');
    }
}
