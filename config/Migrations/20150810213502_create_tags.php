<?php
use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreateTags extends AbstractMigration
{
    /**
     * Migrate up
     */
    public function up()
    {
        $table = $this->table('blog_tags')
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('slug', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('meta_description', 'text', ['null' => true, 'default' => null])
            ->addColumn('created', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false])
            ->addColumn('modified', 'datetime', ['default' => '0000-00-00 00:00', 'null' => false]);
        $table->addIndex('name', ['name' => 'BY_NAME', 'unique' => false]);
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
        $this->table('blog_tags')->drop();
    }
}
