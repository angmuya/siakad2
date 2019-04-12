<div class="footer" >
    <div class="float-right">
        SIAKAD Beta Version 1.0
    </div>
    <div>
        <strong>Copyright</strong> STIA SATYA NEGARA &copy; 2019
    </div>
</div>

</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            $('.dataTables-mhs').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
            });

            $('.summernote').summernote({height:300});

            var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code4"), {
                lineNumbers: true,
                matchBrackets: true
            });


            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            

        });
</script>

<!--tambahan dari Bootstrap-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>


<!-- Mainly scripts -->
<script src="<?=base_url('assets/')?>js/bootstrap.js"></script>
<script src="<?=base_url('assets/')?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url('assets/')?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url("assets/admin/js/plugins/dataTables/datatables.min.js")?>"></script>
<script src="<?=base_url("assets/admin/js/plugins/dataTables/dataTables.bootstrap4.min.js")?>"></script>

<!-- Date Picker-->
<script src="<?php echo base_url('assets');?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url('assets/')?>js/inspinia.js"></script>
<script src="<?=base_url('assets/')?>js/plugins/pace/pace.min.js"></script>

<script src="<?=base_url('assets/')?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url('assets');?>/js/plugins/jquery-autocomplete.js"></script>

    <!-- Mainly scripts -->


    <!-- Chosen -->
    <script src="<?php echo base_url('assets');?>/js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="<?php echo base_url('assets');?>/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="<?php echo base_url('assets');?>/js/plugins/jasny/jasny-bootstrap.min.js"></script>


   <!-- Switchery -->
   <script src="<?php echo base_url('assets');?>/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?php echo base_url('assets');?>/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url('assets');?>/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="<?php echo base_url('assets');?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?php echo base_url('assets');?>/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="<?php echo base_url('assets');?>/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="<?php echo base_url('assets');?>/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo base_url('assets');?>/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo base_url('assets');?>/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url('assets');?>/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo base_url('assets');?>/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="<?php echo base_url('assets');?>/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="<?php echo base_url('assets');?>/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>
	
    <script src="<?php echo base_url('assets');?>/js/data_plug.js"></script>

<script>
    <?= $this->session->flashdata('msg') ?>
</script>

</body>

</html>
