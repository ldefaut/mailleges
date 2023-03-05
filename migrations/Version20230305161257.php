<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230305161257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE grade_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE course_professor (course_id INT NOT NULL, professor_id INT NOT NULL, PRIMARY KEY(course_id, professor_id))');
        $this->addSql('CREATE INDEX IDX_FBAC974F591CC992 ON course_professor (course_id)');
        $this->addSql('CREATE INDEX IDX_FBAC974F7D2D84D5 ON course_professor (professor_id)');
        $this->addSql('CREATE TABLE grade (id INT NOT NULL, course_id INT NOT NULL, student_id INT DEFAULT NULL, rating DOUBLE PRECISION NOT NULL, coefficient INT NOT NULL, title VARCHAR(255) DEFAULT NULL, comment TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_595AAE34591CC992 ON grade (course_id)');
        $this->addSql('CREATE INDEX IDX_595AAE34CB944F1A ON grade (student_id)');
        $this->addSql('CREATE TABLE professor (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE student (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, account_uuid UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modified_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, dtype VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('COMMENT ON COLUMN "user".account_uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".modified_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".deleted_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE course_professor ADD CONSTRAINT FK_FBAC974F591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_professor ADD CONSTRAINT FK_FBAC974F7D2D84D5 FOREIGN KEY (professor_id) REFERENCES professor (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE34591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE34CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE professor ADD CONSTRAINT FK_790DD7E3BF396750 FOREIGN KEY (id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33BF396750 FOREIGN KEY (id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE grade_id_seq CASCADE');
        $this->addSql('ALTER TABLE course_professor DROP CONSTRAINT FK_FBAC974F591CC992');
        $this->addSql('ALTER TABLE course_professor DROP CONSTRAINT FK_FBAC974F7D2D84D5');
        $this->addSql('ALTER TABLE grade DROP CONSTRAINT FK_595AAE34591CC992');
        $this->addSql('ALTER TABLE grade DROP CONSTRAINT FK_595AAE34CB944F1A');
        $this->addSql('ALTER TABLE professor DROP CONSTRAINT FK_790DD7E3BF396750');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT FK_B723AF33BF396750');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_professor');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE professor');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE "user"');
    }
}
