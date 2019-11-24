<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php (Yii::$app->user->can('author') || Yii::$app->user->can('admin')) ? print Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) : null ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            $result = "<h2>".Html::a(Html::encode($model->title), ['view', 'id' => $model->id])."</h2>";
            $result .= "<h6> ".Html::encode($model->createdBy->username)." | ".Html::encode(Yii::$app->formatter->asRelativeTime($model->created_at))."</h6>";
            $result .= "<p>".Html::encode($model->content)."</p>";
            $result .= "<p>".Html::a(Html::encode("Komentar(".$model->jumlah_comment.")"),['view','id'=>$model->id])."</p><hr/>";
            return $result;
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
