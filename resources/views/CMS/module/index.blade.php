
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> Monarch UI - Bootstrap Frontend &amp; Admin Template </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

@include('CMS.script.header-script')

</head>
    <body>
    <div id="sb-site">
        
        @include('CMS.layout.sidebar_overlay.overlay')
        @include('CMS.layout.sidebar_overlay.scrollable')
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                @include('CMS.layout.topbar.logo')
                @include('CMS.layout.topbar.header-profile-user')
                @include('CMS.layout.topbar.header-nav-right')
            </div>
        </div>
        <div id="page-sidebar">
            <div class="scroll-sidebar">
                <ul id="sidebar-menu">
                    <li class="header"><span>Overview</span></li>
                    <li>
                        <a href="index.html" title="Admin Dashboard">
                            <i class="glyph-icon icon-linecons-tv"></i>
                            <span>Admin dashboard</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="no-menu">
                        <a href="../frontend-template/index.html" title="Frontend template">
                            <i class="glyph-icon icon-linecons-beaker"></i>
                            <span>Frontend template</span>
                            <span class="bs-label label-danger">
                                NEW
                            </span>
                        </a>
                    </li>
                    <li class="header"><span>Components</span></li>
                    <li>
                        <a href="#" title="Elements">
                            <i class="glyph-icon icon-linecons-diamond"></i>
                            <span>Elements</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="buttons.html" title="Buttons"><span>Buttons</span></a></li>
                                <li><a href="labels-badges.html" title="Labels &amp; Badges"><span>Labels &amp; Badges</span></a></li>
                                <li><a href="content-boxes.html" title="Content boxes"><span>Content boxes</span></a></li>
                                <li><a href="icons.html" title="Icons"><span>Icons</span></a></li>
                                <li><a href="nav-menus.html" title="Navigation menus"><span>Navigation menus</span></a></li>
                                <li><a href="response-messages.html" title="Response messages"><span>Response messages</span></a></li>
                                <li><a href="images.html" title="Images"><span>Images</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Dashboard boxes">
                            <i class="glyph-icon icon-linecons-lightbulb"></i>
                            <span>Dashboard boxes</span>
                            <span class="bs-label label-primary">Hot</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="chart-boxes.html" title="Chart boxes"><span>Chart boxes</span></a></li>
                                <li><a href="tile-boxes.html" title="Tile boxes"><span>Tile boxes</span></a></li>
                                <li><a href="social-boxes.html" title="Social boxes"><span>Social boxes</span></a></li>
                                <li><a href="panel-boxes.html" title="Panel boxes"><span>Panel boxes</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Widgets">
                            <i class="glyph-icon icon-linecons-wallet"></i>
                            <span>Widgets</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="tabs.html" title="Responsive tabs"><span>Responsive tabs</span></a></li>
                                <li><a href="collapsable.html" title="Collapsables"><span>Collapsable accordions</span></a></li>
                                <li><a href="bs-carousel.html" title="Bootstrap Carousel"><span>Bootstrap carousel</span></a></li>
                                <li><a href="calendar.html" title="Calendar"><span>Calendar</span></a></li>
                                <li><a href="scrollbars.html" title="Custom scrollbars"><span>Custom scrollbars</span></a></li>
                                <li><a href="modals.html" title="Modals"><span>Modals</span></a></li>
                                <li><a href="notifications.html" title="Notifications"><span>Notifications</span></a></li>
                                <li><a href="lazyload.html" title="Lazyload"><span>Lazyload</span></a></li>
                                <li><a href="loading-feedback.html" title="Loading feedback"><span>Loading feedback</span></a></li>
                                <li><a href="popovers-tooltips.html" title="Popovers &amp; Tooltips"><span>Popovers & Tooltips</span></a></li>
                                <li><a href="progress-bars.html" title="Progress bars"><span>Progress bars</span></a></li>
                                <li><a href="sortable-elements.html" title="Sortable elements"><span>Sortable elements</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Forms UI">
                            <i class="glyph-icon icon-linecons-eye"></i>
                            <span>Forms UI</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="forms-elements.html" title="Form elements"><span>Form elements</span></a></li>
                                <li><a href="forms-validation.html" title="Form validation"><span>Form validation</span></a></li>
                                <li><a href="pickers.html" title="Pickers"><span>Pickers</span></a></li>
                                <li><a href="sliders.html" title="Sliders"><span>Sliders</span></a></li>
                                <li><a href="forms-wizard.html" title="Form wizards"><span>Form wizards</span></a></li>
                                <li><a href="forms-masks.html" title="Form input masks"><span>Form input masks</span></a></li>
                                <li><a href="image-crop.html" title="Image crop"><span>Image crop</span></a></li>
                                <li><a href="dropzone-uploader.html" title="Dropzone uploader"><span>Dropzone uploader</span></a></li>
                                <li><a href="multi-uploader.html" title="Multi uploader"><span>Multi uploader</span></a></li>
                                <li><a href="input-knobs.html" title="Input knobs"><span>Input knobs</span></a></li>
                                <li><a href="ckeditor.html" title="Ckeditor"><span>Ckeditor</span></a></li>
                                <li><a href="summernote.html" title="Summernote"><span>Summernote</span></a></li>
                                <li><a href="markdown.html" title="Markdown editor"><span>Markdown editor</span></a></li>
                                <li><a href="inline-editor.html" title="Inline editor"><span>Inline editor</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Advanced tables">
                            <i class="glyph-icon icon-linecons-megaphone"></i>
                            <span>Advanced tables</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="tables.html" title="Basic tables"><span>Basic tables</span></a></li>
                                <li><a href="responsive-tables.html" title="Responsive tables"><span>Responsive tables</span></a></li>
                                <li><a href="data-tables.html" title="Data tables"><span>Data tables</span></a></li>
                                <li><a href="advanced-datatables.html" title="Advanced data tables"><span>Advanced data tables</span></a></li>
                                <li><a href="fixed-datatables.html" title="Fixed data tables"><span>Fixed data tables</span></a></li>
                                <li><a href="responsive-datatables.html" title="Responsive data tables"><span>Responsive data tables</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Charts">
                            <i class="glyph-icon icon-linecons-paper-plane"></i>
                            <span>Charts</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="flot-charts.html" title="Flot charts"><span>Flot charts</span></a></li>
                                <li><a href="sparklines.html" title="Sparklines"><span>Sparklines</span></a></li>
                                <li><a href="pie-gages.html" title="PieGages"><span>PieGages</span></a></li>
                                <li><a href="just-gage.html" title="justGage"><span>justGage</span></a></li>
                                <li><a href="morris-charts.html" title="Morris charts"><span>Morris charts</span></a></li>
                                <li><a href="xcharts.html" title="xCharts"><span>xCharts</span></a></li>
                                <li><a href="chart-js.html" title="Chart.js"><span>Chart.js</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Maps">
                            <i class="glyph-icon icon-linecons-sound"></i>
                            <span>Maps</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="gmaps.html" title="gMaps"><span>gMaps</span></a></li>
                                <li><a href="vector-maps.html" title="Vector maps"><span>Vector maps</span></a></li>
                                <li><a href="mapael.html" title="Mapael"><span>Mapael</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li class="header"><span>Extra</span></li>
                    <li>
                        <a href="#" title="Pages">
                            <i class="glyph-icon icon-linecons-fire"></i>
                            <span>Pages</span>
                            <span class="bs-label badge-yellow">NEW</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="index-alt.html" title="Alternate dashboard"><span>Alternate dashboard</span></a></li>
                                <li><a href="view-profile.html" title="View profile"><span>View profile</span></a></li>
                                <li><a href="faq-section.html" title="FAQ section"><span>FAQ section</span></a></li>
                                <li><a href="auto-menu.html" title="Auto menu"><span>Auto menu</span></a></li>
                                <li><a href="invoice.html" title="Invoice"><span>Invoice</span></a></li>
                                <li><a href="admin-blog.html" title="Blog posts list"><span>Blog posts list</span></a></li>
                                <li><a href="admin-pricing.html" title="Pricing tables"><span>Pricing tables</span></a></li>
                                <li><a href="portfolio-gallery.html" title="Portfolio gallery"><span>Portfolio gallery</span></a></li>
                                <li><a href="portfolio-masonry.html" title="Portfolio masonry"><span>Portfolio masonry</span></a></li>
                                <li><a href="slidebars.html" title="Slidebars"><span>Slidebars</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Other Pages">
                            <i class="glyph-icon icon-linecons-cup"></i>
                            <span>Other Pages</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="login-1.html" target="_blank" title="Login page 1"><span>Login page 1</span></a></li>
                                <li><a href="login-2.html" target="_blank" title="Login page 2"><span>Login page 2</span></a></li>
                                <li><a href="login-3.html" target="_blank" title="Login page 3"><span>Login page 3</span></a></li>
                                <li><a href="login-4.html" target="_blank" title="Login page 4"><span>Login page 4</span></a></li>
                                <li><a href="login-5.html" target="_blank" title="Login page 5"><span>Login page 5</span></a></li>
                                <li><a href="lockscreen-1.html" target="_blank" title="Lockscreen page 1"><span>Lockscreen page 1</span></a></li>
                                <li><a href="lockscreen-2.html" target="_blank" title="Lockscreen page 2"><span>Lockscreen page 2</span></a></li>
                                <li><a href="lockscreen-3.html" target="_blank" title="Lockscreen page 3"><span>Lockscreen page 3</span></a></li>
                                <li><a href="server-1.html" target="_blank" title="Server page 1"><span>Error 404 page</span></a></li>
                                <li><a href="server-2.html" target="_blank" title="Server page 2"><span>Error 404 alternate</span></a></li>
                                <li><a href="server-3.html" target="_blank" title="Server page 3"><span>Server 500 error</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Mailbox">
                            <i class="glyph-icon icon-linecons-mail"></i>
                            <span>Mailbox</span>
                            <span class="bs-badge badge-danger">3</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="mailbox-inbox.html" title="Inbox"><span>Inbox</span></a></li>
                                <li><a href="mailbox-compose.html" title="Compose message"><span>Compose message</span></a></li>
                                <li><a href="mailbox-single.html" title="Single message"><span>Single message</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Snippets">
                            <i class="glyph-icon icon-linecons-cd"></i>
                            <span>Snippets</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="timeline.html" title="Timeline"><span>Timeline</span></a></li>
                                <li><a href="chat.html" title="Chat"><span>Chat</span></a></li>
                                <li><a href="checklist.html" title="Checklist"><span>Checklist</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li>
                        <a href="#" title="Helpers">
                            <i class="glyph-icon icon-linecons-doc"></i>
                            <span>Helpers</span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="helper-classes.html" title="Helper classes"><span>Helper classes</span></a></li>
                                <li><a href="page-transitions.html" title="Page transitions"><span>Page transitions</span></a></li>
                                <li><a href="animations.html" title="Animations"><span>Animations</span></a></li>
                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                </ul><!-- #sidebar-menu -->
            </div>
        </div>
        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                @include('CMS.script.container-charts-srcipt')
                
<!-- Sparklines charts -->

                   

<div id="page-title">
    <h2>Dashboard</h2>
    <p>The most complete user interface framework that can be used to create stunning admin dashboards and presentation websites.</p>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
    <div id="theme-switcher-wrapper">
        <div class="scroll-switcher">
            <h5 class="header">Layout options</h5>
            <ul class="reset-ul">
                <li>
                    <label for="boxed-layout">Boxed layout</label>
                    <input type="checkbox" data-toggletarget="boxed-layout" id="boxed-layout" class="input-switch-alt">
                </li>
                <li>
                    <label for="fixed-header">Fixed header</label>
                    <input type="checkbox" data-toggletarget="fixed-header" id="fixed-header" class="input-switch-alt">
                </li>
                <li>
                    <label for="fixed-sidebar">Fixed sidebar</label>
                    <input type="checkbox" data-toggletarget="fixed-sidebar"  id="fixed-sidebar" class="input-switch-alt">
                </li>
                <li>
                    <label for="closed-sidebar">Closed sidebar</label>
                    <input type="checkbox" data-toggletarget="closed-sidebar" id="closed-sidebar" class="input-switch-alt">
                </li>
            </ul>
            <div class="boxed-bg-wrapper hide">
                <h5 class="header">
                    Boxed Page Background
                    <a class="set-background-style" data-header-bg="" title="Remove all styles" href="javascript:void(0);">Clear</a>
                </h5>
                <div class="theme-color-wrapper clearfix">
                    <h5>Patterns</h5>
                    <a class="tooltip-button set-background-style pattern-bg-3" data-header-bg="pattern-bg-3" title="Pattern 3" href="javascript:void(0);">Pattern 3</a>
                    <a class="tooltip-button set-background-style pattern-bg-4" data-header-bg="pattern-bg-4" title="Pattern 4" href="javascript:void(0);">Pattern 4</a>
                    <a class="tooltip-button set-background-style pattern-bg-5" data-header-bg="pattern-bg-5" title="Pattern 5" href="javascript:void(0);">Pattern 5</a>
                    <a class="tooltip-button set-background-style pattern-bg-6" data-header-bg="pattern-bg-6" title="Pattern 6" href="javascript:void(0);">Pattern 6</a>
                    <a class="tooltip-button set-background-style pattern-bg-7" data-header-bg="pattern-bg-7" title="Pattern 7" href="javascript:void(0);">Pattern 7</a>
                    <a class="tooltip-button set-background-style pattern-bg-8" data-header-bg="pattern-bg-8" title="Pattern 8" href="javascript:void(0);">Pattern 8</a>
                    <a class="tooltip-button set-background-style pattern-bg-9" data-header-bg="pattern-bg-9" title="Pattern 9" href="javascript:void(0);">Pattern 9</a>
                    <a class="tooltip-button set-background-style pattern-bg-10" data-header-bg="pattern-bg-10" title="Pattern 10" href="javascript:void(0);">Pattern 10</a>

                    <div class="clear"></div>

                    <h5 class="mrg15T">Solids &amp;Images</h5>
                    <a class="tooltip-button set-background-style bg-black" data-header-bg="bg-black" title="Black" href="javascript:void(0);">Black</a>
                    <a class="tooltip-button set-background-style bg-gray mrg10R" data-header-bg="bg-gray" title="Gray" href="javascript:void(0);">Gray</a>

                    <a class="tooltip-button set-background-style full-bg-1" data-header-bg="full-bg-1 fixed-bg" title="Image 1" href="javascript:void(0);">Image 1</a>
                    <a class="tooltip-button set-background-style full-bg-2" data-header-bg="full-bg-2 fixed-bg" title="Image 2" href="javascript:void(0);">Image 2</a>
                    <a class="tooltip-button set-background-style full-bg-3" data-header-bg="full-bg-3 fixed-bg" title="Image 3" href="javascript:void(0);">Image 3</a>
                    <a class="tooltip-button set-background-style full-bg-4" data-header-bg="full-bg-4 fixed-bg" title="Image 4" href="javascript:void(0);">Image 4</a>
                    <a class="tooltip-button set-background-style full-bg-5" data-header-bg="full-bg-5 fixed-bg" title="Image 5" href="javascript:void(0);">Image 5</a>
                    <a class="tooltip-button set-background-style full-bg-6" data-header-bg="full-bg-6 fixed-bg" title="Image 6" href="javascript:void(0);">Image 6</a>

                </div>
            </div>
            <h5 class="header">
                Header Style
                <a class="set-adminheader-style" data-header-bg="bg-gradient-9" title="Remove all styles" href="javascript:void(0);">Clear</a>
            </h5>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-adminheader-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="javascript:void(0);">Primary</a>
                <a class="tooltip-button set-adminheader-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="javascript:void(0);">Green</a>
                <a class="tooltip-button set-adminheader-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="javascript:void(0);">Red</a>
                <a class="tooltip-button set-adminheader-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="javascript:void(0);">Blue</a>
                <a class="tooltip-button set-adminheader-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="javascript:void(0);">Warning</a>
                <a class="tooltip-button set-adminheader-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="javascript:void(0);">Purple</a>
                <a class="tooltip-button set-adminheader-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="javascript:void(0);">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-adminheader-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="javascript:void(0);">Gradient 1</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="javascript:void(0);">Gradient 2</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="javascript:void(0);">Gradient 3</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="javascript:void(0);">Gradient 4</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="javascript:void(0);">Gradient 5</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="javascript:void(0);">Gradient 6</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="javascript:void(0);">Gradient 7</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="javascript:void(0);">Gradient 8</a>
            </div>
            <h5 class="header">
                Sidebar Style
                <a class="set-sidebar-style" data-header-bg="" title="Remove all styles" href="javascript:void(0);">Clear</a>
            </h5>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-sidebar-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="javascript:void(0);">Primary</a>
                <a class="tooltip-button set-sidebar-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="javascript:void(0);">Green</a>
                <a class="tooltip-button set-sidebar-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="javascript:void(0);">Red</a>
                <a class="tooltip-button set-sidebar-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="javascript:void(0);">Blue</a>
                <a class="tooltip-button set-sidebar-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="javascript:void(0);">Warning</a>
                <a class="tooltip-button set-sidebar-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="javascript:void(0);">Purple</a>
                <a class="tooltip-button set-sidebar-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="javascript:void(0);">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-sidebar-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="javascript:void(0);">Gradient 1</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="javascript:void(0);">Gradient 2</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="javascript:void(0);">Gradient 3</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="javascript:void(0);">Gradient 4</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="javascript:void(0);">Gradient 5</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="javascript:void(0);">Gradient 6</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="javascript:void(0);">Gradient 7</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="javascript:void(0);">Gradient 8</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="dashboard-box dashboard-box-chart bg-white content-box">
            <div class="content-wrapper">
                <div class="header">
                    $34,657
                    <span>Total Earnings<b> in last</b> ten <b>quarters</b></span>
                </div>
                <div class="bs-label bg-green">+18%</div>
                <div class="center-div sparkline-big-alt">1245,1450,1312,1121,986,1489</div>
                <div class="row list-grade">
                    <div class="col-md-2">January</div>
                    <div class="col-md-2">February</div>
                    <div class="col-md-2">March</div>
                    <div class="col-md-2">April</div>
                    <div class="col-md-2">May</div>
                    <div class="col-md-2">June</div>
                </div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left">
                    <a href="#" title="">
                        Financial statistics
                    </a>
                </div>
                <a href="#" class="btn btn-info float-right tooltip-button" data-placement="top" title="View details">
                    <i class="glyph-icon icon-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-box dashboard-box-chart bg-white content-box">
            <div class="content-wrapper">
                <div class="header">
                    169
                    <span>Total Subscriptions<b> in last</b> 6 days</span>
                </div>
                <div class="bs-label bg-red">-14%</div>
                <div class="center-div sparkline-big-alt">21,41,31,50,18,41</div>
                <div class="row list-grade">
                    <div class="col-md-2">M</div>
                    <div class="col-md-2">T</div>
                    <div class="col-md-2">W</div>
                    <div class="col-md-2">T</div>
                    <div class="col-md-2">F</div>
                    <div class="col-md-2">S</div>
                </div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left">
                    <a href="#" title="">
                        View all members
                    </a>
                </div>
                <a href="#" class="btn btn-default float-right tooltip-button" data-placement="top" title="View details">
                    <i class="glyph-icon icon-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-box dashboard-box-chart bg-white content-box">
            <div class="content-wrapper">
                <div class="header">
                    8960
                    <span>Total Downloads<b> in last</b> 6 years</span>
                </div>
                <div class="bs-label bg-orange">~51%</div>
                <div class="center-div sparkline-big-alt">2210,2310,2010,2310,2123,2350</div>
                <div class="row list-grade">
                    <div class="col-md-2">2009</div>
                    <div class="col-md-2">2010</div>
                    <div class="col-md-2">2011</div>
                    <div class="col-md-2">2012</div>
                    <div class="col-md-2">2013</div>
                    <div class="col-md-2">2014</div>
                </div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left">
                    <a href="#" title="">
                        View more details
                    </a>
                </div>
                <a href="#" class="btn btn-primary float-right tooltip-button" data-placement="top" title="View details">
                    <i class="glyph-icon icon-caret-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">
                    Recent sales activity
                </h3>
                <div class="example-box-wrapper">
                    <div id="data-example-1" class="mrg20B" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="#" title="Example tile shortcut" class="tile-box tile-box-alt btn-success">
                    <div class="tile-header">
                        Photo Gallery
                    </div>
                    <div class="tile-content-wrapper">
                        <div class="chart-alt-10" data-percent="43"><span>43</span>%</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" title="Example tile shortcut" class="tile-box tile-box-alt btn-info">
                    <div class="tile-header">
                        Subscriptions
                    </div>
                    <div class="tile-content-wrapper">
                        <div class="chart-alt-10" data-percent="76"><span>76</span>%</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" title="Example tile shortcut" class="tile-box tile-box-alt btn-warning">
                    <div class="tile-header">
                        New Visitors
                    </div>
                    <div class="tile-content-wrapper">
                        <div class="chart-alt-10" data-percent="11"><span>11</span>%</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="content-box mrg20T">
            <h3 class="content-box-header bg-primary">
                Toggle button closed
                <span class="header-buttons-separator">
                    <a href="#" class="icon-separator toggle-button">
                        <i class="glyph-icon icon-chevron-down"></i>
                    </a>
                </span>
            </h3>
            <div class="content-box-wrapper hide">
                This content boxes has the header with <code>.bg-default</code>.
            </div>
        </div>

        <div class="content-box">
            <h3 class="content-box-header bg-default">
                <i class="glyph-icon icon-cog"></i>
                Live server status
                <span class="header-buttons-separator">
                    <a href="#" class="icon-separator">
                        <i class="glyph-icon icon-question"></i>
                    </a>
                    <a href="#" class="icon-separator refresh-button" data-style="dark" data-theme="bg-white" data-opacity="40">
                        <i class="glyph-icon icon-refresh"></i>
                    </a>
                    <a href="#" class="icon-separator remove-button" data-animation="flipOutX">
                        <i class="glyph-icon icon-times"></i>
                    </a>
                </span>
            </h3>
            <div class="content-box-wrapper">
                <div id="data-example-3" style="width: 100%; height: 250px;"></div>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="row mrg20B">
            <div class="col-md-6">
                <a href="#" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-primary">
                    <span class="bs-badge badge-absolute">5</span>
                    <div class="tile-header">
                        Dashboard
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-dashboard"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-black">
                    <span class="bs-badge badge-absolute">5</span>
                    <div class="tile-header">
                        Orders
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-cogs"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">
                    Users activity
                </h3>
                <div class="example-box-wrapper">
                    <div class="timeline-box timeline-box-left">
                        <div class="tl-row">
                            <div class="tl-item float-right">
                                <div class="tl-icon bg-red">
                                    <i class="glyph-icon icon-toggle-on"></i>
                                </div>
                                <div class="popover right">
                                    <div class="arrow"></div>
                                    <div class="popover-content">
                                        <div class="tl-label bs-label label-info">Appointment</div>
                                        <p class="tl-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. </p>
                                        <div class="tl-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            a few seconds ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tl-row">
                            <div class="tl-item float-right">
                                <div class="tl-icon bg-primary">
                                    <i class="glyph-icon icon-wifi"></i>
                                </div>
                                <div class="popover right">
                                    <div class="arrow"></div>
                                    <div class="popover-content">
                                        <div class="tl-label bs-label bg-yellow">Teleconference</div>
                                        <p class="tl-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. </p>
                                        <div class="tl-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            a few seconds ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tl-row">
                            <div class="tl-item float-right">
                                <div class="tl-icon bg-black">
                                    <i class="glyph-icon icon-headphones"></i>
                                </div>
                                <div class="popover right">
                                    <div class="arrow"></div>
                                    <div class="popover-content">
                                        <div class="tl-label bs-label label-danger">Meeting</div>
                                        <p class="tl-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. </p>
                                        <div class="tl-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            a few seconds ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-box bg-white post-box">
            <textarea name="" class="textarea-autosize" placeholder="What are you doing right now?"></textarea>
            <div class="button-pane">
                <a href="#" class="btn btn-md btn-link hover-white" title="">
                    <i class="glyph-icon icon-volume-down"></i>
                </a>
                <a href="#" class="btn btn-md btn-link hover-white" title="">
                    <i class="glyph-icon icon-video-camera"></i>
                </a>
                <a href="#" class="btn btn-md btn-link hover-white" title="">
                    <i class="glyph-icon icon-microphone"></i>
                </a>
                <a href="#" class="btn btn-md btn-link hover-white" title="">
                    <i class="glyph-icon icon-picture-o"></i>
                </a>

                <a href="#" class="btn btn-md btn-post float-right btn-success" title="">
                    Post
                </a>

            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <ul class="todo-box">
                    <li class="border-red">
                        <input type="checkbox" name="todo-1" id="todo-1">
                        <label for="todo-1">This is an example task that i need to finish</label>
                        <span class="bs-label bg-red" title="">Overdue</span>
                        <a href="#" class="btn btn-xs btn-danger float-right" title="">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-success float-right" title="">
                            <i class="glyph-icon icon-check"></i>
                        </a>
                    </li>
                    <li class="border-orange">
                        <input type="checkbox" name="todo-2" id="todo-2">
                        <label for="todo-2">Update server to a newer version</label>
                        <span class="bs-label bg-green" title="">2 Weeks</span>
                        <a href="#" class="btn btn-xs btn-danger float-right" title="">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-success float-right" title="">
                            <i class="glyph-icon icon-check"></i>
                        </a>
                    </li>
                    <li class="border-blue">
                        <input type="checkbox" name="todo-3" id="todo-3">
                        <label for="todo-3">Add more awesome template features</label>
                        <span class="bs-label bg-blue" title="">Tomorrow</span>
                        <a href="#" class="btn btn-xs btn-danger float-right" title="">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-success float-right" title="">
                            <i class="glyph-icon icon-check"></i>
                        </a>
                    </li>
                    <li class="border-purple">
                        <input type="checkbox" name="todo-4" id="todo-4">
                        <label for="todo-4">Never forget to buy milk</label>
                        <span class="bs-label bg-black" title="">Today</span>
                        <a href="#" class="btn btn-xs btn-danger float-right" title="">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-success float-right" title="">
                            <i class="glyph-icon icon-check"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
                    </div>

                

            </div>
        </div>
    </div>


    <!-- WIDGETS -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/bootstrap/js/bootstrap.js')}}"></script>

<!-- Bootstrap Dropdown -->

<!-- <script type="text/javascript" src="resourceAdminTemplate/assets/widgets/dropdown/dropdown.js"></script> -->

<!-- Bootstrap Tooltip -->

<!-- <script type="text/javascript" src="resourceAdminTemplate/assets/widgets/tooltip/tooltip.js"></script> -->

<!-- Bootstrap Popover -->

<!-- <script type="text/javascript" src="resourceAdminTemplate/assets/widgets/popover/popover.js"></script> -->

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/progressbar/progressbar.js')}}"></script>

<!-- Bootstrap Buttons -->

<!-- <script type="text/javascript" src="resourceAdminTemplate/assets/widgets/button/button.js"></script> -->

<!-- Bootstrap Collapse -->

<!-- <script type="text/javascript" src="resourceAdminTemplate/assets/widgets/collapse/collapse.js"></script> -->

<!-- Superclick -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/superclick/superclick.js')}}"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/input-switch/inputswitch-alt.js')}}"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/slimscroll/slimscroll.js')}}"></script>

<!-- Slidebars -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/slidebars/slidebars.js')}}"></script>
<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/slidebars/slidebars-demo.js')}}"></script>

<!-- PieGage -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/charts/piegage/piegage.js')}}"></script>
<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/charts/piegage/piegage-demo.js')}}"></script>

<!-- Screenfull -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/screenfull/screenfull.js')}}"></script>

<!-- Content box -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/content-box/contentbox.js')}}"></script>

<!-- Overlay -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/overlay/overlay.js')}}"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/js-init/widgets-init.js')}}"></script>

<!-- Theme layout -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/themes/admin/layout.js')}}"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="{{ asset('resourceAdminTemplate/assets/widgets/theme-switcher/themeswitcher.js')}}"></script>

</div>
</body>
</html>