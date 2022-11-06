<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105084104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(50) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, cnss VARCHAR(50) NOT NULL, situation_fam VARCHAR(100) NOT NULL, nombre_enfant VARCHAR(4) DEFAULT NULL, email VARCHAR(100) NOT NULL, tele VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, photos VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, date_entrée DATE NOT NULL, date_sortie DATE DEFAULT NULL, statue_travaille TINYINT(1) NOT NULL, echelle VARCHAR(255) NOT NULL, echellon VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE is_verified is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE employe');
        $this->addSql('ALTER TABLE `user` CHANGE is_verified is_verified TINYINT(1) DEFAULT 0 NOT NULL');
    }
}
