    <header id="header">



      <div class="header-content" >

      <div class="header-date pull-left">
        <strong><?php echo date("F j, Y  h:i a ");?></strong>
      </div>

      <div class="pull-right clearfix">

        <ul class="info-menu list-inline list-unstyled">

        <li class="dropdown notification-menu">
        <a class="dropdown-toggle" id="notifcontainer" href="#" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell-o fa-lg"></i>
        <span class="badge">
        
          </span>
        </a>
        
        <!--Notification Menu-->
            <ul class="dropdown-menu" style="width: 220px; right:0;left:auto;">

                  <li class="not-head">YOU HAVE <?php echo $total_count; ?> NOTIFICATIONS</li>
                  <li id="notif_container"></li>
                      <li>
                      <a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail </span><br><span class="text-muted block">2min ago</span></div></a>
                      </li>

                      <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>

                      <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>

                  <li class="not-footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>

      


          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
           <!--    <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline"> -->
              <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu" style="min-width: 220px;">
              <li>


                  <a href="profile.php?id=<?php echo (int)$user['id'];?>">
             <span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-user fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Profile</span></div></a>

          
                  </a> 
              </li>

               <li class="last">

                 <a href="logout_pos.php">
                  <span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="glyphicon glyphicon-off fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Logout</span></div>
                     
                 </a>
             </li>
           </ul>
          </li>
  
        </ul>
      </div>
     </div>
    </header>