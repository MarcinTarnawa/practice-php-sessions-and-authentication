<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
    </script>
</head>
<body>
  <strong id="js-cookie-value"></strong></p>
  <script>
    let userCookie = getCookie("PHPSESSID");
    let cookieDisplay = document.getElementById("js-cookie-value");
    
    if (userCookie != "") {
        cookieDisplay.textContent = userCookie;
    } else {
        cookieDisplay.textContent = "Cookie not found in JavaScript.";
    } 
  </script>
  <?= $text; ?>
  <pre>
  <?php var_dump($_COOKIE); ?>
  </pre>
  <a href="/">Back</a>
</body>
</html>