<html>
<body>
<link rel="stylesheet"href="../css/sidebar.css">
<script src="sidebar.js"></script>
 
<div id="sidebar">
  <div class="list">
    <a href="adminhome.php">Home</a>
    <a href="createaccount.php">Create Account</a>
    <a href="athomedb.php">LOG Events</a>
  </div>
  <div class="toggle-btn">
    <span></span>
    <span></span>
    <span></span>
  </div>  
</div>

<script>
var toggleBtn = document.querySelector(".toggle-btn")
var list = document.querySelector(".list")

toggleBtn.addEventListener('click',function(){

    list.classList.toggle("side-bar-remove")

    // list.style.backgroundColor = "red"
    
})
  
</script>
</body>
</html>