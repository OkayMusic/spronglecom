<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="SprongleCom login page">
    <meta name="author" content="SprongleTom">
    <meta name="keywords" content="sprongle, spronge, surreal, memes">
    <title>Register for an account with Spronglecom</title>
  </head>


  <body style="background-color:#FF00DC">
    <h1 align=center style="color:#CDFF00"> JOIN SPRONGLECOM</h1>
    <div align="center">
    <form name="Account Reg" method="post" action="submituserinfo.php">
      <table>
      <tr>
        <td align="right">Email Address: </td>
        <td align="left"><input type="textbox" name="emailinput" size="24"
        value="Enter E-mail Address." maxlength="64" align="right"
        onfocus="this.value = this.value=='Enter E-mail Address.'?'':this.value;"
        onblur="this.value = this.value==''?'Enter E-mail Address.':this.value;"></td>
      </tr>


      <tr>
        <td align="right">Password: </td>
        <td align="left"><input type="password" name="passinput"
        value="xxxxxxxxxx" size="24" maxlength="24"
        onfocus="this.value = this.value=='xxxxxxxxxx'?'':this.value;"
        onblur="this.value = this.value==''?'xxxxxxxxxx':this.value;"></td>
      </tr>


      <tr>
        <td align="right">Confirm Password: </td>
        <td align="left"><input type="password" name="passconfirm"
          value="xxxxxxxxxx" size="24" maxlength="24"
          onfocus="this.value = this.value=='xxxxxxxxxx'?'':this.value;"
          onblur="this.value = this.value==''?'xxxxxxxxxx':this.value;"></td>
      </tr>
      </table>
        <input type="submit" value="Register">

    </form>
    <?php
    session_start();
    if (isset($_SESSION['error_message']))
    {
    echo $_SESSION['error_message'];
    $_SESSION['error_message'] = '';
    }
    ?>
  </div>


  </body>
</html>
