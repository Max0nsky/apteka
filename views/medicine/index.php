<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Аптека';
?>


<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>А</span>птека</h1>
                                <h2>Скоро зима!</h2>
                                <p>Витамины Алфавит — это одни из наиболее известных и популярных витаминных комплексов. Собрано множество комбинаций для разных возрастов, для разных целей (профилактическая, лечебная и другое), для некоторых видов деятельности (спорт, учеба), для косметических целей.</p>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => 'Алфавит']) ?>">
                                    <button type="button" class="btn btn-default get">Подробнее</button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                            <?= Html::img("@web/images/home/Карусель1.jpg", ['alt' => 'Алфавит']) ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>А</span>птека</h1>
                                <h2>Народный выбор!</h2>
                                <p>Витамины группы Б – это целая группа водорастворимых соединений, которые принимают участие во всех обменных процессах, протекающих в организме. Они способствуют высвобождению энергии из различных пищевых веществ, в которых присутствуют калории. Широко применяются для лечения заболеваний нервной системы.</p>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => 'Витамины группы Б']) ?>">
                                <button type="button" class="btn btn-default get">Подробнее</button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                            <?= Html::img("@web/images/home/Карусель2.jpg", ['alt' => 'Витамины группы Б']) ?>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>А</span>птека</h1>
                                <h2>Бессонница? Раздражительность?</h2>
                                <p>Теравит Антистресс - комплексный поливитаминный препарат с микроэлементами и экстрактами лекарственных растений.</p>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => 'Теравит']) ?>">
                                <button type="button" class="btn btn-default get">Подробнее</button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                            <?= Html::img("@web/images/home/Карусель3.jpg", ['alt' => 'Теравит']) ?>
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Реклама</h2>
                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->

                    <h2 class="title text-center">Товары</h2>

                    <?php $i = 0;
                    foreach ($things as $thing) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => $thing->drug_name]) ?>">
                                            <?= Html::img("@web/images/medicines/{$thing->img}", ['alt' => $thing->drug_name]) ?>
                                        </a>
                                        <h2><?= $thing->price ?>Р</h2>
                                        <p><a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => $thing->drug_name]) ?>"><?= $thing->drug_name ?></a></p>
                                        <a href="<?= \yii\helpers\Url::to(['medicine/purchase', 'drug_name' => $thing->drug_name]) ?>" data-drug_name="<?= $thing->drug_name ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Купить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <?php $i++;
                                if ($i % 3 == 0) : ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <?php
                        echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                        </p>
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>