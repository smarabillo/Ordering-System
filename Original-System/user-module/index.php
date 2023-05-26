<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "user-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<?php
    include_once 'classes/user-class.php';
?>
<div class="submenu"> 
    <a href="index.php?page=users&subpage=usercreate">New User</a>
    <a href="index.php?page=users&subpage=default">List Users</a>
</div>
<?php
    switch($subpage){
        case 'usercreate':
            require_once 'user-module/user-create.php';
        break;
        case 'userprofile':
            require_once 'user-module/user-profile.php';
        break; 
        default:
            require_once 'user-module/main.php';
        break;
 
    }
?>