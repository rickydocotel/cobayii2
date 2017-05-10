<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\PbbForm;
use app\models\Teams;
use yii\helpers\Html;
class PbbController extends Controller {

    public function actionPbb(){
   		$model = new PbbForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
         $nop = Html::encode($model->nop);
         $exNop = explode("-",$nop); //14-71-010-001-001-0988-0 , 14-71-010-001-001-0989-0
          // ============================Proses Query=======================================
          $query1 = Teams::find()->select(['THN_PAJAK_SPPT','NM_WP_SPPT','KELURAHAN_WP_SPPT','JLN_WP_SPPT','PBB_YG_HARUS_DIBAYAR_SPPT','STATUS_PEMBAYARAN_SPPT','TGL_JATUH_TEMPO_SPPT'])
        -> WHERE(['KD_PROPINSI' => $exNop[0], 'KD_DATI2' => $exNop[1], 'KD_KECAMATAN' => $exNop[2], 'KD_KELURAHAN' => $exNop[3], 'KD_BLOK' => $exNop[4], 'NO_URUT' => $exNop[5], 'KD_JNS_OP' => $exNop[6]])
        -> all();
        // ==============================End Proses Query=====================================

        // ===========Hasil Proses Dikirim ke File Tampilkan yang ada di views
        return $this->render('tampilkan',['query1'=>$query1]);
        // ===================================================================================

        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('pbb', ['model' => $model]);
        }
  	}

  	public function actionQuery()
  	{

  		$query1 = Teams::find()->select(['THN_PAJAK_SPPT','NM_WP_SPPT','KELURAHAN_WP_SPPT','JLN_WP_SPPT'])
  			-> WHERE(['KD_PROPINSI' => '14', 'KD_DATI2' => '71', 'KD_KECAMATAN' => '010', 'KD_KELURAHAN' => '001', 'KD_BLOK' => '001', 'NO_URUT' => '0988', 'KD_JNS_OP' => '0'])
  			-> all();
  		return $this->render('tampilkan',['query1'=>$query1]);
  	}

}
?>