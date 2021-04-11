 <!-- Sidebar -->
         <ul class="sidebar navbar-nav">
            <li id="sidehome" class="nav-item active">
               <a class="nav-link" href="<?php echo $web['url']; ?>/home.html">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
			<?php if(isset($_SESSION['username'])){?>
            <li id="siderecharge" class="nav-item">
               <a class="nav-link" href="<?php echo $web['url']; ?>/recharge-account.html">
               <i class="fas fa-money-check-alt"></i>
               <span>Recharge Account</span>
               </a>
            </li>
            <li id="sidepremium" class="nav-item">
               <a class="nav-link" href="<?php echo $web['url']; ?>/premium-pack.html">
               <i class="fas"> <img src="http://31.media.tumblr.com/0153b07dd61a7de03c782608361c195f/tumblr_mogztzr8pX1qzrudco1_1280.gif" style="width: 20px;height: 30px;"> </img></i>
              <span style="background: url(https://media1.giphy.com/media/xT0GqAolKYvpEV3tq8/source.gif) repeat scroll 0% 0% transparent; color:white; text-shadow: 0pt 0pt white, 0pt 1pt 0.3em white;">UP PREMIUM</span>
               </a>
            </li>
            <li id="sidepurhist" class="nav-item">
               <a class="nav-link" href="<?php echo $web['url']; ?>/purchase-history.html">
               <i class="fas fa-fw fa-history"></i>
               <span>Purchase History</span>
               </a>
            </li>
			<?php ;}?>
            <li id="sideabout" class="nav-item">
               <a class="nav-link" href="about.html">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>About Us</span>
               </a>
            </li>
            <li class="nav-item channel-sidebar-list">
               <h6>COMMUNITY</h6>
               <ul>
                  <li>
                     <a target="_blank" href="<?php echo $web['linktele'];?>">
                     <img class="img-fluid" alt="" src="//pngimg.com/uploads/telegram/telegram_PNG19.png"> Telegram Community 
                     </a>
                  </li>
                 
               </ul>
            </li>
         </ul>