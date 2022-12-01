<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
  <title>GoGoBook</title>
  <link rel="stylesheet" href="{{ url('css/custom-pixie.css') }}">
</head>
<body>
<div class="header-main pixie-header">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <a href="{{ url('/') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
    </div>
    <div class="head-but"><div class="blef">{{ $book->format }}</div> <div class="brig">{{ $book->cover }}<br>{{ $book->pages }} strana</div></div> 
    <div class="head-but head-but-wh">{{ $book->price }} <span>RSD</span></div> 
    <div class="login-nav pixie-head-nav">
        <a class="head-but btn" href="#">SAČUVAJ</a> <a class="head-but btn" href="#">POGLEDAJ</a> <a class="head-but btn grn" href="#">PORUČI</a>
    </div>

</div>
<div id="editor-container"></div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ url('pixie/dist/pixie.umd.js') }}"></script>
<script>
    const pixie = new Pixie({
        selector: "#editor-container",
        crossOrigin: true,
        baseUrl: "{{ url('/pixie/assets') }}",
        blankCanvasSize: {width: 800, height: 600},
        ui: {
            activeTheme: 'light',
            showExportPanel: true,
            openImageDialog: {
                show: true,
                sampleImages: [
                    {
                        url: 'images/samples/sample1.jpg',
                        thumbnail: 'images/samples/sample1_thumbnail.jpg',
                    },
                    {
                        url: 'images/samples/sample2.jpg',
                        thumbnail: 'images/samples/sample2_thumbnail.jpg',
                    },
                    {
                        url: 'images/samples/sample3.jpg',
                        thumbnail: 'images/samples/sample3_thumbnail.jpg',
                    },
                ]
            },
            nav: {
                replaceDefault: true,
                items: [
                    {name: 'Foto', icon: "{{ url('img/fotog.png') }}", action: function() {
                        pixie.tools.import.uploadAndAddImage();
                    }},
                    {name: 'šablon', icon: "{{ url('img/sabloni.png') }}", action: 'frame'},
                    {name: 'Pozadine', icon: "{{ url('img/pozadine.png') }}", action: function() {
                        pixie.tools.import.uploadAndReplaceMainImage();
                    }},
                    {name: 'Stikeri', icon: "{{ url('img/stikeri.png') }}", action: 'stickers'},
                    {name: 'Text', icon: "{{ url('img/tekstitem.png') }}", action: 'text'},
                ],
            }
        },
        onSave: async function(data) {
            console.log(data);
        },
        onLoad: function() {
            
            
            //document.querySelector('p').appendChild( clone );
        }
    });

    //pixie.tools.import.uploadAndAddImage();

    

    jQuery(document).ready(function($){
        // clone canvas
        var clone = $('.krle-canvas-wrap > .relative.m-auto').clone();
        clone.css("opacity","1");
        clone.find('.canvas-container').css({"width": "800px", "height": "600px"});
        
        var noPages = {{ $book->pages }};
        console.log(noPages);
        for (var i = 1; i < parseInt(noPages); i++) {
           // console.log("aaa");
            var clone = $('.krle-canvas-wrap > .relative.m-auto:first-child').clone();
            clone.css("opacity","1");
            clone.find('.canvas-container').css({"width": "800px", "height": "600px"});
            clone.attr("page-no-container", i);
            $(".krle-canvas-wrap").append(clone);


        };
        
        
        //console.log(pixie.getState());
        //console.log(pixie.tools.import);
        //console.log(pixie.tools.objects.getAll());
    });
</script>
</body>
</html>
