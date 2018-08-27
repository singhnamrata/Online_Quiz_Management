<style type="text/css">
nav ul li{
  list-style:none;
  float:left;
  padding-right:20px;
}
nav ul li a{
  text-decoration:none;
  color:#222;
  background-color:#ccc;
  padding:4px 5px;
}
.active{
  background-color:#d90000;
  color:#fff;
}
 

</style>
<script src="js/jquery-1.7.2.min.js" language="javascript"></script>
<script language="javascript">
$(document).ready(function(){
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});
</script>
<body>
  <div class="aaaa">
      <nav class="aaaa">
       <ul id="nav">
    <li><a>About </a></li>
    <li><a class="menu" href="#">Contact  </a></li>
         <li><a class="menu" href="#">Services</a></li>
    <li><a class="menu" href="#">Contact Us</a></li>          
    <li><a class="menu" href="http://www.mywebtricks.com/2014/03/add-active-class-to-navigation-menu.html">Read Our Blog</a></li>
  </ul>
    </nav>
  </div>
 
  
          
           
           
           
           <body>