
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo-square.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('assets/images/logo-square.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css
    ">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{--  <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">  --}}




    {{--  <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/apexcharts/3.23.1/apexcharts.min.css">  --}}


    @livewireStyles
    {{--  @vite('resources/css/app.css')  --}}
</head>

<body>
    <div class="overlay-mask"></div>
    <div class="main-wrapper ">
        <aside class="sidebar">
            <nav class="navbar">
                <a class="navbar-brand brand-title" href="#">
                    <img src="assets/images/light.png" alt="" class="logo"> Moss
                </a>
            </nav>
            <nav class="shadow-sm navigation">
                <div class="navigation-arrow">
                    <i class="material-icons">chevron_left</i>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->is('home') ? 'active' : '' }}">
                            <span class="icon material-icons">home</span>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pressings.index') }}" class="{{ request()->is('pressings') ? 'active' : '' }}">
                            <span class="icon material-icons">checkroom</span>
                            <span class="text">Pressing</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}" class=" {{ request()->is('orders') ? 'active' : '' }}">
                            <span class="icon material-icons">shopping_cart</span>
                            <span class="text">Commandes</span>
                        </a>
                    </li>
                    <li class="separator">
                        <span>Applications & Pages</span>
                    </li>
                    <li>
                        <a href="#collapseSubmenu1" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">apps</span>
                            <span class="text">Applications</span>
                        </a>
                        <ul class="collapse" id="collapseSubmenu1">
                            <li>
                                <a href="mail.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Mailbox</span>
                                    <span class="badge badge-transparent-danger">1</span>
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Calendar</span>
                                </a>
                            </li>
                            <li>
                                <a href="kanban.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Kanban</span>
                                </a>
                            </li>
                            <li>
                                <a href="contacts.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Contacts</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#authenticationPage" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">verified_user</span>
                            <span class="text">Authentication</span>
                        </a>
                        <ul class="collapse" id="authenticationPage">
                            <li>
                                <a href="login.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="register.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Register</span>
                                </a>
                            </li>
                            <li>
                                <a href="relogin.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Re Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="reset.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Forgot Password</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#errorPages" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">groups</span>
                            <span class="text">Rôle & Permissions</span>
                        </a>
                        <ul class="collapse" id="errorPages">
                            <li>
                                <a href="{{ route('permissions.index') }}"  class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Lite des permissions</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('roles.index') }}"  class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Liste des rôles</span>
                                </a>
                            </li>
                            <li>
                                <a href="500.html" target="_blank" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">500 Page</span>
                                </a>
                            </li>
                            <li>
                                <a href="503.html" target="_blank" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">503 Page</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="separator">
                        <span>UI Elements & Components</span>
                    </li>
                    <li>
                        <a href="#uiElements" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">extension</span>
                            <span class="text">Elements</span>
                        </a>
                        <ul class="collapse" id="uiElements">

                            <li>
                                <a href="alerts.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Alerts</span>
                                </a>
                            </li>

                            <li>
                                <a href="badges.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Badges</span>
                                </a>
                            </li>
                            <li>
                                <a href="buttons.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="cards.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Cards</span>
                                </a>
                            </li>

                            <li>
                                <a href="context-menu.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Context menu</span>
                                </a>
                            </li>


                            <li>
                                <a href="icons.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Icons</span>
                                </a>
                            </li>

                            <li>
                                <a href="typography.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Typography</span>
                                </a>
                            </li>
                            <li>
                                <a href="flex-grid.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Flexbox Grids</span>
                                </a>
                            </li>
                            <li>
                                <a href="spinners.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Spinners</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#uiComponents" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">backup_table</span>
                            <span class="text">Components</span>
                        </a>
                        <ul class="collapse" id="uiComponents">
                            <li>
                                <a href="accordians.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Accordians</span>
                                </a>
                            </li>
                            <li>
                                <a href="avatar.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Avatar</span>
                                </a>
                            </li>
                            <li>
                                <a href="colors.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Colors</span>
                                </a>
                            </li>
                            <li>
                                <a href="modals.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Modals</span>
                                </a>
                            </li>
                            <li>
                                <a href="notifications.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="tabs.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Tabs & Pills</span>
                                </a>
                            </li>
                            <li>
                                <a href="timeline.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Timeline</span>
                                </a>
                            </li>
                            <li>
                                <a href="tooltips.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Tooltips & Popovers</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="#formStuff" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">assignment</span>
                            <span class="text">Form Stuff</span>
                        </a>
                        <ul class="collapse" id="formStuff">
                            <li>
                                <a href="forms.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Form Styling</span>
                                </a>
                            </li>
                            <li>
                                <a href="validations.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Validation</span>
                                </a>
                            </li>
                            <li>
                                <a href="pickers.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Pickers</span>
                                </a>
                            </li>
                            <li>
                                <a href="uploaders.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Uploader</span>
                                </a>
                            </li>
                            <li>
                                <a href="wysiwyg.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">WYSIWYG Editors</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#data-grid-menu" class="" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">grid_on</span>
                            <span class="text">Data Grids</span>
                        </a>
                        <ul class="collapse" id="data-grid-menu">
                            <li>
                                <a href="tables.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Simple Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="data-tables.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Data Tables</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#charts-menu" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">bar_chart</span>
                            <span class="text">Charts</span>
                        </a>
                        <ul class="collapse" id="charts-menu">
                            <li>
                                <a href="apex-charts.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">ApexCharts</span>
                                </a>
                            </li>
                            <li>
                                <a href="chart-js.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Chart.js</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#maps-menu" data-toggle="collapse">
                            <span class="caret material-icons">arrow_right</span>
                            <span class="icon material-icons">map</span>
                            <span class="text">Maps</span>
                        </a>
                        <ul class="collapse" id="maps-menu">
                            <li>
                                <a href="google-maps.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Google Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="vector-maps.html" class="">
                                    <span class="icon material-icons">remove</span>
                                    <span class="text">Vector Maps</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <div class="navigation-arrow right">
                    <i class="material-icons">chevron_right</i>
                </div>
            </nav>
        </aside>
        <div class="right-area">
            <header>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item icon">
                            <button class="hamburger" id="hamburger-btn">
                                <span class="material-icons">menu</span>
                            </button>
                        </li>


                        <li class="nav-item d-sm-none d-none d-md-block">
                            <a href="#" class="nav-link">
                                <i class="align-middle material-icons">add</i> New
                            </a>
                        </li>
                        <li class="nav-item d-sm-none d-none d-md-block">
                            <a href="#" class="nav-link">Quick Link</a>
                        </li>
                        <li class="flex-fill"></li>
                        <li class="nav-item search-bar" id="search-bar">
                            <form class="form-inline big-search" method="POST" onsubmit="return false;">
                                <button class="btn btn-navbar" id="closeSearchBtn">
                                    <span class="material-icons">arrow_back</span>
                                </button>
                                <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                                <div class="backdrop"></div>
                            </form>
                        </li>
                        <li class="nav-item icon">
                            <button class="nav-link" id="searchBtn">
                                <span class="material-icons">search</span>
                            </button>
                        </li>
                        <li class="nav-item icon">
                            <button class="nav-link" id="fullscreen-btn">
                                <span class="material-icons">fullscreen</span>
                            </button>
                        </li>

                        <li class="nav-item icon">
                            <button class="nav-link pulse" id="navbarDropdown" data-toggle="dropdown" data-offset="0" aria-haspopup="true" aria-expanded="false">
                                <span class="material-icons">notifications</span>
                            </button>
                            <div class="p-0 dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="p-3 bg-white d-flex justify-content-between border-bottom ">
                                    <h3 class="m-0">Notifications</h3>
                                    <p class="float-right m-0">
                                        <a href="javascript:void()">Mark all as read</a>
                                    </p>
                                </div>
                                <div class="p-3 notification-list">
                                    <div class="mb-3 shadow-lg card">
                                        <div class="card-body">
                                            All systems operational.
                                            <small class="d-block">3 mins ago</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 shadow-lg card">
                                        <div class="card-body"> File upload successful.<small class="d-block">5 mins ago</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 shadow-lg card">
                                        <div class="card-body">
                                            Your holiday has been denied
                                            <small class="d-block">10 mins ago</small>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </li>
                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item dropdown with-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <div class="avatar avatar-sm avatar-dnd bg-primary">
                                    <img src="assets/images/avatar/team-4.jpg" class="align-top avatar-img rounded-circle" alt="">
                                </div>
                            </a>
                            <div class="p-1 dropdown-menu dropdown-menu-right">

                                <span class="dropdown-item">
                                    {{ Auth::user()->name }}
                                </span>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Déconnexion') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-item-text">
                                    Build Version: v1.0.1
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="container main-content">
              @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>


    <script src="{{ asset('assets/js/app.bundle.js') }}"></script>



    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>



    <script src="{{ asset('assets/js/demo/dashboard.bundle.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      <script>
        $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
        } );
        $(document).ready(function() {
        $('#examples').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
        } );


     function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        }


        // In your Javascript (external .js resource or <script> tag)

        $(document).ready(function() {

            $('.js-example-basic-multiple').select2();

        });


      </script>
    @livewireScripts

</body>


</html>
