<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        a#back-to-top:hover {
            background: white;
            color: #1FC0D8;
            border-color: #1FC0D8;
        }
        .custom-switch-input:checked~.custom-switch-indicator {
            background: #1FC0D8;
            border-color: #1FC0D8;
        }
        a#back-to-top {
            background: #1FC0D8;
        }
        .page-item.active .page-link {
            
            background-color: #1FC0D8;
        }
        .form-group input {
            border-radius: 17px;
            padding: 8px 15px;
        }
        .side-skin1 .side-menu__item.active, .side-skin1 .side-menu__item:hover, .side-skin1 .side-menu__item:focus {
            color: #1FC0D8;
            background: #fff;
        }
        .side-menu__item.active .side-menu__icon, .side-menu__item:hover .side-menu__icon, .side-menu__item:focus .side-menu__icon {
            color: #1FC0D8;
        }
        .side-skin1 .side-menu__item.active .side-menu__icon, .side-skin1 .side-menu__item:hover .side-menu__icon, .side-skin1 .side-menu__item:focus .side-menu__icon {
            color: #1FC0D8;
        }

    </style>
</head>
<body>
    <div class="app-header header top-header comb-header">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="header-brand" href="index.html">
                    <img src="{{asset('template/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Clont logo">
                    <img src="{{asset('template/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Clont logo">
                    <img src="{{asset('template/images/brand/favicon.pngg')}}" class="header-brand-img mobile-logo" alt="Clont logo">
                    <img src="{{asset('template/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Clont logo">
                </a>
                <div class="dropdown   side-nav" >
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle nav-link icon mt-1" data-toggle="sidebar" href="#">
                        <i class="fe fe-align-right"></i>
                    </a><!-- sidebar-toggle-->
                </div>
                
                
                
            </div>
        </div>
    </div>
</body>
</html>
