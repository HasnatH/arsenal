<div id="login_form">
<h1> Login </h1> 

 <form action="/w1294947/index.php/login/auth_login"  method='POST'>
                    Username:         <input required="required" type="text" id="username" name='username'> <br/>
                    Password:         <input required="required" type="password" id="password" name='password'> 
					<pre><input id="login" type="submit" value='LOGIN'>             <script type="text/javascript">var auth = "<?php echo($auth); ?>";	if (auth == "fail")	{document.write("Login Failed");}</script></pre>
</form>

</div>