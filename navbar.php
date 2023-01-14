<link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/all.css">
<style type="text/css">
	#navbar {
		z-index: 99999999999;
		background: linear-gradient(to left, #061BB6, #0E037A);
		padding: 8px;
		position: fixed;
		color: white;
		width: 100%;
		left: 0;top: 0;
	}
	.title {
		font-size: 32px;
		font-family: coffea;
		text-align: left;
		position: relative;
	}	
	.title:hover {
		animation: title 700ms infinite;
	}
	@keyframes title {
		0%{color: blue;}
		25%{color: red;}
		50%{color: yellow;}
		100%{color: green;}
	}
	.menu {
		position: absolute;
		right: 20px;
		top: 10px;
		color: white;
		border-radius: 3px;
		float: left;
		border:2px solid white;
		margin: 0 10px;
		padding: 5px 7px;
		font-weight: bold;
		text-decoration: none;
		padding-top: 0.2em;
	}
	.menu:hover {
		color: #061BB6;
		background:white;
		border-radius: 4px;
	}
	.fa-bars {
		font-size: 1.2em
	}
	.fa-bars:hover {
		color: #030980;
	}
	.close {
		text-decoration: none;
		position: fixed;
		z-index: 999999;
		color: white;
		top: 8px;
		right: 14px;
		font-size: 18px;
		border:2px solid white;
		cursor: url(image/cursor_tangan.png),auto;
		background: #061BB6;
		padding: 6px;
		font-weight: bold;
		border-radius: 3px;
	}
	.close:hover {
		color: #061BB6;
		background:white;
		border-radius:4px;
	}
	#menu {
		width: 20%;
		background: white;
		height: 100%;
		visibility: hidden;
		z-index: 99999999;
		position: fixed;
		border:2px solid;
		border-image: linear-gradient(to left, #061BB6, #0E037A);
		border-image-slice: 1;
		background: white;
		color: #061BB6;
		right: 0;
		opacity: 0;
		transition: all 500ms;
		top: 52px;
		right: -200px;
	}
	#menu:target {
		visibility: visible;
		opacity: 1;
		top: 52px;
		right: 0;
		position: fixed;
		z-index: 99999999999;
		background: white;
		transition:all 500ms;
	}
	#menu ul li {
		list-style: none;
		text-align: left;
	}
	#menu li a {
		color: #0E037A;
		text-decoration: none;
		font-weight: bold;
		width: 100%;
		position: relative;
		padding: 10px;
		padding-right: 100%;
		margin-left: -10px;
	}
	#menu li a:hover {
		background: linear-gradient(to left, #061BB6, #0E037A);
		color: white;
	}
	#menu li {
		color: #0E037A;
		padding:10px;
		margin: 0;
		font-size: 20px;
		float: left;
		border-bottom: 1px solid #0E037A;
		width: 100%;
	}
	#menu li:hover {
		background:#0E037A;
		color: white;
	}	
	/* HAL PAGINATION */
	.hal {
		font-weight: bold;
		border: 1.5px solid #0E037A;
		padding: 5px 10px;
		text-decoration: none;
		background: white;
		border-radius:2px;
		color: #0E037A;
	}
	.hal_on {
		border: 1.5px solid #0E037A;
		color: white;
		background: #0E037A;
	}
	.hal:hover {
		color:red;
		border: 1.5px solid red;
	}
	.hal_on:hover {
		background: red;
		color: white;
	}
	.hal_left_off {
		cursor: not-allowed;
		opacity: 0.8;
	}
	/* END */
	@media screen and (max-width: 718px) {
		#menu {width:55%;}
	}
	@media screen and (max-width: 544px) {
		#menu {width:55%;}
	}
	@media screen and (max-width: 320px) {
		#menu {width:55%;}
	}
</style>
<div id="navbar"> 
	<script>
		function home() {document.location.href='home';}
	</script>
	<h1 class="title" onclick="home()">TICKETS</h1>
	<a href="#menu" class="menu">Menu</a>
	<div id="menu">
		<ul>
			<?php if(!isset($_SESSION['login'])) : ?>
				<li><a href="home">HOME</a></li>
				<li><a href="login">LOGIN</a></li>
				<li><a href="register">REGISTER</a></li>
				<li><a href="about">ABOUT</a></li>
			<?php else : ?>
				<li><a href="home">HOME</a></li>
				<li><a href="movies">MOVIES</a></li>
				<li><a href="orders">ORDERS</a></li>
				<li><a href="users">USERS</a></li>
				<li><a href="about">ABOUT</a></li>
				<li><a href="logout">LOGOUT</a></li>
			<?php endif; ?>
		</ul>
		<a href="#" class="close">Close</a>
	</div>
</div>