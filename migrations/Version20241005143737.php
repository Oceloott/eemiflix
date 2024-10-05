<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241005143737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548C4D8CCBCC');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548CEA9FDD75');
        $this->addSql('DROP TABLE watch_history_media');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8ED766068');
        $this->addSql('DROP INDEX UNIQ_DE44EFD8ED766068 ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD watcher_id INT NOT NULL, ADD media_id INT NOT NULL, DROP username_id, CHANGE last_watched_at last_watched_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8C300AB5D FOREIGN KEY (watcher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8C300AB5D ON watch_history (watcher_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8EA9FDD75 ON watch_history (media_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE watch_history_media (watch_history_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_279C548CEA9FDD75 (media_id), INDEX IDX_279C548C4D8CCBCC (watch_history_id), PRIMARY KEY(watch_history_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548C4D8CCBCC FOREIGN KEY (watch_history_id) REFERENCES watch_history (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8C300AB5D');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8EA9FDD75');
        $this->addSql('DROP INDEX IDX_DE44EFD8C300AB5D ON watch_history');
        $this->addSql('DROP INDEX IDX_DE44EFD8EA9FDD75 ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD username_id INT DEFAULT NULL, DROP watcher_id, DROP media_id, CHANGE last_watched_at last_watched_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8ED766068 FOREIGN KEY (username_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DE44EFD8ED766068 ON watch_history (username_id)');
    }
}
