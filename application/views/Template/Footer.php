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
	$(document).ready(function() {
		$('#tmtdate .input-group.date').datepicker({                
	        todayBtn: "linked",
	        keyboardNavigation: false,
	        forceParse: false,
	        autoclose: true,
	        calendarWeeks : true,
	        format: "yyyy-mm-dd"
	    });
	    $('#tmtdate2 .input-group.date').datepicker({                
	        todayBtn: "linked",
	        keyboardNavigation: false,
	        forceParse: false,
	        autoclose: true,
	        calendarWeeks : true,
	        format: "yyyy-mm-dd"
	    });
	});
	
	
	
	
	
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


<!-- Mainly scripts -->
<script src="<?=base_url('assets/')?>js/popper.min.js"></script>
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

<script>
    <?= $this->session->flashdata('msg') ?>
</script>
</body>

</html>
