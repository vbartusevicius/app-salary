<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170410200728 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_salary_employee_info CHANGE date_period date_period VARCHAR(255) NOT NULL');
        $this->addSql('CREATE INDEX IDX_A9C1D5DA210C212D ON company_salary_employee_info (date_period)');
        $this->addSql('ALTER TABLE company_salary_salaries CHANGE date_period date_period VARCHAR(255) NOT NULL');
        $this->addSql('CREATE INDEX IDX_3B5A0837210C212D ON company_salary_salaries (date_period)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX IDX_A9C1D5DA210C212D ON company_salary_employee_info');
        $this->addSql('ALTER TABLE company_salary_employee_info CHANGE date_period date_period DATE NOT NULL');
        $this->addSql('DROP INDEX IDX_3B5A0837210C212D ON company_salary_salaries');
        $this->addSql('ALTER TABLE company_salary_salaries CHANGE date_period date_period DATE NOT NULL');
    }
}
