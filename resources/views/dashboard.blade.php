@extends('layouts.app')

@section('content')
    <div class="container-fluid note-has-grid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Jurnal Guru</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Jurnal Guru</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card w-100">
                    <div class="card-body" style="height: 650px; overflow-y: auto;">
                        <h5 class="card-title fw-semibold mb-4">Jadwal Mengajar</h5>
                        <ul id="data" class="timeline-widget mb-0 position-relative mb-n5">
                            {{-- <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">Jam ke 1-2</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">X-RPL / Bahasa Indonesia <div> <button
                                            class="btn mb-1 waves-effect waves-light btn-sm btn-outline-info"
                                            data-bs-toggle="modal" data-bs-target="#bs-example-modal-md">
                                            Isi Jurnal
                                        </button> </div>
                                </div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">Jam ke 3-4</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-dark flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">X-RPL / Bahasa Inggris <div>
                                        <p class="badge text-bg-success fs-2 rounded-4 py-1 px-2">Sudah Diisi</p>
                                    </div>
                                </div>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden mb-7 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Data Kehadiran Siswa</h5>

                            <button class="btn mb-5 waves-effect waves-light btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#samedata-modal">
                                Lihat Detail
                            </button>
                        </div>
                        <div id="chart-pie-simple"></div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="modal-create" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Jurnal /
                    </h4>
                    <div class=" bg-light-primary badge h-75 ms-2">
                        <span class="note-date fs-2 text-primary" style="float: right;">X-RPL</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="col-12">
                    <form id="form-create">
                        <div class="card w-100 position-relative overflow-hidden mb-0">
                            <div class="card-body p-4">
                                <input type="hidden" id="user-id" name="user_id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">Siswa Alpha <span
                                                        class="text-danger">*</span></label>
                                                <select name="alpha[]" class="select2 form-control" multiple="multiple"
                                                    style="height: 36px; width: 100%" id="select-siswa-alpha">
                                                </select>
                                                <small class="form-text text-muted">Pilih Siswa yang Alpha.</small>
                                            </div>

                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Siswa Izin <span
                                                    class="text-danger">*</span></label>
                                            <select class="select2 form-control select-siswa" name="permission[]"
                                                multiple="multiple" style="height: 36px; width: 100%"
                                                id="select-siswa-izin">
                                            </select>
                                            <small class="form-text text-muted">Pilih Siswa yang Izin.</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Siswa Sakit <span
                                                    class="text-danger">*</span></label>
                                            <select name="sick[]" class="select2 form-control select-siswa"
                                                multiple="multiple" style="height: 36px; width: 100%"
                                                id="select-siswa-sakit">
                                            </select>
                                            <small class="form-text text-muted">Pilih Siswa yang sakit.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Deskripsi <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" type="text" class="form-control" id="exampleInputtext"></textarea>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">

                                            </div>
                                        </div>
                                        <small id="name" class="form-text text-muted">Isi Deskripsi Dengan Kegiatan
                                            dan Aktivitas yang Berlaku Pada Jam Pelajaran Tersebut.</small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" data-dismiss="modal" class="btn btn-light-danger text-danger"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="samedata-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        Detail Siswa
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="position-relative">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-primary rounded-2 d-flex align-items-center justify-content-center me-6"
                                    style="width: 40px; height: 40px;">
                                    <span class="fs-5 text-primary"></span>
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Raja Mahendra</h6>
                                    <p class="fs-3 mb-0">X-RPL</p>
                                </div>
                            </div>
                            <p class="badge text-bg-warning fs-2 rounded-4 py-1 px-2">Sakit</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-primary rounded-2 d-flex align-items-center justify-content-center me-6"
                                    style="width: 40px; height: 40px;">
                                    <span class="fs-5 text-primary">M</span>
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Muhammad Al-yasin</h6>
                                    <p class="fs-3 mb-0">X-RPL</p>
                                </div>
                            </div>
                            <p class="badge text-bg-danger fs-2 rounded-4 py-1 px-2">Alpha</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-primary rounded-2 d-flex align-items-center justify-content-center me-6"
                                    style="width: 40px; height: 40px;">
                                    <span class="fs-5 text-primary">R</span>
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Kartika Sherli</h6>
                                    <p class="fs-3 mb-0">X-RPL</p>
                                </div>
                            </div>
                            <p class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Izin</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-primary rounded-2 d-flex align-items-center justify-content-center me-6"
                                    style="width: 40px; height: 40px;">
                                    <span class="fs-5 text-primary">R</span>
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Raja Mahendra</h6>
                                    <p class="fs-3 mb-0">X-RPL</p>
                                </div>
                            </div>
                            <p class="badge text-bg-warning fs-2 rounded-4 py-1 px-2">Sakit</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-primary rounded-2 d-flex align-items-center justify-content-center me-6"
                                    style="width: 40px; height: 40px;">
                                    <span class="fs-5 text-primary">R</span>
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Raja Mahendra</h6>
                                    <p class="fs-3 mb-0">X-RPL</p>
                                </div>
                            </div>
                            <p class="badge text-bg-warning fs-2 rounded-4 py-1 px-2">Sakit</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection
@section('script')
    <script>
        get(1)

        let debounceTimer;



        function get() {
            const token = localStorage.getItem('token')
            $.ajax({
                url: "{{ config('app.api_url') }}/teacher-schedule",
                type: 'GET',
                dataType: "JSON",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },

                success: function(response) {
                    // console.log(response)
                    $('#data').html('')
                    if (response.data.length > 0) {
                        $.each(response.data, function(index, item) {


                            var sick = (item.journal && item.journal.sick) ? item.journal.sick.join(
                                ', ') : '';
                            console.log("ini yang sakit" + sick);

                            var permission = (item.journal && item.journal.permission) ? item.journal
                                .permission.join(
                                    ', ') : '';

                            var alpha = (item.journal && item.journal.alpha) ? item.journal.alpha.join(
                                ', ') : '';
                            console.log("ini yang alpha " + alpha);








                            var buttonText = item.journal ?
                                '<button class="btn mb-1 waves-effect waves-light btn-sm btn-outline-info btn-update" id="btn-create-' +
                                item.classroom.id + '" data-id="' + item.classroom.id +
                                '" data-permission="' + permission +
                                '" data-sick="' + sick +
                                '" data-alpha="' + alpha +
                                '" data-description="' + item.journal.description +
                                '" data-class="' + item.classroom.name +
                                '" data-user-id="' + item.id + '">Edit Jurnal</button>' :

                                '<button class="btn mb-1 waves-effect waves-light btn-sm btn-outline-info btn-create" id="btn-create-' +
                                item.classroom.id + '" data-id="' + item.classroom.id +
                                '" data-user-id="' + item.id + '">Isi Jurnal</button>';
                            const firstLessonHour = item.lesson_hour[0].lesson_hour;
                            const lastLessonHour = item.lesson_hour[item.lesson_hour.length - 1]
                                .lesson_hour;

                            const first = firstLessonHour.lesson_hour;
                            const last = lastLessonHour.lesson_hour;





                            var row = ` 
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">Jam ke  ${first}-${last}</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">${item.classroom.name} / ${item.lesson.name} <div>
                                     
                                            ${buttonText} 
                                         </div>

                                        
                                        
                                </div>
                            </li>`
                            // data-bs-toggle="modal" data-bs-target="#bs-example-modal-md
                            $('#data').append(row)
                        })


                        $('.btn-update').click(function() {
                            var id = $(this).data('id');
                            var userId = $(this).data('user-id');
                            var alpha = $(this).data('alpha');
                            var description = $(this).data(
                            'description'); // Asumsi: atribut data-description ada pada tombol
                            var sick = $(this).data('sick');
                            var permission = $(this).data('permission');


                            var ar_alpha = alpha.split(', ');
                            var ar_sick = sick.split(', ');
                            var ar_permission = permission.split(', ');

                            $('#form-create').data('id', id);
                            $('#user-id').val(userId);
                            $('#description').val(description);

                            $.ajax({
                                url: "{{ config('app.api_url') }}/student-classrooms/" + id,
                                type: 'GET',
                                dataType: 'JSON',
                                success: function(response) {
                                    var detailData = response.data;

                                    // Fungsi untuk mengisi elemen select dengan opsi siswa dan memilih nilai default
                                    function populateSelectAndSetDefault(selectId,
                                        siswaData, defaultValues) {
                                        var select = $('#' + selectId);
                                        select.empty();

                                        $.each(siswaData, function(index, item) {
                                            var option = '<option value="' + item
                                                .student.id + '">' + item.student
                                                .name + '</option>';
                                            select.append(option);
                                        });

                                        // Menetapkan nilai-nilai default sebagai opsi terpilih
                                        select.val(defaultValues).trigger('change');
                                    }

                                    // Mengisi elemen select untuk kategori siswa dan memilih nilai default
                                    populateSelectAndSetDefault('select-siswa-alpha',
                                        detailData, ar_alpha);
                                    populateSelectAndSetDefault('select-siswa-izin',
                                        detailData, ar_permission);
                                    populateSelectAndSetDefault('select-siswa-sakit',
                                        detailData, ar_sick);



                                    // Tampilkan modal "create"
                                    $('#modal-create').modal('show');
                                },
                                error: function(error) {
                                    console.error("Error fetching student data:", error);
                                }
                            });
                        });



                        // Tangkap peristiwa pemilihan elemen select
                        $('#select-siswa-alpha, #select-siswa-izin, #select-siswa-sakit').change(function() {
                            var selectedValue = $(this).val();
                            console.log('Selected Value:', selectedValue);
                            // Lakukan sesuatu dengan nilai yang dipilih, misalnya, kirimkan melalui Ajax atau tampilkan di tempat lain.
                        });




                        $('.btn-create').click(function() {
                            var id = $(this).data('id');
                            var userId = $(this).data('user-id');
                            $('#form-create').data('id', id);
                            $('#user-id').val(userId);

                            $.ajax({
                                url: "{{ config('app.api_url') }}/student-classrooms/" + id,
                                type: 'GET',
                                dataType: 'JSON',
                                success: function(response) {
                                    var detailData = response.data;

                                    // Fungsi untuk mengisi elemen select dengan opsi siswa
                                    function populateSelect(selectId, siswaData) {
                                        var select = $('#' + selectId);
                                        select.empty();
                                        $.each(siswaData, function(index, item) {
                                            var option = '<option value="' + item
                                                .student.id + '">' + item.student
                                                .name +
                                                '</option>';
                                            select.append(option);
                                        });
                                    }

                                    // Akses data siswa dari relasi studentClassrooms
                                    var siswaData = detailData;


                                    // Mengisi elemen select untuk kategori siswa
                                    populateSelect('select-siswa-alpha', siswaData);
                                    populateSelect('select-siswa-izin', siswaData);
                                    populateSelect('select-siswa-sakit', siswaData);

                                    // Tampilkan modal "create"
                                    $('#modal-create').modal('show');
                                },
                                error: function(error) {
                                    console.error("Error fetching student data:", error);
                                }
                            });

                        });


                        $('.btn-delete').click(function() {
                            $('#form-delete').data('id', $(this).data('id'))
                            $('#modal-delete').modal('show')
                        })
                    } else {
                        $('#loading').html(showNoData('Tahun ajaran Tidak Ada!'))
                    }
                }
            })
        }

        $('#form-create').submit(function(e) {
            e.preventDefault()
            var id = $(this).data('id'); // Ambil nilai id dari form data
            var userId = $('#user-id').val();
            const token = localStorage.getItem('token')
            e.preventDefault();
            $.ajax({
                url: "{{ config('app.api_url') }}/teacher-journal/" + userId,
                type: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                dataType: "JSON",
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response)
                    get()
                    $('.btn-close').click()
                    Swal.fire({
                        'title': 'Berhasil!',
                        'icon': 'success',
                        'text': response.message
                    })
                    emptyForm('form-create')
                },
                error: function(response) {
                    console.log(response)

                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 422) {
                        handleValidate(response.data, 'create')
                    }
                }
            })
        })
    </script>
@endsection
