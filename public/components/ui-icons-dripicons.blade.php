<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dripicons - Mazer Admin Dashboard</title>
    
    
    
    <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    
<link rel="stylesheet" href="assets/extensions/@icon/dripicons/dripicons.css">


  <link rel="stylesheet" href="./assets/compiled/css/ui-icons-dripicons.css">
  <link rel="stylesheet" href="./assets/compiled/css/app.css">
  <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo" srcset=""></a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--system-uicons" width="20" height="20"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                            opacity=".3"></path>
                        <g transform="translate(-210 -1)">
                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                            <circle cx="220.5" cy="11.5" r="4"></circle>
                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                        </g>
                    </g>
                </svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                    </path>
                </svg>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item  ">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Components</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="component-accordion.html" class="submenu-link">Accordion</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-alert.html" class="submenu-link">Alert</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-badge.html" class="submenu-link">Badge</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-breadcrumb.html" class="submenu-link">Breadcrumb</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-button.html" class="submenu-link">Button</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-card.html" class="submenu-link">Card</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-carousel.html" class="submenu-link">Carousel</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-collapse.html" class="submenu-link">Collapse</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-dropdown.html" class="submenu-link">Dropdown</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-list-group.html" class="submenu-link">List Group</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Modal</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-navs.html" class="submenu-link">Navs</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-pagination.html" class="submenu-link">Pagination</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-progress.html" class="submenu-link">Progress</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-spinner.html" class="submenu-link">Spinner</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-toasts.html" class="submenu-link">Toasts</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="component-tooltip.html" class="submenu-link">Tooltip</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Extra Components</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-avatar.html" class="submenu-link">Avatar</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-divider.html" class="submenu-link">Divider</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-date-picker.html" class="submenu-link">Date Picker</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-sweetalert.html" class="submenu-link">Sweet Alert</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-toastify.html" class="submenu-link">Toastify</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="extra-component-rating.html" class="submenu-link">Rating</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Layouts</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="layout-default.html" class="submenu-link">Default Layout</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-vertical-1-column.html" class="submenu-link">1 Column</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-vertical-navbar.html" class="submenu-link">Vertical Navbar</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-rtl.html" class="submenu-link">RTL Layout</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="layout-horizontal.html" class="submenu-link">Horizontal Menu</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li class="sidebar-title">Forms &amp; Tables</li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Form Elements</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="form-element-input.html" class="submenu-link">Input</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-input-group.html" class="submenu-link">Input Group</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-select.html" class="submenu-link">Select</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-radio.html" class="submenu-link">Radio</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-checkbox.html" class="submenu-link">Checkbox</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-element-textarea.html" class="submenu-link">Textarea</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="form-layout.html" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Form Layout</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-journal-check"></i>
                    <span>Form Validation</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="form-validation-parsley.html" class="submenu-link">Parsley</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pen-fill"></i>
                    <span>Form Editor</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-quill.html" class="submenu-link">Quill</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-ckeditor.html" class="submenu-link">CKEditor</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-summernote.html" class="submenu-link">Summernote</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="form-editor-tinymce.html" class="submenu-link">TinyMCE</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="table.html" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Table</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Datatables</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="table-datatable.html" class="submenu-link">Datatable</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="table-datatable-jquery.html" class="submenu-link">Datatable (jQuery)</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li class="sidebar-title">Extra UI</li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pentagon-fill"></i>
                    <span>Widgets</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-widgets-chatbox.html" class="submenu-link">Chatbox</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-widgets-pricing.html" class="submenu-link">Pricing</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-widgets-todolist.html" class="submenu-link">To-do List</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item active has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-egg-fill"></i>
                    <span>Icons</span>
                </a>
                
                <ul class="submenu active">
                    
                    <li class="submenu-item  ">
                        <a href="ui-icons-bootstrap-icons.html" class="submenu-link">Bootstrap Icons </a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-icons-fontawesome.html" class="submenu-link">Fontawesome</a>
                        
                    </li>
                    
                    <li class="submenu-item active ">
                        <a href="ui-icons-dripicons.html" class="submenu-link">Dripicons</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Charts</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-chart-chartjs.html" class="submenu-link">ChartJS</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-chart-apexcharts.html" class="submenu-link">Apexcharts</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="ui-file-uploader.html" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>File Uploader</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-map-fill"></i>
                    <span>Maps</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-map-google-map.html" class="submenu-link">Google Map</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-map-jsvectormap.html" class="submenu-link">JS Vector Map</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-three-dots"></i>
                    <span>Multi-level Menu</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  has-sub">
                        <a href="#" class="submenu-link">First Level</a>
                        
                        <ul class="submenu submenu-level-2 ">

                            
                            <li class="submenu-item ">
                                <a href="ui-multi-level-menu.html" class="submenu-link">Second Level</a>
                            </li>
                            
                            <li class="submenu-item ">
                                <a href="#" class="submenu-link">Second Level Menu</a>
                            </li>
                            

                        </ul>
                        
                    </li>
                    
                    <li class="submenu-item  has-sub">
                        <a href="#" class="submenu-link">Another Menu</a>
                        
                        <ul class="submenu submenu-level-2 ">

                            
                            <li class="submenu-item ">
                                <a href="#" class="submenu-link">Second Level Menu</a>
                            </li>
                            

                        </ul>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li class="sidebar-title">Pages</li>
            
            <li
                class="sidebar-item  ">
                <a href="application-email.html" class='sidebar-link'>
                    <i class="bi bi-envelope-fill"></i>
                    <span>Email Application</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="application-chat.html" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Chat Application</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="application-gallery.html" class='sidebar-link'>
                    <i class="bi bi-image-fill"></i>
                    <span>Photo Gallery</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="application-checkout.html" class='sidebar-link'>
                    <i class="bi bi-basket-fill"></i>
                    <span>Checkout Page</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Authentication</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="auth-login.html" class="submenu-link">Login</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="auth-register.html" class="submenu-link">Register</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="auth-forgot-password.html" class="submenu-link">Forgot Password</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-x-octagon-fill"></i>
                    <span>Errors</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="error-403.html" class="submenu-link">403</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="error-404.html" class="submenu-link">404</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="error-500.html" class="submenu-link">500</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
            <li class="sidebar-title">Raise Support</li>
            
            <li
                class="sidebar-item  ">
                <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>Documentation</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Contribute</span>
                </a>
                

            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer#donation" class='sidebar-link'>
                    <i class="bi bi-cash"></i>
                    <span>Donate</span>
                </a>
                

            </li>
            
        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dripicons</h3>
                <p class="text-subtitle text-muted">Get over 1,000+ icons with Dripicons.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dripicons</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Icon List</h4>
            </div>
            <div class="card-body">
                <ul class="icons">
                    <ul class="glyphs css-mapping">
                        <li>
                            <div class="icon dripicons dripicons-alarm"></div>
                            <input type="text" readonly="readonly" value="alarm">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-align-center"></div>
                            <input type="text" readonly="readonly" value="align-center">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-align-justify"></div>
                            <input type="text" readonly="readonly" value="align-justify">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-align-left"></div>
                            <input type="text" readonly="readonly" value="align-left">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-align-right"></div>
                            <input type="text" readonly="readonly" value="align-right">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-anchor"></div>
                            <input type="text" readonly="readonly" value="anchor">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-archive"></div>
                            <input type="text" readonly="readonly" value="archive">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-down"></div>
                            <input type="text" readonly="readonly" value="arrow-down">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-left"></div>
                            <input type="text" readonly="readonly" value="arrow-left">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-right"></div>
                            <input type="text" readonly="readonly" value="arrow-right">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-thin-down"></div>
                            <input type="text" readonly="readonly" value="arrow-thin-down">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-thin-left"></div>
                            <input type="text" readonly="readonly" value="arrow-thin-left">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-thin-right"></div>
                            <input type="text" readonly="readonly" value="arrow-thin-right">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-thin-up"></div>
                            <input type="text" readonly="readonly" value="arrow-thin-up">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-arrow-up"></div>
                            <input type="text" readonly="readonly" value="arrow-up">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-article"></div>
                            <input type="text" readonly="readonly" value="article">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-backspace"></div>
                            <input type="text" readonly="readonly" value="backspace">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-basket"></div>
                            <input type="text" readonly="readonly" value="basket">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-basketball"></div>
                            <input type="text" readonly="readonly" value="basketball">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-battery-empty"></div>
                            <input type="text" readonly="readonly" value="battery-empty">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-battery-full"></div>
                            <input type="text" readonly="readonly" value="battery-full">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-battery-low"></div>
                            <input type="text" readonly="readonly" value="battery-low">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-battery-medium"></div>
                            <input type="text" readonly="readonly" value="battery-medium">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-bell"></div>
                            <input type="text" readonly="readonly" value="bell">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-blog"></div>
                            <input type="text" readonly="readonly" value="blog">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-bluetooth"></div>
                            <input type="text" readonly="readonly" value="bluetooth">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-bold"></div>
                            <input type="text" readonly="readonly" value="bold">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-bookmark"></div>
                            <input type="text" readonly="readonly" value="bookmark">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-bookmarks"></div>
                            <input type="text" readonly="readonly" value="bookmarks">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-box"></div>
                            <input type="text" readonly="readonly" value="box">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-briefcase"></div>
                            <input type="text" readonly="readonly" value="briefcase">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-brightness-low"></div>
                            <input type="text" readonly="readonly" value="brightness-low">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-brightness-max"></div>
                            <input type="text" readonly="readonly" value="brightness-max">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-brightness-medium"></div>
                            <input type="text" readonly="readonly" value="brightness-medium">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-broadcast"></div>
                            <input type="text" readonly="readonly" value="broadcast">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-browser"></div>
                            <input type="text" readonly="readonly" value="browser">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-browser-upload"></div>
                            <input type="text" readonly="readonly" value="browser-upload">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-brush"></div>
                            <input type="text" readonly="readonly" value="brush">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-calendar"></div>
                            <input type="text" readonly="readonly" value="calendar">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-camcorder"></div>
                            <input type="text" readonly="readonly" value="camcorder">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-camera"></div>
                            <input type="text" readonly="readonly" value="camera">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-card"></div>
                            <input type="text" readonly="readonly" value="card">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-cart"></div>
                            <input type="text" readonly="readonly" value="cart">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-checklist"></div>
                            <input type="text" readonly="readonly" value="checklist">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-checkmark"></div>
                            <input type="text" readonly="readonly" value="checkmark">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-chevron-down"></div>
                            <input type="text" readonly="readonly" value="chevron-down">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-chevron-left"></div>
                            <input type="text" readonly="readonly" value="chevron-left">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-chevron-right"></div>
                            <input type="text" readonly="readonly" value="chevron-right">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-chevron-up"></div>
                            <input type="text" readonly="readonly" value="chevron-up">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-clipboard"></div>
                            <input type="text" readonly="readonly" value="clipboard">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-clock"></div>
                            <input type="text" readonly="readonly" value="clock">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-clockwise"></div>
                            <input type="text" readonly="readonly" value="clockwise">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-cloud"></div>
                            <input type="text" readonly="readonly" value="cloud">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-cloud-download"></div>
                            <input type="text" readonly="readonly" value="cloud-download">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-cloud-upload"></div>
                            <input type="text" readonly="readonly" value="cloud-upload">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-code"></div>
                            <input type="text" readonly="readonly" value="code">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-contract"></div>
                            <input type="text" readonly="readonly" value="contract">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-contract-2"></div>
                            <input type="text" readonly="readonly" value="contract-2">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-conversation"></div>
                            <input type="text" readonly="readonly" value="conversation">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-copy"></div>
                            <input type="text" readonly="readonly" value="copy">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-crop"></div>
                            <input type="text" readonly="readonly" value="crop">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-cross"></div>
                            <input type="text" readonly="readonly" value="cross">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-crosshair"></div>
                            <input type="text" readonly="readonly" value="crosshair">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-cutlery"></div>
                            <input type="text" readonly="readonly" value="cutlery">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-device-desktop"></div>
                            <input type="text" readonly="readonly" value="device-desktop">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-device-mobile"></div>
                            <input type="text" readonly="readonly" value="device-mobile">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-device-tablet"></div>
                            <input type="text" readonly="readonly" value="device-tablet">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-direction"></div>
                            <input type="text" readonly="readonly" value="direction">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-disc"></div>
                            <input type="text" readonly="readonly" value="disc">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-document"></div>
                            <input type="text" readonly="readonly" value="document">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-document-delete"></div>
                            <input type="text" readonly="readonly" value="document-delete">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-document-edit"></div>
                            <input type="text" readonly="readonly" value="document-edit">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-document-new"></div>
                            <input type="text" readonly="readonly" value="document-new">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-document-remove"></div>
                            <input type="text" readonly="readonly" value="document-remove">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-dot"></div>
                            <input type="text" readonly="readonly" value="dot">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-dots-2"></div>
                            <input type="text" readonly="readonly" value="dots-2">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-dots-3"></div>
                            <input type="text" readonly="readonly" value="dots-3">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-download"></div>
                            <input type="text" readonly="readonly" value="download">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-duplicate"></div>
                            <input type="text" readonly="readonly" value="duplicate">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-enter"></div>
                            <input type="text" readonly="readonly" value="enter">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-exit"></div>
                            <input type="text" readonly="readonly" value="exit">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-expand"></div>
                            <input type="text" readonly="readonly" value="expand">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-expand-2"></div>
                            <input type="text" readonly="readonly" value="expand-2">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-experiment"></div>
                            <input type="text" readonly="readonly" value="experiment">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-export"></div>
                            <input type="text" readonly="readonly" value="export">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-feed"></div>
                            <input type="text" readonly="readonly" value="feed">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-flag"></div>
                            <input type="text" readonly="readonly" value="flag">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-flashlight"></div>
                            <input type="text" readonly="readonly" value="flashlight">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-folder"></div>
                            <input type="text" readonly="readonly" value="folder">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-folder-open"></div>
                            <input type="text" readonly="readonly" value="folder-open">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-forward"></div>
                            <input type="text" readonly="readonly" value="forward">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-gaming"></div>
                            <input type="text" readonly="readonly" value="gaming">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-gear"></div>
                            <input type="text" readonly="readonly" value="gear">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-graduation"></div>
                            <input type="text" readonly="readonly" value="graduation">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-graph-bar"></div>
                            <input type="text" readonly="readonly" value="graph-bar">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-graph-line"></div>
                            <input type="text" readonly="readonly" value="graph-line">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-graph-pie"></div>
                            <input type="text" readonly="readonly" value="graph-pie">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-headset"></div>
                            <input type="text" readonly="readonly" value="headset">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-heart"></div>
                            <input type="text" readonly="readonly" value="heart">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-help"></div>
                            <input type="text" readonly="readonly" value="help">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-home"></div>
                            <input type="text" readonly="readonly" value="home">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-hourglass"></div>
                            <input type="text" readonly="readonly" value="hourglass">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-inbox"></div>
                            <input type="text" readonly="readonly" value="inbox">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-information"></div>
                            <input type="text" readonly="readonly" value="information">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-italic"></div>
                            <input type="text" readonly="readonly" value="italic">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-jewel"></div>
                            <input type="text" readonly="readonly" value="jewel">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-lifting"></div>
                            <input type="text" readonly="readonly" value="lifting">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-lightbulb"></div>
                            <input type="text" readonly="readonly" value="lightbulb">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-link"></div>
                            <input type="text" readonly="readonly" value="link">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-link-broken"></div>
                            <input type="text" readonly="readonly" value="link-broken">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-list"></div>
                            <input type="text" readonly="readonly" value="list">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-loading"></div>
                            <input type="text" readonly="readonly" value="loading">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-location"></div>
                            <input type="text" readonly="readonly" value="location">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-lock"></div>
                            <input type="text" readonly="readonly" value="lock">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-lock-open"></div>
                            <input type="text" readonly="readonly" value="lock-open">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-mail"></div>
                            <input type="text" readonly="readonly" value="mail">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-map"></div>
                            <input type="text" readonly="readonly" value="map">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-loop"></div>
                            <input type="text" readonly="readonly" value="media-loop">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-next"></div>
                            <input type="text" readonly="readonly" value="media-next">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-pause"></div>
                            <input type="text" readonly="readonly" value="media-pause">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-play"></div>
                            <input type="text" readonly="readonly" value="media-play">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-previous"></div>
                            <input type="text" readonly="readonly" value="media-previous">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-record"></div>
                            <input type="text" readonly="readonly" value="media-record">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-shuffle"></div>
                            <input type="text" readonly="readonly" value="media-shuffle">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-media-stop"></div>
                            <input type="text" readonly="readonly" value="media-stop">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-medical"></div>
                            <input type="text" readonly="readonly" value="medical">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-menu"></div>
                            <input type="text" readonly="readonly" value="menu">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-message"></div>
                            <input type="text" readonly="readonly" value="message">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-meter"></div>
                            <input type="text" readonly="readonly" value="meter">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-microphone"></div>
                            <input type="text" readonly="readonly" value="microphone">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-minus"></div>
                            <input type="text" readonly="readonly" value="minus">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-monitor"></div>
                            <input type="text" readonly="readonly" value="monitor">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-move"></div>
                            <input type="text" readonly="readonly" value="move">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-music"></div>
                            <input type="text" readonly="readonly" value="music">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-network-1"></div>
                            <input type="text" readonly="readonly" value="network-1">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-network-2"></div>
                            <input type="text" readonly="readonly" value="network-2">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-network-3"></div>
                            <input type="text" readonly="readonly" value="network-3">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-network-4"></div>
                            <input type="text" readonly="readonly" value="network-4">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-network-5"></div>
                            <input type="text" readonly="readonly" value="network-5">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-pamphlet"></div>
                            <input type="text" readonly="readonly" value="pamphlet">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-paperclip"></div>
                            <input type="text" readonly="readonly" value="paperclip">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-pencil"></div>
                            <input type="text" readonly="readonly" value="pencil">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-phone"></div>
                            <input type="text" readonly="readonly" value="phone">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-photo"></div>
                            <input type="text" readonly="readonly" value="photo">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-photo-group"></div>
                            <input type="text" readonly="readonly" value="photo-group">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-pill"></div>
                            <input type="text" readonly="readonly" value="pill">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-pin"></div>
                            <input type="text" readonly="readonly" value="pin">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-plus"></div>
                            <input type="text" readonly="readonly" value="plus">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-power"></div>
                            <input type="text" readonly="readonly" value="power">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-preview"></div>
                            <input type="text" readonly="readonly" value="preview">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-print"></div>
                            <input type="text" readonly="readonly" value="print">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-pulse"></div>
                            <input type="text" readonly="readonly" value="pulse">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-question"></div>
                            <input type="text" readonly="readonly" value="question">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-reply"></div>
                            <input type="text" readonly="readonly" value="reply">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-reply-all"></div>
                            <input type="text" readonly="readonly" value="reply-all">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-return"></div>
                            <input type="text" readonly="readonly" value="return">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-retweet"></div>
                            <input type="text" readonly="readonly" value="retweet">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-rocket"></div>
                            <input type="text" readonly="readonly" value="rocket">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-scale"></div>
                            <input type="text" readonly="readonly" value="scale">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-search"></div>
                            <input type="text" readonly="readonly" value="search">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-shopping-bag"></div>
                            <input type="text" readonly="readonly" value="shopping-bag">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-skip"></div>
                            <input type="text" readonly="readonly" value="skip">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-stack"></div>
                            <input type="text" readonly="readonly" value="stack">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-star"></div>
                            <input type="text" readonly="readonly" value="star">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-stopwatch"></div>
                            <input type="text" readonly="readonly" value="stopwatch">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-store"></div>
                            <input type="text" readonly="readonly" value="store">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-suitcase"></div>
                            <input type="text" readonly="readonly" value="suitcase">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-swap"></div>
                            <input type="text" readonly="readonly" value="swap">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-tag"></div>
                            <input type="text" readonly="readonly" value="tag">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-tag-delete"></div>
                            <input type="text" readonly="readonly" value="tag-delete">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-tags"></div>
                            <input type="text" readonly="readonly" value="tags">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-thumbs-down"></div>
                            <input type="text" readonly="readonly" value="thumbs-down">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-thumbs-up"></div>
                            <input type="text" readonly="readonly" value="thumbs-up">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-ticket"></div>
                            <input type="text" readonly="readonly" value="ticket">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-time-reverse"></div>
                            <input type="text" readonly="readonly" value="time-reverse">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-to-do"></div>
                            <input type="text" readonly="readonly" value="to-do">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-toggles"></div>
                            <input type="text" readonly="readonly" value="toggles">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-trash"></div>
                            <input type="text" readonly="readonly" value="trash">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-trophy"></div>
                            <input type="text" readonly="readonly" value="trophy">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-upload"></div>
                            <input type="text" readonly="readonly" value="upload">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-user"></div>
                            <input type="text" readonly="readonly" value="user">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-user-group"></div>
                            <input type="text" readonly="readonly" value="user-group">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-user-id"></div>
                            <input type="text" readonly="readonly" value="user-id">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-vibrate"></div>
                            <input type="text" readonly="readonly" value="vibrate">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-view-apps"></div>
                            <input type="text" readonly="readonly" value="view-apps">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-view-list"></div>
                            <input type="text" readonly="readonly" value="view-list">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-view-list-large"></div>
                            <input type="text" readonly="readonly" value="view-list-large">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-view-thumb"></div>
                            <input type="text" readonly="readonly" value="view-thumb">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-volume-full"></div>
                            <input type="text" readonly="readonly" value="volume-full">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-volume-low"></div>
                            <input type="text" readonly="readonly" value="volume-low">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-volume-medium"></div>
                            <input type="text" readonly="readonly" value="volume-medium">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-volume-off"></div>
                            <input type="text" readonly="readonly" value="volume-off">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-wallet"></div>
                            <input type="text" readonly="readonly" value="wallet">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-warning"></div>
                            <input type="text" readonly="readonly" value="warning">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-web"></div>
                            <input type="text" readonly="readonly" value="web">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-weight"></div>
                            <input type="text" readonly="readonly" value="weight">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-wifi"></div>
                            <input type="text" readonly="readonly" value="wifi">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-wrong"></div>
                            <input type="text" readonly="readonly" value="wrong">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-zoom-in"></div>
                            <input type="text" readonly="readonly" value="zoom-in">
                        </li>
                        <li>
                            <div class="icon dripicons dripicons-zoom-out"></div>
                            <input type="text" readonly="readonly" value="zoom-out">
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </section>
</div>

            <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://saugi.me">Saugi</a></p>
        </div>
    </div>
</footer>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="assets/compiled/js/app.js"></script>
    

    
</body>

</html>