<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607144526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE department_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE extradition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE package_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, size VARCHAR(255) NOT NULL, weight INT NOT NULL, endurance VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department (id INT NOT NULL, address VARCHAR(500) NOT NULL, city VARCHAR(255) NOT NULL, number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE employee (id INT NOT NULL, department_id INT DEFAULT NULL, surname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, patronymic VARCHAR(255) DEFAULT NULL, passport VARCHAR(10) NOT NULL, post VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5D9F75A1AE80F5DF ON employee (department_id)');
        $this->addSql('CREATE TABLE extradition (id INT NOT NULL, department INT NOT NULL, surname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, patronymic VARCHAR(255) DEFAULT NULL, passport VARCHAR(10) NOT NULL, extradition TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, package_id INT NOT NULL, department_id INT NOT NULL, arrival TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, departure TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5E9E89CBF44CABFF ON location (package_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBAE80F5DF ON location (department_id)');
        $this->addSql('CREATE TABLE package (id INT NOT NULL, category_id INT NOT NULL, extradition_id INT NOT NULL, address VARCHAR(500) NOT NULL, city VARCHAR(255) NOT NULL, weight INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DE68679512469DE2 ON package (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DE6867952679B481 ON package (extradition_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, surname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, patronymic VARCHAR(255) DEFAULT NULL, passport VARCHAR(10) NOT NULL, phone VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBF44CABFF FOREIGN KEY (package_id) REFERENCES package (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE package ADD CONSTRAINT FK_DE68679512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE package ADD CONSTRAINT FK_DE6867952679B481 FOREIGN KEY (extradition_id) REFERENCES extradition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE package DROP CONSTRAINT FK_DE68679512469DE2');
        $this->addSql('ALTER TABLE employee DROP CONSTRAINT FK_5D9F75A1AE80F5DF');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CBAE80F5DF');
        $this->addSql('ALTER TABLE package DROP CONSTRAINT FK_DE6867952679B481');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CBF44CABFF');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE department_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE extradition_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE package_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE extradition');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE package');
        $this->addSql('DROP TABLE "user"');
    }
}
