<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manufacturing Order</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
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
                            <h3>Add Manufacturing Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../../dist/pages/list-mo.php">List Manufacturing Order</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Manufacturing Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col d-flex" style="padding: 30px;">
                                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn disabled btn-primary" id="draftButton">Draft</button>
                                                    <button type="button" class="btn disabled btn-primary" id="todoButton">Mark As Todo</button>
                                                    <button type="button" class="btn disabled btn-primary" id="availabilityButton">Check Availability</button>
                                                    <button type="button" class="btn disabled btn-primary" id="produceButton">Produce</button>
                                                    <button type="button" class="btn disabled btn-primary" id="doneButton">Mark As Done</button>
                                                </div>

                                            </div>
                                            <div class="col d-flex justify-content-end" style="padding: 30px;">
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-secondary btn-sm">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 style="text-align: left; padding: 40px; margin-top: -40px; margin-bottom: -20px">Product Reference</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row p-3">
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="productSelect" class="mb-2">Product</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="productSelect" disabled>
                                                            <option value="" disabled selected>- Choose Product -</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="bomSelect" class="mb-2">Bill of Material</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="bomSelect" disabled>
                                                            <option value="" disabled selected>- Choose Bill of Material -</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="quantityToProduce" class="mb-2">Quantity to Produce</label>
                                                    <div class="input-group mb-3">
                                                        <input disabled type="number" class="form-control" id="quantityToProduce" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Unit</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form">
                                        <div class="row p-3">
                                            <div class="table-responsive">
                                                <table class="table mt-3" id="materialTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>To Produce</th>
                                                            <th>Reserved</th>
                                                            <th>Consumed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="materialTabelBody">
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="material[]" class="form-control" required readonly>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="toProduce[]" class="form-control to-produce" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="reserved[]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="consumed[]" class="form-control consumed" required readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>

                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-4">
                                                <button type="button" class="btn btn-primary me-1 mb-1" id="saveButton" data-status="draft">Save</button>
                                                <button id="backToListButton" class="btn btn-primary d-none" onclick="window.location.href='list-bom.php';">
                                                    Back to List
                                                </button>
                                                <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="../../dist/pages/list-mo.php">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>

    </div>
    </div>

    <style>
        .highlighted {
            background-color: #28a745;
            /* Warna hijau terang atau sesuaikan */
            color: white;
            border-color: #28a745;
        }
    </style>


    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/main.js"></script>

    <!-- Import jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const moId = urlParams.get('id');

            // Buat variabel global untuk menyimpan kuantitas material
            let materialQuantities = {};
            let bomOverview = [];
            let allMaterialsAvailable = true;

            if (moId) {
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/mo/${moId}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.meta.code === 200) {
                            const data = response.data;

                            // Isi form dengan data dari API
                            $('#productSelect').append(`<option value="${data.id_product}" selected>${data.id_product}</option>`);
                            $('#bomSelect').append(`<option value="${data.id_bom}" selected>${data.id_bom}</option>`);
                            $('#quantityToProduce').val(data.qtytoproduce);

                            // Sesuaikan status tombol
                            if (data.status === 'draft') {
                                $('#draftButton').addClass('highlighted').removeClass('disabled');
                                $('#saveButton').text('Confirm');
                            } else if (data.status === 'confirmed') {
                                $('#todoButton').addClass('highlighted').removeClass('disabled');
                                $('#saveButton').text('Check Availability');
                            } else if (data.status === 'on progress') {
                                $('#produceButton').addClass('highlighted').removeClass('disabled');
                                $('#saveButton').text('Done');
                            } else if (data.status === 'done') {
                                $('#doneButton').addClass('highlighted').removeClass('disabled');
                            }

                            // Panggil fetchMaterialQuantities terlebih dahulu untuk mendapatkan data material, kemudian panggil fetchBOMOverview
                            fetchMaterialQuantities(() => {
                                fetchBOMOverview(data.id_bom, data.qtytoproduce);
                            });
                        } else {
                            console.error('Data tidak ditemukan');
                        }
                    },
                    error: function(error) {
                        console.error('Error saat mengambil data', error);
                    }
                });
            } else {
                console.error('ID tidak ditemukan di URL');
            }

            // Fungsi untuk mengambil kuantitas material
            function fetchMaterialQuantities(callback) {
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/material/all',
                    method: 'GET',
                    success: function(response) {
                        response.data.forEach(function(material) {
                            materialQuantities[material.Materialname] = material.Qty || 0;
                        });
                        callback(); // Panggil callback setelah data material diambil
                    },
                    error: function(error) {
                        Toastify({
                            text: "Failed to load materials",
                            duration: 3000,
                            gravity: "top",
                            backgroundColor: "#f44336"
                        }).showToast();
                    }
                });
            }

            // Fungsi untuk mengambil BOM dan mengisi tabel material
            function fetchBOMOverview(bomId, qtyToProduce) {
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/bom/${bomId}/overview`,
                    method: 'GET',
                    success: function(response) {
                        const materials = response.data.materials;
                        const materialTableBody = $('#materialTabelBody');
                        materialTableBody.empty();
                        bomOverview = materials; // Store BOM overview for future use

                        materials.forEach(function(material) {
                            const availableQty = materialQuantities[material.material] || 0;
                            const reservedQty = parseFloat(material.quantity) || 0;
                            const consumedQty = (reservedQty * qtyToProduce).toFixed(2);

                            const row = `
                        <tr>
                            <td><input type="text" name="material[]" class="form-control" value="${material.material}" readonly></td>
                            <td><input type="number" name="toProduce[]" class="form-control to-produce" value="${reservedQty}" readonly></td>
                            <td><input type="number" name="reserved[]" class="form-control" value="${availableQty}" readonly></td>
                            <td><input type="number" name="consumed[]" class="form-control consumed" value="${consumedQty}" readonly></td>
                        </tr>`;
                            materialTableBody.append(row);
                        });
                        checkMaterialAvailability();
                    },
                    error: function(error) {
                        Toastify({
                            text: "Failed to load BOM overview",
                            duration: 3000,
                            gravity: "top",
                            backgroundColor: "#f44336"
                        }).showToast();
                    }
                });
            }

            // Event listener untuk tombol "Confirm"
            $('#saveButton').click(function() {
                if ($(this).text() === 'Confirm') {
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/mo/status/confirm',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id_mo: moId
                        }),
                        success: function(response) {
                            if (response.meta.code === 200) {
                                $('#saveButton').text('Check Availability');
                                $('#todoButton').removeClass('disabled').addClass('highlighted');
                                $('#draftButton').removeClass('highlighted').addClass('disabled');
                            }
                        },
                        error: function(error) {
                            Toastify({
                                text: "Failed to update MO status",
                                duration: 3000,
                                gravity: "top",
                                backgroundColor: "#f44336"
                            }).showToast();
                        }
                    });
                } else if ($(this).text() === 'Check Availability') {
                    let allMaterialsAvailable = true;
                    $('#materialTabelBody tr').each(function() {
                        const reserved = parseFloat($(this).find('input[name="reserved[]"]').val());
                        const consumed = parseFloat($(this).find('input[name="consumed[]"]').val());

                        if (reserved < consumed) {
                            $(this).find('input[name="consumed[]"]').addClass('bg-danger').removeClass('bg-success');
                            allMaterialsAvailable = false;
                        } else {
                            $(this).find('input[name="consumed[]"]').addClass('bg-success').removeClass('bg-danger');
                        }
                    });

                    if (allMaterialsAvailable) {
                        $('#saveButton').text('Produce');
                        $('#availabilityButton').removeClass('disabled').addClass('highlighted');
                        $('#todoButton').removeClass('highlighted').addClass('disabled');
                    } else {
                        $('#saveButton').text('Check Availability');
                        $('#produceButton').addClass('disabled').removeClass('highlighted');
                    }
                } else if ($(this).text() === 'Produce') {
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/mo/status/confirm',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id_mo: moId
                        }),
                        success: function(response) {
                            if (response.meta.code === 200) {
                                Toastify({
                                    text: "Production started",
                                    duration: 3000,
                                    gravity: "top",
                                    backgroundColor: "#4CAF50"
                                }).showToast();
                                $('#doneButton').removeClass('disabled').addClass('highlighted');
                                $('#produceButton').removeClass('disabled').addClass('highlighted');
                            }
                        },
                        error: function(error) {
                            Toastify({
                                text: "Failed to start production",
                                duration: 3000,
                                gravity: "top",
                                backgroundColor: "#f44336"
                            }).showToast();
                        }
                    });
                } else if ($(this).text() === 'Done') {
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/mo/status/confirm',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id_mo: moId
                        }),
                        success: function(response) {
                            if (response.meta.code === 200) {
                                Toastify({
                                    text: "Done",
                                    duration: 3000,
                                    gravity: "top",
                                    backgroundColor: "#4CAF50"
                                }).showToast();
                                $('#doneButton').removeClass('disabled').addClass('highlighted');
                                $('#produceButton').removeClass('disabled').addClass('highlighted');
                                $('#backToListButton').removeClass('d-none').addClass('highlighted');
                            }
                        },
                        error: function(error) {
                            Toastify({
                                text: "Failed done",
                                duration: 3000,
                                gravity: "top",
                                backgroundColor: "#f44336"
                            }).showToast();
                        }
                    });
                }
            });


        });
    </script>










</body>

</html>