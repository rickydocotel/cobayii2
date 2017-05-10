<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
* 
*/
class PbbForm extends Model
{
	public $nop;
	public $tahun;
	public function rules()
	{
		return [
            [['nop', 'tahun'], 'required'],
        ];
	}
}
?>