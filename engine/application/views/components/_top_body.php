<div class="top-bar">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-md-2 logo">
                <a href="#"><img src="<?php echo get_asset_url('img/bsm-logo-name-full-white.png') ?>" alt="SATBA - Admin Dashboard"></a>
                <h1 class="sr-only">PT. BSM</h1>
            </div>
            <!-- end logo -->
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3">
                        <!-- search box -->
                        <div id="tour-searchbox" class="input-group searchbox">
                            <input type="search" class="form-control" placeholder="Pencarian modul...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- end search box -->
                    </div>
                    <div class="col-md-9">
                        <div class="top-bar-right">
                            <!-- responsive menu bar icon -->
                            <a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>
                            <!-- end responsive menu bar icon -->
<!--                            <button type="button" id="start-tour" class="btn btn-link"><i class="fa fa-refresh"></i> Refresh</button>-->
                            
<!--                            <button type="button" id="global-volume" class="btn btn-link btn-global-volume"><i class="fa fa-volume-up"></i></button>
                            <div class="notifications">
                                <ul>
                                     notification: inbox 
                                    <li class="notification-item inbox">
                                        <div class="btn-group">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-envelope"></i><span class="count">2</span>
                                                <span class="circle"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="notification-header">
                                                    <em>You have 2 unread messages</em>
                                                </li>
                                                <li class="inbox-item clearfix">
                                                    <a href="#">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <img class="media-object" src="<?php echo get_asset_url('img/user1.png'); ?>" alt="Antonio">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="media-heading name">Antonius</h5>
                                                                <p class="text">The problem just happened this morning. I can't see ...</p>
                                                                <span class="timestamp">4 minutes ago</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="inbox-item unread clearfix">
                                                    <a href="#">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <img class="media-object" src="<?php echo get_asset_url('img/user2.png'); ?>" alt="Antonio">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="media-heading name">Michael</h5>
                                                                <p class="text">Hey dude, cool theme!</p>
                                                                <span class="timestamp">2 hours ago</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="inbox-item unread clearfix">
                                                    <a href="#">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <img class="media-object" src="<?php echo get_asset_url('img/user3.png'); ?>" alt="Antonio">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="media-heading name">Stella</h5>
                                                                <p class="text">Ok now I can see the status for each item. Thanks! :D</p>
                                                                <span class="timestamp">Oct 6</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="inbox-item clearfix">
                                                    <a href="#">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <img class="media-object" src="<?php echo get_asset_url('img/user4.png'); ?>" alt="Antonio">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="media-heading name">Jane Doe</h5>
                                                                <p class="text"><i class="fa fa-reply"></i> Please check the status of your ...</p>
                                                                <span class="timestamp">Oct 2</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="inbox-item clearfix">
                                                    <a href="#">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <img class="media-object" src="<?php echo get_asset_url('img/user5.png'); ?>" alt="Antonio">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="media-heading name">John Simmons</h5>
                                                                <p class="text"><i class="fa fa-reply"></i> I've fixed the problem :)</p>
                                                                <span class="timestamp">Sep 12</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="notification-footer">
                                                    <a href="#">View All Messages</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                     end notification: inbox 
                                     notification: general 
                                    <li class="notification-item general">
                                        <div class="btn-group">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-bell"></i><span class="count">8</span>
                                                <span class="circle"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="notification-header">
                                                    <em>You have 8 notifications</em>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-comment green-font"></i>
                                                        <span class="text">New comment on the blog post</span>
                                                        <span class="timestamp">1 minute ago</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user green-font"></i>
                                                        <span class="text">New registered user</span>
                                                        <span class="timestamp">12 minutes ago</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-comment green-font"></i>
                                                        <span class="text">New comment on the blog post</span>
                                                        <span class="timestamp">18 minutes ago</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart red-font"></i>
                                                        <span class="text">4 new sales order</span>
                                                        <span class="timestamp">4 hours ago</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-edit yellow-font"></i>
                                                        <span class="text">3 product reviews awaiting moderation</span>
                                                        <span class="timestamp">1 day ago</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-comment green-font"></i>
                                                        <span class="text">New comment on the blog post</span>
                                                        <span class="timestamp">3 days ago</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-comment green-font"></i>
                                                        <span class="text">New comment on the blog post</span>
                                                        <span class="timestamp">Oct 15</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-warning red-font"></i>
                                                        <span class="text red-font">Low disk space!</span>
                                                        <span class="timestamp">Oct 11</span>
                                                    </a>
                                                </li>
                                                <li class="notification-footer">
                                                    <a href="#">View All Notifications</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                     end notification: general 
                                </ul>
                            </div>-->
                            <!-- logged user and the menu -->
                            <div class="logged-user">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo get_asset_url('img/user-avatar.png'); ?>" alt="User Avatar">
                                        <span class="name"><?php echo $me->name; ?></span> <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="<?php echo get_action_url('usermgt/profile'); ?>">
                                                <i class="fa fa-user"></i>
                                                <span class="text">Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('auth/logout'); ?>">
                                                <i class="fa fa-power-off"></i>
                                                <span class="text">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end logged user and the menu -->
                        </div>
                        <!-- /top-bar-right -->
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
    </div>
</div>