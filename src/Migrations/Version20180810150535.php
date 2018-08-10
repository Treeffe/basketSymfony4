<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180810150535 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faitmarquant ADD History INT DEFAULT NULL');
        $this->addSql('ALTER TABLE faitmarquant ADD CONSTRAINT FK_118FD789E80749D7 FOREIGN KEY (History) REFERENCES History (id)');
        $this->addSql('CREATE INDEX IDX_118FD789E80749D7 ON faitmarquant (History)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE FaitMarquant DROP FOREIGN KEY FK_118FD789E80749D7');
        $this->addSql('DROP INDEX IDX_118FD789E80749D7 ON FaitMarquant');
        $this->addSql('ALTER TABLE FaitMarquant DROP History');
    }
}
