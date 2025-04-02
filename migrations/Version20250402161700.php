<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250402161700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE credit_request (
                id BIGINT AUTO_INCREMENT NOT NULL, 
                car_id BIGINT NOT NULL, 
                program_id BIGINT NOT NULL, 
                initial_payment INT NOT NULL, 
                loan_term INT NOT NULL, 
                INDEX IDX_113E8B0C3C6F69F (car_id), 
                INDEX IDX_113E8B03EB8070A (program_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE credit_request ADD CONSTRAINT FK_113E8B0C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE credit_request ADD CONSTRAINT FK_113E8B03EB8070A FOREIGN KEY (program_id) REFERENCES credit_program (program_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE credit_request DROP FOREIGN KEY FK_113E8B0C3C6F69F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE credit_request DROP FOREIGN KEY FK_113E8B03EB8070A
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE credit_request
        SQL);
    }
}
