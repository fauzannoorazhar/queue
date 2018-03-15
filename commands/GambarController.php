<?php
/**
 * Created by PhpStorm.
 * User: iqbal
 * Date: 15/03/2018
 * Time: 5:35 PM
 */

namespace app\commands;

use Yii;
use app\jobs\DownloadGambarJob;
use yii\console\Controller;
use yii\helpers\Console;

class GambarController extends Controller
{
    public function actionPush()
    {
    	for ($i=0; $i < 10; $i++) {
	        $id = Yii::$app->queue->push(new DownloadGambarJob(['url' => 'http://iqbalhamsyah.id/spaghett.png']));
	        $this->stdout("queue telah dibuat dengan id $id \n", Console::BOLD, Console::FG_GREEN);
	        $selesai = false;
	        while ($selesai === false) {
	            usleep(500);
	            if (Yii::$app->queue->isWaiting($id)) {
	                $this->stdout("\rqueue $id masih menunggu", Console::FG_RED);
	            } elseif (Yii::$app->queue->isReserved($id)) {
	                $this->stdout("\rqueue $id Sedang dijalankan", Console::FG_YELLOW);
                } elseif (Yii::$app->queue->isDone($id)) {
	                $selesai = true;
	                $this->stdout("\rqueue $id Sudah selesai dijalankan\n", Console::FG_GREEN);
                }
            }
    	}
    }
}