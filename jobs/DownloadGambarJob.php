<?php
/**
 * Created by PhpStorm.
 * User: iqbal
 * Date: 15/03/2018
 * Time: 5:49 PM
 */

namespace app\jobs;

use yii\base\Object;
use yii\queue\Job;
use yii\queue\RetryableJob;

class DownloadGambarJob extends Object implements RetryableJob
{
    public $url;

    public function execute($queue)
    {
        echo "Download Gambar...";
        if (file_put_contents(time() . ".jpg", file_get_contents($this->url))) {
            echo " Sukses!\n";
        } else {
            echo " Gagal\n";
        }
        echo "Selesai \n";

    }

    public function canRetry($attempt, $error)
    {
        return true;
    }

    public function getTtr()
    {
        return 300;
    }
}