<?php echo $header; ?>
<div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a <?php echo (($breadcrumb==end($breadcrumbs))? 'class="last"':''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<div id="content"><div class="boss_frame"><?php echo $content_top; ?>
  <h1><?php echo $heading_title; ?></h1>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
<?php } ?>
  <?php if ($products) { ?>
  <div class="wishlist-info">
    <table>
      <thead>
        <tr>
          <td class="name" colspan="2"><?php echo $column_name; ?></td>
          <td class="model"><?php echo $column_model; ?></td>
          <td class="price"><?php echo $column_price; ?></td>
          <td class="stock"><?php echo $column_stock; ?></td>
          <td class="remove"><?php echo $button_remove; ?></td>
          <td class="action"><?php echo $column_action; ?></td>
        </tr>
      </thead>
      <?php foreach ($products as $product) { ?>
      <tbody id="wishlist-row<?php echo $product['product_id']; ?>">
        <tr>
          <td class="image"><?php if ($product['thumb']) { ?>
            <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
            <?php } ?></td>
          <td class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
          <td class="model"><?php echo $product['model']; ?></td>
          <td class="price"><?php if ($product['price']) { ?>
            <div class="price">
              <?php if (!$product['special']) { ?>
              <?php echo $product['price']; ?>
              <?php } else { ?>
              <s><?php echo $product['price']; ?></s> <b><?php echo $product['special']; ?></b>
              <?php } ?>
            </div>
            <?php } ?></td>
          <td class="stock"><?php echo $product['stock']; ?></td>
		  <td class="remove"><a href="<?php echo $product['remove']; ?>"><img src="catalog/view/theme/bt_electronues/image/remove.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" /></a></td>
          <td class="action"><a class="button" onclick="boss_addToCart('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></a></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
  <div class="buttons boss-margin">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><span><?php echo $button_continue; ?></span></a></div>
  </div>
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons boss-margin">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><span><?php echo $button_continue; ?></span></a></div>
  </div>
  <?php } ?>
  <?php echo $content_bottom; ?></div></div>

<?php echo $footer; ?>