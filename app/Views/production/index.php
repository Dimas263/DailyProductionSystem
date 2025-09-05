<!DOCTYPE html>
<html>
<head>
    <title>Daily Production System</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
<h2>Daily Production System</h2>

<form id="productionForm">
    <select name="MachineID" required>
        <?php foreach($machines as $m): ?>
            <option value="<?= $m['MachineID'] ?>"><?= $m['MachineName'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="date" name="ProductionDate" required>
    <select name="Shift">
        <option>Shift 1</option>
        <option>Shift 2</option>
        <option>Shift 3</option>
    </select>
    <input type="number" name="OutputQty" placeholder="Output">
    <input type="number" name="DefectQty" placeholder="Defect">
    <button type="submit">Save</button>
</form>

<hr>

<table id="productionTable" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Machine</th>
        <th>Date</th>
        <th>Shift</th>
        <th>Output</th>
        <th>Defect</th>
        <th>Action</th>
    </tr>
    </thead>
</table>

<script>
    $(document).ready(function(){
        let table = $('#productionTable').DataTable({
            ajax: "<?= site_url('production/getData') ?>",
            columns: [
                { data: "ProductionID" },
                { data: "MachineName" },
                { data: "ProductionDate" },
                { data: "Shift" },
                { data: "OutputQty" },
                { data: "DefectQty" },
                {
                    data: "ProductionID",
                    render: function(data){
                        return `
                                <button onclick="editData(${data})">Edit</button>
                                <button onclick="deleteData(${data})">Delete</button>
                            `;
                    }
                }
            ]
        });

        $('#productionForm').submit(function(e){
            e.preventDefault();
            $.post("<?= site_url('production/save') ?>", $(this).serialize(), function(res){
                if(res.status === 'success'){
                    table.ajax.reload();
                    $('#productionForm')[0].reset();
                }
            }, 'json');
        });
    });

    function editData(id){
        // Ambil data baris dari DataTable
        let rowData = $('#productionTable').DataTable().row($('#productionTable button[onclick="editData('+id+')"]').parents('tr')).data();

        // Isi form dengan data
        $('select[name="MachineID"]').val(rowData.MachineID);
        $('input[name="ProductionDate"]').val(rowData.ProductionDate);
        $('select[name="Shift"]').val(rowData.Shift);
        $('input[name="OutputQty"]').val(rowData.OutputQty);
        $('input[name="DefectQty"]').val(rowData.DefectQty);

        // Ubah form submit untuk update
        $('#productionForm').off('submit').submit(function(e){
            e.preventDefault();
            $.post("<?= site_url('production/update') ?>/" + id, $(this).serialize(), function(res){
                if(res.status === 'updated'){
                    $('#productionTable').DataTable().ajax.reload();
                    $('#productionForm')[0].reset();

                    // Reset form submit ke save
                    $('#productionForm').off('submit').submit(saveHandler);
                }
            }, 'json');
        });
    }

    function saveHandler(e){
        e.preventDefault();
        $.post("<?= site_url('production/save') ?>", $(this).serialize(), function(res){
            if(res.status === 'success'){
                $('#productionTable').DataTable().ajax.reload();
                $('#productionForm')[0].reset();
            }
        }, 'json');
    }

    // Pas page load, bind save handler
    $('#productionForm').submit(saveHandler);

    function deleteData(id){
        $.post("<?= site_url('production/delete') ?>/" + id, function(res){
            if(res.status === 'deleted'){
                $('#productionTable').DataTable().ajax.reload();
            }
        }, 'json');
    }
</script>
</body>
</html>
