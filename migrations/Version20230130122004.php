<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130122004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE painting (id INT AUTO_INCREMENT NOT NULL, movment_key_id INT DEFAULT NULL, painting_name VARCHAR(255) DEFAULT NULL, painting_url VARCHAR(255) DEFAULT NULL, painting_date VARCHAR(255) DEFAULT NULL, painter_name VARCHAR(255) DEFAULT NULL, painter_description VARCHAR(255) DEFAULT NULL, small_painting_url VARCHAR(255) DEFAULT NULL, INDEX IDX_66B9EBA071161153 (movment_key_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE painting ADD CONSTRAINT FK_66B9EBA071161153 FOREIGN KEY (movment_key_id) REFERENCES art_movment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE painting DROP FOREIGN KEY FK_66B9EBA071161153');
        $this->addSql('DROP TABLE painting');
    }
}
