    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- chartist -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/chartist-js/chartist.min.js"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/sparkline/sparkline-script.js"></script>

    <!--jvectormap-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jvectormap/vectormap-script.js"></script>

    <!-- data-tables -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/data-tables/data-tables-script.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins.js"></script>

    <!--sheetJS.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.2/xlsx.full.min.js"></script>

    <!--filesaver.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>

    <!--jspdf.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <!-- Script for Create Pembelian Page -->
    <script type='text/javascript'>
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

        function downloadPdf(html_content) {

            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write(html_content)
            printWindow.document.close();
            printWindow.print();
        }

        $(document).ready(() => {

            $bahan_baku_html = $('#tambah_field').html()

            $('#tambah').click((e) => {
                e.preventDefault()
                $('#tambah_field').append($bahan_baku_html);
            })

            $("html, body").height($("#main").height());

        })

        <?php if (isset($_GET['tahun'], $_GET['bulan'])) { ?>
            $(document).ready(() => {

                var wb = XLSX.utils.book_new()

                wb.Props = {
                    Title: "<?php echo $breadcrumbs_title . " " . $_GET['bulan'] . " " . $_GET['tahun'] ?>",
                    Subject: "<?php echo $breadcrumbs_title . " " . $_GET['bulan'] . " " . $_GET['tahun'] ?>",
                    Author: "Faisal Nur Falah",
                    CreatedDate: new Date()
                }

                var wb = XLSX.utils.table_to_book(document.getElementsByClassName('excel-table')[0], {
                    sheet: "Sheet1"
                });
                var wbout = XLSX.write(wb, {
                    bookType: 'xlsx',
                    bookSST: true,
                    type: 'binary'
                });

                $("#download-excel").click(function() {

                    keterangans = $(".keterangan")
                    temps = []
                    form = $(keterangans[0]).html()

                    i = 0
                    keterangans.each((v) => {
                        temps[i] = $(keterangans[i]).html()
                        $(keterangans[i]).html($(keterangans[i]).find('.keterangan-value').html())

                        i++
                    })

                    saveAs(new Blob([s2ab(wbout)], {
                        type: "application/octet-stream"
                    }), "Kini Cheese Tea - <?php echo $breadcrumbs_title . " " . $_GET['bulan'] . " " . $_GET['tahun'] ?>.xlsx")

                    i = 0
                    keterangans.each((v) => {
                        console.log('A')
                        $(keterangans[i]).html(temps[i])

                        i++
                    })

                })

                $("#download-pdf").click(function() {

                    downloadPdf($("#table-pdf").html())

                })
            })
        <?php } ?>
    </script>

    </body>

    </html>