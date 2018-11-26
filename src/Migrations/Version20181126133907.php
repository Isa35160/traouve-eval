<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126133907 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment CHANGE user_id user_id INT DEFAULT NULL, CHANGE traobject_id traobject_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE message CHANGE user_form user_form INT DEFAULT NULL, CHANGE user_to user_to INT DEFAULT NULL');
        $this->addSql('ALTER TABLE traobject CHANGE category_id category_id BIGINT DEFAULT NULL, CHANGE state_id state_id BIGINT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE county_id county_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', DROP phone, DROP picture, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE email email VARCHAR(190) NOT NULL');
        $this->addSql('DROP INDEX email_unique ON user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment CHANGE traobject_id traobject_id BIGINT NOT NULL, CHANGE user_id user_id BIGINT NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE user_form user_form BIGINT NOT NULL, CHANGE user_to user_to BIGINT NOT NULL');
        $this->addSql('ALTER TABLE traobject CHANGE category_id category_id BIGINT NOT NULL, CHANGE county_id county_id BIGINT NOT NULL, CHANGE state_id state_id BIGINT NOT NULL, CHANGE user_id user_id BIGINT NOT NULL');
        $this->addSql('ALTER TABLE user ADD phone VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, ADD picture VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, DROP roles, CHANGE id id BIGINT AUTO_INCREMENT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74 ON user');
        $this->addSql('CREATE UNIQUE INDEX email_UNIQUE ON user (email)');
    }
}
