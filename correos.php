



       <script language="JavaScript">

function checkdatosmultiples() {
 x = document.form1;
 email = x.ecorreo.value;
 var comentario="";
   var longi=0;
   var i=0;
   var vacio=false;
   var cadena="";
   var cCadenaNros="";
   var caracter="";
    var caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-.";
    var i;
    var valido = true;
    var pos_arroba = email.indexOf("@");
    var pos_ultimo_punto = email.lastIndexOf(".");
    var email_minus = email.toLowerCase();
    var trozo;

    if (pos_arroba == -1) {
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }
    if (email_minus.indexOf("usuario@servidor.es") != -1){
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }

    if (pos_ultimo_punto == -1) {
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }

    if (email_minus.indexOf("@.") != -1){
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }

    trozo = email.substring(0, pos_arroba);
    for(i=0;i<trozo.length;i++) {
        if (caracteres.indexOf(trozo.charAt(i)) == -1) {
			valido = false;
	        break;
        }
    }

    if (!valido) {
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }

    valido = true;
    trozo = email.substring(1+pos_arroba, pos_ultimo_punto);

    for(i=0;i<trozo.length;i++) {
        if (caracteres.indexOf(trozo.charAt(i)) == -1) {
            valido = false;
            break;
        }
    }
    if (!valido) {
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }

    valido = true;
    trozo = email.substring(1+pos_ultimo_punto, email.length);

    if ((trozo.length >= 2)&&(trozo.length <= 6)) {
        for(i=0;i<trozo.length;i++) {
            if (caracteres.indexOf(trozo.charAt(i)) == -1) {
                valido = false;
                break;
            }
        }
        if (!valido) {
			alert("Por favor indique la direcci�n de correo electr�nico correcta.")
            return false;
        }
    } else {
		alert("Por favor indique la direcci�n de correo electr�nico correcta.")
        return false;
    }

//******************************
var checkOK = "ABCDEFGHIJKLMN�OPQRSTUVWXYZ" + "abcdefghijklmn�opqrstuvwxyz" + "1234567890";
var checkStr = x.numeros.value;
var allValid = true;
for (i = 0; i < checkStr.length; i++) {
	ch = checkStr.charAt(i);
	for (j = 0; j < checkOK.length; j++){
		if (ch == checkOK.charAt(j)){
			break
		}
		if  (checkStr.charCodeAt(i) == 13){
			break
		}
		if  (checkStr.charCodeAt(i) == 10){
			break
		}
		if (j == checkOK.length-1) {
			allValid = false
			break
		}
	}

if (!allValid) {
	alert("Por favor, introduzca un c�digo por l�nea, hasta un m�ximo de 10, pulsando enter despu�s de cada c�digo")
	x.numeros.focus()
	break
	}
}

return allValid;
}



function checkdatosunitarios() {
 x = document.form1

 if (x.numero.value==""){
  alert("Por favor escriba el c�digo que desee consultar.")
  x.numero.focus()
 return false;
 }
 return true;
}


function enviarPagina(){


	document.form1.submit()
}

function valoraccionUno(){
	document.form1.accion.value='LocalizaUno'
}
function valoraccionVarios(){
	document.form1.accion.value='LocalizaVarios'
}

    </script>


<?php  $certificado = $_GET['certificado']; ?>


    <div class="txtNormal" style="WIDTH: 427px">
      <form name="form1"  target="I1" action="http://www.correos.es/comun/Localizador/track.asp" method="post">
        <input type="hidden" value="LocalizaUno" name="accion">
        <table cellSpacing="0" cellPadding="0" width="400" border="0" height="27">
          <tr>
            <td class="txtDest" align="middle" height="27">
            <table cellSpacing="0" cellPadding="0" width="600" border="0">
              <tr vAlign="top">
                <td class="txtNormal" width="150"><b>C�digo de env�o: </b></td>
                <td width="150"><label for="codigo">&nbsp;<input class="FormObject" id="ver_info" style="WIDTH: 140px" accessKey="c" tabIndex="1" maxLength="23" size="23" value="<?php echo $certificado ?>" name="numero"></label>
                </td>
                <td align="middle" width="100">&nbsp;<input class="botonSt" id="button1" onclick="javascript:if(checkdatosunitarios()) {valoraccionUno();enviarPagina();}" type="button" value="Consultar" name="button1">

        <!-- <textarea name="" cols="" rows="" dir="rtl" lang="es"></textarea> -->
      </form>
    </div>
    </td>


   <p>&nbsp;</p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%">
    <p align="center">
    <iframe name="I1" width="682" height="383" src="blanco.php">
    El explorador no admite los marcos flotantes o no est� configurado actualmente para mostrarlos.
    </iframe></td>
  </tr>


