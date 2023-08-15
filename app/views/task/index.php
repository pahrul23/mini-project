<!-- app/Views/tasks/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas</title>
    <!-- Load DataTables and jQuery libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tasksTable').DataTable();
        });
    </script>
</head>
<body>
    <h1>Daftar Tugas</h1>
    <table id="tasksTable">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['judul'] ?></td>
                <td><input type="checkbox" class="status-checkbox" data-task-id="<?= $task['id'] ?>" <?= $task['status'] == 1 ? 'checked' : '' ?>></td>
                <td>...</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Fungsi untuk menambahkan tugas
        $('#addTaskForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?= base_url('tasks/addTask') ?>',
                data: $('#addTaskForm').serialize(),
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }
            });
        });

        // Fungsi untuk mengubah status tugas
        $('.status-checkbox').on('change', function () {
            const task_id = $(this).data('task-id');
            const status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                type: 'post',
                url: '<?= base_url('tasks/updateStatus') ?>/' + task_id,
                data: { status: status },
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
    });
</script>

</body>
</html>
