<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170409184002 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company_salary_companies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DB2A239D77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_salary_employee_info (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, date_period DATE NOT NULL, count INT NOT NULL, INDEX IDX_A9C1D5DA979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_salary_salaries (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, date_period DATE NOT NULL, employed_average NUMERIC(10, 2) NOT NULL, copyright_average NUMERIC(10, 2) NOT NULL, total_ssi NUMERIC(10, 2) NOT NULL, INDEX IDX_3B5A0837979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_salary_employee_info ADD CONSTRAINT FK_A9C1D5DA979B1AD6 FOREIGN KEY (company_id) REFERENCES company_salary_companies (id)');
        $this->addSql('ALTER TABLE company_salary_salaries ADD CONSTRAINT FK_3B5A0837979B1AD6 FOREIGN KEY (company_id) REFERENCES company_salary_companies (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_salary_employee_info DROP FOREIGN KEY FK_A9C1D5DA979B1AD6');
        $this->addSql('ALTER TABLE company_salary_salaries DROP FOREIGN KEY FK_3B5A0837979B1AD6');
        $this->addSql('DROP TABLE company_salary_companies');
        $this->addSql('DROP TABLE company_salary_employee_info');
        $this->addSql('DROP TABLE company_salary_salaries');
    }
}
