<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 */
class m191121_151441_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'id_post' => $this->integer(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->dateTime(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ]);

        // creates index for column `id_post`
        $this->createIndex(
            '{{%idx-comment-id_post}}',
            '{{%comment}}',
            'id_post'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-comment-id_post}}',
            '{{%comment}}',
            'id_post',
            '{{%post}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%post}}`
        $this->dropForeignKey(
            '{{%fk-comment-id_post}}',
            '{{%comment}}'
        );

        // drops index for column `id_post`
        $this->dropIndex(
            '{{%idx-comment-id_post}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
