<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722135702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loisir ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE loisir ADD CONSTRAINT FK_CF3B206012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_CF3B206012469DE2 ON loisir (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loisir DROP FOREIGN KEY FK_CF3B206012469DE2');
        $this->addSql('DROP INDEX IDX_CF3B206012469DE2 ON loisir');
        $this->addSql('ALTER TABLE loisir DROP category_id');
    }
}
