<section id="product-all" class="collection">
	<div class="banner-product">
		
	</div>
	<div class="slider">
		<div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
                    <?php $this->load->view('frontend/modules/category'); ?>
                </div>
                <!-- <?php $this->load->view('frontend/modules/product-sale'); ?> -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content">
             <div class="product-wrap">
               <div class="collection__title">
                   <h1><span>Tất cả sản phẩm</span></h1>
                   <div id="sort-by" class="hidden-xs">
                </div>
                <div class="collection-filter" id = "list-product">
                  <div class="category-products clearfix">
                     <div class="products-grid clearfix">
                        <?php if(count($list)==0): ?>
                            <p>Không có sản phẩm !</p>
                            <?php else : ?>
                                <?php foreach ($list as $sp) :?>
                                    <div class="col-md-3 col-lg-3 col-xs-6 col-6">
                                        <div class="product-lt">
                                            <div class="lt-product-group-image">
                                                <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" >
                                                    <img class="img-p"src="public/images/products/<?php echo $sp['avatar'] ?>" alt="">
                                                </a>

                                               
                                            </div>

                                            <div class="lt-product-group-info">
                                                <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>">
                                                    <h3><?php echo $sp['name'] ?></h3>
                                                </a>
                                                <div class="price-box">
                                                    <?php if($sp['sale'] > 0) :?>

                                                        <p class="old-price">
                                                            <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                        </p>
                                                        <p class="special-price">
                                                            <span class="price"><?php echo(number_format($sp['price_sale'])); ?>₫</span>
                                                        </p>
                                                        <?php else: ?>
                                                           <p class="old-price">
                                                            <span class="price" style="color: #fff"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                        </p>
                                                        <p class="special-price">
                                                            <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                        </p>
                                                    <?php endif;?>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class = "text-center pull-right">
                                <ul style="background: #006633;" class ="pagination">
                                    <?php echo $strphantrang; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- <script type="text/javascript">
    function sortby(option){
        var strurl="<?php echo base_url();?>"+'/sanpham/index';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: {'sapxep': option},
            success: function(data) {
                $('#list-product').html(data);
            }
        });
    }
</script> -->
