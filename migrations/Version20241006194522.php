<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20241006194522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'modification';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist CHANGE update_at update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist CHANGE update_at update_at DATETIME NOT NULL');
    }
}
