<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310123955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE provincia (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, provincia VARCHAR(255) NOT NULL, comunidad_id INT NOT NULL, capital_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slug (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE comunidades');
        $this->addSql('DROP TABLE municipios');
        $this->addSql('DROP TABLE provincias');
        $this->addSql('DROP TABLE tutorial');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comunidades (id INT UNSIGNED NOT NULL, slug VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, comunidad VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, capital_id INT NOT NULL, UNIQUE INDEX IDX_cominidad (comunidad), UNIQUE INDEX slug (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_spanish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE municipios (id INT UNSIGNED AUTO_INCREMENT NOT NULL, provincia_id INT UNSIGNED NOT NULL, municipio VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, slug VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, latitud DOUBLE PRECISION DEFAULT NULL, longitud DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX IDX_municipio (provincia_id, municipio), UNIQUE INDEX slug (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_spanish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE provincias (id INT UNSIGNED AUTO_INCREMENT NOT NULL, slug VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, provincia VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, comunidad_id INT UNSIGNED NOT NULL, capital_id INT DEFAULT -1 NOT NULL, INDEX FK_provincias (comunidad_id), UNIQUE INDEX IDX_provincia (provincia), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_spanish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tutorial (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, lenguaje VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, codigo VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, texto_tutorial VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE provincia');
        $this->addSql('DROP TABLE slug');
    }
}
