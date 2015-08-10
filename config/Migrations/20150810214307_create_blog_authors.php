<?php
use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreateBlogAuthors extends AbstractMigration
{
    /**
     * Migrate up
     */

    public function up()
    {
        $table = $this->table('blog_blog_authors')
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('description_single_post', 'text', ['null' => true, 'default' => null])
            ->addColumn('description_author_page', 'text', ['null' => true, 'default' => null])
            ->addColumn('slug', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('is_default_author', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('meta_description', 'text', ['null' => true, 'default' => null])
            ->addColumn('user_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addColumn('website', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('created', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false])
            ->addColumn('modified', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false]);
        $table->addIndex('name', ['name' => 'BY_NAME', 'unique' => false])
            ->addIndex('user_id', ['name' => 'FK_USER_ID', 'unique' => false]);
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
        $this->table('blog_blog_authors')->drop();
    }
}
