<h3>Komentar</h3>
<?php 
//use Yii;
if($model->comments){
        foreach ($model->comments as $comment) {
            echo "<h4>".$comment['name']." | ".Yii::$app->formatter->asRelativeTime($comment['created_at'])."</h4>";
            echo $comment['content']."<hr/>";
        }    
    } else echo 'Belum ada Komentar';
    
    
?>