<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250520201202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD users_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD CONSTRAINT FK_F87474F367B3B43D FOREIGN KEY (users_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F87474F367B3B43D ON lesson (users_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F367B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_F87474F367B3B43D ON lesson
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP users_id
        SQL);
    }
}
