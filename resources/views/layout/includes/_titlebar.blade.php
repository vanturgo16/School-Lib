<style>
 .logo> a > img {
    height: 50px;
 }
 .logo > a > img:hover {
  display: inline-block;
  /* animation: rotateIn; */
  animation: flip; 
  animation-duration: 2s; /* don't forget to set a duration! */
}

.header-right-left {
    margin-top: 10px;
}

.prfil-img {
    border: 2px solid gray;
    border-radius: 25px;
}

.fa-user {
    
}
</style>

<section class="title-bar">
    <div class="logo">
        <b><h3>School Library</h3></b>
    </div>
    <!--
    <div class="w3l_search">
        <form action="#" method="post">
            <input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
            <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
    -->
    <div class="header-right">
        <div class="profile_details_left">
            <div class="header-right-left">
                <span>Welcome <b>{{ auth()->user()->name }}</b></span>
            </div>	
            <div class="profile_details">		
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">	
                                <span class="prfil-img"><i class="fa fa-user" aria-hidden="true" style="padding-top: 12px"></i></span> 
                                <div class="clearfix"></div>	
                            </div>	
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <!--
                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                            <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                            <li> <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            -->
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</section>