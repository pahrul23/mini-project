<!-- app/Views/tasks/add.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
    <!-- Load jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
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
        });
    </script>
</head>
<body>
    <h1>Tambah Tugas</h1>
    <form id="addTaskForm">
        <label for="judul">Judul Tugas:</label>
        <input type="text" name="judul" required>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
