
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.png')}}" />
    <title>Event Solution Nepal - Brochure</title>
    <link rel='stylesheet' href="{{asset('assets/frontend/css/ipages.min.css')}}" type='text/css' media='all' />
</head>
<body>
    @php
        $brochure=$event->brochure();
    @endphp
    <p>
        <small>
                Note: Please disable download extension like IDM. If you are facing the problem viewing it please click download.
                [ <a href="{{$brochure->media}}" target="_blank"><b><u>Download</u></b></a> ]
        </small>
    </p>
    <div id="flipbook" data-pdf-disable-range-requests="false" class="ipgs ipgs-theme-default"></div>
    <script src="{{asset('assets/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('assets/frontend/js/pdf.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.ipages.min.js')}}" ></script>
    <script>

        jQuery(document).ready(function() {
            var options = {
                responsive:true,
                autoFit:false,
                autoHeight: false,
                containerHeight:'100%',
                padding:{
                    top:50,
                    left:50,
                    right:50,
                    bottom:50
                },

                pdfUrl: '{{$brochure->media}}',
                pdfAutoCreatePages: true,
                pdfBookSizeFromDocument: true,

                zoom:1,
                zoomMin:0.5,

                toolbarControls: [
                    {type:'share',        active:false},
                    {type:'outline',      active:true},
                    {type:'thumbnails',   active:true},
                    {type:'sound',        active:true, optional: false},
                    {type:'gotofirst',    active:true},
                    {type:'prev',         active:true},
                    {type:'pagenumber',   active:true},
                    {type:'next',         active:true},
                    {type:'gotolast',     active:true},
                    {type:'zoom-in',      active:false},
                    {type:'zoom-out',     active:false},
                    {type:'zoom-default', active:true, optional: false},
                    {type:'optional',     active:false},
                    {type:'download',     active:true, optional: false},
                    {type:'fullscreen',   active:true, optional: false},
                ],

            };

            jQuery('#flipbook').ipages(options);

            // Events
            jQuery('#flipbook').on('ipages:ready', function(e, plugin) {
                console.log('event:ready');
            });

            jQuery('#flipbook').on('ipages:showpage', function(e, plugin, page) {
                console.log('event:showpage [' + page + ']');
            });

            jQuery('#flipbook').on('ipages:hidepage', function(e, plugin, page) {
                console.log('event:hidepage [' + page + ']');
            });
        });

    </script>
</body>
</html>
