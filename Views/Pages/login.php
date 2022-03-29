<form action="Login" method="post">
    <input type="text" name="phone-number" placeholder="Enter your phone number...">
    <input type="password" name="password" placeholder="Enter your password...">
    <button type="submit" name="login">login</button>
</form>
<div class="message"><?=!empty($data['message'])?$data['message']:''?></div>

<link rel="stylesheet" href="../Assets/css/mainLayout.css" type="text/css">
<link rel='stylesheet' href='Assets/css/test.css' type='text/css'>