<?php
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
    use common\components\StaticURL;

    $this->title = $model->name;
?>
<div class="thing view">

    <div class="article-banner" style="background-image: url('<?php echo StaticURL::make('images/thing/banner',$model->nameSafe.'.png'); ?>');">
        <div class="article-info">
            <h1><?php echo Html::encode($this->title); ?></h1>
            <div class="article-meta">
            <?php echo Html::a('Project homepage', $model->linkURL, array('target' => '_blank')); ?>
            <br>
            <?php echo ($model->voteCount); ?> likes
            <br>
            <?php echo ($model->activeStatus ? '<span class="label label-success">Active</span>' : '<span class="label label-default">Inactive</span>'); ?>
            </div>
        </div>
    </div>

    <div class="article">
        <?php echo HtmlPurifier::process($model->description); ?>
        <p>Last updated: <?php echo $model->updateDate; ?> UTC</p>
    </div>

    <div class="crud">
        <?php
            if (!\Yii::$app->user->isGuest) {
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo ' ';
                echo Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
            }
        ?>
    </div>

</div>