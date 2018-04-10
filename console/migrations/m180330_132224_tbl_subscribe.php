<?php

use yii\db\Migration;

/**
 * Class m180330_132224_tbl_subscribe
 */
class m180330_132224_tbl_subscribe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->execute('
			CREATE TABLE IF NOT EXISTS `subscribe` (
			  `idsubscribe` int(11) NOT NULL AUTO_INCREMENT,
			  `email` varchar(50) DEFAULT NULL,
			  `date_subscribe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  PRIMARY KEY (`idsubscribe`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropTable('subscribe');
        //echo "m180330_132224_tbl_subscribe cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180330_132224_tbl_subscribe cannot be reverted.\n";

        return false;
    }
    */
}
