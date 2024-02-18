<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="./" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="theme-color" content="#ffffff" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" integrity="sha512-z/90a5SWiu4MWVelb5+ny7sAayYUfMmdXKEAbpj27PfdkamNdyI3hcjxPxkOPbrXoKIm7r9V2mElt5f1OtVhqA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.1/simplebar.min.css" integrity="sha512-rptDreZF629VL73El0GaBEH9tlYEKDJFUr+ysb+9whgSGbwYfGGA61dVtQFL0qC8/SZv/EQFW5JtwEFf+8zKYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite('resources/sass/app.scss')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        @yield('styles')
    </head>
    <body>
        <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
            <div class="sidebar-brand d-none d-md-flex">
                <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="{{ asset('icons/brand.svg#full') }}"></use>
                </svg>
                <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                    <use xlink:href="{{ asset('icons/brand.svg#signet') }}"></use>
                </svg>
            </div>
            @include('layouts.navigation')
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        </div>
        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
            <header class="header header-sticky mb-4">
                <div class="container-fluid">
                    <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                        <svg class="icon icon-lg">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-menu') }}"></use>
                        </svg>
                    </button>
                    <a class="header-brand d-md-none" href="#">
                        <svg width="118" height="46" alt="CoreUI Logo">
                            <use xlink:href="{{ asset('icons/brand.svg#full') }}"></use>
                        </svg>
                    </a>
                    <ul class="header-nav d-none d-md-flex">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a></li>
                    </ul>
                    <ul class="header-nav ms-auto"></ul>
                    <ul class="header-nav ms-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <div class="dropdown-header bg-light py-2">
                                    <div class="fw-semibold">{{ __('Languages') }}</div>
                                </div>
                                @if(count(config('panel.available_languages', [])) > 1) @foreach(config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ __("{$langName}") }})</a>
                                @endforeach @endif
                                <div class="dropdown-header bg-light py-2">
                                    <div class="fw-semibold">{{ __('My Settings') }}</div>
                                </div>
                                <a class="dropdown-item" href="{{ route('admin.profile.show') }}">
                                    <svg class="icon me-2">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                    </svg>
                                    {{ __('My profile') }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg class="icon me-2">
                                            <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>
                                        </svg>
                                        {{ __('Logout') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="body flex-grow-1 px-3">
                <div class="container-lg">
                    @yield('content')
                </div>
            </div>
            <footer class="footer text-sm-start">
                <div><a class="badge rounded-pill text-bg-dark" href="{{ config('app.url') }}">{{ config('app.name') }} </a> &copy; {{ now()->year }}</div>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.1/simplebar.min.js" integrity="sha512-pnw039YCj58sPbPxVAzem8Z3dTgRgq0n6QJZDc+3PV2ScytsX6Jx0pMiLZRYofXshu4ChX6/rFFgebHQtK4UoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.2.7/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.2.7/build/vfs_fonts.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script>
            $(function() {
                let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
                let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
                let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
                let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
                let printButtonTrans = '{{ trans('global.datatables.print') }}'
                let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
                let selectAllButtonTrans = '{{ trans('global.select_all') }}'
                let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

                let languages = {
                    'en': '//cdn.datatables.net/plug-ins/1.13.5/i18n/en-GB.json',
                    'zh_TW': '//cdn.datatables.net/plug-ins/1.13.5/i18n/zh-HANT.json'
                };

                $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
                $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style:    'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'selectAll',
                        className: 'btn-primary',
                        text: selectAllButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        },
                        action: function(e, dt) {
                            e.preventDefault()
                            dt.rows().deselect();
                            dt.rows({ search: 'applied' }).select();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn-primary',
                        text: selectNoneButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        className: 'btn-light',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-light',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-light',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-light',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-light',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-light',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
                });

                $.fn.dataTable.ext.classes.sPageButton = '';
            });
        </script>
        @yield('scripts')
    </body>
</html>