<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522142821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD student_id INT NOT NULL, ADD instructor_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3CB944F1A FOREIGN KEY (student_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD CONSTRAINT FK_F87474F38C4FC193 FOREIGN KEY (instructor_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F87474F3CB944F1A ON lesson (student_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F87474F38C4FC193 ON lesson (instructor_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3CB944F1A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F38C4FC193
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_F87474F3CB944F1A ON lesson
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_F87474F38C4FC193 ON lesson
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP student_id, DROP instructor_id
        SQL);
    }
}
