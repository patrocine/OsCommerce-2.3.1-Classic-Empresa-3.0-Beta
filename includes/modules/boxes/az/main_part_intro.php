
<script type="text/javascript" src="<?php echo TMPL_JS ?>jquery-1.4.2.min.js"></script>	
<script type="text/javascript" src="<?php echo TMPL_JS ?>jquery.jcarousel.min.js"></script>	

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 1,
		auto: 1,
		wrap: 'circular',
		animation: 2000
    });
});
</script>
<script type="text/javascript" src="<?php echo TMPL_JS ?>jcarousellite.js"></script>
<script type="text/javascript">
jQuery(function(){
jQuery(".gallery2").jCarouselLite({
		btnNext2: ".next2",
		btnPrev2: ".prev2"
	});
});
</script>



<div class="main_part_intro_page">
	
	<div class="main_part_left_box">
		<div class="main_part_left_box_pad">
   <?php require(TMPL_BOXES . 'az_categ_intro.php'); ?>

			<div class="main_part_title review_price_blocks"><?php // echo BOX_TAGS; ?></div>

   <?php // require(TMPL_BOXES . 'az_flash.php'); ?>
   
   
   
   
			
		</div>
	</div>
 
 
 


 
 
 
 
	<div class="newsletter_form">


   <?php


  if ($pro_ale <= 11){


   $banner_values = mysql_query("select * from " . 'affiliate_compartir_empresas' . " where aut = '" . 1 . "'   ORDER BY RAND() LIMIT 1");
   if ($banner = mysql_fetch_array($banner_values)){






 $empresa_banner = $banner['url_empresa_catalog'].$banner['numero_productos'];

  }else{

   $empresa_banner = 'affiliate_banners_products.php?pro_ale=5';
}

  }



          ?>


	<div class="main_part_middle_box">
		<div class="main_part_middle_box_pad">
			<div class="main_part_title"><a href="<?php echo tep_href_link(FILENAME_PRODUCTS_NEW); ?>"><?php echo MENU_TEXT_NEW_PRODUCTS; ?></a></div>
			<?php include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?>
		</div>
	</div>
	
	<div class="main_part_right_box">
		<div class="main_part_right_box_pad">
			<div class="main_part_title bestseller_title"><?php echo TAB_TEXT_BEST_SELLERS; ?></div>
			<?php require(TMPL_BOXES . 'az_bestsellers_flow.php');


       ?>


		</div>
	</div>


	<div class="main_part_right_box">
		<div class="main_part_right_box_pad">
			<div class="main_part_title bestseller_title"> <a href="https://oscommerce.com"><img src="/images/logo_oscommerce.png"></a></div> <?php





    $tiendas_values = mysql_query("select * from " . 'affiliate_compartir_empresas' . " where id_banners = '" .  $banner['id_banners'] . "'");
   if ($tiendas = mysql_fetch_array($tiendas_values)){
           ?>






<hr size="15" noshade color="#000000">


<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2">
		<p align="center"><b><font size="4"><?php echo '<img border="0" src="'.$tiendas['url_web'] .'/images/store_logo.png'.'" width="120" height="">' ?></font></b></td>
	</tr>
	<tr>
		<td width="100%" colspan="2">
		<p align="center"><b><font size="4"><?php echo $tiendas['nombre'] ?></font></b></td>
>	</tr>
	<tr>
		<td width="6%"><b>Empresa:</b></td>
		<td width="94%"><b>&nbsp;<?php echo $tiendas['nombre_sector'] ?></b></td>
	</tr>
	<tr>
		<td colspan="2">
		<b>Ubicaci�n: <?php echo $tiendas['nombre_ciudad'] ?></b></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="right"><b><a href="<?php echo $tiendas['url_web'] ?>"><font size="3">Visitar Merkaplace
		-&gt;&gt;</font></a></b></td>
	</tr>
</table>


                   <?php
           }












        echo ' <td class="smallText" align="center"><br><script language="javascript" src="'.$empresa_banner.'"> </script>'.$z.'</td>' . '</a><br />';



    $tiendas_values = mysql_query("select * from " . 'affiliate_compartir_empresas' . " where aut = '" .  1 . "' order by nombre_sector asc");
   while ($tiendas = mysql_fetch_array($tiendas_values)){
           ?>






<hr size="15" noshade color="#000000">


<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2">
		<p align="center"><b><font size="4"><?php echo '<img border="0" src="'.$tiendas['url_web'] .'/images/store_logo.png'.'" width="120" height="">' ?></font></b></td>
	</tr>
	<tr>
		<td width="100%" colspan="2">
		<p align="center"><b><font size="4"><?php echo $tiendas['nombre'] ?></font></b></td>
>	</tr>
	<tr>
		<td width="6%"><b>Empresa:</b></td>
		<td width="94%"><b>&nbsp;<?php echo $tiendas['nombre_sector'] ?></b></td>
	</tr>
	<tr>
		<td colspan="2">
		<b>Ubicaci�n: <?php echo $tiendas['nombre_ciudad'] ?></b></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="right"><b><a href="<?php echo $tiendas['url_web'] ?>"><font size="3">Visitar Merkaplace
		-&gt;&gt;</font></a></b></td>
	</tr>
</table>


                   <?php
           }




       ?>
