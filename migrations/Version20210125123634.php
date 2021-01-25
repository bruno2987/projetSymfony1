<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125123634 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, espece_id INT NOT NULL, nom VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, famille VARCHAR(255) DEFAULT NULL, poids INT NOT NULL, INDEX IDX_6AAB231F2D191E7A (espece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent_animal (continent_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_E557C2C8921F4C77 (continent_id), INDEX IDX_E557C2C88E962C16 (animal_id), PRIMARY KEY(continent_id, animal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dispose (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, personne_id INT DEFAULT NULL, nombre INT DEFAULT NULL, INDEX IDX_6262E0668E962C16 (animal_id), INDEX IDX_6262E066A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F2D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE continent_animal ADD CONSTRAINT FK_E557C2C8921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continent_animal ADD CONSTRAINT FK_E557C2C88E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dispose ADD CONSTRAINT FK_6262E0668E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE dispose ADD CONSTRAINT FK_6262E066A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE continent_animal DROP FOREIGN KEY FK_E557C2C88E962C16');
        $this->addSql('ALTER TABLE dispose DROP FOREIGN KEY FK_6262E0668E962C16');
        $this->addSql('ALTER TABLE continent_animal DROP FOREIGN KEY FK_E557C2C8921F4C77');
        $this->addSql('ALTER TABLE dispose DROP FOREIGN KEY FK_6262E066A21BD112');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE continent_animal');
        $this->addSql('DROP TABLE dispose');
        $this->addSql('DROP TABLE personne');
    }
}
