<?php

function header_container()
{ ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet">
        <!-- SweetAlert2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

    <?php } ?>

    <?php function footer_container()
    { ?>
        <!-- jQuery -->
        <!-- <script src="../admin/plugins/jquery/jquery.min.js"></script> -->
        <!-- Bootstrap 4 -->
        <!-- <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <!-- AdminLTE App -->
        <!-- <script src="../admin/dist/js/adminlte.min.js"></script> -->

        <!-- <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../admin/plugins/jszip/jszip.min.js"></script>
        <script src="../admin/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../admin/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->


        <script>
            // SweetAlerts 

            // $('.btn-del').on('click', function(e) {
            //     e.preventDefault();
            //     const href = $(this).attr('href')

            //     Swal.fire({
            //         title: 'Сигурни ли сте?',
            //         text: 'Потвърждение за изтриване',
            //         type: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Да, изтрий!',
            //         cancelButtonText: 'Отказ'
            //     }).then((result) => {
            //         if (result.value) {
            //             document.location.href = href;
            //         }
            //     })
            // })
        </script>

        <!-- datatable -->
        <script>
            // $(function() {
            //     $("#tablica")
            //         .DataTable({
            //             responsive: true,
            //             lengthChange: false,
            //             autoWidth: false,
            //         })
            //         .buttons()
            //         .container()
            //         .appendTo("#tablica_wrapper .col-md-6:eq(0)");
            // });
        </script> <!-- end of datatable -->

        <!-- datepicker -->
        <!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->

        <script>
            // $(function() {
            //     $("#datepicker").datepicker();
            // });
            //   translating the datepicker to bulgarian
            // jQuery(function($) {
            //     $.datepicker.regional['bg'] = {
            //         closeText: 'затвори',
            //         prevText: '&#x3c;назад',
            //         nextText: 'напред&#x3e;',
            //         nextBigText: '&#x3e;&#x3e;',
            //         currentText: 'днес',
            //         monthNames: ['Януари', 'Февруари', 'Март', 'Април', 'Май', 'Юни',
            //             'Юли', 'Август', 'Септември', 'Октомври', 'Ноември', 'Декември'
            //         ],
            //         monthNamesShort: ['Яну', 'Фев', 'Мар', 'Апр', 'Май', 'Юни',
            //             'Юли', 'Авг', 'Сеп', 'Окт', 'Нов', 'Дек'
            //         ],
            //         dayNames: ['Неделя', 'Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота'],
            //         dayNamesShort: ['Нед', 'Пон', 'Вто', 'Сря', 'Чет', 'Пет', 'Съб'],
            //         dayNamesMin: ['Не', 'По', 'Вт', 'Ср', 'Че', 'Пе', 'Съ'],
            //         weekHeader: 'Wk',
            //         dateFormat: 'yy-mm-dd',
            //         firstDay: 1,
            //         isRTL: false,
            //         showMonthAfterYear: false,
            //         yearSuffix: ''
            //     };
            //     $.datepicker.setDefaults($.datepicker.regional['bg']);
            // });


            // formatting the datepicker to dd.mm.yyyy
            //   jQuery(function(a) {
            //     $("#datepicker").datepicker({
            //       dateFormat: 'dd.mm.yy',
            //       changeYear: true,
            //       viewMode: "years",
            //       minViewMode: "years"
            //     });
            //   });
            // 
        </script> <!-- end of datepicker -->


        <!--  JS custom validation -->
        <script>
            // var FormStuff = {
            //     init: function() {
            //         this.applyConditionalRequired();
            //         this.bindUIActions();
            //     },

            //     bindUIActions: function() {
            //         $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
            //     },

            //     applyConditionalRequired: function() {

            //         $(".require-if-active").each(function() {
            //             var el = $(this);
            //             if ($(el.data("require-pair")).is(":checked")) {
            //                 el.prop("required", true);
            //             } else {
            //                 el.prop("required", false);
            //             }
            //         });

            //     }

            // };

            // FormStuff.init();
        </script>
        <!-- END of JS custom validation -->

        <!-- minimum characters for name  -->
        <script>
            // $(document).ready(function() {
            //     $('#name').keyup(function() {
            //         var len = $(this).val().length;
            //         if (len >= 4) {
            //             $('#name').removeClass('is-invalid');
            //             $('#name').addClass('is-valid');
            //         } else {
            //             $('#name').removeClass('is-valid');
            //             $('#name').addClass('is-invalid');
            //         }
            //     });
            // });
        </script> <!-- end of minimum characters for name  -->

    <?php } ?>