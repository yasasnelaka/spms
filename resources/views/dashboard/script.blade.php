
<!-- SCRIPTS  -->
<!-- JQuery  -->
<!-- JQuery -->
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>

<script type="text/javascript" src="../../js/addons-pro/steppers.js"></script>
<!-- Stepper JavaScript - minified -->
<script type="text/javascript" src="../../js/addons-pro/steppers.min.js"></script>

<script>
    $(document).ready(function () {
        $('.stepper').mdbStepper();
    });

    function someFunction21() {
        setTimeout(function () {
            $('#horizontal-stepper').nextStep();
        }, 2000);
    }
</script>


<!-- DataTables  -->
<script type="text/javascript" src="../../js/addons/datatables.min.js"></script>
<!-- DataTables Select  -->
<script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>
<!-- Custom scripts -->

<script>$('.toast').toast('show');</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {

        $('#table1').DataTable();

    });
</script>
