<!DOCTYPE html>
<html>

<head>
    <title>Daftar Buku</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<body x-data="{open:false}">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <nav class="relative bg-green-900 after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="h-8 w-auto" />
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                            <a href="#" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Team</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <el-dropdown class="relative ml-3">
                        <button class="relative flex rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-8 rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10" />
                        </button>

                        <el-menu anchor="bottom end" popover class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Your profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Sign out</a>
                        </el-menu>
                    </el-dropdown>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                <a href="#" aria-current="page" class="block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white">Dashboard</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Team</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
            </div>
        </el-disclosure>
    </nav>

    <div class="flex flex-col gap-5 p-5">

        <div class="col-md-6">
            <div class="card collapsed-card flex- flex-col gap-5" id="card_project">
                <div class="card-header flex justify-between p-3">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Form Data Nasabah</h3>

                    <button @click="open = !open" type="button" data-card-widget="collapse" title="Collapse"
                        class="bg-green-500 hover:bg-green-600 text-white  btn btn-tool font-medium px-4 py-2 rounded-md shadow-sm transition">
                        <span><i :class="open ? 'fas fa-minus' : 'fas fa-plus'"></i></span> Tambah Data
                    </button>
                </div>
                <div class="card-body p-5 bg-gray-100 rounded-lg" style="display: none">
                    <form id="form_book" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id">
                        <input type="hidden" name="_method" value="POST">

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label for="judul" class="text-sm font-medium text-gray-700">Judul</label>
                                <input type="text" name="judul" id="judul"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Masukkan judul buku" required>
                            </div>

                            <div class="flex flex-col">
                                <label for="pengarang" class="text-sm font-medium text-gray-700">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Nama pengarang" required>
                            </div>

                            <div class="flex flex-col">
                                <label for="penerbit" class="text-sm font-medium text-gray-700">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Nama penerbit" required>
                            </div>

                            <div class="flex flex-col">
                                <label for="tahun_terbit" class="text-sm font-medium text-gray-700">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" id="tahun_terbit"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="2023" min="1900" max="2099" required>
                            </div>

                            <div class="flex flex-col">
                                <label for="jumlah_halaman" class="text-sm font-medium text-gray-700">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" id="jumlah_halaman"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="300" min="1" required>
                            </div>

                            <div class="flex flex-col col-span-1">
                                <label for="kategori" class="text-sm font-medium text-gray-700">Kategori</label>
                                <select name="kategori" id="kategori"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                                    <option value="" selected>Pilih Kategori</option>
                                    <option value="Fiksi">Fiksi</option>
                                    <option value="NonFiksi">Non Fiksi</option>
                                    <option value="fantasi">Fantasi</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="isbn" class="text-sm font-medium text-gray-700">ISBN</label>
                                <input type="text" name="isbn" id="isbn"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="978-602-XXXX-XXXX" required>
                            </div>

                            <div class="flex flex-col col-span-1">
                                <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status"
                                    class="border rounded-md p-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                                    <option value="" disabled selected>Pilih status</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="dipinjam">Dipinjam</option>
                                    <option value="rusak">Rusak</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 mt-4">
                            <button type="submit"
                                class="btn-simpan bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-md shadow-md transition">
                                <i class="fa fa-update"></i> Simpan Buku
                            </button>
                            <button type="button" class="btn-cancel bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md shadow-md d-none">
                                <i class="fa fa-times"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="p-5 gap-5 flex flex-col bg-gray-100">
            <h1>Daftar Buku</h1>

            <table id="booksTable" class="min-w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Halaman</th>
                        <th>Kategori</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php $no = 1; ?>
                    <?php foreach ($books as $book): ?>
                        <tr class="even:bg-gray-100">
                            <td><?= $no++; ?></td>
                            <td><?= esc($book['judul']); ?></td>
                            <td><?= esc($book['pengarang']); ?></td>
                            <td><?= esc($book['penerbit']); ?></td>
                            <td><?= esc($book['tahun_terbit']); ?></td>
                            <td><?= esc($book['jumlah_halaman']); ?></td>
                            <td><?= esc($book['kategori']); ?></td>
                            <td><?= esc($book['isbn']); ?></td>
                            <td><?= esc($book['status']); ?></td>
                            <td class="flex gap-5">
                                <button type="button"
                                    data-id="<?= esc($book['id']); ?>"
                                    data-judul="<?= esc($book['judul']); ?>"
                                    data-pengarang="<?= esc($book['pengarang']); ?>"
                                    data-penerbit="<?= esc($book['penerbit']); ?>"
                                    data-tahun_terbit="<?= esc($book['tahun_terbit']); ?>"
                                    data-kategori="<?= esc($book['kategori']); ?>"
                                    data-jumlah_halaman="<?= esc($book['jumlah_halaman']); ?>"
                                    data-isbn="<?= esc($book['isbn']); ?>"
                                    data-status="<?= esc($book['status']); ?>"
                                    class="bg-gray-900 btn-edit p-3 text-white font-bold rounded-lg">Update</button>
                                <button type="button" data-id="<?= esc($book['id']); ?>" class=" bg-red-500 btn-delete p-3 font-bold rounded-lg text-white">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- jQuery (DataTables dependency) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#booksTable').DataTable({
                pageLength: 5, // jumlah row per halaman
                lengthMenu: [5, 10, 25, 50],
                responsive: true,
                columnDefs: [{
                        orderable: false,
                        targets: 0
                    } // kolom No tidak bisa di-sort
                ]
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        $(document).ready(function() {
            const $card = $('#card_project');

            const $icon = $(this).find('i');
            $(document).on('click', '.btn-tool', function() {

                // toggle collapsed state
                const isCollapsed = $card.hasClass('collapsed-card');

                if (isCollapsed) {
                    // buka card
                    $card.removeClass('collapsed-card');
                    $card.find('.card-body').slideDown(200);
                    $icon.removeClass('fa-plus').addClass('fa-minus');
                    $card.find('.btn-cancel').removeClass('d-none');
                } else {
                    // tutup card
                    $card.addClass('collapsed-card');
                    $card.find('.card-body').slideUp(200);
                    $icon.removeClass('fa-minus').addClass('fa-plus');
                    $card.find('.btn-cancel').addClass('d-none');
                }

                $('#form_book input[name="_method"]').val("POST");
                $('#form_book input[name="id"]').val("");
                $('#form_book input[name="judul"]').val("");
                $('#form_book input[name="pengarang"]').val("");
                $('#form_book input[name="penerbit"]').val("");
                $('#form_book input[name="tahun_terbit"]').val("");
                $('#form_book input[name="kategori"]').val("");
                $('#form_book input[name="jumlah_halaman"]').val("");
                $('#form_book input[name="isbn"]').val("");
                $('#form_book select[name="status"]').val("");
            });

            $(document).on('click', '.btn-cancel', function() {

                const isCollapsed = $card.hasClass('collapsed-card');

                // tutup card
                $card.addClass('collapsed-card');
                $card.find('.card-body').slideUp(200);
                $icon.removeClass('fa-minus').addClass('fa-plus');
                $card.find('.btn-cancel').addClass('d-none');
                $card.find('.btn-simpan').text('Simpan Buku')

            });
            $('#form_book').on('submit', function(e) {
                e.preventDefault();
                const method = $('#form_book input[name="_method"]').val();
                try {
                    const post = () => {
                        const formData = new FormData($('#form_book')[0]);

                        const id = $('#form_book input[name="id"]').val();


                        const url = method === 'POST' ?
                            `/book-add` :
                            `/book-update/${id}`;

                        if (typeof ajax_post === 'function') {
                            $.ajax({
                                url: url,
                                type: formData,
                                data: formData,
                                contentType: false,
                                processData: false,
                                headers: {
                                    'Accept': 'application/json'
                                },
                                success: function(result) {
                                    if (result.code === 200) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Deleted!',
                                            text: result.message,
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(() => location.reload());
                                    } else {
                                        Swal.fire('Error', result.message ?? 'Gagal menghapus data', 'error');
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire('Error', xhr.responseJSON?.message || 'Terjadi kesalahan server', 'error');
                                },
                                complete: function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: result.message,
                                        timer: 1500,
                                        showConfirmButton: false
                                    }).then(() => location.reload());
                                }
                            });
                        } else {

                            $.ajax({
                                url: url,
                                method: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(result) {
                                    if (result.code == 200) location.reload();
                                    else alert(result.message ?? 'Save failed');
                                }
                            });
                        }
                    };

                    url = method === 'POST' ?
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Do you want to add this book?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, add it!'
                        }).then((result) => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Added!',
                                text: result.message,
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => post());


                        }) : Swal.fire({
                            title: 'Are you sure?',
                            text: "Do you want to update this book?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, update it!'
                        }).then((result) => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Update!',
                                text: result.message,
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => post());


                        })
                } catch (error) {
                    if (typeof show_error === 'function') show_error({
                        html: error
                    });
                    else alert(error);
                }
            });

            // Edit button - delegated (works with DataTables)
            $(document).on('click', '#booksTable .btn-edit', function() {
                const data = $(this).data();

                // isi form
                $('#form_book input[name=_method]').val("PUT");
                $('#form_book input[name=id]').val(data.id);
                $('#form_book input[name=judul]').val(data.judul);
                $('#form_book input[name=pengarang]').val(data.pengarang);
                $('#form_book input[name=penerbit]').val(data.penerbit);
                $('#form_book input[name=tahun_terbit]').val(data.tahun_terbit);
                $('#form_book input[name=jumlah_halaman]').val(data.jumlah_halaman);
                $('#form_book select[name=kategori]').val(data.kategori);
                $('#form_book input[name=isbn]').val(data.isbn);
                $('#form_book select[name=status]').val(data.status);

                const isCollapsed = $('#card_project').hasClass('collapsed-card');
                // open card
                $('#card_project').removeClass('collapsed-card');


                if (isCollapsed) {
                    $card.removeClass('collapsed-card');
                    $card.find('.card-body').slideDown(200);
                    $card.find('.btn-cancel').removeClass('d-none');

                    $card.find('.btn-simpan').text('Update Buku')
                } else {
                    $card.addClass('collapsed-card');
                    $card.find('.card-body').slideUp(200);
                    $card.find('.btn-cancel').addClass('d-none');
                }
                $('#card_project .btn-cancel').removeClass('d-none');
            });

            // Cancel button
            $(document).on('click', '#card_project .btn-cancel', function() {
                $('#form_book input[name="id"]').val("");
                $('#form_book input[name="_method"]').val("POST");
                $('#form_book select[name="id_skill"]').val("");

                $('#card_project .btn-cancel').addClass('d-none');

                // close form
                $('#card_project').addClass('collapsed-card');
                $('#card_project .card-body').hide();
                $('#card_project .btn-tool>i').removeClass('fa-minus').addClass('fa-plus');
            });

            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                const token = $('meta[name="csrf-token"]').attr('content');

                if (!id) {
                    alert('ID tidak ditemukan!');
                    return;
                }

                const post = () => {
                    $.ajax({
                        url: `/book-destroy/${id}`,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            csrf_test_name: token
                        },
                        headers: {
                            'Accept': 'application/json'
                        },
                        success: function(result) {
                            if (result.code === 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: result.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => location.reload());
                            } else {
                                Swal.fire('Error', result.message ?? 'Gagal menghapus data', 'error');
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error', xhr.responseJSON?.message || 'Terjadi kesalahan server', 'error');
                        }
                    });
                };

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to delete this book?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) post();
                });
            });
        });
    </script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>

</html>