<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101230955 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP INDEX ticketsId ON orders');
        $this->addSql('ALTER TABLE orders ADD nbr_tickets INT NOT NULL, ADD tickets_id INT NOT NULL, DROP ticketsId, DROP nbrTickets, CHANGE emailorder email_order VARCHAR(32) NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD birth_date DATE NOT NULL, DROP birthDate, DROP rate, CHANGE name name VARCHAR(32) NOT NULL, CHANGE reducedrate reduced_rate TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article');
        $this->addSql('ALTER TABLE orders ADD ticketsId INT NOT NULL, ADD nbrTickets INT NOT NULL, DROP nbr_tickets, DROP tickets_id, CHANGE email_order emailOrder VARCHAR(32) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('CREATE INDEX ticketsId ON orders (ticketsId)');
        $this->addSql('ALTER TABLE tickets ADD birthDate VARCHAR(10) NOT NULL COLLATE utf8_general_ci, ADD rate INT NOT NULL, DROP birth_date, CHANGE name name VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE reduced_rate reducedRate TINYINT(1) NOT NULL');
    }
}
