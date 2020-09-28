<html>
<head>
    <title>Paginacion sin BD</title>
</head>
<body>
    
    <div id="page_1">
        Contenido del div 1
    </div>    
    <div id="page_2" style="display:none">
        Contenido del div 2
    </div>    
    <div id="page_3" style="display:none">
        Contenido del div 3
    </div>    
    <div id="page_4" style="display:none">
        Contenido del div 4
    </div>
    <p>
        <a href="javascript:void(0);" paginacion="1">1</a>&nbsp;<a href="javascript:void(0);" paginacion="2">2</a>
        &nbsp;<a href="javascript:void(0);" paginacion="3">3</a>&nbsp;<a href="javascript:void(0);" paginacion="4">4</a>
    </p>
    <!-- jquery -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() { 
            $('a').on("click",function(){
                var paginacion = $(this).attr('paginacion');
                var div = "#page_"   paginacion;
                $("div[id!=" div "]").hide();
                $(div).fadeIn("slow");
            });
        });
    </script>
</body>
</html>