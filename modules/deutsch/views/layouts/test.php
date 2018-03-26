<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

app\modules\deutsch\assets\DeutschAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="container">
    <h3><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i> Deutsch<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i></h3>

<?= $content ?>
</div>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>

