<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?php include '../../dist/layouts/_sidebar.php'; ?>
        <!-- Sidebar -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                            <h3>List Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Material</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <a type="button" class="btn btn-outline-primary btn-sm me-2" href='tambah-bahan.php'>
                                        <i class="bi bi-plus-square bi-middle me-2"></i>
                                        Add
                                    </a>
                                    <a type="button" class="btn btn-outline-secondary btn-sm" id="printButton">
                                        <i class="bi bi-printer bi-middle me-2"></i>
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Material ID</th>
                                        <th>Material Name</th>
                                        <th>Material Category</th>
                                        <th>Sell Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="materialTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>

    <script>
        // Fetch data from API and populate table
        axios.get('http://localhost:3000/app/api/v1/material/all')
            .then(response => {
                const products = response.data.data;
                const tableBody = document.getElementById('materialTableBody');

                products.forEach(product => {
                    const row = `
                        <tr>
                            <td>${product.id_material}</td>
                            <td>${product.Materialname}</td>
                            <td>${product.Materialcategory}</td>
                            <td>${product.Sellprice}</td>
                            <td>
                                <a type="button" class="btn btn-outline-success btn-sm me-1" href='edit-bahan.php?id=${product.id_material}'>
                                    <i class="bi bi-pencil-square bi-middle"></i>
                                </a>
                                <a type="button" class="btn btn-outline-danger btn-sm" onclick="deleteMaterial('${product.id_material}')">
                                    <i class="bi bi-trash-fill bi-middle"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });

                // Initialize the DataTable after the table has been populated
                let dataTable = new simpleDatatables.DataTable(table1);
            })
            .catch(error => {
                console.error('There was an error fetching the materials!', error);
            });

        function deleteMaterial(id) {
            if (confirm(`Are you sure you want to delete material with ID ${id}?`)) {
                axios.delete(`http://localhost:3000/app/api/v1/materials/${id}`)
                    .then(response => {
                        alert('Material deleted successfully!');
                        location.reload(); // Reload the page to refresh the table
                    })
                    .catch(error => {
                        console.error('There was an error deleting the material!', error);
                        alert('Error deleting material.');
                    });
            }
        }

        document.getElementById('printButton').addEventListener('click', function() {
            axios({
                    url: 'http://localhost:3000/app/api/v1/material/pdf',
                    method: 'GET',
                    responseType: 'blob' // Important
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'materials.pdf'); // or any other name
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                })
                .catch((error) => {
                    console.error('There was an error downloading the PDF!', error);
                    alert('Error downloading PDF.');
                });
        });
        
    </script>

    <script src="../assets/js/main.js"></script>
</body>

</html>
