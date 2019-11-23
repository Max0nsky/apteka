<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                            <?= Html::img("@web/images/medicines/{$product[0]['img']}", ['alt' => $product->drug_name]) ?>
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?=$product[0]['drug_name']?></h2>
								<span>
									<span><?= $product[0]['price']; ?>Р</span>
									<label>Количество:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Купить
									</button>
								</span>
								<p><b>Описание: </b><?=$product[0]['description']?></p>
								<p><b>Аналоги:</b>
								 <?php foreach ($analogues as $analogue):?>
									<a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => $analogue['analogue']]) ?>">
									<p><?=$analogue['analogue'];?> </p>
									</a>
								<?php endforeach;?>
								</p>
								<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->						
				</div>
			</div>
		</div>
	</section>