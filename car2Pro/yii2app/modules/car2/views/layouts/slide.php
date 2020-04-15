<?php
use app\modules\car2\models\Carousel;
use yii\helpers\Html;
$models = Carousel::find()->where(['active' => 1])->all();
$i = 1;
$x = 1;
?>
<style>
.carousel-fade .carousel-item {
    opacity: 0;
    transition-duration: .6s;
    transition-property: opacity;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
    opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
    opacity: 0;
}

.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item.active,
.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-prev {
    transform: translateX(0);
    transform: translate3d(0, 0, 0);
}
</style>
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> -->
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4000">
    <ol class="carousel-indicators">
        <?php foreach ($models as $model): ?>
        <?php
$number1 = $i++;
$active1 = $number1 == 1 ? 'active' : null;
?>

        <li data-target="#carouselExampleIndicators" data-slide-to=<?=$number1;?> class="<?=$active1;?>"></li>
        <?php endforeach;?>

    </ol>
    <div class="carousel-inner">

        <?php foreach ($models as $model): ?>
        <?php
$number2 = $x++;
$active2 = $number2 == 1 ? 'active' : null;
?>
        <div class="carousel-item <?=$active2;?>">
            <div class="carousel-caption">
                <h3>
                    <?=$model->title;?>
                </h3>
                <p><?=$model->content;?></p>
            </div>
            <?php echo Html::img('@web/carousel/' . $model->photo, [
    'class' => 'd-block w-100',
    'style' => 'height: 500px;',
    'alt' => $number2,
]); ?>
        </div>
        <?php endforeach;?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
$js = <<< JS

$('#carouselExampleIndicators .carousel-item img').each(function() {
  var imgSrc = $(this).attr('src');
  $(this).parent().css({
      'background-image': 'url('+imgSrc+')',
      'height': '500px',
      'background-repeat': 'no-repeat',
      'background-size': 'cover',
    'background-position': 'center center'
      });
  $(this).remove();
console.log(imgSrc);
});

JS;
$this->registerJS($js);
?>