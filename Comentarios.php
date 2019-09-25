<?php require_once('Connections/igi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO comentarios (nombre, correo, comentario) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['textarea'], "text"));

  mysql_select_db($database_igi, $igi);
  $Result1 = mysql_query($insertSQL, $igi) or die(mysql_error());

  $insertGoTo = "Exito.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Comentarios</title>
	<link rel="stylesheet" href="assets/form-basic.css">

</head>
<body>
    <div class="main-content">

        <form name="form1" class="form-basic" method="POST" action="<?php echo $editFormAction; ?>">

            <fieldset>
            <div class="form-title-row">
                <h1>Queremos saber de ti</h1>
            </div>
			
            	<div class="form-row">
            <label for="cname"><span>Nombre:</span>
            <input name="name" type="text" required id="cname" size="50">
            </label>
            	</div>
 
            	<div class="form-row">
            <label for="cemail"><span>Correo:</span></label>
            <input id="cemail" type="email" name="email" size="50" required>
            	</div>

            	<div class="form-row">    
            <label for="ccomment"><span>Comentarios:</span></label>
            <textarea name="textarea" cols="100" rows="5" required id="ccomment"></textarea>
            	</div>

            	<div class="form-row">    
            <button class="submit" type="submit">Enviar Datos</button>
            <input type="hidden" name="MM_insert" value="form1">
        	</div>
            </fieldset>
        </form>

    </div>

</body>

</html>
