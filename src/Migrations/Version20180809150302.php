<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180809150302 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE FaitMarquant (id INT AUTO_INCREMENT NOT NULL, pos_resume INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE History (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Legende (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, bio VARCHAR(255) NOT NULL, dateCreation DATETIME NOT NULL, photo VARCHAR(30) NOT NULL, numero_maillot INT NOT NULL, Post INT DEFAULT NULL, Stat INT DEFAULT NULL, History INT DEFAULT NULL, INDEX IDX_1F142FA8FAB8C3B3 (Post), INDEX IDX_1F142FA8808A501F (Stat), INDEX IDX_1F142FA8E80749D7 (History), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Post (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Stadium (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, adress VARCHAR(50) NOT NULL, place INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Stat (id INT AUTO_INCREMENT NOT NULL, point NUMERIC(5, 2) NOT NULL, essai NUMERIC(5, 2) NOT NULL, rebond NUMERIC(5, 2) NOT NULL, interception NUMERIC(5, 2) NOT NULL, passe NUMERIC(5, 2) NOT NULL, contre NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Legende ADD CONSTRAINT FK_1F142FA8FAB8C3B3 FOREIGN KEY (Post) REFERENCES Post (id)');
        $this->addSql('ALTER TABLE Legende ADD CONSTRAINT FK_1F142FA8808A501F FOREIGN KEY (Stat) REFERENCES Stat (id)');
        $this->addSql('ALTER TABLE Legende ADD CONSTRAINT FK_1F142FA8E80749D7 FOREIGN KEY (History) REFERENCES History (id)');
        $this->addSql('ALTER TABLE team ADD stadium INT DEFAULT NULL, ADD team INT DEFAULT NULL, ADD proprietaire VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_64D20921E604044F FOREIGN KEY (stadium) REFERENCES Stadium (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_64D20921C4E0A61F FOREIGN KEY (team) REFERENCES Team (id)');
        $this->addSql('CREATE INDEX IDX_64D20921E604044F ON team (stadium)');
        $this->addSql('CREATE INDEX IDX_64D20921C4E0A61F ON team (team)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Legende DROP FOREIGN KEY FK_1F142FA8E80749D7');
        $this->addSql('ALTER TABLE Legende DROP FOREIGN KEY FK_1F142FA8FAB8C3B3');
        $this->addSql('ALTER TABLE Team DROP FOREIGN KEY FK_64D20921E604044F');
        $this->addSql('ALTER TABLE Legende DROP FOREIGN KEY FK_1F142FA8808A501F');
        $this->addSql('DROP TABLE FaitMarquant');
        $this->addSql('DROP TABLE History');
        $this->addSql('DROP TABLE Legende');
        $this->addSql('DROP TABLE Post');
        $this->addSql('DROP TABLE Stadium');
        $this->addSql('DROP TABLE Stat');
        $this->addSql('ALTER TABLE Team DROP FOREIGN KEY FK_64D20921C4E0A61F');
        $this->addSql('DROP INDEX IDX_64D20921E604044F ON Team');
        $this->addSql('DROP INDEX IDX_64D20921C4E0A61F ON Team');
        $this->addSql('ALTER TABLE Team DROP stadium, DROP team, DROP proprietaire');
    }
}
