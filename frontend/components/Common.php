<?php
namespace frontend\components;

use yii\base\Component;
use yii\helpers\Url;

class Common extends Component{
	
	const EVENT_NOTIFY = 'notify_admin';
	
	public function sendMail($subject, $body, $emailFrom = 'dev1.sofona@gmail.com', $nameFrom = 'Sofona'){
		\Yii::$app->mail->compose()
			 ->setFrom(['test2@sofona.info' => 'Dev'])
			 ->setTo([$emailFrom => $nameFrom])
			 ->setSubject($subject)
			 ->setTextBody($body)
			 ->send();
			 
		$this->trigger(self::EVENT_NOTIFY);
	}
	
	public function notifyAdmin($event){
		echo 'Notify Admin';
	}
	
	public function getTitleAdvert($data){
		return $data['bedroom'].' Bed Rooms and '.$data['kitchen'].' Kitchen Room Aparment on Sale';
	}
	
	public function getImageAdvert($data, $general = true, $original = false){
		$image = [];
		$base = Url::base();
		if($original){
			$image[] = $base.'uploads/adverts/'.$data['idadvert'].'/general/'.$data['general_image'];
		}else{
			$image[] = $base.'uploads/adverts/'.$data['idadvert'].'/general/small_'.$data['general_image'];
		}
		return $image;
	}
	
	public function substr($text, $start = 0, $end = 50){
		return mb_substr($text, $start, $end);
	}
	
}