<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- toast -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <?= $this->include('partials/head-css') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/1.8.349/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <style>
        #canvasContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* background-color: red; */
            background-color: rgba(200, 200, 200, 0.5);
            /* Warna latar belakang dengan opasitas */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: auto;
            /* Adjust the height as needed */
        }

        #downloadBtn {
            margin-bottom: 10px;
            /* Optional: Add some spacing between the button and canvas */
        }
    </style>
</head>

<?= $this->include('partials/body') ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content" id="app">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->
                <div class='row'>
                    <div class="col-md-8">
                        <div class='row mb-3'>
                            <div class="col-md-4 align-items-end" style="display: flex; justify-content:left; gap: 10px; ">
                                <button class="btn btn-sm btn-primary waves-effect waves-light" :disabled="this.currentPage === 1" id="prev">Prev</button>
                                <div style='width: 70px'>
                                    <input type="number" class="form-control form-control-sm" v-model="currentPage" id="page" />
                                </div>
                                <button class="btn btn-sm btn-primary waves-effect waves-light" :disabled="this.currentPage === this.totalPagePdf" id="next">Next</button>
                            </div>
                            <div class="col-md-8" style="padding-right: 20px">
                                <div class="card" style="border: 1px solid #a19d9d;border-radius: 10px;padding: 10px; margin: 0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <div style="text-align: left">
                                                        <small for="event-category">Select Mode</small>
                                                    </div>
                                                    <select class="form-select form-control-sm" name="mode" id="mode">
                                                        <option selected> Off </option>
                                                        <option value="text">Text</option>
                                                        <!-- <option value="line">Line</option> -->
                                                        <option value="square">Square</option>
                                                        <option value="circle">Circle</option>
                                                        <option value="freeDraw">Free Draw</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm row">
                                                <div class="d-flex flex-column flex-sm-row">
                                                    <div class='col-sm mb-2'>
                                                        <div style="text-align: left">
                                                            <small for="event-category">Color</small>
                                                        </div>
                                                        <input type="color" class="form-control form-control-color mw-100" v-model="fontColor" @input="colorChanged" id="colorInput" value="#5664d2" title="Choose your color">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column flex-sm-row">
                                                    <div v-show="typeAction === 'freeDraw'" class='col-sm mb-2'>
                                                        <div style="text-align: left">
                                                            <small for="event-category">Weight Brush {{weightBrush}}px</small>
                                                        </div>
                                                        <input type="range" class="form-range" id="customRange1" v-model="weightBrush">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column flex-sm-row">
                                                    <div v-show="typeAction === 'text'" class='col-sm mb-2'>
                                                        <div style="text-align: left">
                                                            <small for="event-category">Font Size (px)</small>
                                                        </div>
                                                        <input type="number" class="form-control" name="level_code" id="level_code" v-model="fontSize" @change="changeFontSize" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div style="text-align: left">
                                                    <small for="event-category">Action</small>
                                                </div>
                                                <div class="d-flex flex-column flex-sm-row">
                                                    <div class='col-sm mb-2'>
                                                        <button class="btn btn-sm btn-danger waves-effect waves-light" id="deleteButton"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                    <div class='col-sm mb-2'>
                                                        <button class="btn btn-sm btn-secondary waves-effect waves-light" id="downloadBtn"><i class="fas fa-download"></i></button>
                                                    </div>
                                                    <div class='col-sm'>
                                                        <button class="btn btn-sm btn-info waves-effect waves-light" id="saveBtn"> Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="canvasContainer" class="card">
                            <!-- <div class="mb-3">
                                <div style="text-align: center">
                                    <label for="event-category">Select Mode</label>
                                </div>
                                <select class="form-select" name="mode" id="mode">
                                    <option selected> Off </option>
                                    <option value="text">Text</option>
                                    <option value="line">Line</option>
                                    <option value="square">square</option>
                                    <option value="circle">circle</option>
                                    <option value="freeDraw">Free Draw</option>
                                </select>
                            </div> -->
                            <!-- <div class='row'>
                                <div class='col-md-6'>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <button @click="toggleAddText" class="btn non-active waves-effect waves-light" id="addText"><i class="fas fa-font"></i></button>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" style="height: 100%;" @input="colorChanged" v-model="fontColor" type="color">
                                        </div>
                                        <div class='col-md-4'>
                                            <button class="btn btn-danger waves-effect waves-light" id="deleteButton"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <button class="btn btn-info waves-effect waves-light" id="saveBtn">Simpan</button>
                                        </div>
                                        <div class='col-md-6'>
                                            <button class="btn btn-secondary waves-effect waves-light" id="downloadBtn">Download</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <canvas id="canvas" width="750" height="1000"></canvas>
                            <input id='currentPdf' type="hidden">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatables" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Comment list</th>
                                                <th>Comment by</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in listComment" :key="index">
                                                <td><a href="#" class="text-info fw-bold" @click.prevent="showModal(item)"> {{ item.filename }} </a> </td>
                                                <td><span class="fw-bold">{{ item.user }}</span></td>
                                                <td><span class="fw-bold">{{ item.date }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- <div class="modal" tabindex="-1" role="dialog" v-show="show">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ selectedFile.filename }}</h5>
                            <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img :src="selectedFile.src" alt="File">
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="modal fade" id="modal-add-document" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">
                                <h5 class="modal-title">{{ selectedFile.filename }} (by: {{ selectedFile.user }})</h5>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="display: flex; justify-content: center">
                                <button class="btn btn-primary waves-effect waves-light" @click="prevImage" id="prev">Prev</button>
                                <button class="btn btn-primary waves-effect waves-light" @click="nextImage" style="margin-left: 5px" id="next">Next</button>
                            </div>
                            <img :src="selectedFile.src" alt="File">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-success" id="btn-simpan-doc" title="Add Data" data-object="Project_detail_procurement/add/doc_procurement">Add</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Page-content -->


            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?= $this->include('partials/right-sidebar') ?>

    <!-- JAVASCRIPT -->
    <?= $this->include('partials/vendor-scripts') ?>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <script src="assets/js/app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {})
        var app = new Vue({
            el: '#app',
            data: {
                isDraw: false,
                weightBrush: 5,
                fontSize: 20,
                isTransparant: true,
                fontColor: '#ff3838',
                isAddText: false,
                typeAction: '',
                totalPagePdf: 0,
                currentPage: 1,
                listComment: [{
                        filename: 'image_1.png',
                        user: 'Budi',
                        date: '30/03/2024',
                        src: '<?= base_url('upload/engineering_doc/comment/image_1.png')?>'
                    },
                    {
                        filename: 'image_2.png',
                        user: 'Jhon',
                        date: '30/03/2024',
                        src: '<?= base_url('upload/engineering_doc/comment/image_2.png')?>'
                    },
                    {
                        filename: 'image_3.png',
                        user: 'Toni',
                        date: '30/03/2024',
                        src: '<?= base_url('upload/engineering_doc/comment/image_3.png')?>'
                    },
                ],
                selectedFile: {},
                show: false,
                currentIndex: 0,
            },
            methods: {
                toggleDrawingMode: function() {
                    console.log('masuk sini');
                    this.isDraw = !this.isDraw;
                },
                changeFontSize: function(evt) {
                    this.changeFontSize = evt.target.value;
                },
                toggleAddText: function() {
                    // this.isAddText = !this.isAddText;
                    this.typeAction = 'text';
                },
                showModal(item) {
                    console.log(item);
                    this.selectedFile = item;
                    this.show = true;
                    $('#modal-add-document').modal('show');
                },
                closeModal() {
                    this.show = false;
                },
                prevImage() {
                    this.currentIndex = (this.currentIndex - 1 + this.listComment.length) % this.listComment.length;
                    this.selectedFile = this.listComment[this.currentIndex];
                },
                nextImage() {
                    this.currentIndex = (this.currentIndex + 1) % this.listComment.length;
                    this.selectedFile = this.listComment[this.currentIndex];
                },
                colorChanged(evt) {
                    this.fontColor = evt.target.value
                },
                hexToRGBA(hex, alpha) {
                    var r = parseInt(hex.slice(1, 3), 16),
                        g = parseInt(hex.slice(3, 5), 16),
                        b = parseInt(hex.slice(5, 7), 16);

                    return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + alpha + ')';
                }
            },
            mounted: function() {
                console.log('Nilai dari message:', this.isDraw);
                // Kode yang akan dijalankan setelah instance Vue di-mount
                console.log('Vue instance has been mounted!');
                const url = "<?= base_url('upload/doc_engineering/test.pdf') ?>";

                function clearCanvas() {
                    canvas.clear();
                    canvas.renderAll();
                }

                //fabric
                var canvas = new fabric.Canvas('canvas');
                canvas.set({
                    selection: false,
                    grid: 10,
                });

                function convertDataURIToBlob(dataURI) {
                    var byteString;
                    if (dataURI.split(',')[0].indexOf('base64') >= 0)
                        byteString = atob(dataURI.split(',')[1]);
                    else
                        byteString = unescape(dataURI.split(',')[1]);

                    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                    var ia = new Uint8Array(byteString.length);
                    for (var i = 0; i < byteString.length; i++) {
                        ia[i] = byteString.charCodeAt(i);
                    }

                    return new Blob([ia], {
                        type: mimeString
                    });
                }

                $('#mode').on('change', (evt) => {
                    this.typeAction = evt.target.value;
                    if (this.typeAction === 'freeDraw') {
                        canvas.isDrawingMode = true; // Aktifkan mode menggambar bebas
                        canvas.freeDrawingBrush.color = this.fontColor; // Atur warna kuas
                        canvas.freeDrawingBrush.width = this.weightBrush; // Atur lebar kuas
                    } else {
                        canvas.isDrawingMode = false; // Nonaktifkan mode menggambar bebas jika bukan mode free draw
                    }
                });

                $('#customRange1').on('change', (evt) => {
                    let weightBrush = parseFloat(evt.target.value);
                    canvas.freeDrawingBrush.width = weightBrush; // Atur lebar kuas
                    this.weightBrush = weightBrush;
                });

                $('#colorInput').on('change', (evt) => {
                    console.log(typeof evt.target.value, 'fuadi')
                    canvas.freeDrawingBrush.color = evt.target.value; // Atur lebar kuas
                    canvas.freeDrawingBrush.width = this.weightBrush;; // Atur lebar kuas
                });

                function snapToGrid(object) {
                    object.set({
                        left: Math.round(object.left / 10) * 10,
                        top: Math.round(object.top / 10) * 10
                    });
                }

                $('#addText').on('click', () => {
                    $('#addText').toggleClass('non-active btn-primary');
                });

                canvas.on('mouse:down', (options) => {
                    if (this.typeAction === 'text') {
                        canvas.isDrawingMode = false;
                        if (options.target) {
                            snapToGrid(options.target);
                        } else {
                            var textbox = new fabric.Textbox('Your Text', {
                                width: 100,
                                fontSize: this.fontSize,
                                fill: this.fontColor,
                                left: options.e.clientX - canvas.upperCanvasEl.getBoundingClientRect().left,
                                top: options.e.clientY - canvas.upperCanvasEl.getBoundingClientRect().top,
                            });

                            canvas.add(textbox);
                            snapToGrid(textbox);
                        }

                        canvas.renderAll();
                    } else if (this.typeAction === 'line') {
                        canvas.isDrawingMode = false;
                        // Mulai menggambar garis bebas
                        var pointer = canvas.getPointer(options.e);
                        var points = [pointer.x, pointer.y, pointer.x, pointer.y];
                        var freeDrawLine = new fabric.Line(points, {
                            strokeWidth: 5,
                            stroke: this.fontColor,
                            selectable: false,
                            evented: false, // Agar tidak dapat dipilih atau diubah setelah digambar
                        });

                        canvas.add(freeDrawLine);
                        canvas.renderAll();

                        // Saat mouse digerakkan
                        canvas.on('mouse:move', function(options) {
                            if (freeDrawLine) {
                                var pointer = canvas.getPointer(options.e);
                                freeDrawLine.set({
                                    x2: pointer.x,
                                    y2: pointer.y
                                });
                                canvas.renderAll();
                            }
                        });

                        // Saat mouse dilepas
                        canvas.on('mouse:up', function() {
                            freeDrawLine = null; // Hentikan garis bebas saat mouse dilepas
                            canvas.off('mouse:move'); // Matikan event mouse:move
                            canvas.off('mouse:up'); // Matikan event mouse:up
                        });
                    } else if (this.typeAction === 'square') {
                        if (options.target) {
                            snapToGrid(options.target);
                        } else {
                            // Mendapatkan koordinat klik mouse
                            var pointer = canvas.getPointer(options.e);
                            var x = pointer.x;
                            var y = pointer.y;
                            var rectangle = new fabric.Rect({
                                left: x - 50, // Menyesuaikan posisi untuk membuat bentuk di tengah klik mouse
                                top: y - 50,
                                // fill: this.fontColor,
                                fill: this.isTransparant ? this.hexToRGBA(this.fontColor, 0.3) : this.fontColor,
                                width: 100,
                                height: 100
                            });
                            canvas.add(rectangle);
                            snapToGrid(rectangle);
                        }
                    } else if (this.typeAction === 'circle') {
                        if (options.target) {
                            snapToGrid(options.target);
                        } else {
                            // Mendapatkan koordinat klik mouse
                            var pointer = canvas.getPointer(options.e);
                            var x = pointer.x;
                            var y = pointer.y;
                            var circle = new fabric.Circle({
                                left: x - 50, // Menyesuaikan posisi untuk membuat bentuk di tengah klik mouse
                                top: y - 50,
                                // fill: this.fontColor,
                                fill: this.isTransparant ? this.hexToRGBA(this.fontColor, 0.3) : this.fontColor,
                                radius: 50
                            });
                            canvas.add(circle);
                            snapToGrid(circle);
                        }

                    }
                });

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Delete') {
                        var activeObject = canvas.getActiveObject();
                        if (activeObject) {
                            canvas.remove(activeObject);
                            canvas.renderAll();
                        }
                    }
                });

                $('#deleteButton').on('click', () => {
                    var activeObject = canvas.getActiveObject();
                    if (activeObject) {
                        canvas.remove(activeObject);
                        canvas.renderAll();
                    }
                });
                // end fabric

                // new render PDF
                PDFJS.getDocument(url).then((pdf) => {
                    // you can now use *pdf* here
                    console.log("the pdf has ", pdf.numPages, "page(s).")
                    this.totalPagePdf = pdf.numPages;
                    pdf.getPage(1).then(function(page) {
                        // you can now use *page* here
                        var viewport = page.getViewport(2.0);
                        var canvasEl = document.querySelector("canvas")
                        canvasEl.height = viewport.height;
                        canvasEl.width = viewport.width;

                        page.render({
                            canvasContext: canvasEl.getContext('2d'),
                            viewport: viewport
                        }).then(function() {

                            var bg = canvasEl.toDataURL("image/png");

                            fabric.Image.fromURL(bg, function(img) {
                                img.scaleToHeight(1000);
                                canvas.setHeight(1000);
                                canvas.setWidth(750);
                                canvas.setBackgroundImage(img);
                            });
                            canvas.renderAll();
                        });
                    });

                });

                function dataURItoBlob(blob, fileName) {
                    const file = new File([blob], fileName)
                    return file;
                }

                function dataURLtoBlob(dataUrl) {
                    const filename = 'fuadi.png'
                    var arr = dataUrl.split(',');
                    var mime = arr[0].match(/:(.*?);/)[1];
                    var bstr = atob(arr[1]);
                    var n = bstr.length;
                    var u8arr = new Uint8Array(n);
                    while (n--) {
                        u8arr[n] = bstr.charCodeAt(n);
                    }
                    // Create a new File object with the Blob and the filename
                    return new File([new Blob([u8arr], {
                        type: mime
                    })], filename, {
                        type: mime
                    });
                }

                // blob convert
                function dataURItoBlob_1(dataURI) {
                    // Parse the data URI
                    var [metadata, base64Data] = dataURI.split(',');
                    var mimeString = metadata.split(':')[1].split(';')[0];

                    // Decode base64 data
                    var byteCharacters = atob(base64Data);
                    var byteNumbers = new Array(byteCharacters.length);
                    for (var i = 0; i < byteCharacters.length; i++) {
                        byteNumbers[i] = byteCharacters.charCodeAt(i);
                    }
                    var byteArray = new Uint8Array(byteNumbers);

                    // Create Blob
                    return new Blob([byteArray], {
                        type: mimeString
                    });
                }


                function renderPage(pageNum) {
                    clearCanvas()
                    PDFJS.getDocument(url).then(function(pdf) {
                        // you can now use *pdf* here
                        console.log("the pdf has ", pdf.numPages, "page(s).")
                        pdf.getPage(pageNum).then(function(page) {
                            // you can now use *page* here
                            var viewport = page.getViewport(2.0);
                            var canvasEl = document.querySelector("canvas")
                            canvasEl.height = viewport.height;
                            canvasEl.width = viewport.width;

                            page.render({
                                canvasContext: canvasEl.getContext('2d'),
                                viewport: viewport
                            }).then(function() {

                                var bg = canvasEl.toDataURL("image/png");

                                fabric.Image.fromURL(bg, function(img) {
                                    img.scaleToHeight(1000);
                                    canvas.setHeight(1000);
                                    canvas.setWidth(750);
                                    canvas.setBackgroundImage(img);
                                });
                                canvas.renderAll();
                            });
                        });
                    });
                }

                $('#next').on('click', () => {
                    if (this.currentPage === this.totalPagePdf) return;
                    const page = parseInt(this.currentPage, 10) + 1;
                    this.currentPage = page
                    renderPage(page);
                });

                $('#prev').on('click', () => {
                    if (this.currentPage === 1) return;
                    const page = parseInt(this.currentPage, 10) - 1;
                    this.currentPage = page
                    renderPage(page);
                });
                $('#page').on('change', (evt) => {
                    const value = evt.target.value
                    let page;
                    if (value > this.totalPagePdf) {
                        page = this.totalPagePdf
                    } else if (value < 1) {
                        page = 1
                    } else {
                        page = value
                    }
                    this.currentPage = page
                    renderPage(page);
                })
                // end new render pdf


                // download pdf
                document.getElementById('downloadBtn').addEventListener('click', () => {
                    var pdf = new jsPDF();
                    var dataUrl = canvas.toDataURL('image/png');
                    var a = document.createElement('a');
                    a.href = dataUrl;
                    a.download = 'canvas.jpg'; // Nama file yang akan diunduh
                    document.body.appendChild(a); // Menambahkan tautan ke dalam dokumen
                    a.click(); // Klik tautan secara otomatis untuk memulai unduhan
                    document.body.removeChild(a); // Menghapus tautan setelah selesai
                });

                document.getElementById('saveBtn').addEventListener('click', () => {
                    var pdf = new jsPDF();
                    var dataUrl = canvas.toDataURL('image/png');
                    // Convert data URL to Blob
                    var blob = dataURLtoBlob(dataUrl);
                    var formData = new FormData();
                    formData.append('image', blob, 'image.png');
                    formData.append('id_doc', <?= $doc_id ?>);
                    formData.append('page_detail', this.currentPage);
                    console.log(blob);

                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('Project_detail_engineering/add_comment') ?>',
                        processData: false, // Memproses data menjadi string tidak diperlukan
                        contentType: false, // Jenis konten tidak diperlukan, karena FormData akan mengatur header secara otomatis
                        data: formData,
                        success: function(response) {
                            // Menampilkan respons dari server jika berhasil
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan pesan kesalahan jika terjadi kesalahan
                            console.error('Terjadi kesalahan: ' + status + ' - ' + error);
                        }
                    });
                     Swal.fire({
                        title: 'Disimpan!',
                        icon: 'success',
                        text: 'Data berhasil disimpan.',
                        timer: 1000,
                        confirmButtonColor: "#5664d2",
                        onBeforeOpen: () => {
                            this.listComment = [{
                                filename: 'image_4.png',
                                user: 'Badu',
                                date: '30/03/2024',
                                src: '<?= base_url('upload/engineering_doc/comment/image_4.png')?>'
                            }, ...this.listComment];
                            //Swal.showLoading()
                            timerInterval = setInterval(function() {
                                Swal.getContent().querySelector('strong')
                                    .textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                    })
                });
            }
        });
    </script>
    </body>

    </html>