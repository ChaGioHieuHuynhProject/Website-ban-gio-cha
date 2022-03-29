<form action="Register" method="post">
    <input type="text" name="name" placeholder="Enter your name...">
    <input type="text" name="phone-number" placeholder="Enter your phone number...">
    <input type="text" name="address" placeholder="Enter your address...">
    <input type="email" name="email" placeholder="Enter your email...">
    <input type="password" name="password" placeholder="Enter your password...">
    <button type="submit" name="register">Register</button>
</form>
<div class="message"><?=!empty($data['message'])?$data['message']:''?></div>

<link rel="stylesheet" href="../Assets/css/mainLayout.css" type="text/css">
<link rel='stylesheet' href='Assets/css/test.css' type='text/css'>