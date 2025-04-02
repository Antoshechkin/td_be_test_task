<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250402081707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE credit_program (
                program_id BIGINT AUTO_INCREMENT NOT NULL, 
                title VARCHAR(191) NOT NULL, 
                interest_rate DOUBLE PRECISION NOT NULL, 
                max_body INT NOT NULL, 
                max_loan_term INT NOT NULL, 
                PRIMARY KEY(program_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            DROP TABLE credit_program
        SQL);
    }
}
