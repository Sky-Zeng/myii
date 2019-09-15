<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\jobs;
use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;
/**
 * Simple Job.
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class LogJob extends BaseObject implements JobInterface
{
    public $msg;
    public function execute($queue)
    {
        //file_put_contents($this->getFileName(), '');
        Yii::error($this->msg);
    }
    /*public function getFileName()
    {
        return Yii::getAlias("@runtime/job-{$this->uid}.lock");
    }*/
}