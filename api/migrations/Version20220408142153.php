<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408142153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'User entity & direct relations';
    }

    public function up(Schema $schema): void
    {
        if (
            $this->connection->createSchemaManager()->tablesExist('user') ||
            $this->connection->createSchemaManager()->tablesExist('user_location') ||
            $this->connection->createSchemaManager()->tablesExist('user_login') ||
            $this->connection->createSchemaManager()->tablesExist('user_name') ||
            $this->connection->createSchemaManager()->tablesExist('user_picture') ||
            $this->connection->createSchemaManager()->tablesExist('user_registered')
        ) {
            return;
        }

        $this->addSql('CREATE TABLE `user` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', location_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', registered_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', picture_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', login_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', gender VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, cell VARCHAR(255) DEFAULT NULL, nat VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64971179CD6 (name_id), UNIQUE INDEX UNIQ_8D93D64964D218E (location_id), UNIQUE INDEX UNIQ_8D93D64933F613ED (registered_id), UNIQUE INDEX UNIQ_8D93D649EE45BDBF (picture_id), UNIQUE INDEX UNIQ_8D93D6495CB2E05D (login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user_location` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', street VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(150) NOT NULL, postcode VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user_login` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', username VARCHAR(150) NOT NULL, password VARCHAR(255) NOT NULL, salt VARCHAR(255) NOT NULL, md5 VARCHAR(255) NOT NULL, sha1 VARCHAR(255) NOT NULL, sha256 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user_name` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(10) NOT NULL, first VARCHAR(255) NOT NULL, last VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user_picture` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', large VARCHAR(255) DEFAULT NULL, medium VARCHAR(255) DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user_registered` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', date DATETIME NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64971179CD6 FOREIGN KEY (name_id) REFERENCES `user_name` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64964D218E FOREIGN KEY (location_id) REFERENCES `user_location` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64933F613ED FOREIGN KEY (registered_id) REFERENCES `user_registered` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649EE45BDBF FOREIGN KEY (picture_id) REFERENCES `user_picture` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6495CB2E05D FOREIGN KEY (login_id) REFERENCES `user_login` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64964D218E');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6495CB2E05D');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64971179CD6');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649EE45BDBF');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64933F613ED');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE `user_location`');
        $this->addSql('DROP TABLE `user_login`');
        $this->addSql('DROP TABLE `user_name`');
        $this->addSql('DROP TABLE `user_picture`');
        $this->addSql('DROP TABLE `user_registered`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
