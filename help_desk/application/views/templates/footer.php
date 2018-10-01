</div><!-- .animated -->
</div><!-- .content -->


<div><!-- /#right-panel -->

</div> <!-- basix-container -->

<!-- Right Panel -->

<!--Carga libreria de jquery -->
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<!--script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-23581568-13');
</script>
<-- evento -->

<script>
    $("#target").submit(function(event) {
        alert( "Alerta target" );
        event.preventDefault();
    });

    /*Búsqueda de oficio recepción*/
    $(function(e){
        $('#entrada').submit(function (e){
            e.preventDefault();
            $('#results').load('resultEntrada' + $('#entrada').serialize());
        });
    }); 
    
    /*Búsqueda de usuario*/
   $(function (e) {
        $('#usuario').submit(function (e) {
            e.preventDefault()
            $('#results').load('muestraUsuario' + $('#usuario').serialize()
        })
    });
    /*busqueda de oficio */
    $(function (e){
        $('#oficio').submit(function (e){
            e.preventDefault()
            $('#results').load('resultOficio' + $('#oficio').serialize())
        })
    });
    /*link de pdf*/
    $(#function(e){
        $('#pdf').click(function {
            e.preventDefault()
            
        })
    });
        
    
         
</script>

</body>
</html>
