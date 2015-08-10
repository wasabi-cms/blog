<?php
use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreatePosts extends AbstractMigration
{
    /**
     * Migrate up
     */
    public function up()
    {
        $table = $this->table('blog_posts');
        $table->addColumn('category_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addColumn('blog_author_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('slug', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('short', 'text', ['null' => true, 'default' => null])
            ->addColumn('content', 'text', ['null' => true, 'default' => null])
            ->addColumn('more_information', 'text', ['null' => true, 'default' => null])
            ->addColumn('comments', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('comments_closed', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('comments_count', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('is_online', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('is_outdated', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('outdated_text', 'text', ['null' => true, 'default' => null])
            ->addColumn('published_on', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false])
            ->addColumn('meta_description', 'text', ['null' => true, 'default' => null])
            ->addColumn('created', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false])
            ->addColumn('modified', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false]);
        $table->addIndex('category_id', ['name' => 'FK_CATEGORY_ID', 'unique' => false])
            ->addIndex('blog_author_id', ['name' => 'FK_BLOG_AUTHOR_ID', 'unique' => false]);
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
        $this->table('blog_posts')->drop();
    }
}
