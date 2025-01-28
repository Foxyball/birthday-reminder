<?php

function header_container()
{ ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- icon -->
        <link rel="icon" href="balik_logo.ico" type="image/x-icon" />
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
    
    <?php function sidebar_container() { ?>
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <a href="#" class="flex items-center pl-2.5 mb-5">
                <img src="balik_logo.ico" class="h-6 mr-3 sm:h-7" alt="BalikG Reminder" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">BalikG Reminder</span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 016 13.12M12.265 3.11a.375.375 0 11-.53 0L12 2.845l.265.265zm-3 0a.375.375 0 11-.53 0L9 2.845l.265.265zm6 0a.375.375 0 11-.53 0L15 2.845l.265.265z"></path>
                        </svg>
                        <span class="ml-3">Начало</span>
                    </a>
                </li>
               <hr class="my-4 border-gray-900 dark:border-gray-700">
               <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Какво е новото ?</span>
                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
                    </a>
                </li>
                <li>
                    <a href="logout?logout" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Изход</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
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