<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181105205056 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
        $this->addSql('ALTER TABLE orders ADD ticket_id_id INT NOT NULL, ADD price_id INT DEFAULT NULL, ADD mail LONGTEXT NOT NULL, DROP price, DROP tickets_id, CHANGE email_order email_order VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE5774FDDC FOREIGN KEY (ticket_id_id) REFERENCES tickets (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEED614C7E7 FOREIGN KEY (price_id) REFERENCES tickets (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE5774FDDC ON orders (ticket_id_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEED614C7E7 ON orders (price_id)');
        $this->addSql('ALTER TABLE tickets ADD appoitement DATE NOT NULL, DROP price, CHANGE birthdate birth_date DATE NOT NULL, CHANGE reducedrate reduced_rate TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2 ON article');
        $this->addSql('ALTER TABLE article DROP category_id');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE5774FDDC');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEED614C7E7');
        $this->addSql('DROP INDEX IDX_E52FFDEE5774FDDC ON orders');
        $this->addSql('DROP INDEX IDX_E52FFDEED614C7E7 ON orders');
        $this->addSql('ALTER TABLE orders ADD tickets_id INT NOT NULL, DROP price_id, DROP mail, CHANGE email_order email_order VARCHAR(32) NOT NULL COLLATE utf8_general_ci, CHANGE ticket_id_id price INT NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD birthDate DATE NOT NULL, ADD price INT NOT NULL, DROP birth_date, DROP appoitement, CHANGE reduced_rate reducedRate TINYINT(1) NOT NULL');
    }
}
