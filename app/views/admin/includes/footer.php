
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <?=Config::get('default/project_title')?> &copy; <?=date("Y")?> - Developed By Devugo
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="<?=$this->domain()?>/home">Home</a>
                            <a href="<?=$this->domain()?>/home#about_page">About Us</a>
                            <a href="<?=$this->domain()?>/home#contact_page">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->


        <!-- App js -->
        <script src="<?=$assets?>/js/vendor.min.js"></script>
        <script src="<?=$assets?>/js/app.min.js"></script>

        

        <!-- third party js -->
        <script src="<?=$assets?>/js/vendor/jquery.dataTables.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.bootstrap4.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.responsive.min.js"></script>
        <script src="<?=$assets?>/js/vendor/responsive.bootstrap4.min.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.buttons.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.bootstrap4.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.html5.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.flash.min.js"></script>
        <script src="<?=$assets?>/js/vendor/buttons.print.min.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="<?=$assets?>/js/vendor/dataTables.select.min.js"></script>
        <!-- third party js ends -->

        
        <script src="<?=$assets?>/js/devugo_notification.js"></script>

        <!-- demo app -->
        <script src="<?=$assets?>/js/pages/datatables.init.js"></script>
        <!-- end demo js-->

    </body>
    <?php Session::delete('inputs-errors');?>

<!-- Mirrored from coderthemes.com/simulor/horizontal/tables-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:07:59 GMT -->
</html>
