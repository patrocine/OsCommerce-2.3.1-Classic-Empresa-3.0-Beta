<?php
/*
  $Id: quick_updates.php,v 1.1 2002/05/15 09:58:34 HRB Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Based on the original script contributed by Burt (burt@xwww.co.uk)
	and by Henri Bredehoeft (hrb@nermica.net)
  This version was contributed by Blue Dog (simon@bluedogweb.co.uk)

  Copyright (c) 2002 osCommerce
                      $status_procesando_paypal_query = tep_db_query("select * from " . 'proveedor' . " ORDER BY proveedor_name");
        while ($status_procesando_paypal = tep_db_fetch_array($status_procesando_paypal_query)) {
  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
  echo  $_POST['status_exel_web'];

   // $MAX_DISPLAY_SEARCH_RESULTS  = $_POST['MAX_DISPLAY_SEARCH_RESULTS'];
    
 if ($_POST['MAX_DISPLAY_SEARCH_RESULTS']){
       $MAX_DISPLAY_SEARCH_RESULTS = $_POST['MAX_DISPLAY_SEARCH_RESULTS'];
}else if ($_GET['MAX_DISPLAY_SEARCH_RESULTS']){

       $MAX_DISPLAY_SEARCH_RESULTS = $_GET['MAX_DISPLAY_SEARCH_RESULTS'];
}

    $action  = $_GET['action'];

  IF ($MAX_DISPLAY_SEARCH_RESULTS == 0){
 $MAX_DISPLAY_SEARCH_RESULTS  = 40;
}


$pendiente_de_entrada_a = $_GET['pendiente_de_entrada_a'];


 if ($_POST['palabraclave']){
       $palabraclave = $_POST['palabraclave'];
}else if ($_GET['palabraclave']){

       $palabraclave = $_GET['palabraclave'];
}

 $page = $_GET['page'];
 $buscar_dondeesta  = $_GET['buscar_dondeesta'];
$pendiente_er  = $_POST['pendiente_er'];

 
 if ($_POST['codigo_proveedor']){
    $codigo_proveedor  = $_POST['codigo_proveedor'];
}else if ($_GET['codigo_proveedor']){

       $codigo_proveedor = $_GET['codigo_proveedor'];
}

 
   $buscar  = $_GET['buscar'];


  IF ($codigo_proveedor == 0){
 $codigo_proveedor  = 1;
}

   $referencia_padre = $_GET['referencia_padre'];

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();

    $action  = $_GET['action'];
    
  $status_active = $_POST['status_active'];
   
    $status_exel_web = $_POST['status_exel_web'];


 if ($_POST['status_exel_web']){
    $status_exel_web  = $_POST['status_exel_web'];
}else if ($_GET['status_exel_web']){

       $status_exel_web = $_GET['status_exel_web'];
}
 if ($_POST['status_active']){
   $status_active = $_POST['status_active'];
}else if ($_GET['status_active']){

      $status_active = $_GET['status_active'];
}


 if ($_POST['regladeprecios']){
   $regladeprecios = $_POST['regladeprecios'];
}else if ($_GET['regladeprecios']){

      $regladeprecios = $_GET['regladeprecios'];
}

 if ($_POST['stocknivel']){
   $stocknivel = $_POST['stocknivel'];
}else if ($_GET['stocknivel']){

      $stocknivel = $_GET['stocknivel'];
}

 if ($_POST['dondeesta']){
   $dondeesta = $_POST['dondeesta'];
}else if ($_GET['dondeesta']){

      $dondeesta = $_GET['dondeesta'];
}



 if ($_POST['status_oferta']){
   $status_oferta = $_POST['status_oferta'];
}else if ($_GET['status_oferta']){

      $status_oferta = $_GET['status_oferta'];
}

 if ($_POST['filtro']){
   $filtro = $_POST['filtro'];
}else if ($_GET['filtro']){

      $filtro = $_GET['filtro'];
}
 if ($_POST['manufacturers_id']){
   $manufacturers_id = $_POST['manufacturers_id'];
}else if ($_GET['manufacturers_id']){

      $manufacturers_id = $_GET['manufacturers_id'];
}


$codigo_proveedor_up_replace = $_GET['codigo_proveedor_up_replace'];
$codigo_proveedor_up = $_GET['codigo_proveedor_up'];
$codigo_proveedor_description_up = $_GET['codigo_proveedor_description_up'];

  tep_db_query("delete from " . 'specials' . " where specials_new_products_price  = '" . 0 . "'");



?>


<?php
   if ($action == 'updateprices') {





    foreach($_POST['product_new_price'] as $id => $new_price) {





          $sql_status_update_array = array('products_price' => $new_price);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
     
    foreach($_POST['customers_groupG1'] as $id => $new_g1) {


      $e_values = tep_db_query("select * from " . 'products_groups' . " where products_id = '" . $id . "' and customers_group_id = 1");
         if  ($e= tep_db_fetch_array($e_values)){

          $sql_status_update_array = array('customers_group_price' => $new_g1);
            tep_db_perform('products_groups', $sql_status_update_array, 'update', " products_id='" . $id . "' and customers_group_id = 1");

                                         }else{



                   $sql_data_array = array('customers_group_price' => $new_g1,
                                          'products_id' => $id,
                                          'customers_group_id' => 1,
                                          'products_price' => $new_price,);
          tep_db_perform('products_groups', $sql_data_array);

                            }

     }
     
    foreach($_POST['customers_groupG2'] as $id => $new_g2) {


      $e_values = tep_db_query("select * from " . 'products_groups' . " where products_id = '" . $id . "' and customers_group_id = 2");
         if  ($e= tep_db_fetch_array($e_values)){

          $sql_status_update_array = array('customers_group_price' => $new_g2);
            tep_db_perform('products_groups', $sql_status_update_array, 'update', " products_id='" . $id . "' and customers_group_id = 2");

                                         }else{



                   $sql_data_array = array('customers_group_price' => $new_g2,
                                          'products_id' => $id,
                                          'customers_group_id' => 2,
                                          'products_price' => $new_price,);
          tep_db_perform('products_groups', $sql_data_array);

                            }
                  }
    


    foreach($_POST['opcion_1'] as $id => $new_opcion_1) {
          $sql_status_update_array = array('opcion_1' => $new_opcion_1);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }

    foreach($_POST['opcion_2'] as $id => $new_opcion_2) {
          $sql_status_update_array = array('opcion_2' => $new_opcion_2);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_3'] as $id => $new_opcion_3) {
          $sql_status_update_array = array('opcion_3' => $new_opcion_3);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_4'] as $id => $new_opcion_4) {
          $sql_status_update_array = array('opcion_4' => $new_opcion_4);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_5'] as $id => $new_opcion_5) {
          $sql_status_update_array = array('opcion_5' => $new_opcion_5);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_6'] as $id => $new_opcion_6) {
          $sql_status_update_array = array('opcion_6' => $new_opcion_6);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_7'] as $id => $new_opcion_7) {
          $sql_status_update_array = array('opcion_7' => $new_opcion_7);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_8'] as $id => $new_opcion_8) {
          $sql_status_update_array = array('opcion_8' => $new_opcion_8);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_9'] as $id => $new_opcion_9) {
          $sql_status_update_array = array('opcion_9' => $new_opcion_9);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_10'] as $id => $new_opcion_10) {
          $sql_status_update_array = array('opcion_10' => $new_opcion_10);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }



    foreach($_POST['opcion_1_1'] as $id => $new_opcion_1_1) {
          $sql_status_update_array = array('opcion_1_1' => $new_opcion_1_1);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }

    foreach($_POST['opcion_2_2'] as $id => $new_opcion_2_2) {
          $sql_status_update_array = array('opcion_2_2' => $new_opcion_2_2);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_3_3'] as $id => $new_opcion_3_3) {
          $sql_status_update_array = array('opcion_3' => $new_opcion_3);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_4_4'] as $id => $new_opcion_4_4) {
          $sql_status_update_array = array('opcion_4' => $new_opcion_4);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_5_5'] as $id => $new_opcion_5_) {
          $sql_status_update_array = array('opcion_5_5' => $new_opcion_5_5);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_6_6'] as $id => $new_opcion_6_6) {
          $sql_status_update_array = array('opcion_6_6' => $new_opcion_6_6);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_7_7'] as $id => $new_opcion_7_7) {
          $sql_status_update_array = array('opcion_7_7' => $new_opcion_7_7);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_8_8'] as $id => $new_opcion_8_8) {
          $sql_status_update_array = array('opcion_8_8' => $new_opcion_8_8);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_9_9'] as $id => $new_opcion_9_9) {
          $sql_status_update_array = array('opcion_9_9' => $new_opcion_9_9);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_10_10'] as $id => $new_opcion_10_10) {
          $sql_status_update_array = array('opcion_10_10' => $new_opcion_10_10);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }



    foreach($_POST['opcion_11'] as $id => $new_opcion_11) {
          $sql_status_update_array = array('opcion_11' => $new_opcion_11);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }

    foreach($_POST['opcion_12'] as $id => $new_opcion_12) {
          $sql_status_update_array = array('opcion_12' => $new_opcion_12);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_13'] as $id => $new_opcion_13) {
          $sql_status_update_array = array('opcion_13' => $new_opcion_13);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_14'] as $id => $new_opcion_14) {
          $sql_status_update_array = array('opcion_14' => $new_opcion_14);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_15'] as $id => $new_opcion_15) {
          $sql_status_update_array = array('opcion_15' => $new_opcion_15);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_16'] as $id => $new_opcion_16) {
          $sql_status_update_array = array('opcion_16' => $new_opcion_16);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_17'] as $id => $new_opcion_17) {
          $sql_status_update_array = array('opcion_17' => $new_opcion_17);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_18'] as $id => $new_opcion_18) {
          $sql_status_update_array = array('opcion_18' => $new_opcion_18);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_19'] as $id => $new_opcion_19) {
          $sql_status_update_array = array('opcion_19' => $new_opcion_19);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_20'] as $id => $new_opcion_20) {
          $sql_status_update_array = array('opcion_20' => $new_opcion_20);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }






    foreach($_POST['opcion_11'] as $id => $new_opcion_11) {
          $sql_status_update_array = array('opcion_11' => $new_opcion_11);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }

    foreach($_POST['opcion_12'] as $id => $new_opcion_12) {
          $sql_status_update_array = array('opcion_12' => $new_opcion_12);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_13'] as $id => $new_opcion_13) {
          $sql_status_update_array = array('opcion_13' => $new_opcion_13);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_14'] as $id => $new_opcion_14) {
          $sql_status_update_array = array('opcion_14' => $new_opcion_14);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_15_15'] as $id => $new_opcion_15_15) {
          $sql_status_update_array = array('opcion_15_15' => $new_opcion_15_15);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_16_16'] as $id => $new_opcion_16_16) {
          $sql_status_update_array = array('opcion_16_16' => $new_opcion_16_16);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_17_17'] as $id => $new_opcion_17_17) {
          $sql_status_update_array = array('opcion_17_17' => $new_opcion_17_17);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_18_18'] as $id => $new_opcion_18_18) {
          $sql_status_update_array = array('opcion_18_18' => $new_opcion_18_18);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_19'] as $id => $new_opcion_19) {
          $sql_status_update_array = array('opcion_19_19' => $new_opcion_19_19);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }


    foreach($_POST['opcion_20_20'] as $id => $new_opcion_20_20) {
          $sql_status_update_array = array('opcion_20_20' => $new_opcion_20_20);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");
     }










    
    foreach($_POST['opcion_1_1'] as $id => $new_opcion_1_1) {




          $sql_status_update_array = array('opcion_1_1' => $new_opcion_1_1);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");



     }
    
    
    
    
    
    
    
    
    
    
    
    
     foreach($_POST['product_new_weight'] as $id => $new_weight) {

          $sql_status_update_array = array('products_weight' => $new_weight);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }




     foreach($_POST['product_new_status'] as $id => $new_status) {

          $sql_status_update_array = array('products_status' => $new_status);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }


   foreach($_POST['product_new_status_exel'] as $id => $new_status_exel) {

          $sql_status_update_array = array('products_status_exel' => $new_status_exel);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
    

foreach($_POST['products_new_regladeprecios'] as $id => $new_regladeprecios) {

          $sql_status_update_array = array('products_regladeprecios' => $new_regladeprecios);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }


     foreach($_POST['products_new_filtro'] as $id => $new_filtro) {

          $sql_status_update_array = array('filtro' => $new_filtro);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
     
     foreach($_POST['products_new_products_cpe'] as $id => $products_cpe) {

          $sql_status_update_array = array('products_cpe' => $products_cpe);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
     
     
     
     foreach($_POST['products_new_products_cpf'] as $id => $products_cpf) {

          $sql_status_update_array = array('products_cpf' => $products_cpf);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
     
     
     foreach($_POST['products_new_products_rc'] as $id => $products_rc) {

          $sql_status_update_array = array('products_rc' => $products_rc);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }



     foreach($_POST['products_new_referencia_padre_g2'] as $id => $referencia_padre_g2) {

          $sql_status_update_array = array('referencia_padre_g2' => $referencia_padre_g2);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
     
     foreach($_POST['products_new_referencia_padre_g3'] as $id => $referencia_padre_g3) {

          $sql_status_update_array = array('referencia_padre_g3' => $referencia_padre_g3);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


     }
     
     
     foreach($_POST['products_new_referencia_padre'] as $id => $new_model) {

          $sql_status_update_array = array('referencia_padre' => $new_model);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


      //  tep_db_query("UPDATE products SET p.products_model_2=$new_model WHERE products_id=$id");
    }
     
     
    
     foreach($_POST['products_new_model'] as $id => $new_model) {

          $sql_status_update_array = array('products_model' => $new_model);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


      //  tep_db_query("UPDATE products SET p.products_model_2=$new_model WHERE products_id=$id");
    }
     foreach($_POST['products_new_model_2'] as $id => $new_model) {

          $sql_status_update_array = array('products_model_2' => $new_model);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


      //  tep_db_query("UPDATE products SET p.products_model_2=$new_model WHERE products_id=$id");
    }



       foreach($_POST['products_new_model_3'] as $id => $new_model) {

          $sql_status_update_array = array('products_model_3' => $new_model);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


      //  tep_db_query("UPDATE products SET p.products_model_2=$new_model WHERE products_id=$id");
    }
    
    
       foreach($_POST['products_new_products_youtube_1'] as $id => $new_model) {

          $sql_status_update_array = array('products_youtube_1' => $new_model);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


      //  tep_db_query("UPDATE products SET p.products_model_2=$new_model WHERE products_id=$id");
    }

       foreach($_POST['products_new_products_youtube_2'] as $id => $new_products_youtube_2) {

          $sql_status_update_array = array('products_youtube_2' => $new_products_youtube_2);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");


      //  tep_db_query("UPDATE products SET p.products_model_2=$new_model WHERE products_id=$id");
    }


    
     foreach($_POST['products_new_stock_min'] as $id => $products_stock_min) {


          $sql_status_update_array = array('products_stock_min' => $products_stock_min);
            tep_db_perform('products_stock', $sql_status_update_array, 'update', " products_id='" . $id . "'");
    }



     foreach($_POST['products_new_stocknivel'] as $id => $new_stocknivel) {


          $sql_status_update_array = array('stock_nivel' => $new_stocknivel);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");

   }

     foreach($_POST['products_new_manufacturers_id'] as $id => $new_manufacturers_id) {


          $sql_status_update_array = array('manufacturers_id' => $new_manufacturers_id);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");

   }




       // donde esta
     foreach($_POST['products_new_dondeesta'] as $id => $new_dondeesta) {


            $dondeesta_values = tep_db_query("select * from " . 'products_donde_esta' . " where products_id = '" . $id . "' and login_id = '" . $log_id . "'");
           if ($dondeesta= tep_db_fetch_array($dondeesta_values)){

      $dondeesta_model_values = tep_db_query("select * from " . 'products' . " where products_id = '" . $id . "'");
           $dondeesta_model= tep_db_fetch_array($dondeesta_model_values);



          $sql_status_update_array = array('donde_esta' => $new_dondeesta,
                                           'products_model' => $dondeesta_model['products_model'],);
            tep_db_perform('products_donde_esta', $sql_status_update_array, 'update', " products_id='" . $id . "' and login_id = '" . $log_id . "'");


                                                             }else{

      $dondeesta_model_values = tep_db_query("select * from " . 'products' . " where products_id = '" . $id . "'");
           $dondeesta_model= tep_db_fetch_array($dondeesta_model_values);


                  $sql_data_array = array('products_id' => $id,
                                          'donde_esta' => $new_dondeesta,
                                          'products_model' => $dondeesta_model['products_model'],
                                          'login_id' => $log_id,);
          tep_db_perform('products_donde_esta', $sql_data_array);

                                                         }


    }
          // fin donde esta



     foreach($_POST['product_new_status_special'] as $id => $new_status_special) {

$time1 = mktime(1, 1, 1, date("m"), date("d"), date("Y"));
$oldday1 = date("Y-m-d", $time1);


            $special_exist_values = tep_db_query("select * from " . 'specials' . " where products_id = '" . $id . "'");
           if ($special_exist= tep_db_fetch_array($special_exist_values)){






          $sql_status_update_array = array('specials_last_modified' => $oldday1,
                                           'status' => $new_status_special,);
            tep_db_perform('specials', $sql_status_update_array, 'update', " products_id='" . $id . "'");

                   }else{




                               $sql_data_array = array('products_id' => $id,
                                          'specials_new_products_price' => $new_status_special_price,
                                          'specials_date_added' => $oldday1,
                                          'specials_last_modified' => $oldday1,
                                          'expires_date' => $expire_fecha,
                                          'status' => $new_status_special,
                                          'specials_last_modified' => $fecha,);
          tep_db_perform('specials', $sql_data_array);



               }





    }




         foreach($_POST['products_new_twitter'] as $id => $new_twitter){




          $sql_status_update_array = array('products_twitter' => $new_twitter);
            tep_db_perform('products', $sql_status_update_array, 'update', " products_id='" . $id . "'");




     }


         foreach($_POST['products_new_specialprice'] as $id => $new_status_special_price){




          $sql_status_update_array = array('specials_new_products_price' => $new_status_special_price);
            tep_db_perform('specials', $sql_status_update_array, 'update', " products_id='" . $id . "'");




     }

 $referencia_padre = $_GET['referencia_padre'];



     tep_redirect($PHP_SELF . '?codigo_proveedor='.$codigo_proveedor . '&palabraclave=' . $palabraclave . '&buscar=' . $buscar . '&status_active='. $status_active . '&status_exel_web=' . $status_exel_web . '&regladeprecios=' . $regladeprecios . '&stocknivel=' . $stocknivel . '&status_oferta=' . $status_oferta . '&filtro=' . $filtro . '&referencia_padre=' . $referencia_padre . '&MAX_DISPLAY_SEARCH_RESULTS=' . $MAX_DISPLAY_SEARCH_RESULTS);


   echo "<td width=\"100%\" valign=\"top\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\">
      <tr>
        <td><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td class=\"pageHeading\">Prices Updated!</td>












            <td class=\"pageHeading\" align=\"right\"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT
            ); ?>   </td></tr></table></td>";
    exit;
}
?>






<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">

  <script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=450,height=600,screenX=150,screenY=150,top=150,left=150')
}
//--></script>



<?php   require(DIR_WS_INCLUDES . 'template_top.php');?>


<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo Proveedores; ?></td>










  <style type="text/css">
<!--
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: xx-small;
	font-weight: bold;
	color: #000099;
}
.Estilo2 {
	color: #0000FF;
	font-size: x-small;
	font-family: Verdana;
}
.Estilo3 {
	font-size: 10px;
	color: #0033FF;
}
.Estilo4 {color: #0000FF; font-size: 9px; }
.Estilo5 {
	color: #0033FF;
	font-family: Verdana;
	font-size: 10px;
}
.Estilo6 {
	font-family: Verdana;
	font-size: 10px;
}
-->
</style>





<style type="text/css">
<!--
.Estilo1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 9px}
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; }
-->
</style>


<SCRIPT>
<!--
function qu(){document.s.palabraclave.focus();}
function clk(url,oi,cad,ct,cd,sg){if(document.images){var e = window.encodeURIComponent ? encodeURIComponent : escape;var u="";var oi_param="";var cad_param="";if (url) u="&url="+e(url.replace(/#.*/,"")).replace(/\+/g,"%2B");if (oi) oi_param="&oi="+e(oi);if (cad) cad_param="&cad="+e(cad);new Image().src="/url?sa=T"+oi_param+cad_param+"&ct="+e(ct)+"&cd="+e(cd)+u+"&ei=yzHqRPLoGpy2QP6B_X0"+sg;}return true;}
// -->
</SCRIPT>

  <BODY topMargin=3 onload=qu()>

<body class="Estilo1">
<table width="100%" border="0">
<tr>
    <td><form name="s" method="post" action="<?php echo $PHP_SELF . '?buscar=ok&page='.$page . '&MAX_DISPLAY_SEARCH_RESULTS='.$MAX_DISPLAY_SEARCH_RESULTS.'&codigo_proveedor='.$codigo_proveedor; ?>">
      <table width="100%" border="0">
        <tr>
          <td width="227"><span class="Estilo3 Estilo1 Estilo2">Busquedas</span></td>

        </tr>
        <tr>
          <td><span class="Estilo4 Estilo5 Estilo1 Estilo2">
            <input type="text" name="palabraclave" value="<?php echo $palabraclave ?>">

  <?php
    if ($status_active == 'ON'){
          $status_active_checked_on = ' checked';
}

    if ($status_active == 'OFF'){
          $status_active_checked_off = ' checked';
}

    if ($status_exel_web == 1){
          $status_exel_checked = ' checked';
}
    if ($status_exel_web == 2){
          $status_web_checked = ' checked';
}

    if ($status_oferta == 1){
          $status_oferta_checked_on = ' checked';
}

    if ($status_oferta == 0){
          $status_oferta_checked_off = ' checked';
}




     ?>
     
     
 <?php
       $status_procesando_paypal_array = array(array('id' => '0', 'text' => TEXT_NONE));
        $status_procesando_paypal_query = tep_db_query("select * from " . 'proveedor' . " ORDER BY proveedor_name");
        while ($status_procesando_paypal = tep_db_fetch_array($status_procesando_paypal_query)) {
          $status_procesando_paypal_array[] = array('id' => $status_procesando_paypal['proveedor_id'],
                                  'text' => $status_procesando_paypal['proveedor_name']);
        }
        echo 'Proveedores: ' . tep_draw_pull_down_menu('codigo_proveedor', $status_procesando_paypal_array, $codigo_proveedor);

  ?>
     
     
     

       <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>


 	 Active:<input type="radio" value="ON" name="status_active"  <?php echo $status_active_checked_on ?>>
	Inactive: <input type="radio" name="status_active" value="OFF" <?php echo $status_active_checked_off ?>>

   &nbsp;   &nbsp; /   &nbsp;   &nbsp;
	 Exel:<input type="radio" value="1" name="status_exel_web"  <?php echo  $status_exel_checked ?>>
	Web: 	<input type="radio" name="status_exel_web" value="2" <?php echo  $status_web_checked ?>>
 
 
 
   &nbsp;   &nbsp; /   &nbsp;   &nbsp;
	 oferta SI:<input type="radio" value="1" name="status_oferta"  <?php echo  $status_oferta_checked_on ?>>
	NO: 	<input type="radio" name="status_oferta" value="0" <?php echo  $status_oferta_checked_off ?>>


          &nbsp;   &nbsp; /   &nbsp;   &nbsp; R.D.Precios
     <input type="text" name="regladeprecios" size="2" value="<?php echo  $regladeprecios ?>">
     
                      &nbsp;   &nbsp; /   &nbsp;   &nbsp;   Stock Nivel
                      
  <input type="text" name="stocknivel" size="2" value="<?php echo  $stocknivel ?>">

                      
                      &nbsp;   &nbsp; /   &nbsp;   &nbsp;   Filtro

  <input type="text" name="filtro" size="5" value="<?php echo  $filtro ?>">
  

                    &nbsp;   &nbsp; /   &nbsp;   &nbsp;   Donde Esta

  <input type="text" name="dondeesta" size="5" value="<?php echo  $dondeesta ?>">

                  </span></td>
          
          

          

        </tr>
        <tr>
          <td><span class="Estilo2 Estilo3"><span class="Estilo5">
            <input type="submit" name="Submit" value="Buscar">
          </span></span></td>

        </tr>
      </table>
      </form></td>





<?php

   if ($pendiente_de_entrada_a){
$pendiente_er = '?pendiente_de_entrada_a=ok';
                            }


?>

<form method="POST" action="<?php ECHO $PHP_SELF . $pendiente_er; ?>">

	<p><font face="Toledo">Filas: <font face="Viner Hand ITC"> <select size="1" name="MAX_DISPLAY_SEARCH_RESULTS">
	<option selected><?php echo $MAX_DISPLAY_SEARCH_RESULTS ?></option>
	<option>10</option>
	<option>20</option>
	<option>40</option>
	<option>60</option>
	<option>80</option>
	<option>100</option>
	<option>200</option>
	<option>300</option>
	<option>400</option>
	<option>500</option>
	</select></font> </font>







	<input type="submit" value="Enviar" name="B1" style="font-family: Toledo; font-size: 8pt; font-weight: bold"></p>




</form>


       </tr>
        </table></td>
      </tr>
      <tr>



           <?php

          if (AYUDA_ADMIN == 'true'){

$ayuda_fabricantes = '<p><a href="manufacturers.php">Ir A Fabricantes </a> '.'<a class="hastip"  title="' . AYUDA_TEXT_FABRICANTES . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_stockminimo = '<p><a href="conceptos_stock_min.php">Ir A lista stock mininimo </a> '.'<a class="hastip"  title="' . AYUDA_TEXT_STOCKMINIMO . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';





$ayuda_filtro = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_FILTRO . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_dondeesta = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_DONDEESTA . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_nombre_producto = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_NOMBRE_PRODUCTO . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_model = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_MODEL . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_imagen = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_IMAGEN . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_preciooferta = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_PRECIOOFERTA . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_ofertaon = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_OFERTAON . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_ofertaoff = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_OFERTAOFF . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_referencia_padre = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_REFERENCIA_PADRE . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_active = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_ACTIVE . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_preciooferta_onoff = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_PRECIOOFERTA_10 . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_peso = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_PESO . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_youtube1 = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_YOUTUBE1 . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_youtube2 = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_YOUTUBE2 . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';
$ayuda_refer_exterior = '<p></a> '.'<a class="hastip"  title="' . AYUDA_TEXT_REFER_EXTERIOR . '"><b><font size="1" color="#FFFFFF"><span style="background-color: #000000">_?_</span></font></b>';


}

 $refp = '?codigo_proveedor=' . $codigo_proveedor . '&palabraclave=' . $palabraclave . '&buscar=ok&status_active=' . $status_active . '&status_exel_web=' . $status_exel_web . '&regladeprecios=' . $regladeprecios . '&stocknivel=' . $stocknivel . '&status_oferta=' . $status_oferta . '&filtro=' . $filtro . '&referencia_padre=' . 'order' . '&MAX_DISPLAY_SEARCH_RESULTS=' . $MAX_DISPLAY_SEARCH_RESULTS . '';
 $refpdes = '?codigo_proveedor=' . $codigo_proveedor . '&palabraclave=' . $palabraclave . '&buscar=ok&status_active=' . $status_active . '&status_exel_web=' . $status_exel_web . '&regladeprecios=' . $regladeprecios . '&stocknivel=' . $stocknivel . '&status_oferta=' . $status_oferta . '&filtro=' . $filtro . '&referencia_padre=' . 'order' . '&MAX_DISPLAY_SEARCH_RESULTS=' . $MAX_DISPLAY_SEARCH_RESULTS . '';


                   ?>

<td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo 'Actualizacion de Productos'; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo 'Id'; ?></td>
                 <td class="dataTableHeadingContent"><?php echo 'On'.$ayuda_active; ?></td>
                 <td class="dataTableHeadingContent"><?php echo 'Off'; ?></td>
                 <td class="dataTableHeadingContent"><?php echo 'Idc'; ?></td>
               <td class="dataTableHeadingContent"><?php echo 'Refer Padre extra' ; ?></td>
              <td class="dataTableHeadingContent"><?php echo '<a href="' . $PHP_SELF . '' . $refp . '">Refer Padre</a>'.$ayuda_referencia_padre ; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Refer Padre ' .$codigo_proveedor. ' '.$ayuda_refer_exterior; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Repositorio' .$ayuda_repositorio; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Model' .$ayuda_model; ?></td>
               <td class="dataTableHeadingContent"><?php echo 'Nombre' .$ayuda_nombre_producto; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Regla Categoria' .$ayuda_regla_categoria; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Regla Fabricante' .$ayuda_regla_fabricante; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Reglas 1-2'; ?></td>
              <td class="dataTableHeadingContent"><?php echo 'Filtro' .$ayuda_filtro; ?></td>
                 <td class="dataTableHeadingContent"><?php echo 'Stock Recomen' . $ayuda_stockminimo; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Donde Esta'. $ayuda_dondeesta; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Fabricante '.$ayuda_fabricantes; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo 'Imagen'.$ayuda_imagen; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo 'Precio'; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo 'Oferta Precio 1-0'.$ayuda_preciooferta.$ayuda_preciooferta_onoff; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo 'Regla de Precio '; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo '1'.$ayuda_ofertaon; ?></td>
                <td class="dataTableHeadingContent"><?php echo '0'.$ayuda_ofertaoff; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Peso'.$ayuda_peso; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Yutube1'.$ayuda_youtube1; ?></td>
                <td class="dataTableHeadingContent"><?php echo 'Yutube2'.$ayuda_youtube1; ?></td>
               <td class="dataTableHeadingContent" align="center"><?php echo 'Precio'; ?>
              <td class="dataTableHeadingContent" align="center"><?php echo 'Reglas de Precios'; ?>&nbsp;</td>
              <td class="dataTableHeadingContent" align="center"><?php echo 'Stock Nivel'; ?>&nbsp;</td>
              </tr>
              
              
              <?php
                 $codigo_proveedor_b =  '&codigo_proveedor='.$codigo_proveedor;
              
                    if ($status_active == 'ON'){
                    $productos_status_active = 'and p.products_status = 1';
                                }
                    if ($status_active == 'OFF'){
                    $productos_status_active = 'and p.products_status = 0';
                                }
                    if ($status_exel_web == 1){
                    $productos_status_exel = 'and p.products_status_exel =' . $status_exel_web;
                                }

                    if ($status_exel_web == 2){
                    $productos_status_web = 'and p.products_status_exel =' . $status_exel_web;
                                }
                                
                    if ($regladeprecios){
                    $p_regladeprecios = 'and p.products_regladeprecios =' . $regladeprecios;
                                }

                     if ($stocknivel){
                    $p_stocknivel = 'and p.stock_nivel =' . $stocknivel;
                                }
                                
                                if ($status_oferta){
                           $p_status_oferta = 'and ps.status =' . $status_oferta;
                                                   }
                                                   
                            if ($filtro){
                           $p_filtro = 'and p.filtro =' . $filtro;
                                                   }

                                                   
                          if ($dondeesta){
                          $palabraclave = $dondeesta;
                          
                          }else{

                               }
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                 ?>
<form name="update" method="post" action="<?php echo "$PHP_SELF?action=updateprices" . $codigo_proveedor_b . '&MAX_DISPLAY_SEARCH_RESULTS=' . $MAX_DISPLAY_SEARCH_RESULTS . '&palabraclave=' . $palabraclave . '&buscar=' . $buscar . '&status_exel_web=' . $status_exel_web . '&status_active=' . $status_active . '&regladeprecios=' . $regladeprecios . '&stocknivel=' . $stocknivel  . '&status_oferta=' . $status_oferta . '&filtro=' . $filtro . '&referencia_padre=' . $referencia_padre; ?>">
          <tr class="datatableRow">            
<?    

  $referencia_padre = $_GET['referencia_padre'];



               if ($referencia_padre == 'order'){
    $order_byy='referencia_padre';
}else{
  $order_byy='products_name';
}

    ECHO '<p><a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update'.'"><b>Importar Parametros de ...</b></a></p>';
    ECHO '<p><a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update&codigo_proveedor_up_replace=update'.'"><font color="#FF0000"><b>Importar REEMPLAZAR Parametros de ...</b></font></a></p>';

    ECHO '<p><a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update&codigo_proveedor_up_replace=update'.'">
    <font color="#FF0000"><b>Refer Padre - </b></font></a>
    
    <a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update&codigo_proveedor_up_replace=update'.'">
    <font color="#FF0000"><b>Imagenes - </b></font></a>
    
    <a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update&codigo_proveedor_up_replace=update'.'">
    <font color="#FF0000"><b>Nombre Producto - </b></font></a>
    
    <a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update&codigo_proveedor_up_replace=update'.'">
    <font color="#FF0000"><b>Youtube1 - </b></font></a>
    
    <a href="'.$PHP_SELF.$refp.'&codigo_proveedor_up=update&codigo_proveedor_up_replace=update'.'">
    <font color="#FF0000"><b>Youtube2 - </b></font></a>

    </p>';

  //  ECHO '<p><a href="'.$PHP_SELF.$refp.'&codigo_proveedor_description_up=update'.'"><b>Importar Descripciones de ...</b></a></p>';




  //$affiliate_sales_raw = "select op.products_name, op.orders_id from " . TABLE_ORDERS . " o, " . TABLE_PRODUCTS . " p, " . 'admin' . " a left join " . TABLE_ORDERS_PRODUCTS . " op on op.orders_id = o.orders_id where op.products_id = p.products_id and o.orders_status = '" . $entregas_stock . "'";
      if ($buscar){

  		$result = "select p.products_id,
                                                      p.proveedor_price_general,
                                                      p.products_regladeprecios,
                                                      pd.products_name,
                                                      p.codigo_barras,
                                                      p.opcion_1,
                                                      p.opcion_1_1,
                                                      p.opcion_2,
                                                      p.opcion_2_2,
                                                      p.opcion_3,
                                                      p.opcion_3_3,
                                                      p.opcion_4,
                                                      p.opcion_4_4,
                                                      p.opcion_5,
                                                      p.opcion_5_5,
                                                      p.opcion_6,
                                                      p.opcion_6_6,
                                                      p.opcion_7,
                                                      p.opcion_7_7,
                                                      p.opcion_8,
                                                      p.opcion_8_8,
                                                      p.opcion_9,
                                                      p.opcion_9_9,
                                                      p.opcion_10,
                                                      p.opcion_10_10,
                                                      p.opcion_11,
                                                      p.opcion_11_11,
                                                      p.opcion_12,
                                                      p.opcion_12_12,
                                                      p.opcion_13,
                                                      p.opcion_13_13,
                                                      p.opcion_14,
                                                      p.opcion_14_14,
                                                      p.opcion_15,
                                                      p.opcion_15_15,
                                                      p.opcion_16,
                                                      p.opcion_16_16,
                                                      p.opcion_17,
                                                      p.opcion_17_17,
                                                      p.opcion_18,
                                                      p.opcion_18_18,
                                                      p.opcion_19,
                                                      p.opcion_19_19,
                                                      p.opcion_20,
                                                      p.opcion_20_20,
                                                      p.products_youtube_1,
                                                      p.products_twitter,
                                                      p.products_youtube_2,
                                                      p.filtro,
                                                      p.products_rc,
                                                      p.products_cpe,
                                                      p.products_cpf,
                                                      p.referencia_padre_g3,
                                                      p.referencia_padre_g2,
                                                      p.referencia_padre,
                                                      p.stock_nivel,
                                                      p.products_image,
                                                      p.products_price,
                                                      p.products_weight,
                                                      p.products_stock_min,
                                                      p.time_ultimaactualizacion,
                                                      p.time_entradasysalidas,
                                                      p.time_pendiente_entrada_total,
                                                      p.time_entregado,
                                                      p.time_paypal_enviado,
                                                      p.time_pagado_transferencia,
                                                      p.time_no_recogido,
                                                      p.time_cobrados,
                                                      p.time_credito,
                                                      p.time_pagado,
                                                      p.products_model,
                                                      p.products_model_2,
                                                      p.products_model_3,
                                                      p.products_status,
                                                      p.products_status_exel,
                                                      pde.donde_esta,
                                                      p.codigo_proveedor,
                                                      p.proveedor_price from " . TABLE_PRODUCTS . " p left join  " . TABLE_SPECIALS . " ps on ps.products_id = p.products_id,  " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . 'products_donde_esta' . " pde on pd.products_id = pde.products_id  and pde.login_id = '" . $log_id . "' where p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta  $p_filtro  and p.products_model like '%" . $palabraclave . "%' or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and pde.donde_esta like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and p.products_cpe like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and p.products_cpf like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and p.referencia_padre like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and p.referencia_padre_g2 like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and p.referencia_padre_g3 like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and pd.products_name like '%" . $palabraclave . "%'    ORDER BY $order_byy desc limit $MAX_DISPLAY_SEARCH_RESULTS ";
}else if ($referencia_padre){

  		$result = "select p.products_id,
                                                      p.proveedor_price_general,
                                                      p.products_regladeprecios,
                                                      pd.products_name,
                                                      p.codigo_barras,
                                                      p.opcion_1,
                                                      p.opcion_1_1,
                                                      p.opcion_2,
                                                      p.opcion_2_2,
                                                      p.opcion_3,
                                                      p.opcion_3_3,
                                                      p.opcion_4,
                                                      p.opcion_4_4,
                                                      p.opcion_5,
                                                      p.opcion_5_5,
                                                      p.opcion_6,
                                                      p.opcion_6_6,
                                                      p.opcion_7,
                                                      p.opcion_7_7,
                                                      p.opcion_8,
                                                      p.opcion_8_8,
                                                      p.opcion_9,
                                                      p.opcion_9_9,
                                                      p.opcion_10,
                                                      p.opcion_10_10,
                                                      p.opcion_11,
                                                      p.opcion_11_11,
                                                      p.opcion_12,
                                                      p.opcion_12_12,
                                                      p.opcion_13,
                                                      p.opcion_13_13,
                                                      p.opcion_14,
                                                      p.opcion_14_14,
                                                      p.opcion_15,
                                                      p.opcion_15_15,
                                                      p.opcion_16,
                                                      p.opcion_16_16,
                                                      p.opcion_17,
                                                      p.opcion_17_17,
                                                      p.opcion_18,
                                                      p.opcion_18_18,
                                                      p.opcion_19,
                                                      p.opcion_19_19,
                                                      p.opcion_20,
                                                      p.opcion_20_20,
                                                      p.referencia_padre_g3,
                                                      p.referencia_padre_g2,
                                                      p.products_twitter,
                                                      p.products_youtube_1,
                                                      p.products_youtube_2,
                                                      p.filtro,
                                                      p.products_rc,
                                                      p.products_cpe,
                                                      p.products_cpf,
                                                      p.referencia_padre,
                                                      p.stock_nivel,
                                                      p.products_image,
                                                      p.products_price,
                                                      p.products_weight,
                                                      p.products_stock_min,
                                                      p.time_ultimaactualizacion,
                                                      p.time_entradasysalidas,
                                                      p.time_pendiente_entrada_total,
                                                      p.time_entregado,
                                                      p.time_paypal_enviado,
                                                      p.time_pagado_transferencia,
                                                      p.time_no_recogido,
                                                      p.time_cobrados,
                                                      p.time_credito,
                                                      p.time_pagado,
                                                      p.products_model,
                                                      p.products_model_2,
                                                      p.products_model_3,
                                                      p.products_status,
                                                      p.products_status_exel,
                                                      pde.donde_esta,
                                                      p.codigo_proveedor,
                                                      p.proveedor_price from " . TABLE_PRODUCTS . " p left join  " . TABLE_SPECIALS . " ps on ps.products_id = p.products_id,  " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . 'products_donde_esta' . " pde on pd.products_id = pde.products_id  and pde.login_id = '" . $log_id . "' where p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta  $p_filtro  and p.products_model like '%" . $palabraclave . "%' or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and pde.donde_esta like '%" . $palabraclave . "%'  or
                                                                                                                                                                                                                                                                                                                                                   p.products_id = pd.products_id $productos_status_active $productos_status_exel $productos_status_web $p_regladeprecios $p_stocknivel $p_status_oferta $p_filtro and pd.products_name like '%" . $palabraclave . "%'    ORDER BY '" . 'referencia_padre' . "' desc limit $MAX_DISPLAY_SEARCH_RESULTS ";

}else if ($buscar_dondeesta){

  		$result = "select p.products_id,
                                                      p.proveedor_price_general,
                                                      pd.products_name,
                                                      p.codigo_barras,
                                                      p.products_image,
                                                      p.filtro,
                                                      p.products_rc,
                                                      p.products_cpe,
                                                      p.products_cpf,
                                                      p.referencia_padre_g3,
                                                      p.referencia_padre_g2,
                                                      p.products_twitter,
                                                      p.products_youtube_1,
                                                      p.products_youtube_2,
                                                      p.referencia_padre,
                                                      p.products_stock_min,
                                                      p.codigo_barras,
                                                      p.opcion_1,
                                                      p.opcion_1_1,
                                                      p.opcion_2,
                                                      p.opcion_2_2,
                                                      p.opcion_3,
                                                      p.opcion_3_3,
                                                      p.opcion_4,
                                                      p.opcion_4_4,
                                                      p.opcion_5,
                                                      p.opcion_5_5,
                                                      p.opcion_6,
                                                      p.opcion_6_6,
                                                      p.opcion_7,
                                                      p.opcion_7_7,
                                                      p.opcion_8,
                                                      p.opcion_8_8,
                                                      p.opcion_9,
                                                      p.opcion_9_9,
                                                      p.opcion_10,
                                                      p.opcion_10_10,
                                                      p.opcion_11,
                                                      p.opcion_11_11,
                                                      p.opcion_12,
                                                      p.opcion_12_12,
                                                      p.opcion_13,
                                                      p.opcion_13_13,
                                                      p.opcion_14,
                                                      p.opcion_14_14,
                                                      p.opcion_15,
                                                      p.opcion_15_15,
                                                      p.opcion_16,
                                                      p.opcion_16_16,
                                                      p.opcion_17,
                                                      p.opcion_17_17,
                                                      p.opcion_18,
                                                      p.opcion_18_18,
                                                      p.opcion_19,
                                                      p.opcion_19_19,
                                                      p.opcion_20,
                                                      p.opcion_20_20,
                                                      p.time_entradasysalidas,
                                                      p.time_ultimaactualizacion,
                                                      p.time_pendiente_entrada_total,
                                                      p.time_entregado,
                                                      p.time_paypal_enviado,
                                                      p.time_pagado_transferencia,
                                                      p.time_no_recogido,
                                                      p.time_cobrados,
                                                      p.time_credito,
                                                      p.time_pagado,
                                                      p.products_model,
                                                      p.products_model_2,
                                                      p.products_model_3,
                                                      p.products_status,
                                                      pde.donde_esta,
                                                      p.codigo_proveedor,
                                                      p.proveedor_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . 'products_donde_esta' . " pde on pd.products_id = pde.products_id and pde.login_id = '" . $login_id . "' where p.products_id = pd.products_id and pde.donde_esta like '%" . $palabraclave . "%'    ORDER BY '" . 'products_name' . "' desc limit 100";



     }else if ($ordenar_a){




		$result = "select p.products_id,
                                                      p.proveedor_price_general,
                                                      pd.products_name,
                                                      p.codigo_barras,
                                                     p.opcion_1,
                                                      p.opcion_1_1,
                                                      p.opcion_2,
                                                      p.opcion_2_2,
                                                      p.opcion_3,
                                                      p.opcion_3_3,
                                                      p.opcion_4,
                                                      p.opcion_4_4,
                                                      p.opcion_5,
                                                      p.opcion_5_5,
                                                      p.opcion_6,
                                                      p.opcion_6_6,
                                                      p.opcion_7,
                                                      p.opcion_7_7,
                                                      p.opcion_8,
                                                      p.opcion_8_8,
                                                      p.opcion_9,
                                                      p.opcion_9_9,
                                                      p.opcion_10,
                                                      p.opcion_10_10,
                                                      p.opcion_11,
                                                      p.opcion_11_11,
                                                      p.opcion_12,
                                                      p.opcion_12_12,
                                                      p.opcion_13,
                                                      p.opcion_13_13,
                                                      p.opcion_14,
                                                      p.opcion_14_14,
                                                      p.opcion_15,
                                                      p.opcion_15_15,
                                                      p.opcion_16,
                                                      p.opcion_16_16,
                                                      p.opcion_17,
                                                      p.opcion_17_17,
                                                      p.opcion_18,
                                                      p.opcion_18_18,
                                                      p.opcion_19,
                                                      p.opcion_19_19,
                                                      p.opcion_20,
                                                      p.opcion_20_20,
                                                      p.filtro,
                                                      p.products_rc,
                                                      p.products_cpe,
                                                      p.products_cpf,
                                                      p.referencia_padre_g3,
                                                      p.referencia_padre_g2,
                                                      p.products_twitter,
                                                      p.products_youtube_1,
                                                      p.products_youtube_2,
                                                      p.referencia_padre,
                                                      p.products_stock_min,
                                                      p.products_image,
                                                      p.time_ultimaactualizacion,
                                                      p.time_entradasysalidas,
                                                      p.time_pendiente_entrada_total,
                                                      p.time_entregado,
                                                      p.time_paypal_enviado,
                                                      p.time_pagado_transferencia,
                                                      p.time_no_recogido,
                                                      p.time_cobrados,
                                                      p.time_credito,
                                                      p.time_pagado,
                                                      p.products_model,
                                                      p.products_model_2,
                                                      p.products_model_3,
                                                      p.products_status,
                                                      p.codigo_proveedor,
                                                      p.proveedor_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . 'products_donde_esta' . " pde on pd.products_id = pde.products_id and pde.login_id = '" . $login_id . "' where p.products_id = pd.products_id ORDER BY products_name DESC";




     }else if ($pendiente_de_entrada_a){


                      // group by p.products_id         billing_name

		$result = "select p.products_id,
                                                      p.proveedor_price_general,
                                                      pd.products_name,
                                                      p.filtro,
                                                      p.codigo_barras,
                                                      p.opcion_1,
                                                      p.opcion_1_1,
                                                      p.opcion_2,
                                                      p.opcion_2_2,
                                                      p.opcion_3,
                                                      p.opcion_3_3,
                                                      p.opcion_4,
                                                      p.opcion_4_4,
                                                      p.opcion_5,
                                                      p.opcion_5_5,
                                                      p.opcion_6,
                                                      p.opcion_6_6,
                                                      p.opcion_7,
                                                      p.opcion_7_7,
                                                      p.opcion_8,
                                                      p.opcion_8_8,
                                                      p.opcion_9,
                                                      p.opcion_9_9,
                                                      p.opcion_10,
                                                      p.opcion_10_10,
                                                      p.opcion_11,
                                                      p.opcion_11_11,
                                                      p.opcion_12,
                                                      p.opcion_12_12,
                                                      p.opcion_13,
                                                      p.opcion_13_13,
                                                      p.opcion_14,
                                                      p.opcion_14_14,
                                                      p.opcion_15,
                                                      p.opcion_15_15,
                                                      p.opcion_16,
                                                      p.opcion_16_16,
                                                      p.opcion_17,
                                                      p.opcion_17_17,
                                                      p.opcion_18,
                                                      p.opcion_18_18,
                                                      p.opcion_19,
                                                      p.opcion_19_19,
                                                      p.opcion_20,
                                                      p.opcion_20_20,
                                                      p.products_rc,
                                                      p.products_cpe,
                                                      p.products_cpf,
                                                      p.referencia_padre_g3,
                                                      p.referencia_padre_g2,
                                                      p.referencia_padre,
                                                      p.products_stock_min,
                                                      p.products_twitter,
                                                      p.products_youtube_2,
                                                      p.products_youtube_1,
                                                      o.billing_name,
                                                      o.orders_id,
                                                      o.orders_status,
                                                      o.date_purchased,
                                                      o.orders_date_finished,
                                                      op.lista_prov,
                                                      p.codigo_barras,
                                                      p.products_image,
                                                      p.products_status,
                                                      p.time_ultimaactualizacion,
                                                      p.time_entradasysalidas,
                                                      p.time_pendiente_entrada_total,
                                                      p.time_entregado,
                                                      p.time_paypal_enviado,
                                                      p.time_pagado_transferencia,
                                                      p.time_no_recogido,
                                                      p.time_cobrados,
                                                      p.time_credito,
                                                      p.time_pagado,
                                                      p.products_model,
                                                      p.products_model_2,
                                                      p.products_model_3,
                                                      p.products_status,
                                                      pde.donde_esta,
                                                      p.codigo_proveedor,
                                                      p.proveedor_price from " . TABLE_PRODUCTS . " p, orders_products op, orders o, administrators a,  " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . 'products_donde_esta' . " pde on pd.products_id = pde.products_id and pde.login_id = '" . $login_id . "' where op.products_id =p.products_id and op.lista_prov = 0 and p.products_id = pd.products_id and o.orders_status = a.pendiente_entrada and a.admin_groups_id=6 and op.orders_id=o.orders_id  or
                                                                                                                                                                                                                                                                                                                   op.products_id =p.products_id and op.lista_prov = 0 and p.products_id = pd.products_id and o.orders_status = a.status_pendiente and a.admin_groups_id=6 and op.orders_id=o.orders_id  or
                                                                                                                                                                                                                                                                                                                   op.products_id =p.products_id and op.lista_prov = 0 and p.products_id = pd.products_id and o.orders_status = a.status_procesando and a.admin_groups_id=6 and op.orders_id=o.orders_id ORDER BY '" . 'products_name' . "' DESC";




  }else{

		$result = "select p.products_id,
                                                      p.proveedor_price_general,
                                                      pd.products_name,
                                                      p.codigo_barras,
                                                      p.opcion_1,
                                                      p.opcion_1_1,
                                                      p.opcion_2,
                                                      p.opcion_2_2,
                                                      p.opcion_3,
                                                      p.opcion_3_3,
                                                      p.opcion_4,
                                                      p.opcion_4_4,
                                                      p.opcion_5,
                                                      p.opcion_5_5,
                                                      p.opcion_6,
                                                      p.opcion_6_6,
                                                      p.opcion_7,
                                                      p.opcion_7_7,
                                                      p.opcion_8,
                                                      p.opcion_8_8,
                                                      p.opcion_9,
                                                      p.opcion_9_9,
                                                      p.opcion_10,
                                                      p.opcion_10_10,
                                                      p.opcion_11,
                                                      p.opcion_11_11,
                                                      p.opcion_12,
                                                      p.opcion_12_12,
                                                      p.opcion_13,
                                                      p.opcion_13_13,
                                                      p.opcion_14,
                                                      p.opcion_14_14,
                                                      p.opcion_15,
                                                      p.opcion_15_15,
                                                      p.opcion_16,
                                                      p.opcion_16_16,
                                                      p.opcion_17,
                                                      p.opcion_17_17,
                                                      p.opcion_18,
                                                      p.opcion_18_18,
                                                      p.opcion_19,
                                                      p.opcion_19_19,
                                                      p.opcion_20,
                                                      p.opcion_20_20,
                                                      p.filtro,
                                                      p.products_rc,
                                                       p.products_cpe,
                                                      p.products_cpf,
                                                      p.referencia_padre_g3,
                                                      p.referencia_padre_g2,
                                                      p.products_stock_min,
                                                      p.products_twitter,
                                                      p.products_youtube_1,
                                                      p.products_youtube_2,
                                                      p.products_image,
                                                      p.referencia_padre,
                                                      p.products_price,
                                                      p.time_ultimaactualizacion,
                                                      p.time_entradasysalidas,
                                                      p.time_pendiente_entrada_total,
                                                      p.time_entregado,
                                                      p.time_paypal_enviado,
                                                      p.time_pagado_transferencia,
                                                      p.time_no_recogido,
                                                      p.time_cobrados,
                                                      p.time_credito,
                                                      p.products_regladeprecios,
                                                      p.time_pagado,
                                                      p.products_model_2,
                                                      p.products_model_3,
                                                      p.products_model,
                                                      p.products_status,
                                                      p.products_status_exel,
                                                     p.stock_nivel,
                                                      p.products_weight,
                                                     pde.donde_esta,
                                                      p.codigo_proveedor,
                                                      p.proveedor_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . 'products_donde_esta' . " pde on pde.login_id = '" . $login_id . "' and pd.products_id = pde.products_id where p.products_status = 1 and p.products_id = pd.products_id  ORDER BY '" . 'p.products_name' . "' desc limit $MAX_DISPLAY_SEARCH_RESULTS";


         }

 $result = tep_db_query($result);

    
    
    if ($row = tep_db_fetch_array($result)) {
        do {
        
                  $products_id_stock = $row["products_id"];


            $im=1;
 $products_images_values = tep_db_query("select * from " . 'products_extra_images' . " where products_id = '" . $row["products_id"] . "'");
          while   ($count_image= tep_db_fetch_array($products_images_values)){

       $iim =   $im++;

      }


              $products_images_values = tep_db_query("select * from " . TABLE_PRODUCTS . " where products_id = '" . $products_id_stock . "'");
             $products_images= tep_db_fetch_array($products_images_values);
               $products_images_name_values = tep_db_query("select * from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . $products_id_stock . "'");
             $products_images_name = tep_db_fetch_array($products_images_name_values);
              $products_stock_values = tep_db_query("select * from " . 'products_stock' . " where products_id = '" . $row["products_id"] . "'");
             $products_stock= tep_db_fetch_array($products_stock_values);

              $products_dat_values = tep_db_query("select * from " . TABLE_PRODUCTS . " where products_id = '" . $row["products_id"] . "'");
             $products_dat= tep_db_fetch_array($products_dat_values);

                    $ref_fabricante_values = tep_db_query("select * from " . 'proveedor' . " where proveedor_id = '" . $products_images['codigo_proveedor'] . "'");
               $ref_fabricante= tep_db_fetch_array($ref_fabricante_values);
// ruta imagen
if ($ref_fabricante['proveedor_ruta_images']){

//existe imagen
if (getimagesize($ref_fabricante['proveedor_ruta_images']. $products_images['products_image'])) {

          $images = $ref_fabricante['proveedor_ruta_images']. $products_images['products_image'];

} else {

        $images = $ref_fabricante['proveedor_ruta_images']. 'no-foto.jpg';


}
//existe imagen


}else{
// ruta imagen

   if (ereg("^http://", $products_images['products_image']) ) {

         $images =  $products_images['products_image'];

}else{

    $images =  HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . $products_images['products_image'];
}



}




              $dondeesta_values = tep_db_query("select * from " . 'products_donde_esta' . " where products_id = '" . $row['products_id'] . "' and login_id = '" . $log_id . "'");
             $dondeesta= tep_db_fetch_array($dondeesta_values);

              $specials_exist_values = tep_db_query("select * from " . 'specials' . " where products_id = '" . $row['products_id'] . "'");
             $specials_exist= tep_db_fetch_array($specials_exist_values);

             $ptc_values = tep_db_query("select * from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . $row["products_id"]. "'");
             $ptc= tep_db_fetch_array($ptc_values);


// ruta imagen
						echo "<tr class=\"smallText\">";
						echo "<td class=\"smallText\" valign=\"top\">".$row["products_id"]."</td>\n";
      
      
            if ($row['products_status'] == 1){
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\" checked name=\"product_new_status[".$row['products_id']."]\" value=1></td>\n";
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\" name=\"product_new_status[".$row['products_id']."]\" value=0></td>\n";
                           }
           if ($row['products_status'] == 0){
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\"  name=\"product_new_status[".$row['products_id']."]\" value=1></td>\n";
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\" checked name=\"product_new_status[".$row['products_id']."]\" value=0></td>\n";
                           }
                           

					echo "<td class=\"smallText\" valign=\"top\"><a target=\"_blank\" href=\"" . HTTP_SERVER . DIR_WS_CATALOG . 'admin/categories.php?pID=' . $row['products_id'] . '&cPath=' . $ptc["categories_id"] . "\">".$ptc["categories_id"]."</a></td>\n";

                           

                   $referencia_padre_filtrar = 'quick_cliente.php?buscar=ok&page=&MAX_DISPLAY_SEARCH_RESULTS=1000&codigo_proveedor=' . $codigo_proveedor  . '&palabraclave=' . $row['referencia_padre'];
                   $referencia_padre2_filtrar = 'quick_cliente.php?buscar=ok&page=&MAX_DISPLAY_SEARCH_RESULTS=1000&codigo_proveedor=' . $codigo_proveedor  . '&palabraclave=' . $row['referencia_padre_g2'];
                   $referencia_reglacategoria_filtrar = 'quick_cliente.php?buscar=ok&page=&MAX_DISPLAY_SEARCH_RESULTS=1000&codigo_proveedor=' . $codigo_proveedor  . '&palabraclave=' . $row['products_cpe'];
                   $referencia_reglafabricante_filtrar = 'quick_cliente.php?buscar=ok&page=&MAX_DISPLAY_SEARCH_RESULTS=1000&codigo_proveedor=' . $codigo_proveedor  . '&palabraclave=' . $row['products_cpf'];
                   $referencia_model_filtrar = 'quick_cliente.php?buscar=ok&page=&MAX_DISPLAY_SEARCH_RESULTS=1000&codigo_proveedor=' . $codigo_proveedor  . '&palabraclave=' . $row['products_model'];

                   
            echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><p align=".left."><a href=". $referencia_padre2_filtrar .">Filtrar</a><input size=\"15\" type=\"text\" name=\"products_new_referencia_padre_g2[".$row['products_id']."]\" value={$row['referencia_padre_g2']}>
           <p align=".left."><a href=". aaa . "> Filtrar</a><input size=\"15\" type=\"text\" name=\"products_new_referencia_padre_g3[".$row['products_id']."]\" value={$row['referencia_padre_g3']}></td>\n";
            
            //echo "<td class=\"smallText\" valign=\"top\" align=\"right\"></td>\n";

            echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><p align=".left."><a href=". $referencia_padre_filtrar .">Filtrar</a><input size=\"10\" type=\"text\" name=\"products_new_referencia_padre[".$row['products_id']."]\" value={$row['referencia_padre']}></td>\n";
            echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><p align=".left.">Twitter</a><input size=\"10\" type=\"text\" name=\"products_new_twitter[".$row['products_id']."]\" value={$row['products_twitter']}></td>\n";


                                            if ($codigo_proveedor_up == 'update'){

                                                       //zona env�o
                $product_compartir_values = tep_db_query("select * from " . 'products_compartir' . " where proveedor_id = '" . $codigo_proveedor . "'");
        WHILE ($product_compartir = tep_db_fetch_array($product_compartir_values)){

                                                     if ($codigo_proveedor_up_replace == 'update'){
             //   echo '<script language="javascript" src="' . $product_compartir['ruta_url'] . 'products_stock_exterior.php?codigobarras='. $codigobarras .'&url='. HTTPS_SERVER . DIR_WS_HTTPS_CATALOG . 'products_stock_nuevaalta.php' . '"> </script>';
        $text_ext = '<script language="javascript" src="' . $product_compartir['ruta_url'] . 'products_stock_exterior_quick_up.php?codigobarras='.$row['products_model'].'&url='. HTTPS_SERVER . DIR_WS_CATALOG . 'admin/products_stock_nuevaalta_quick_up.php' . '&proveedor_id=' . $row['products_id'] . '&codigo_proveedor=' . $codigo_proveedor . '&codigo_proveedor_up_replace=update"> </script>';
                                                                                          }else{

        $text_ext = '<script language="javascript" src="' . $product_compartir['ruta_url'] . 'products_stock_exterior_quick_up.php?codigobarras='.$row['products_model'].'&url='. HTTPS_SERVER . DIR_WS_CATALOG . 'admin/products_stock_nuevaalta_quick_up.php' . '&proveedor_id=' . $row['products_id'] . '&codigo_proveedor=' . $codigo_proveedor . '"> </script>';
                                                                                               }
                                                                                              }
                                                                                              
                                                                                              
                                               }else{

                                                       //zona env�o
                $product_compartir_values = tep_db_query("select * from " . 'products_compartir' . " where proveedor_id = '" . $codigo_proveedor . "'");
        WHILE ($product_compartir = tep_db_fetch_array($product_compartir_values)){


             //   echo '<script language="javascript" src="' . $product_compartir['ruta_url'] . 'products_stock_exterior.php?codigobarras='. $codigobarras .'&url='. HTTPS_SERVER . DIR_WS_HTTPS_CATALOG . 'products_stock_nuevaalta.php' . '"> </script>';
        $text_ext = '<script language="javascript" src="' . $product_compartir['ruta_url'] . 'products_stock_exterior_quick.php?codigobarras='.$row['products_model'].'&url='. HTTPS_SERVER . DIR_WS_CATALOG . 'admin/products_stock_nuevaalta_quick.php' . '&proveedor_id=' . $row['products_id'] . '&codigo_proveedor=' . $codigo_proveedor . '"> </script>';
                              }
                                             }




                                  if  ($codigo_proveedor_description_up == 'update'){

                 $product_compartir_values = tep_db_query("select * from " . 'products_compartir' . " where proveedor_id = '" . $codigo_proveedor . "'");
        WHILE ($product_compartir = tep_db_fetch_array($product_compartir_values)){


                                     ?>


 <script language=javascript>
window.open('<? echo 'categories.php?cPath=&pID='.$row['products_id'].'&action=new_product&codigobarras_des='.$products_dat['products_model'].'&codigo_proveedor='.$codigo_proveedor;  ?>', '_blank');
</script>


                                   <?php

                              }}
                              
        $text_int_sep  =    '<p style="margin-top: 0; margin-bottom: 0"><b><span style="background-color: #000000">Updates</span></p>';
  // echo ' Entrada en Almcen '.$store_name['configuration_value'] . ' ' , $codigobarras . ' ';
  
   if ($row['referencia_padre']){
  $text_int_rp = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>'.$row['referencia_padre'].'</font></b></p>';
}else{
   $text_int_rp =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>RPadre</font></b></p>';

}

   if ($row['referencia_padre_g2']){
  $text_int_rp2 = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>RPadre2</font></b></p>';
}else{
   $text_int_rp2 =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>RPadre2</font></b></p>';

}

   if ($row['referencia_padre_g3']){
  $text_int_rp3 = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>RPadre3</font></b></p>';
}else{
   $text_int_rp3 =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>RPadre3</font></b></p>';

}

    if ($row['products_cpe']){
  $text_int_cpe = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>RCateg</font></b></p>';
}else{
   $text_int_cpe =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>RCateg</font></b></p>';

}
    if ($row['products_cpf']){
  $text_int_cpf = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>Rfabri</font></b></p>';
}else{
   $text_int_cpf =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>Rfabri</font></b></p>';

}

   if ($products_images['products_image']){
  $text_int_im = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>'.'Images'.'</font></b></p>';
}else{
   $text_int_im =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>Images</font></b></p>';

}



   if ($products_images['products_image']){
  $text_int_iim = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>im'.$iim.'</font></b></p>';
}else{
   $text_int_iim =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>im'.$iim.'</font></b></p>';

}




   if ($row['products_youtube_1']){
  $text_int_y1 = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>'.'Ytube1'.'</font></b></p>';
}else{
   $text_int_y1 =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>Ytube1</font></b></p>';

}

    if ($row['products_youtube_2']){
  $text_int_y2 = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>'.'Ytube2'.'</font></b></p>';
}else{
   $text_int_y2 =  '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#FF0000>Ytube2</font></b></p>';

}
    if ($products_images_name['products_description']){
  $text_int_de = '<p style="margin-top: 0; margin-bottom: 0"><b><font color=#008000>'.'<a target="_blank" href="categories.php?cPath=&pID='.$row['products_id'].'&action=new_product&codigobarras_des='.$products_dat['products_model'].'&codigo_proveedor='.$products_images['codigo_proveedor'].'"><b><font color=#008000>Descrip'.'</font></b></p></a>';
}else{
   $text_int_de =  '<p style="margin-top: 0; margin-bottom: 0"><a target="_blank" href="'.'categories.php?cPath=&pID='.$row['products_id'].'&action=new_product&codigobarras_des='.$products_dat['products_model'].'&codigo_proveedor='.$products_images['codigo_proveedor'].'"><b><font color=#FF0000>Descrip</b></p></a></font>';

}



       $text_int = $text_int_sep.$text_int_rp.$text_int_rp2.$text_int_rp3.$text_int_cpe.$text_int_cpf.$text_int_im.$text_int_iim.$text_int_y1.$text_int_y2.$text_int_de;


echo "<td class=\"smallText\" valign=\"top\">".$text_int."</td>\n";
echo "<td class=\"smallText\" valign=\"top\">".$text_ext."</td>\n";

              echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><p align=".left.">Filtrar ".$row['codigo_barras']."</a><input size=\"12\" type=\"text\" name=\"products_new_model[".$row['products_id']."]\" value={$row['products_model']}><input size=\"8\" type=\"text\" name=\"products_new_model_2[".$row['products_id']."]\" value={$row['products_model_2']}><input size=\"8\" type=\"text\" name=\"products_new_model_3[".$row['products_id']."]\" value={$row['products_model_3']}></td>\n";





            echo "<td class=\"smallText\" valign=\"top\"><p><a target=_blank href=categories.php?cPath=&pID=" . $row['products_id'] . "&action=new_product>Editar ".$row["products_name"]."</a></td>\n";
            
            echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><p align=".left."><a href=". $referencia_reglacategoria_filtrar .">Filtrar</a><input size=\"6\" type=\"text\" name=\"products_new_products_cpe[".$row['products_id']."]\" value={$row['products_cpe']}></td>\n";
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><p align=".left."><a href=". $referencia_reglafabricante_filtrar .">Filtrar</a><input size=\"6\" type=\"text\" name=\"products_new_products_cpf[".$row['products_id']."]\" value={$row['products_cpf']}></td>\n";
            echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"1\" type=\"text\" name=\"products_new_products_rc[".$row['products_id']."]\" value={$row['products_rc']}></td>\n";



            
       //    echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"20\" type=\"textarea\" name=\"products_new_name[".$row['products_id']."]\" value={$row['products_name']}></td>\n";

           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"3\" type=\"text\" name=\"products_new_filtro[".$row['products_id']."]\" value={$row['filtro']}></td>\n";

            echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"3\" type=\"text\" name=\"products_new_stock_min[".$row['products_id']."]\" value={$products_stock['products_stock_min']}></td>\n";

           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"8\" type=\"text\" name=\"products_new_dondeesta[".$row['products_id']."]\" value={$dondeesta['donde_esta']}></td>\n";



           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"8\" type=\"text\" name=\"products_new_manufacturers_id[".$row['products_id']."]\" value={$products_images['manufacturers_id']}></td>\n";


  $codigo_proveedors_values = tep_db_query("select * from " . 'proveedor' . " where proveedor_id = '" . $row['codigo_proveedor'] . "'");
  $codigo_proveedors= tep_db_fetch_array($codigo_proveedors_values);


 if (file($codigo_proveedors['proveedor_ruta_images'] . $products_images['products_image'])) {
 $image_product = $codigo_proveedors['proveedor_ruta_images'] . $products_images['products_image'];

}
                                           //  echo  $order->products[$i]['codigo_proveedor'];
 if (@getimagesize(HTTPS_CATALOG_SERVER . DIR_WS_CATALOG_IMAGES . $products_images['products_image'])) {

        $image_product = DIR_WS_CATALOG_IMAGES . $products_images['products_image'];
}
         $customers_porcentage_values = tep_db_query("select * from " . 'products_groups' . " where customers_group_id = '" . 	1 . "' and products_id = '" . 	$row['products_id'] . "' ");
       $customers_groupG1 = tep_db_fetch_array($customers_porcentage_values);

         $customers_porcentage_values = tep_db_query("select * from " . 'products_groups' . " where customers_group_id = '" . 	2 . "' and products_id = '" . 	$row['products_id'] . "' ");
       $customers_groupG2 = tep_db_fetch_array($customers_porcentage_values);

         $customers_porcentage_values = tep_db_query("select * from " . 'products_groups' . " where customers_group_id = '" . 	3 . "' and products_id = '" . 	$row['products_id'] . "' ");
       $customers_groupG3 = tep_db_fetch_array($customers_porcentage_values);


                echo"<td class=\"smallText\" valign=\"top\"><a target=\"_blank\" href=\"" . HTTP_SERVER . DIR_WS_CATALOG . 'product_info.php?products_id=' . $row['products_id'] ."\"><img border=\"0\" src=\"" . $image_product ."\" width=\"46\" height=\"46\">"."</a></td>\n";

          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"text\" size=\"6\" name=\"product_new_price[".$row['products_id']."]\" value={$row['products_price']}>
         <input type=\"text\" size=\"6\" name=\"customers_groupG1[".$row['products_id']."]\" value={$customers_groupG1['customers_group_price']}>
         <input type=\"text\" size=\"6\" name=\"customers_groupG2[".$row['products_id']."]\" value={$customers_groupG2['customers_group_price']}>
         <input type=\"text\" size=\"6\" name=\"customers_groupG3[".$row['products_id']."]\" value={$customers_groupG3['customers_group_price']}></td>\n";



       echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"8\" type=\"text\" name=\"products_new_specialprice[".$row['products_id']."]\" value={$specials_exist['specials_new_products_price']}>
       <input size=\"2\" type=\"text\" name=\"product_new_status_special[".$row['products_id']."]\" value={$specials_exist['status']}></td>\n";




          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"2\" type=\"text\" name=\"products_new_regladeprecios[".$row['products_id']."]\" value={$row['products_regladeprecios']}></td>\n";



          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"text\" size=\"6\" name=\"opcion_1[".$row['products_id']."]\" value={$row['opcion_1']}>
         <input type=\"text\" size=\"6\" name=\"opcion_2[".$row['products_id']."]\" value={$row['opcion_2']}>
         <input type=\"text\" size=\"6\" name=\"opcion_3[".$row['products_id']."]\" value={$row['opcion_3']}>
         <input type=\"text\" size=\"6\" name=\"opcion_4[".$row['products_id']."]\" value={$row['opcion_4']}>
         <input type=\"text\" size=\"6\" name=\"opcion_5[".$row['products_id']."]\" value={$row['opcion_5']}></td>\n";


          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"text\" size=\"6\" name=\"opcion_1_1[".$row['products_id']."]\" value={$row['opcion_1_1']}>
         <input type=\"text\" size=\"6\" name=\"opcion_2_2[".$row['products_id']."]\" value={$row['opcion_2_2']}>
         <input type=\"text\" size=\"6\" name=\"opcion_3_3[".$row['products_id']."]\" value={$row['opcion_3_3']}>
         <input type=\"text\" size=\"6\" name=\"opcion_4_4[".$row['products_id']."]\" value={$row['opcion_4_4']}>
         <input type=\"text\" size=\"6\" name=\"opcion_5_4[".$row['products_id']."]\" value={$row['opcion_5_5']}></td>\n";


          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"text\" size=\"6\" name=\"opcion_6[".$row['products_id']."]\" value={$row['opcion_6']}>
         <input type=\"text\" size=\"6\" name=\"opcion_7[".$row['products_id']."]\" value={$row['opcion_7']}>
         <input type=\"text\" size=\"6\" name=\"opcion_8[".$row['products_id']."]\" value={$row['opcion_8']}>
         <input type=\"text\" size=\"6\" name=\"opcion_9[".$row['products_id']."]\" value={$row['opcion_9']}>
         <input type=\"text\" size=\"6\" name=\"opcion_10[".$row['products_id']."]\" value={$row['opcion_10']}></td>\n";


          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"text\" size=\"6\" name=\"opcion_6_6[".$row['products_id']."]\" value={$row['opcion_6_6']}>
         <input type=\"text\" size=\"6\" name=\"opcion_7_7[".$row['products_id']."]\" value={$row['opcion_7_7']}>
         <input type=\"text\" size=\"6\" name=\"opcion_8_8[".$row['products_id']."]\" value={$row['opcion_8_8']}>
         <input type=\"text\" size=\"6\" name=\"opcion_9_9[".$row['products_id']."]\" value={$row['opcion_9_9']}>
         <input type=\"text\" size=\"6\" name=\"opcion_10_10[".$row['products_id']."]\" value={$row['opcion_10_10']}></td>\n";


             if ($row['products_status_exel'] == 1){
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\" checked name=\"product_new_status_exel[".$row['products_id']."]\" value=1></td>\n";
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\" name=\"product_new_status_exel[".$row['products_id']."]\" value=2></td>\n";
                           }
           if ($row['products_status_exel'] == 2){
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\"  name=\"product_new_status_exel[".$row['products_id']."]\" value=1></td>\n";
           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input type=\"radio\" checked name=\"product_new_status_exel[".$row['products_id']."]\" value=2></td>\n";
                           }



           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"5\" type=\"text\" name=\"product_new_weight[".$row['products_id']."]\" value={$row['products_weight']}></td>\n";





           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"20\" type=\"text\" name=\"products_new_products_youtube_1[".$row['products_id']."]\" value={$row['products_youtube_1']}></td>\n";
          echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"20\" type=\"text\" name=\"products_new_products_youtube_2[".$row['products_id']."]\" value={$row['products_youtube_2']}></td>\n";

           echo "<td class=\"smallText\" valign=\"top\" align=\"right\"><input size=\"2\" type=\"text\" name=\"products_new_stocknivel[".$row['products_id']."]\" value={$row['stock_nivel']}></td>\n";

           
        }
        while($row = tep_db_fetch_array($result));
    }
    echo "</table>\n";
?></td>
          </tr>
          </table></td>
          </tr>
          <tr>
            <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
		<table width="100%" border="0" cellspacing="1">
<tr>
<td align=middle><?php if ($HTTP_GET_VARS['pID']) {
        echo tep_image_submit('button_update.gif', IMAGE_UPDATE);
      } else {
        echo tep_image_submit('button_update.gif', IMAGE_INSERT);
      }
      echo '&nbsp;&nbsp;<a href="' . tep_href_link('quick_cliente.php', 'cPath=' . $cPath . '&pID=' . $HTTP_GET_VARS['pID']) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>';
?></td>
</tr></table>
</form>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
