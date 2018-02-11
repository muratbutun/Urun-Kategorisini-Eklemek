function muratbutun_woo_kategori_isim_ekleme($name, $item){
$product_id = $item['product_id'];
$_product = wc_get_product( $product_id );
$htmlStr = "";
$cats = "";
$terms = get_the_terms( $product_id, 'product_cat' );
$count = 0;
foreach ( $terms as $term) {
$count++;
if($count > 1){
$cats .= $term->name;
}
else{
$cats .= $term->name . ',';
}
}
$cats = rtrim($cats,',');
$htmlStr .= $_product->get_title();
$htmlStr .= "
<p>Ürün Kategorisi: " . $cats . "
</p>";
return $htmlStr;
}
add_filter('woocommerce_order_item_name','muratbutun_woo_kategori_isim_ekleme', 10, 2);
