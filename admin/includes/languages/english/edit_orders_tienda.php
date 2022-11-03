<?php
/*
$Id: edit_orders.php,v 2.0 2006/03/14 10:42:44 ams Exp $
spanish

osCommerce, Open Source E-Commerce Solutions
http://www.oscommerce.com

Copyright � 2006 osCommerce

Released under the GNU General Public License

Translation provided by banachek
*/

define('HEADING_TITLE', 'Editar Pedido');
define('HEADING_TITLE_NUMBER', 'Nr.');
define('HEADING_TITLE_DATE', 'del');
define('HEADING_SUBTITLE', 'Modificar los campos necesarios y pulsar el bot�n "Actualizar" del final de la p�gina.');
define('HEADING_TITLE_STATUS', 'Estado');
define('ADDING_TITLE', 'A�adir un producto al pedido');

define('HINT_UPDATE_TO_CC', '<span style="color: red;">Aviso: </span>Set payment to "Credit Card" to show some additional fields.');
define('HINT_DELETE_POSITION', '<span style="color: red;">Aviso: </span>Para borrar un art�culo poner a "0" la cantidad.<br />Si cambia el precio del art�culo con una opci�n de producto, debe calcular el nuevo costo manualmente.');
define('HINT_TOTALS', '<span style="color: red;">Aviso: </span>Para aplicar descuentos a�ada importes negativos a la lista.<br />Los campos con importe a "0" se borrar�n al actualizar el pedido (excepto el env�o).');
define('HINT_PRESS_UPDATE', 'Por favor, haga click en "Actualizar" para guardar todos los cambios.');

define('TABLE_HEADING_COMMENTS', 'Comentarios');
define('TABLE_HEADING_STATUS', 'Nuevo estado');
define('TABLE_HEADING_QUANTITY', 'Cant.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modelo');
define('TABLE_HEADING_PRODUCTS', 'Producto');
define('TABLE_HEADING_TAX', '% IVA');
define('TABLE_HEADING_UNIT_PRICE', 'Precio (excl.)');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Precio (incl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Total (excl.)');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total (incl.)');
define('TABLE_HEADING_TOTAL_MODULE', 'Total Precio Componente');
define('TABLE_HEADING_TOTAL_AMOUNT', 'Importe');
define('TABLE_HEADING_DELETE', '�Cancelaci�n?');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Notificaci�n al cliente');
define('TABLE_HEADING_DATE_ADDED', 'Fecha de pedido');

define('ENTRY_CUSTOMER_NAME', 'Nombre');
define('ENTRY_CUSTOMER_COMPANY', 'Empresa');
define('ENTRY_CUSTOMER_ADDRESS', 'Direcci�n del cliente');
define('ENTRY_CUSTOMER_SUBURB', 'Suburb');
define('ENTRY_CUSTOMER_CITY', 'Poblaci�n');
define('ENTRY_CUSTOMER_STATE', 'Estado');
define('ENTRY_CUSTOMER_POSTCODE', 'C�digo postal');
define('ENTRY_CUSTOMER_COUNTRY', 'Pa�s');
define('ENTRY_CUSTOMER_PHONE', 'Tel�fono');
define('ENTRY_CUSTOMER_EMAIL', 'e-Mail');
define('ENTRY_ADDRESS', 'Direcci�n');

define('ENTRY_SHIPPING_ADDRESS', 'Direcci�n de env�o');
define('ENTRY_BILLING_ADDRESS', 'Direcci�n de facturaci�n');
define('ENTRY_PAYMENT_METHOD', 'Forma de pago:');
define('ENTRY_CREDIT_CARD_TYPE', 'Tipo de tarjeta:');
define('ENTRY_CREDIT_CARD_OWNER', 'Titular de la tarjeta:');
define('ENTRY_CREDIT_CARD_NUMBER', 'N�mero de tarjeta:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Caducidad tarjeta:');
define('ENTRY_SUB_TOTAL', 'Sub Total:');
define('ENTRY_TAX', 'IVA:');
define('ENTRY_TOTAL', 'Total:');
define('ENTRY_STATUS', 'Estado del pedido:');
define('ENTRY_NOTIFY_CUSTOMER', 'Notificar al cliente:');
define('ENTRY_NOTIFY_COMMENTS', 'Enviar comentarios:');

define('TEXT_NO_ORDER_HISTORY', 'Pedido no existe');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Su pedido ha sido actualizado');
define('EMAIL_TEXT_ORDER_NUMBER', 'N�mero de pedido:');
define('EMAIL_TEXT_INVOICE_URL', 'Detailed Invoice URL:');
define('EMAIL_TEXT_DATE_ORDERED', 'Fecha de pedido:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Muchas gracias por su pedido!' . "\n\n" . 'El estado de su pedido ha sido actualizado.' . "\n\n" . 'Nuevo estado: %s' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE2', 'Si tiene cualquier pregunta, por favor, esponda a este correo.' . "\n\n" . 'Reciba un saludo de sus amigos de ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Estos son los comentarios sobre su pedido:' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Error: No existe el pedido.');
define('SUCCESS_ORDER_UPDATED', 'Completado: El pedido ha sido actualizado correctamente.');

define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', 'Escoja un producto');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', 'Escoja una opci�n');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', 'El producto no tiene opciones');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', 'Unidades del producto');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', 'A�adir');
define('ADDPRODUCT_TEXT_STEP', 'Paso');
define('ADDPRODUCT_TEXT_STEP1', ' &laquo; Seleccionar una categoria. ');
define('ADDPRODUCT_TEXT_STEP2', ' &laquo; Seleccionar un producto. ');
define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Seleccionar una opci�n. ');

define('MENUE_TITLE_CUSTOMER', '1. Datos del cliente');
define('MENUE_TITLE_PAYMENT', '2. Forma de pago');
define('MENUE_TITLE_ORDER', '3. Productos del pedido');
define('MENUE_TITLE_TOTAL', '4. Descuento, env�o y total');
define('MENUE_TITLE_STATUS', '5. Estado y notificaciones');
define('MENUE_TITLE_UPDATE', '6. Actualizar datos');

define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Seleccionar una opci�n. ');

define('AYUDA_TEXT_X', 'Si seleccionas este campo la referencia o ean se actualizar� tambi�n en la ficha del producto');
define('AYUDA_TEXT_PVM', ' 1� importe es el precio de venta al por mayor G2 2� importe corresponde al beneficio de 1 producto. 3� corresponde al beneficio del total de productos.');
define('AYUDA_TEXT_EAN', ' Referencia o ean del producto, puedes cambarla y solo se actualiza en este pedido.');
define('AYUDA_TEXT_EANA', ' referencia alternativa o ean del producto, puedes cambarla y solo se guardar� en este pedido.');
define('AYUDA_TEXT_ID', ' Identificador num�rico �nico del producto, escribe en una etiqueta y p�gala al producto, factura con el id.');
define('AYUDA_TEXT_IMAG', ' Imagen del producto, pulsa encima de la imagen para ir a la ficha del producto en la tienda online');
define('AYUDA_TEXT_DEL', ' Selecciona y actualiza para borrar el producto de este pedido. ');
define('AYUDA_TEXT_NOMBRE', ' Nombre del producto');
define('AYUDA_TEXT_PCS', ' N�mero de unidades en este pedido, cambie la cantidad y pulse en en actualizar o enter en su teclado.');
define('AYUDA_TEXT_PVP', ' Precio de venta publico, si cambias este precio afectar� a los descuentos de este producto en este pedido, si seleccionas la casilla PVP cambiar�s el precio en la ficha del producto, si solo cambias el precio y no seleccionas la casilla PVP solo se actualizar� el precio en este pedido. ');
define('AYUDA_TEXT_PVF', ' Precio de venta final, todos los descuentos se aplican en funci�n del PVP y este es el precio final que se aplica en este pedido.');
 define('AYUDA_TEXT_DESCUENTO', ' A�ade un descuento directo al producto, tiene preferencia sobre el descuento cliente y descuento producto, para devolver a su precio inicial, actualize 0 y marque la casilla PVF.');
define('AYUDA_TEXT_TOTAL', ' Total de unidades x PVF, este es el valor que se suma al total del pedido.');
define('AYUDA_TEXT_ADD', ' 1 pon el n�mero de pedido y la cantidad para a�adir el producto a otra factura. 2 A�ade la Cantidad y agregar�s al ulitma Factura a Proveedor que hayas creado. 3 A�ade la cantidad y agrega al ultimo albaran a proveedor que hayas creado.');
define('AYUDA_TEXT_STATUS', ' 0 Inactive y 1 Active en el merkaplace.');
define('AYUDA_TEXT_CATEGORIA', ' Accede directamente a la categoria donde se encuentra el producto.');
define('AYUDA_TEXT_EDITAR', ' Accede directamente a la edici�n del producto donde podr�s cambiar toda la informaci�n del producto.');
define('AYUDA_TEXT_STOCK', ' Stock disponible en tiempo real');
define('AYUDA_TEXT_PENDIENTE', ' Productos pendiente de entrada en almac�n');
define('AYUDA_TEXT_STOCKMIN', ' Configura las unidades maximas que quieres tener stock cuando el stock sea inferior al valor del stock minimo del producto aparecer� en la secci�n de stock recomendados al que puedes acceder a trav�s del men� superior -Stock Recomendado-, cuando el valor del stock sea superior al Stock Minimo el producto se elimina de la lista stock recomendado.');
define('AYUDA_TEXT_OBS', ' Observaciones sobre el stock m�nimo que se quiera anotar.');
define('AYUDA_TEXT_OFERTA', '1 Crear una oferta 0 Desactivar 2 Borrar, en Dprod introduce el precio de la oferta y pulsa en actualizar.');
define('AYUDA_TEXT_DESCUENTO_PRODUCTO', ' 1 vincular al descuento cliente, 0 vincular a este descuento especifico sobre este producto. en -Dprod- ponemos el descuento (-0.00)');
define('AYUDA_TEXT_DESCUENTO_CANTIDAD', ' Descuentos por cantidades por ejemplo si pones 10 unidades a 1.50� en cuanto hayan 10 unidades a�adidas al pedido');
define('AYUDA_TEXT_STOCK_NIVEL', ' Determina que tipo de stock quieres para el producto 1 Stock, 2 Cita Previa, 3 Bajo Pedido, 4 de 1 a 3 semanas, 5 de 3 a 6 semanas, 6 Stock Real');
define('AYUDA_TEXT_STS', ' 0 Desactivado 1 Activo, permite previa configuraci�n del marketplace que productos van a ser los que aparecen');
define('AYUDA_TEXT_DESCUENTO_CANTIDAD', ' Descuento por cantidades, ej. 1Pcs. 10�, 10Pcs 9�, 20Pcs. 8� .....');
define('AYUDA_TEXT_CREAR_OFERTA', ' Crea una oferta 1 crear oferta, 0 Desctivar, 2 Borrar, Cuando creas una oferta es directamente en el prcio del producto, es decir cuesta 20eur y la oferta 10eur, las ofertas tienen prioridad sobre todos los demas descuentos y se aplican en las facturas de contado, se aplica tambi�n a todas las cuentas de clientes.');
define('AYUDA_TEXT_EDITAR_UBICACION', ' Edite la ubicaci�n del producto en el almacen.');
define('AYUDA_TEXT_UBICACION', ' Ubicaci�n del producto en los diferentes almacenes includido en el actual.');
define('AYUDA_TEXT_STOCK', ' Ventana emergente donde puedes ver el historial de stock del producto.');
define('AYUDA_TEXT_EDITAR_NOMBRE_PRODUCTO', ' Edita el nombre del producto dentro de este pedido, no afectar� al nombre del producto.');
define('AYUDA_TEXT_NUEVO_PRODUCTO', ' Si cambias la referncia de este producto y marcas esta casilla cuando actualices este pedido se creara un nuevo producto en tu top de categorias.');
define('AYUDA_TEXT_EXEL', ' Si estas actulizando este producto por fichero exel y quieres dejar que el producto se actulice con el fichero cambi�s a Web, Ej. Tienes un fichero de 1000 referncias y una de ellas no quieres que se actualice mas con el fichero exel, pues cambias y a partir de ese momento si quieres cambiar algo en el producto tendr�s que hacerlo en la ficha');
define('AYUDA_TEXT_EDITAR', ' Introduce el n�mero de pedido y pulsa enter para ir a la edicion de este pedido o pulse enter y adite el pedido actual.');
define('AYUDA_TEXT_ACTUALIZAR', ' Introduce el numero de pedido y pulsa enter para actualizar este pedido o pulse enter para quedarte en la mismo pedido.');
define('AYUDA_TEXT_DESCUENTO_PEDIDO', ' Si aplicas descuento de pedido anulas el descuento cliente.');
define('AYUDA_TEXT_DESCUENTO_CLIENTE', ' Si aplicas descuento cliente tambi�n se lo configuras en la ficha del cliente y todos los pedidos se ejecutar�n con el mismo descuento.');
define('AYUDA_TEXT_KEYWOARDS_CLIENTE', ' Busqueda de pedidos de clientes por el nombre, telefono, email, etc.....');
define('AYUDA_TEXT_KEYWOARDS_PRODUCTO', ' Busqueda de productos en los pedidos, te aparecen los pedidos en los que se encuentra el producto de la busqueda.');
define('AYUDA_TEXT_BUSCAR_INACTIVE', ' Si seleccionas esta casilas la busqueda tambien se realizar� en los productos desactivados del catalogo.');
define('AYUDA_TEXT_BUSCAR_PRODUCTO', ' Busca un producto por el nombre o referencia, te saldr�n las opciones de busquedas y seleccionas el producto que deseas insertar en el pedido.');
define('AYUDA_TEXT_UNIDADES', ' Unidades del producto a insertar en este pedido.');
define('AYUDA_TEXT_CODIGO_BARRAS', ' Puedes facturar con el ID del producto, con las referencias que tengas configuradas en el producto, y con el codigo de barras del producto, esto insertar� directamente el producto en el pedido.');
define('AYUDA_TEXT_FACTURACION_NUEVO_PRODUCTO', ' Si el producto no existe en la base de datos esta opci�n importa los datos del producto de otra base de datos y solo vuelva a escanear el producto para facturarlo, si no encuentr� abrira una nueva ventana, nuevo producto, cuando termine cierrela y volvera a esta misma ventana.');
define('AYUDA_TEXT_FACTURACION_REGULAR', ' Selecciona este opco�n para facturar regularmente con el id, referencia o codigo de barras del producto');
define('AYUDA_TEXT_ID', ' ');
define('AYUDA_TEXT_ID', ' ');














?>
