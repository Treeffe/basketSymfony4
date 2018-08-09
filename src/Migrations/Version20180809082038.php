<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180809082038 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE test2 ADD test INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test2 ADD CONSTRAINT FK_D27AA25CD87F7E0C FOREIGN KEY (test) REFERENCES Test (id)');
        $this->addSql('CREATE INDEX IDX_D27AA25CD87F7E0C ON test2 (test)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Test2 DROP FOREIGN KEY FK_D27AA25CD87F7E0C');
        $this->addSql('DROP INDEX IDX_D27AA25CD87F7E0C ON Test2');
        $this->addSql('ALTER TABLE Test2 DROP test');
    }
}
