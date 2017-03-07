    <!-- footer content -->
    <footer>
        <div class="pull-right">
            {{ trans('master.name') }} -  Bootstrap Admin Template {{ (\Request::route()->getName()) }}
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    @if (isset($sedesjson)) 
    <script type="text/javascript">
    	var sedesjson = <?php echo json_encode($sedesjson); ?>;
    </script>
    @endif
    @if (isset($zonalesjson)) 
    <script type="text/javascript">
    	var zonalesjson = <?php echo json_encode($zonalesjson); ?>;
    </script>
    @endif
    @if (isset($clientesjson)) 
    <script type="text/javascript">
    	var clientesjson = <?php echo json_encode($clientesjson); ?>;
    </script>
    @endif
