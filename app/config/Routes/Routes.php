$routes->get('/', 'TasksController::index'); // Halaman Utama
$routes->post('/tasks/add', 'TasksController::addTask'); // Tambah Tugas (Ajax)
$routes->post('/tasks/update/(:num)', 'TasksController::updateStatus/$1'); // Update Status Tugas (Ajax)

