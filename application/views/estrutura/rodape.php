<script src="<?= base_url('assets/plugins/jquery/jquery-2.2.4.min.js'); ?>"></script>

<?php
if (!empty($js)) {
    foreach ($js as $cada) {
        echo '<script src="' . base_url() . $cada . V . '" type="text/javascript"></script>';
    }
}

if (!empty($js_defer)) {
    foreach ($js_defer as $cada) {
        echo '<script defer src="' . base_url() . $cada . V . '" type="text/javascript"></script>';
    }
}
?>


</body>
</html>