<script>
    if ('<?php echo $calcolation->status ?>' === '1') {
        var data = JSON.parse('<?php echo $data ?>');
        InstanceOfFileProceder.Proced(data);
    }
</script>
