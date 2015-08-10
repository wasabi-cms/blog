<?php
use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreatePostsTags extends AbstractMigration
{
    /**
     * Migrate up
     */
    public function up()
    {
        $table = $this->table('blog_posts_tags')
            ->addColumn('post_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addColumn('tag_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false]);
        $table->addIndex('post_id', ['name' => 'FK_POST_ID', 'unique' => false])
            ->addIndex('tag_id', ['name' => 'FK_TAG_ID', 'unique' => false]);
        $table->create();

        $id = new Column();
        $id->setIdentity(true)
            ->setType('integer')
            ->setOptions(['limit' => 11, 'signed' => false, 'null' => false]);

        $table->changeColumn('id', $id)->save();
    }

    /**
     * Migrate down
     */
    public function down()
    {
        $this->table('blog_posts_tags')->drop();
    }
}
