<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241118105747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL, CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE code_adress code_adress INT DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE roles roles JSON NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE code_adress code_adress INT NOT NULL, CHANGE city city VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }
}
