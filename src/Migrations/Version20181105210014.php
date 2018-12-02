<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181105210014 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, author VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_9474526C7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('DROP INDEX IDX_E52FFDEE5774FDDC ON orders');
        $this->addSql('ALTER TABLE orders CHANGE ticket_id ticket_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE5774FDDC FOREIGN KEY (ticket_id_id) REFERENCES tickets (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEED614C7E7 FOREIGN KEY (price_id) REFERENCES tickets (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE5774FDDC ON orders (ticket_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE comment');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE5774FDDC');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEED614C7E7');
        $this->addSql('DROP INDEX IDX_E52FFDEE5774FDDC ON orders');
        $this->addSql('ALTER TABLE orders CHANGE ticket_id_id ticket_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_E52FFDEE5774FDDC ON orders (ticket_id)');
    }
}
