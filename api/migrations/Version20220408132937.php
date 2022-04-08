<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408132937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add custom uuid';
    }

    public function up(Schema $schema): void
    {
        if (array_key_exists('uuid', $this->connection->createSchemaManager()->listTableColumns('user_login'))) {
            return;
        }

        $this->addSql('ALTER TABLE user_login ADD uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE `user_login` DROP uuid');
    }
}
