<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20241007183538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'modification playlist subscription';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656A76ED395');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656B2A122C2');
        $this->addSql('DROP TABLE playlist_subscription_user');
        $this->addSql('ALTER TABLE playlist_subscription ADD username_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CED766068 FOREIGN KEY (username_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_832940CED766068 ON playlist_subscription (username_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE TABLE playlist_subscription_user (playlist_subscription_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C8528656B2A122C2 (playlist_subscription_id), INDEX IDX_C8528656A76ED395 (user_id), PRIMARY KEY(playlist_subscription_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CED766068');
        $this->addSql('DROP INDEX IDX_832940CED766068 ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription DROP username_id');
    }
}
