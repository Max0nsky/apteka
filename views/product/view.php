<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

$this->title = $product[0]['drug_name'];
?>
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
				<div class="product-details">
					<!--product-details-->
					<div class="col-sm-5">
						<div class="view-product" style="height: 225px; width: 225px;">
							<?= Html::img("@web/images/medicines/{$product[0]['img']}", ['alt' => $product->drug_name]) ?>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="product-information">
							<!--/product-information-->
							<h2><?= $product[0]['drug_name'] ?></h2>
							<span>
								<span><?= $product[0]['price']; ?>Р</span>
								<a href="<?= \yii\helpers\Url::to(['medicine/purchase', 'drug_name' => $product[0]['drug_name']]) ?>">
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Купить
									</button>
								</a>
							</span>
							<p><b>Описание: </b><?= $product[0]['description'] ?></p>
							<p><b>Аналоги:</b>
								<?php foreach ($analogues as $analogue) : ?>
									<a href="<?= \yii\helpers\Url::to(['product/view', 'drug_name' => $analogue['analogue']]) ?>">
										<p><?= $analogue['analogue']; ?> </p>
									</a>
								<?php endforeach; ?>
							</p>
							<a href=""><img src="/images/product-details/share.png" class="share img-responsive" alt="" /></a>
						</div>
						<!--/product-information-->
					</div>
				</div>
				<!--/product-details-->
			</div>
		</div>
	</div>
</section>