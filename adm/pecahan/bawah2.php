    <!-- START FOOTER -->
    <footer class="page-footer light-green accent-3">
        <div class="footer-copyright">
            <div class="container">
                Copyright © <?php echo date("Y"); ?> <a class="grey-text text-lighten-4" href="#!" target="_blank">Dela Inc</a>
                <!-- <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://www.codingae.blogspot.com">Codingae</a></span> -->
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- ================================================
    Scripts
    ================================================  -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>   
    <!-- materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!-- scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script> 
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>
    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>
    <!-- jvectormap-->
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/vectormap-script.js"></script>
    <!-- prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!-- plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <script src="js/plugins/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace('ckeditor1');
        });
    </script>
    <!-- DATA TABLE SCRIPTS 
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#data-table-simple').DataTable();
        });
    </script>-->
    <!-- Toast Notification 
    <script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Selamat Datang</span>', 1500);
        }, 3000);
        setTimeout(function() {
            Materialize.toast('<span>Ini percobaan 1</span>', 3000);
        }, 5500);
        setTimeout(function() {
            Materialize.toast('<span>Ini percobaan 2.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 18000);
    });
    </script>-->
    <!-- material not js 
    <script type="text/javascript" src="js/plugins/materialnote/ckMaterializeOverrides.js"></script>
    <script type="text/javascript" src="js/plugins/materialnote/codemirror.js"></script>
    <script type="text/javascript" src="js/plugins/materialnote/xml.js"></script>
    <script type="text/javascript" src="js/plugins/materialnote/materialNote.js"></script>    
    <script type="text/javascript">
        var toolbar = [
            ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['fonts', ['fontsize', 'fontname']],
            ['color', ['color']],
            ['undo', ['undo', 'redo', 'help']],
            ['ckMedia', ['ckImageUploader', 'ckVideoEmbeeder']],
            ['misc', ['link', 'picture', 'table', 'hr', 'codeview', 'fullscreen']],
            ['para', ['ul', 'ol', 'paragraph', 'leftButton', 'centerButton', 'rightButton', 'justifyButton', 'outdentButton', 'indentButton']],
            ['height', ['lineheight']],
        ];

        $('.editor').materialnote({
            toolbar: toolbar,
            height: 550,
            minHeight: 100,
            defaultBackColor: '#fff'
        });

        $('.editorAir').materialnote({
            airMode: true,
            airPopover: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']]
            ]
        });
    </script>     -->
    </body>
    </html>