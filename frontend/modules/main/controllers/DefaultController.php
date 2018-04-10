<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use yii\web\Controller;

use yii\base\DynamicModel;
use yii\db\Query;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
		$this->layout = 'bootstrap';
		$query = new Query();
		$command = $query->from('advert')->orderBy('idadvert desc')->limit(5);
		$result_general = $command->all();
		$count_general = $command->count();
		
        return $this->render('index', ['result_general' => $result_general, 'count_general' => $count_general]);
    }
	
	public function actionService(){
		$cache = \Yii::$app->cache;
		// $cache = $locator->cache;

        $cache->set('test', 10);

        print $cache->get('test');
	}
	
	public function actionEvent(){
		$component = \Yii::$app->common; // new Common();
		$component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
		$component->sendMail('test@mfsa.info', 'test', 'subject', 'body');
		$component->off(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
	}
	
	public function actionLoginData(){
		//echo \Yii::$app->user->id;
		echo \Yii::$app->user->identity->id;
		die;
	}
}
