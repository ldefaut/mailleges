<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230305163154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD firstname VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD lastname VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD birthdate DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD gender VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD country VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD address2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD city VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD zipcode VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD mobile_phone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD esgi_email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP firstname');
        $this->addSql('ALTER TABLE "user" DROP lastname');
        $this->addSql('ALTER TABLE "user" DROP birthdate');
        $this->addSql('ALTER TABLE "user" DROP gender');
        $this->addSql('ALTER TABLE "user" DROP country');
        $this->addSql('ALTER TABLE "user" DROP address');
        $this->addSql('ALTER TABLE "user" DROP address2');
        $this->addSql('ALTER TABLE "user" DROP city');
        $this->addSql('ALTER TABLE "user" DROP zipcode');
        $this->addSql('ALTER TABLE "user" DROP mobile_phone');
        $this->addSql('ALTER TABLE "user" DROP esgi_email');
    }
}
