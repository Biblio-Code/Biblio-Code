<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310211117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE municipio ADD municipio VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL, ADD latitud DOUBLE PRECISION NOT NULL, ADD longitud DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comunidad CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE comunidad comunidad VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE municipio DROP municipio, DROP slug, DROP latitud, DROP longitud');
        $this->addSql('ALTER TABLE provincia CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE provincia provincia VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tutorial CHANGE titulo titulo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lenguaje lenguaje VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE codigo codigo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texto_tutorial texto_tutorial VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
