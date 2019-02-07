<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
<?php
$query = "SELECT* FROM tbl_theme WHERE id = '1'";
$themes = $db->select($query);
    while ($result = $themes->fetch_assoc()) { 
	   if ($result['theme'] == 'default') { ?> 
		   <link rel="stylesheet" href="theme/default.css">
	   <?php }elseif($result['theme'] == 'green'){?>
		<link rel="stylesheet" href="theme/green.css">
	<?php }elseif ($result['theme'] == 'offwhite') {?>
		<link rel="stylesheet" href="theme/offWhite.css">
	
	<?php } }?>
	



<!--<style type="text/css">

/*Defaul*/
/*.headersection {background: #ca932f none repeat scroll 0 0;}
.icon a {background: #a56e0a none repeat scroll 0 0;}
.searchbtn input[type="text"] {
	border: 1px solid #A56E0A;
	background: #FFE07C;	
}
.searchbtn input[type="submit"] {
	border: 1px solid #9d6602;
}
input[type="submit"] {
	background: #b7801c none repeat scroll 0 0;
	border: 1px solid #e6af4b;
	color: #fff;
}
.searchbtn input[type="submit"]:hover{
	background: #b7801c none repeat scroll 0 0;
	border: 1px solid #e6af4b;
}
.navsection {
	background: none repeat scroll 0 0 #e6af4b;
}
.navsection ul li {
	border-left: 1px solid #fdc662;
	border-right: 1px solid #c18a26;
}
.navsection ul li a:hover, #active{background:#FEF4E5;color:#333;}
.contentsection {
	background: #ffffff none repeat scroll 0 0;
	border: 1px solid #ca932f;
}
.maincontent {
	background: #fef4e5 none repeat scroll 0 0;
	border: 1px solid #ded4c5;
}
.samepost h2 a {
	color: #ac7511;
}
.samepost h2, .about h2 {
	border-bottom: 2px solid #e0d6c7;
	color: #ac7511;
}
.samepost img {background: #fff none repeat scroll 0 0;}
.readmore a {
	background: #fff none repeat scroll 0 0;
	border: 1px solid #b7801c;
	color: #b7801c;
}
.sidebar {
	background: #fef4e5 none repeat scroll 0 0;
	border: 1px solid #ded4c5;
}
.samesidebar h2 {
	background: #e6af4b none repeat scroll 0 0;
	border-bottom: 2px solid #b7801c;
}
.samesidebar3 h2 {
	background: #e6af4b none repeat scroll 0 0;
	border-bottom: 2px solid #b7801c;
}
.samesidebar ul li {border-bottom: 1px dashed #e9c05c;}
.samesidebar ul li a {color: #814a00;}
.samesidebar ul li a:hover{color:#DF5C25;}
.samesidebar3 ul li {
	background: #DADACA;
	border: 1px solid #FFFF9C;
}
.pagination a {
	border: 1px solid #FFFF9C;
	background: #DADACA;
}
.footersection {background: #B7801C;}
.footermenu ul li a {color: #E6AF4B;}
/*green*/
/*.headersection {background: #267026 none repeat scroll 0 0;}
.icon a {background: #62AC62 none repeat scroll 0 0;}
.searchbtn input[type="text"] {
	border: 1px solid #065006;
	background: #57A157;
}
.searchbtn input[type="submit"] {
	border: 1px solid #57A157;
}
input[type="submit"] {
	background: #003C00 none repeat scroll 0 0;
}
.searchbtn input[type="submit"]:hover{
	background: #57A157 none repeat scroll 0 0;
	border: 1px solid #065006;
}
.navsection {
	background: none repeat scroll 0 0 #67B167;
}

.navsection ul li {
	border-left: 1px solid #AFF5AF;
	border-right: 1px solid #132D13;
}
.navsection ul li a:hover, #active {
	background: #FFFFEF;
	color: #333;
}
.contentsection {
	background: #DFFFDF none repeat scroll 0 0;
	border: 1px solid #004300;
}
.maincontent {
	background: #F6FFF5 none repeat scroll 0 0;
	border: 1px solid #B1CD2D;
}
.samepost h2 a {
	color: #307800;
}
.samepost h2, .about h2 {
	border-bottom: 2px solid #89D159;
	color: #307800;
}
.samepost img {
	background: #fff none repeat scroll 0 0;
	border: 1px solid #67B167;
}
.readmore a {
	background: #F4FFF4 none repeat scroll 0 0;
	border: 1px solid #267026;
	color: #67B167;
}
.sidebar {
	background: #F6FFF5 none repeat scroll 0 0;
	border: 1px solid #B1CD2D;
}
.samesidebar h2 {
	background: #67B167 none repeat scroll 0 0;
	border-bottom: 2px solid #267026;
}
.samesidebar3 h2 {
	background: #67B167 none repeat scroll 0 0;
	border-bottom: 2px solid #267026;
}
.samesidebar ul li {border-bottom: 1px dashed #AAAAAA;}
.samesidebar ul li a {color: #10907A;}
.samesidebar ul li a:hover{color:#28516B;}
.samesidebar3 ul li {
	background: #5EAE87;
	border: 1px solid #679161;
}
.pagination a {
	border: 1px solid #67B167;
	background: #629F74;
}
.footersection {background: #267026;}
.footermenu ul li a {color: #67B167;}
/*offwhite*/

</style>-->