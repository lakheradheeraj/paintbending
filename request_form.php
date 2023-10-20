<form id="drawingForm" class="needs-validation" action="<?php echo base_url(); ?>submit_Request_form"
    enctype="multipart/form-data" method="POST">
    
    <div class="request-painting-form">

        <div class="row">
            <div class="col-12">

                <section>
                    <nav class="nav nav-pills nav-fill justify-content-center">
                        <div class="connecting-line"></div>
                        <ul>
                            <li><a class="nav-link tab-pills" href="#">1</a></li>
                            <li> <a class="nav-link tab-pills  nav-lastchild" href="#">2</a></li>

                        </ul>
                    </nav>

                    <div class="card-body">
                        <div class="tab d-none">
                            <div class="draw-section">
                                <h2>Describe your painting ideas <b>Shapes, Thoughts, <span>Visual
                                            Description</span></b></h2>

                                <div class="form-group ">
                                    <label>Add a painting Title </label>
                                    <input type="text" class="form-control" placeholder="Add a title..."
                                        name="painting_title" id="paintingtitle">
                                </div>


                                <div class="error-message" id="paintingtitleerror"></div>

                                <div class="form-group mt-4">
                                    <label>Add Tag</label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tag1" name="tag"
                                                id="tag">
                                        </div>
                                    </div>
                                    <div class="error-message" id="tagError"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab d-none">
                            <div class="draw-section">
                                <div class="text-center">
                                    <h2><strong>You can <span>illustrate</span> your ideas...</strong></h2>

                                </div>

                                <span id="image-validation" class="alert text-danger"></span>

                                <div class="form-group d-flex justify-content-between">
                                    <label>Add a Description<span><i class="bi bi-question-circle"></i></span></label>

                                </div>

                                <div id="dataTable">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-12 description-section">
                          
                                            <div class="form-group d-flex  position-relative">
                                                <input type="text" class="form-control" id="dataInput"
                                                    placeholder="Add a description..." name="description[]">
                                                <div class="edit-section">
                                                    <button id="adddiv"><i class="bi bi-plus"></i></button>
                                                </div>

                                            </div>
                                            <div class="error-message" id="descriptionError"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group pt-4">
                                    <label>Draw Custom Painting<span><i
                                                class="bi bi-question-circle"></i></span></label>
                                </div>
                                <div class="draw-box d-flex profile-card m-0 position-relative p-0">
                                    <div class="controls">
                                        <!-- <h3>Shape:</h3> -->
                                        <input type="file" id="uploader"   accept="image/png, image/JPG, image/jpeg ,image/TIFF ,image/WEBP ,image/BMP"  />
                                    
                                                <div class='lightBorder mb-0'>



                                            <label class="radio-img " data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Rectangle">
                                                <input type="radio" name="shape" value="rect" class=" d-none icon">
                                                <img src="https://influocial.co/staging-pb/assets/images/rectangle.png"
                                                    alt="">

                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Circle"
                                                class="radio-img">
                                                <input class=" d-none icon" type="radio" name="shape" value="circle">
                                                <img src="https://influocial.co/staging-pb/assets/images/circle-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Square"
                                                class="radio-img d-none" >
                                                <input class=" d-none icon" type="radio" name="shape" value="square">
                                                <img src="https://influocial.co/staging-pb/assets/images/square-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Ellipse"
                                                class="radio-img">
                                                <input class=" d-none icon" type="radio" name="shape" value="ellipse">
                                                <img src="https://influocial.co/staging-pb/assets/images/elipse-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Polygon"
                                                class="radio-img">
                                                <input class="d-none icon" type="radio" name="shape" value="polygon">
                                                <img src="https://influocial.co/staging-pb/assets/images/polygon-icon.png"
                                                    alt="" >
                                            </label>


                                            <p class="backgroundColor"><input type="radio" name="shape"
                                                    value="fountainpen" id="fountainpen"> Fountain Pen</p>
                                        </div>

                                        <!-- <h3>Tools:</h3> -->
                                        <div class='lightBorder '>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Line"
                                                class="radio-img "> <input class=" d-none icon" type="radio"
                                                    name="shape" value="line"> <img width="35px"
                                                    src="https://influocial.co/staging-pb/assets/images/line-icon.png"
                                                    alt=""></label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Freehand"
                                                class="radio-img">
                                                <input class="d-none icon" type="radio" name="shape" id="freehandRadio"
                                                    value="freehand"><img
                                                    src="https://influocial.co/staging-pb/assets/images/freehand-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Spray Paint" class="radio-img">
                                                <input class="d-none icon" type="radio" name="shape"
                                                    value="sprayPaintButton" id="sprayPaintButton"><img
                                                    src="https://influocial.co/staging-pb/assets/images/spray-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Brush"
                                                class="radio-img backgroundColor">
                                                <input class="d-none icon" type="radio" class="tool" name="shape"
                                                    id="freehandbrush" value="freehandbrush"><img
                                                    src="https://influocial.co/staging-pb/assets/images/brush-icon.png"
                                                    alt="">
                                            </label>

                                            <p class="backgroundColor"><input type="radio" class="tool" name="shape"
                                                    value="spray"> Spray Brush</p>




                                            <p class="backgroundColor"><input type="radio" name="shape"
                                                    id="disabledRadio" value="disabled"> Disabled </p>


                                            <!-- <h3>Upload:</h3> -->
                                            <label data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Insert Image"
                                                class="text-dark bg-transparent border-0 ms-0 p-0 upload-img resize-icon"
                                                for="uploader"><img
                                                    src="https://influocial.co/staging-pb/assets/images/uploadimage-icon.png"
                                                    alt=""></label>
                                            <input class=" d-none" id="uploader">

                                            <div class="d-flex justify-content-start ">
                                                <button class="backgroundColor" type="button"
                                                    id="downloadButton">Download Image</button>
                                                <button type="button"
                                                    class="button-secondary  text-dark bg-transparent border-0  p-0 close-icon-1 "
                                                    data-bs-toggle="tooltip" data-bs-placement="right" title="Eraser"
                                                    id="eraserButton" name="button"><img
                                                        src="https://influocial.co/staging-pb/assets/images/eraser-icon.png"
                                                        alt=""></button>

                                            </div>
                                            <form class="backgroundColor" style="display:none;">
                                                <h3 class="backgroundColor">Input Text:</h3> <input type="text"
                                                    id="textInput" class="form-control" style="display:none;" />
                                            </form>
                                            <button type="button"
                                                class="button-error pure-button text-dark bg-transparent border-0  close-icon-1 p-0 "
                                                href="#" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Clear Canvas" id="clearCanvas" name="button"><img
                                                    src="https://influocial.co/staging-pb/assets/images/canvas-icon.png"
                                                    alt=""></button>
                                        </div>

                                        <div class="line-box">
                                            <span class="close-icon"><i class="bi bi-x float-end"></i></span>
                                            <div class='lightBorder' id="line" style="display:none;">

                                                <div id="line_size" style="display:none;">
                                                    <h3>Line Size: </h3>
                                                    <p><label>Line Width : <input id='lineWidth' type='range' step='1'
                                                                min="1" max="200" value="4"></label></p>
                                                </div>

                                                <div id="line-end" class="line-end" style="display:none;">
                                                    <h3 class="text-white">Line End :</h3>
                                                    <p id="round"><input name="lineCap" id="lineCapRound" value="round"
                                                            type='radio' checked="checked"> Round</p>
                                                    <p id="square"><input name="lineCap" id="lineCapSquare"
                                                            value="square" type='radio'> Square</p>
                                                </div>

                                                <div id="color-end" class="color-end" style="display:none;">
                                                    <h3>Color:</h3>
                                                    <p id="stroke"><label>Stroke : <input id='strokeColor' type='color'
                                                                step='1'> </label></p>
                                                    <p id="brush"><label>Fill Inside : <input id='fillColor'
                                                                type='color' step='1' value="#24B0D5"></label></p>
                                                </div>
                                            </div>

                                            <div id="xordiv" class='lightBorder' style="display:none;">
                                                <p id="fill"> Fill : <input id='fillBox' type='checkbox'
                                                        checked='checked'></p>
                                                <p id="xor"><label style="font-size:12px;">XOR:
                                                        <input id='xor' type='checkbox'></label></p>
                                            </div>

                                            <div id="Polygon-end" class="Polygon-end" style="display:none;">
                                                <p><label>Polygon Sides : <input id='polygonSides' type='range' step='1'
                                                            min="3" max="12"></label></p>
                                            </div>

                                        </div>








                                        <div class="resize-box">
                                            <h3> Width (pixels)<span class="close-icon-1"><i
                                                        class="bi bi-x float-end"></i></span></h3>


                                            <input type="number" class="form-control" id="resizeWidth"
                                                placeholder=" pixels">

                                            <h3> Height  (pixels)</h3>
                                            <input type="number" class="form-control" id="resizeHeight"
                                                placeholder=" pixels">
                                               
                                                <button type="button"
                                                    class="button-secondary  text-black   resize-button "
                                                   
                                                    id="resizeImage" name="button">Apply</button>

                                        </div>

                                    </div>




                                    <div class=" d-none">
                                        <label class="btn btn-primary mb-2" for="uploader">Insert <i
                                                class="bi bi-card-image ps-2"></i></label>
                                        <input class=" d-none" id="uploader">

                                        <h3>Colors:</h3>
                                        <div id="div" class='lightBorder' style="display:none">
                                            <p id="brush" style="display:none"><label>Fill Inside: <input id='fillColor'
                                                        type='color' step='1' value="#24B0D5"></label></p>
                                            <p id="stroke" style="display:none"><label>Stroke : <input id='strokeColor'
                                                        type='color' step='1'> </label></p>
                                            <p class="backgroundColor"><label>Background Color :<input
                                                        id='backgroundColor' type='color' step='1'
                                                        value="#ffffff"></label></p>

                                        </div>



                                        <div id="xordiv" class='lightBorder' style="display:none">
                                            <p id="fill"><label>Fill: <input id='fillBox' type='checkbox'
                                                        checked='checked'></label></p>
                                            <p id="xor"><label style="font-size:12px;">XOR: <input id='xor'
                                                        type='checkbox'></label></p>
                                        </div>

                                    </div>


                                    <canvas id="canvas" width="1554" height="650"></canvas>



                                </div>
                            </div>
                            <input type="hidden" name="lineData" id="lineDataField">
                            <input type="hidden" name="IMAGEDATA" id="IMAGEDATA">

                            <div class="card-footer position-relative">
                                <a href="<?php echo base_url(); ?>request_form" type="button" id="cancel_button"
                                    class="btn btn-primary"> Cancel </a>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer justify-content-between">
                        <div class="d-flex">
                            <button type="button" id="back_button" class="btn btn-link" onclick="back()"><i
                                    class="bi bi-chevron-left"></i> Previous</button>
                            <button type="button" id="next_button" class="btn btn-primary ms-auto" onclick="next()"> <i
                                    class="bi bi-chevron-right"></i> Next </button>
                        </div>
                    </div>
            </div>

            </section>
        </div>
    </div>


    </div>
    </div>
    </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>


document.getElementById("drawingForm").addEventListener("keydown", function (event) {
  if (event.keyCode === 32) {
    event.preventDefault();
  }
});

// document.getElementById("drawingForm").addEventListener("keydown", function (event) {
//   const paintingTitleInput = document.getElementById("paintingtitle");
//   if (paintingTitleInput.value.trim() === ""  ) {
//     event.preventDefault();
//   //  alert("Please provide a title for your painting.");
//   }
// });



    $('.icon').on('click', function () {
        $('.line-box').addClass('hide');

    });

    $('.close-icon').on('click', function () {
        $('.line-box').removeClass('hide');

    });

    $('.resize-icon').on('click', function () {
        $('.resize-box').addClass('hide');

    });

    $('.close-icon-1').on('click', function () {
        $('.resize-box').removeClass('hide');

    });


    $('.resize-icon').on('click', function () {
        $('.line-box').removeClass('hide');

    });

    $('.icon').on('click', function () {
        $('.resize-box').removeClass('hide');

    });
</script>



<script>
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
<script src="<?php echo base_url(); ?>assets/css/form-step.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    $(document).ready(function () {
        $(document).on('click', '#adddiv', function (event) {
            event.preventDefault();
            var clickedButton = $(this);
            $.ajax({
                url: "<?php echo base_url() ?>Test/appenddiv",
                type: 'post',
                success: function (response) {
                    $("#dataTable").append(response);
                    clickedButton.remove();
                }
            });
        });

   

    });
</script>

<script>
    $('#dataTable').on('click', '#deletebutton', function (event) {
        event.preventDefault();
        // Find the parent row and remove it
        var rows = $('#dataTable .row');
        if (rows.length > 1) {
            // Remove the parent row
            $(this).closest('.row').remove();

        }


    });
</script>


<script>
    var canvas,
        context,
        dragging = false, //this will be dragging if mouse move is followed by mouse down
        dragStartLocation,
        snapshot;
    var lineData = [];
   
    var currentX = 0;
    var currentY = 0;

    //----------------------

    const downloadButton = document.getElementById('downloadButton');
    downloadButton.addEventListener('click', downloadCanvasImage);



    function downloadCanvasImage() {
    const canvas = document.getElementById('canvas');
    const image = canvas.toDataURL('image/png');
    const IMAGEDATA = document.getElementById('IMAGEDATA');
    IMAGEDATA.value = image;

    
}


    //  ---------------------


    function getCanvasCoordinates(event) {
        var x = event.clientX - canvas.getBoundingClientRect().left;
        var y = event.clientY - canvas.getBoundingClientRect().top;

        return {
            x: x,
            y: y
        };
    }

    function takeSnapShot() {
        snapshot = context.getImageData(0, 0, canvas.width, canvas.height);
    }
    //These must be added to dragStart()
    function restoreSnapShot() {
        context.putImageData(snapshot, 0, 0);
    }
    var allStoredData = [];

    const lineDataField = document.getElementById('lineDataField');
    $("#lineDataField").val(lineData);
    lineDataField.value = JSON.stringify(lineData);

    var isDrawingLine = false; // Add this variable to track if a line is being drawn

    var selectedLineCap = 'round';
    var selectedSquareCap = 'Square';

    function handleLineCapChange() {
        selectedLineCap = this.value; // Update the selected line cap
        event.stopPropagation();
    }

    document.getElementById('lineCapRound').addEventListener('change', handleLineCapChange);
    document.getElementById('lineCapSquare').addEventListener('change', handleLineCapChange);



    function drawLine(position) {

        var brushStyle = document.getElementById('brush');
        brushStyle.style.display = 'none';

        if (dragging && !isDrawingLine) {
            isDrawingLine = true;
            dragStartLocation = position; // Store the start position
        }

        if (isDrawingLine) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreSnapShot();
            context.globalCompositeOperation = "source-over"; // Reset the composite operation
            context.beginPath();
            context.moveTo(dragStartLocation.x, dragStartLocation.y);
            context.lineTo(position.x, position.y);
            context.stroke();
            context.closePath();
        }

        if (!dragging && isDrawingLine) {
            isDrawingLine = false;

            var lineCapText = '';
            if (selectedLineCap === 'round') {
                lineCapText = '  Line End round ';
            } else if (selectedSquareCap === 'Square') {
                lineCapText = ' Line End Square';
            }

            for (var string = 0; string < 100; string++) {



                var string = 'Line W -' + context.lineWidth + lineCapText + ' Stroke ' + context.strokeStyle;


                lineData.push(string);
                const lineDataField = document.getElementById('lineDataField');
                lineDataField.value = JSON.stringify(lineData);
            }
        }

    }

    let isDrawing = false;
    let lastX = 0;
    let lastY = 0;
    var drawingEnabled = false;




    function handleFreehandChange() {

        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');

        if (freehandRadio.checked) {
            xorCheckbox.checked = false;
            fillCheckbox.checked = false;
        }
    }
    const disabledRadio = document.getElementById('disabledRadio');
   // freehandRadio.addEventListener('change', () => isDrawing = false);
    disabledRadio.addEventListener('change', () => isDrawing = false);


    function startDrawingfreehand(event) {


        if (freehandRadio.checked && !isDrawing) {
            isDrawing = true;
           
            const {
                offsetX,
                offsetY
            } = event;
            context.beginPath();
            handleFreehandChange();
            context.moveTo(offsetX, offsetY);
            context.stroke();
            var string = 'Freehand W -' + context.lineWidth + ' Stroke ' + context.strokeStyle;

         

            if (!lineData.includes(string)) {
                lineData.push(string);
            
            }
            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);



        }
    }






    


    const strokeColorInput = document.getElementById('strokeColor');

    strokeColorInput.addEventListener('change', handleStrokeColorChange);
    let previousStrokeColor = '';

    function handleStrokeColorChange(event) {

        const newStrokeColor = event.target.value;



        if (newStrokeColor !== previousStrokeColor && freehandRadio.checked) {
            context.strokeStyle = newStrokeColor;


            const string = 'Freehand W - ' + context.lineWidth + ' Stroke ' + newStrokeColor;

            if (!lineData.includes(string)) {
                lineData.push(string);
         
            }

            previousStrokeColor = newStrokeColor;

            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);


            
        }

    }




    //----------------------------------------------------------------------------------------------------------------------------------------
    // circle functionality 

    var isDrawingCircle = false; // Add this variable to track if a circle is being drawn
    function drawCircle(position) {
        if (dragging && !isDrawingCircle) {
            isDrawingCircle = true;
            dragStartLocation = position; // Store the center position
        }

        if (isDrawingCircle) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreSnapShot();
            var radius = Math.sqrt(Math.pow((dragStartLocation.x - position.x), 2) + Math.pow((dragStartLocation.y - position.y), 2));
            context.beginPath();
            context.arc(dragStartLocation.x, dragStartLocation.y, radius, 0, 2 * Math.PI);
            context.stroke();
            context.closePath();
        }

        if (!dragging && isDrawingCircle) {
            isDrawingCircle = false;
            var radius = Math.sqrt(Math.pow((dragStartLocation.x - position.x), 2) + Math.pow((dragStartLocation.y - position.y), 2));
            var lineCapText = '';

            if (selectedLineCap === 'round') {
                lineCapText = 'select round ';
            } else if (selectedSquareCap === 'Square') {
                lineCapText = 'select Square ';

            } else {
                lineCapText = 'select Butt ';
            }
            for (var string = 0; string <= 100; string++) {
                var string = 'Circle W -' + context.lineWidth + ' Stroke ' + context.strokeStyle + ' Fill ' + context.fillStyle;

                lineData.push(string);
              
                const lineDataField = document.getElementById('lineDataField');
                lineDataField.value = JSON.stringify(lineData);
            }
        }
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // Ellipse  functionality 
    var isDrawingEllipse = false; // Add this variable to track if an ellipse is being drawn
    function drawEllipse(position) {
        if (dragging && !isDrawingEllipse) {
            isDrawingEllipse = true;
            dragStartLocation = position; // Store the start position
        }

        if (isDrawingEllipse) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreSnapShot();
            var w = position.x - dragStartLocation.x;
            var h = position.y - dragStartLocation.y;

            context.beginPath();
            var cw = (dragStartLocation.x > position.x) ? true : false;
            context.ellipse(dragStartLocation.x, dragStartLocation.y, Math.abs(w), Math.abs(h), 0, 2 * Math.PI, false);
            context.stroke();
            context.closePath();
        }

        if (!dragging && isDrawingEllipse) {
            isDrawingEllipse = false;
            var w = position.x - dragStartLocation.x;
            var h = position.y - dragStartLocation.y;
            for (var string = 0; string <= 10; string++) {
                var string = 'Ellipse W -' + context.lineWidth + ' Stroke ' + context.strokeStyle + ' Fill ' + context.fillStyle;

                lineData.push(string);
                const lineDataField = document.getElementById('lineDataField');
                lineDataField.value = JSON.stringify(lineData);

            }
        }
    }


    //----------------------------------------------------------------------------------------------------------------------------------------
    // Rectangle  functionality 
    var isDrawingRect = false; // Add this variable to track if a rectangle is being drawn
    function drawRect(position) {
        if (dragging && !isDrawingRect) {
            isDrawingRect = true;
            dragStartLocation = position; // Store the start position
        }

        if (isDrawingRect) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreSnapShot();
            var w = position.x - dragStartLocation.x;
            var h = position.y - dragStartLocation.y;
            context.beginPath();
            context.rect(dragStartLocation.x, dragStartLocation.y, w, h);
            context.stroke();
            context.closePath();
        }

        if (!dragging && isDrawingRect) {
            isDrawingRect = false;
            for (var string = 0; string <= 100; string++) {
                var string = 'Rectangle W -' + context.lineWidth + ' Stroke ' + context.strokeStyle + ' Fill ' + context.fillStyle;
                lineData.push(string);
             
                const lineDataField = document.getElementById('lineDataField');
                lineDataField.value = JSON.stringify(lineData);
            }
        }
    }
    //--------------------------------------------------------------------------------------------------------------------------------------
    //Brush

    let freehandbrushdraw = false;


    const freehandbrush = document.getElementById('freehandbrush');
    freehandbrush.addEventListener('change', startDrawingfreehandbrush);

    function handlefreehandbrush() {

        var brushStyle = document.getElementById('brush');
        brushStyle.style.display = 'none';

        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        if (freehandbrush.checked) {
            xorCheckbox.checked = false;
            fillCheckbox.checked = false;
        }

    }

    freehandbrush.addEventListener('change', () => freehandbrushdraw = false);
    disabledRadio.addEventListener('change', () => freehandbrushdraw = false);

    function startDrawingfreehandbrush(event) {

        if (freehandbrush.checked && !freehandbrushdraw) {
            freehandbrushdraw = true;
            const {
                offsetX,
                offsetY
            } = event;
            context.beginPath();
            handlefreehandbrush();
            context.moveTo(offsetX, offsetY);
            context.stroke();
            var string = 'Brush W -' + context.lineWidth + ' Stroke ' + context.strokeStyle;


            if (!lineData.includes(string)) {
                lineData.push(string);
            }
            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);



        }
    }


    strokeColorInput.addEventListener('change', handleStrokeColorChangebrush);
    let previousStrokeColorbrush = '';

    function handleStrokeColorChangebrush(event) {

        const newStrokeColor = event.target.value;



        if (newStrokeColor !== previousStrokeColorbrush && freehandbrush.checked) {
            context.strokeStyle = newStrokeColor;


            const string = 'Brush W - ' + context.lineWidth + ' Stroke ' + newStrokeColor;

            if (!lineData.includes(string)) {
                lineData.push(string);
            }
            //    lineData.push(string);

            previousStrokeColorbrush = newStrokeColor;

            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);


        }

    }

    // free hand





    var isDrawingSquare = false;

    function drawSquare(position) {
        if (dragging && !isDrawingSquare) {
            isDrawingSquare = true;
            dragStartLocation = position;
        }

        if (isDrawingSquare) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreSnapShot();
            var width = position.x - dragStartLocation.x;
            var height = position.y - dragStartLocation.y;

            context.beginPath();
            context.rect(dragStartLocation.x, dragStartLocation.y, width, height);
            context.stroke();
            context.closePath();
        }

        if (!dragging && isDrawingSquare) {
            isDrawingSquare = false;
            var width = position.x - dragStartLocation.x;
            var height = position.y - dragStartLocation.y;
            var info = 'Square W -' + context.lineWidth + ' Stroke ' + context.strokeStyle + ' Fill ' + context.fillStyle;


            lineData.push(info);
            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);
        }
    }


    //----------------------------------------------------------------------------------------------------------------------------------------

    let fountainPenActive = false;
    let pMouseX, pMouseY;




    function lerp(start, end, amount) {
        return (1 - amount) * start + amount * end;
    }
    const vector = {
        x: 5, // Adjust the X component as needed
        y: 5 // Adjust the Y component as needed
    };

    function drawFountainPen(event) {
        if (fountainPenActive) {

            const lerps = 3;
            var position = getCanvasCoordinates(event);
            const currentX = event.clientX - canvas.getBoundingClientRect().left;
            const currentY = event.clientY - canvas.getBoundingClientRect().top;

            for (let i = 0; i < lerps; i++) {
                // Calculate lerped X and Y coordinates
                const lerpAmount = i / lerps;
                const x = lerp(pMouseX, currentX, lerpAmount);
                const y = lerp(pMouseY, currentY, lerpAmount);

                // Draw a line
                context.beginPath();

                context.moveTo(x - vector.x, y - vector.y);
                context.lineTo(x + vector.x, y + vector.y);
                context.stroke();
                context.closePath();
                pMouseX = currentX;
                pMouseY = currentY;
            }


        }
    }








    var sprayPainting = false;
    var sprayRadius = 10; // Adjust the spray radius as needed
    var sprayButtonClicked = false;


    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

  
    function draw(position) {
        var fillBox = document.getElementById("fillBox"),

            shapeRadio = document.querySelector('input[type="radio"][name="shape"]:checked'),
            polygonSides = document.getElementById('polygonSides').value,
            polygonAngle = calculateAngle(dragStartLocation, position),
            lineCap = document.querySelector('input[type="radio"][name="lineCap"]:checked').value,
            writeCanvas = document.getElementById('textInput').value,
            xor = document.getElementById('xor');
          var shape = shapeRadio ? shapeRadio.value : "";
  
        context.lineCap = lineCap;

        //we don't need even't handlers because before drawing we are jsut taking a default value
        if (shape === "spray") {
            drawSpray(position);
        }
         if (shape === "sprayPaintButton") {
            toggleSprayPaint() ;
        }

        if (shape === "circle") {
            drawCircle(position);
        }

        if (shape === "square") {
            drawSquare(position);
        }
        if (shape === "line") {

            drawLine(position);
        }
        if (shape === "ellipse") {
            drawEllipse(position);
        }
        if (shape === "rect") {
            drawRect(position);
        }
        if (shape === "freehand") {
            startDrawingfreehand(event);
        }


        if (shape === "polygon") {
            drawPolygon(position, polygonSides, polygonAngle * (Math.PI / 180));
        }
        if (xor.checked) {
            context.globalCompositeOperation = "xor";
        } else {
            context.globalCompositeOperation = "source-over";
        }
        if (fillBox.checked) {
            context.fill();
        } else {
            context.stroke();
        }


    }


    // Polygon  functionality 
    var isDrawingPolygon = false;


    function drawPolygon(position, sides, angle) {

        if (dragging && !isDrawingPolygon) {
            isDrawingPolygon = true;
            dragStartLocation = position;
        }

        if (isDrawingPolygon) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreSnapShot();
            var coordinates = [],
                radius = Math.sqrt(Math.pow((dragStartLocation.x - position.x), 2) + Math.pow((dragStartLocation.y - position.y), 2)),
                index = 0;

            for (index; index < sides; index++) {
                coordinates.push({
                    x: dragStartLocation.x + radius * Math.cos(angle),
                    y: dragStartLocation.y - radius * Math.sin(angle)
                })
                angle += (2 * Math.PI) / sides;
            }

            context.beginPath();
            context.moveTo(coordinates[0].x, coordinates[0].y);

            for (index = 0; index < sides; index++) {
                context.lineTo(coordinates[index].x, coordinates[index].y);
            }

            context.closePath();
            context.stroke();
        }

        if (!dragging && isDrawingPolygon) {
            isDrawingPolygon = false;

            var polygonSidesValue = polygonSides;
            var polygon_sidesval = polygonSidesValue.value;
            for (var string = 0; string <= 100; string++) {
                var string = ' Polygon W -' + context.lineWidth + ' Sides ' + polygon_sidesval + ' Stroke ' + context.strokeStyle + ' Fill ' + context.fillStyle;

                lineData.push(string);
                const lineDataField = document.getElementById('lineDataField');
                lineDataField.value = JSON.stringify(lineData);
            }

        }
    }

    function displayDrawnShapes() {
        for (const shape of drawnShapes) { }
    }


    function calculateAngle(start, current) {

        var angle = 360 - Math.atan2(current.y - start.y, current.x - start.x) * 180 / Math.PI;


        return angle;
    }


    //Line Width Here

    //Fill Color
    function changeFillStyle() {
        context.fillStyle = this.value;
        event.stopPropagation();

        var string = 'troke Color code and fill color code ' + context.strokeStyle;
    }
    //Stroke Color
    function changeStrokeStyle() {
        context.strokeStyle = this.value;
        event.stopPropagation();
    }

    //backgroundColor
    function changeBackgroundColor() {
        context.save();
        context.fillStyle = document.getElementById('backgroundColor').value;
        context.fillRect(0, 0, canvas.width, canvas.height);
        context.restore();
    }

    function eraseCanvas() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        isDrawingSpray = true;
    }

    function writeCanvas() {
        textX = 25;
        textY = 175;
        context.font = '55px Impact';
        context.fillText(textInput.value, textX, textY);
        event.preventDefault(); // Add this line to prevent color filling
        redrawCanvas(); // Redraw the canvas to update the text position
    }

    function redrawCanvas() {
        context.clearRect(0, 0, canvas.width, canvas.height);

        // Redraw other elements (shapes, lines, etc.)
        context.font = '18px Arial';
        context.fillText(textInput.value, textX, textY);
    }

    //------------------------------------------------------------------------------------------------------------------------------------------
    //  Eraser functionality
    let erasing = false;
    const eraserButton = document.getElementById("eraserButton");
    eraserButton.addEventListener("click", toggleEraser);
    //-----------------------------------------------------------------------------------------------------------------------------------------
    // When eraser clicked all radio button will unchecked
    eraserButton.addEventListener("click", function () {

        const shapeRadioButtons = document.querySelectorAll('input[type="radio"][name="shape"]');
        shapeRadioButtons.forEach((radio) => {
            radio.checked = false;
        });
        const sprayBrushCheckbox = document.getElementById("freehandbrush");
        sprayBrushCheckbox.checked = false;


    });


    //-------------------------------------------------------------------------------------------------------------------------------------------------




    function toggleEraser() {
        erasing = !erasing;
        if (erasing) {
            context.globalCompositeOperation = "destination-out";
        } else {
            context.globalCompositeOperation = "source-over";
        }
    }
  //  ERASER_height = 20;

    function dragStart(event) {
       
        dragging = true;
        dragStartLocation = getCanvasCoordinates(event);
        takeSnapShot();

        if (erasing) {
            context.beginPath();
            context.arc(
                dragStartLocation.x,
                dragStartLocation.y,
 
            );
            context.fill(); // Fill the circle to erase
        }
    }


    function drag(event) {
       
        var position;
        if (dragging === true) {
            restoreSnapShot();
            position = getCanvasCoordinates(event);

            if (erasing) {

                context.lineTo(position.x, position.y);
                context.stroke();
                dragStartLocation = position;
            } else {
                // Your regular drawing code here
                draw(position);
            }
        }
    }

    function dragStop(event) {
        
        dragging = false;
        restoreSnapShot();
        var position = getCanvasCoordinates(event);

        if (erasing) {
            context.lineTo(position.x, position.y);
            context.stroke();
            context.closePath();
            var string = 'Eraser Used';
            lineData.push(string);
            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);
         
        } else {
            // Your regular drawing code here
            draw(position);
        }
    }
    
   // ERASER_WIDTH = 1000; 
   const eraserButton12 = document.getElementById("eraserButton");
        eraserButton12.addEventListener("click", setlinewidth);

        function setlinewidth()
        {
            context.lineWidth = 20;
        }

    //-------------------------------------------------------------------------------------------------------------
    // Disable the eraser in spray

    const toolButtons = document.querySelectorAll('.tool');
    toolButtons.forEach(button => {
        button.addEventListener('click', () => {
            const xorCheckbox = document.getElementById('xor');
            const fillCheckbox = document.getElementById('fillBox');
            xorCheckbox.checked = false; // Uncheck XOR checkbox
            fillCheckbox.checked = true; // Check Fill checkbox
            isDrawingSpray = button.value === 'spray';
            erasing = false; // Disable eraser mode
            context.globalCompositeOperation = "source-over"; // Reset the composite operation
        });
    });

    //-------------------------------------------------------------------------------------------------------------
    // Disable the eraser in line

    const lineButton = document.querySelector('input[type="radio"][name="shape"][value="line"]');
    lineButton.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = true; // Check Fill checkbox
        isDrawingLine = true;
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
    });
    //-------------------------------------------------------------------------------------------------------------
    // Disable the eraser in circle
    const circleButton = document.querySelector('input[type="radio"][name="shape"][value="circle"]');
    circleButton.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = true; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
    });
    //-------------------------------------------------------------------------------------------------------------
    // Disable the eraser in rectangle

    const rectButton = document.querySelector('input[type="radio"][name="shape"][value="rect"]');
    rectButton.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = true; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
    });
    //-------------------------------------------------------------------------------------------------------------
    // Disable the eraser in ellipse

    const ellipseButton = document.querySelector('input[type="radio"][name="shape"][value="ellipse"]');
    ellipseButton.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = true; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
    });
    //-------------------------------------------------------------------------------------------------------------
    // Disable the eraser in polygon

    const polygonButton = document.querySelector('input[type="radio"][name="shape"][value="polygon"]');
    polygonButton.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = true; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
    });

    //---------------------------------------------------------------------------------------------------------

    // <input type="radio" name="shape" id="freehandRadio" value="freehand"> 
    const fountainpen = document.querySelector('input[type="radio"][name="shape"][value="fountainpen"]');
    fountainpen.addEventListener('click', () => {
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = false; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
    });




    // <input type="radio" name="shape" id="freehandRadio" value="freehand"> 
    const freehand = document.querySelector('input[type="radio"][name="shape"][value="freehand"]');
    freehand.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = true; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        context.globalCompositeOperation = "source-over"; // Reset the composite operation


    });

    //---------------------------------------------------------------------------------------------------
    const sprayPaintButton = document.querySelector('input[type="radio"][name="shape"][value="sprayPaintButton"]');
    sprayPaintButton.addEventListener('click', () => {
        context.lineWidth = 2;
        const xorCheckbox = document.getElementById('xor');
        const fillCheckbox = document.getElementById('fillBox');
        xorCheckbox.checked = false; // Uncheck XOR checkbox
        fillCheckbox.checked = false; // Check Fill checkbox
        isDrawingSpray = false; // Disable spray brush mode
        erasing = false; // Disable eraser mode
        let isDrawing = false;
        context.globalCompositeOperation = "source-over"; // Reset the composite operation
         canvas.addEventListener('mousedown', dragStart, false);
        canvas.addEventListener('mousemove', drag, false);
        canvas.addEventListener('mouseup', dragStop, false);
    });

    //---------------------------------------------------------------------------------------------------




    // Spray button functionality

    var isDrawingSpray = false; // Add this variable to track if spray brush is active
    var sprayBrushUsed = false;

    function changeLineWidth() {
        context.lineWidth = this.value;
        event.stopPropagation();
    }

    function drawSpray(position) {
        if (isDrawingSpray) {
            const numParticles = 70; // Increase the number of particles
            const sprayRadius = 20; // Adjust the spray radius

            for (let i = 0; i < numParticles; i++) {
                const angle = Math.random() * Math.PI * 2; // Randomize angle
                const distance = Math.random() * sprayRadius; // Randomize distance within the spray radius
                const offsetX = Math.cos(angle) * distance;
                const offsetY = Math.sin(angle) * distance;
                const x = position.x + offsetX;
                const y = position.y + offsetY;

                context.beginPath();
                context.arc(x, y, Math.random() * 2, 0, Math.PI * 2);
               // context.fill();
                context.closePath();
                if (isDrawingSpray && !sprayBrushUsed) {
                    if (i === numParticles - 1) { // Push data only once at the end of the loop
                        sprayBrushUsed = true; // Set the variable to true


                        var string = ' Sprayss brush Width ' + context.lineWidth + ' Fill ' + context.fillStyle;

                        // alert(string);
                        lineData.push(string);
                        const lineDataField = document.getElementById('lineDataField');
                        lineDataField.value = JSON.stringify(lineData);
                    }
                }
            }
        }
    }
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------
    const clearCanvasButton = document.getElementById('clearCanvas');
    clearCanvasButton.addEventListener('click', function () {

        var string = 'Canvas Cleared';
        lineData.push(string);

        // // Update the lineDataField input value (if needed)
        const lineDataField = document.getElementById('lineDataField');
        lineDataField.value = JSON.stringify(lineData);
    });

    const insertButton = document.getElementById("uploader");

    const radioButtons = document.querySelectorAll('input[type="radio"][name="shape"]');
    insertButton.addEventListener("click", function () {
        canvas.removeEventListener('mousedown', dragStart, false);
        canvas.removeEventListener('mousemove', drag, false);
        canvas.removeEventListener('mouseup', dragStop, false);

        radioButtons.forEach(function (radioButton) {
            radioButton.value
            //addCanvasEventListeners();
        });


        const shapeRadioButtons = document.querySelectorAll('input[type="radio"][name="shape"]');
            shapeRadioButtons.forEach((radio) => {
                radio.checked = false;
    });

        });

    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------
    //function invoked when document is fully loaded
    function init() {

        canvas = document.getElementById('canvas');
        context = canvas.getContext('2d');

        //===================================================================================

        // Resize Image 
        const resizeWidthInput = document.getElementById('resizeWidth');
        const resizeHeightInput = document.getElementById('resizeHeight');

         //===================================================================================
        

        document.getElementById('resizeImage').addEventListener('click', resizeImage);

        function resizeImage() {

           
                  const newWidth = parseInt(document.getElementById('resizeWidth').value);
                  const newHeight = parseInt(document.getElementById('resizeHeight').value);

                if (!isNaN(newWidth) && !isNaN(newHeight)) {
                    img.width = newWidth;
                    img.height = newHeight;
                    const lastImage = images[images.length - 1];
                   context.clearRect(0, 0, canvas.width, canvas.height);
                   restoreCanvasSnapshot();
                    context.drawImage(lastImage.img, lastImage.x, lastImage.y, newWidth, newHeight);
                    
                   
                    
                }
}





        //====================================================================================




        // Initialize variables for image dragging


        let isDragging = false;
        let offsetX, offsetY;
        let images = [];
        let imgX = 0;
        let imgY = 0;
        let enableShapeDrawing = true;
        let draggingImage = null;
        let image;
        var freehandModeActive = false;



        function drawImages(w,h) 
        {
            context.clearRect(0, 0, canvas.width, canvas.height);
            restoreCanvasSnapshot();
            if (images.length > 0) 
            {
                const lastImage = images[images.length - 1];
                if(w=="0" && h=="0")
                {
                    context.drawImage(lastImage.img, lastImage.x, lastImage.y);  
                }
                else
                {
                    context.drawImage(lastImage.img, lastImage.x, lastImage.y,w,h);  
                }
               
            }
        }

        const img = new Image();
        img.onload = function () {
            context.drawImage(img, imgX, imgY);
        };

        const imageLoader = document.getElementById('uploader');
        $('#uploader').on('click', function () {
      
            context.globalCompositeOperation = "source-over";
            imageLoader.addEventListener('change', (e) => {
         
            enableShapeDrawing = false;
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = (event) => {
              
                
                const newImage = new Image();
                newImage.src = event.target.result ;
                
                images.push({ img: newImage, x: imgX, y: imgY });
                img.src = event.target.result;
                
                imageLoader.value = '';
                
            };
  
         takeCanvasSnapshot();
         document.getElementById('resizeWidth').value = '250';
         document.getElementById('resizeHeight').value = '250';

            reader.readAsDataURL(file);
            
            const sprayPaintButton = document.getElementById('sprayPaintButton');
            sprayPaintButton.addEventListener('click',function (){
                isDrawing = false;
                canvas.removeEventListener('mousedown', handleMouseDown);
            });

            const freehandbutton = document.getElementById('freehandRadio');
            freehandbutton.addEventListener('click', function () {
                isDrawing = false;             
                canvas.removeEventListener('mousedown', handleMouseDown);               
            });


            const eraserButton33 = document.getElementById('eraserButton');
            eraserButton33.addEventListener('click', function () {
                isDrawing = false; 
                 erasing = true ;
                 context.globalCompositeOperation = "destination-out";
                canvas.removeEventListener('mousedown', handleMouseDown);
                canvas.addEventListener('mousedown', dragStart, false);
                canvas.addEventListener('mousemove', drag, false);
               canvas.addEventListener('mouseup', dragStop, false);
            });
        

            canvas.addEventListener('mousedown', handleMouseDown);

            function handleMouseDown(e) {
                e.preventDefault();
                e.stopPropagation();
                const mouseX = e.clientX - canvas.getBoundingClientRect().left;
                const mouseY = e.clientY - canvas.getBoundingClientRect().top;

                if (!freehandModeActive) {
                    
                    for (const image of images) {
                        if (
                            mouseX >= image.x &&
                            mouseX <= image.x + image.img.width &&
                            mouseY >= image.y &&
                            mouseY <= image.y + image.img.height
                        ) {
                            isDragging = true;
                            draggingImage = image;
                            offsetX = mouseX - image.x;
                            offsetY = mouseY - image.y;
                        }
                    }
                }
            }


        });
        
        let w,h;
        canvas.addEventListener('mousemove', (e) => {
            if (!dragging && isDragging) {
                   const newWidth = parseInt(document.getElementById('resizeWidth').value);
                   const newHeight = parseInt(document.getElementById('resizeHeight').value);
                   const mouseX = e.clientX - canvas.getBoundingClientRect().left;
                   const mouseY = e.clientY - canvas.getBoundingClientRect().top;
                   draggingImage.x = mouseX - offsetX;
                   draggingImage.y = mouseY - offsetY;
                   if (!isNaN(newWidth))
                   {
                       drawImages(newWidth,newHeight);
                    }
                else
                {
                    drawImages(0,0);
                }
                
               
            }
        });
        
        
        

                canvas.addEventListener('mouseup', () => {
                    isDragging = false;
                   // dragging = false;
                    
                });
                
                canvas.addEventListener('mouseleave', () => {
                   // dragging = false;
                    isDragging = false;
                    
                });

                string = " Image Inserted"  ;
            console.log(string);
           lineData.push(string);
             const lineDataField = document.getElementById('lineDataField');
         lineDataField.value = JSON.stringify(lineData);
                
                
            });
                
                
                
        var lineWidth = document.getElementById('lineWidth'),
            fillColor = document.getElementById('fillColor'),
            strokeColor = document.getElementById('strokeColor'),
            canvasColor = document.getElementById('backgroundColor'),
            clearCanvas = document.getElementById('clearCanvas'),
            textInput = document.getElementById('textInput');
        xorCheckbox = document.getElementById('xor');
        fillCheckbox = document.getElementById('fillBox');

        context.lineWidth = 2;
        context.fillStyle = fillColor.value;
        //--------------------
        canvas.addEventListener('click', function () {
            shape = document.querySelector('input[type="radio"][name="shape"]:checked').value;
            if (shape == "sprayPaintButton") {
             
                if (!isShapeTool(shape)) {
                    if (!sprayPaintActive) {
                        activateSprayPaint();
                    } else {
                        endSprayPaint();
                    }
                }
            } else {
                if (!isShapeTool(shape)) {
                
                    if (!fountainPenActive) {
                        activateFountainPen();
                    } else {
                        endFountainPen();
                    }
                }
            }

        });
        sprayPaintActive = false;

        function activateSprayPaint() {
            
            sprayPaintActive = true;




            canvas.addEventListener('mousemove', drawSprayPaint);
            canvas.addEventListener('click', endSprayPaint);
        }

        function endSprayPaint() {
           
            sprayPaintActive = false;
            canvas.removeEventListener('mousemove', drawSprayPaint);
           // canvas.removeEventListener('mouseup', drawSprayPaint);
            
            canvas.removeEventListener('click', endSprayPaint);
            var string = ' Spray Paint' + ' Fill ' + context.fillStyle;
            lineData.push(string);
            const lineDataField = document.getElementById('lineDataField');
            lineDataField.value = JSON.stringify(lineData);
        }

   



        function startSprayPaint(event) {
          

        }

    


        function drawSprayPaint(event) {
           
            if (sprayPaintActive) {
                var position = getCanvasCoordinates(event);
                for (var i = 0; i < 30; i++) {
                    var offsetX = getRandomInt(-sprayRadius, sprayRadius);
                    var offsetY = getRandomInt(-sprayRadius, sprayRadius);
                    var x = position.x + offsetX;
                    var y = position.y + offsetY;
                    context.fillRect(x, y, 1, 1);

                }
            }
        }

        function isShapeTool(shape) {
            
            const shapeTools = ['rect', 'circle', 'square', 'ellipse', 'polygon', 'freehandbrush', 'freehand', 'spray', 'line'];
            return shapeTools.includes(shape);
        }

        function activateFountainPen() {
           
            fountainPenActive = true;
            pMouseX = 0;
            pMouseY = 0;

            // Add event listeners for fountain pen drawing
            canvas.addEventListener('mousemove', drawFountainPen);
            canvas.addEventListener('click', endFountainPen);
        }

        function endFountainPen() {
            
            fountainPenActive = false;

            canvas.removeEventListener('mousemove', drawFountainPen);
            canvas.removeEventListener('click', endFountainPen);
        }

        var shapeRadios = document.querySelectorAll('input[type="radio"][name="shape"]');

        function addCanvasEventListeners() {
        
            canvas.addEventListener('mousedown', dragStart);
            canvas.addEventListener('mousemove', drag);
            canvas.addEventListener('mouseup', dragStop);


        }


        shapeRadios.forEach(function (radio) {
    
            radio.addEventListener('click', function () {
                var shape = radio.value;
                if (shape == "rect" || shape == "circle" || shape == "square" || shape == "ellipse" || shape == "line" || shape == "polygon" ) {
                    addCanvasEventListeners();
                }
            });
        });


        lineWidth.addEventListener('input', changeLineWidth, false);
        fillColor.addEventListener('input', changeFillStyle, false);
        strokeColor.addEventListener('input', changeStrokeStyle, false);
        canvasColor.addEventListener('input', changeBackgroundColor, false);

        clearCanvas.addEventListener('click', eraseCanvas, false);
        textInput.addEventListener('input', writeCanvas, false);
        const eraserButton = document.getElementById("eraserButton");
        eraserButton.addEventListener("click", toggleEraser);

            



                var freehandModeActive = false;
                var freehandbutton12 = false;
                 freehandbutton = document.getElementById('freehandRadio');
                var isDrawing = false;
                var lastX, lastY;
                var drawingEnabled = false;

                freehandbutton.addEventListener('click', function ()  {
        
                drawingEnabled = freehandbutton.checked;
                if (!freehandModeActive) {
                    isDrawing = false; 
                   
                }
                
            });

     
      
            const eraserButton333 = document.getElementById('eraserButton');
            eraserButton333.addEventListener('click', function () {
                isDrawing = false; 
                 erasing = true ;
                 context.globalCompositeOperation = "destination-out";
                canvas.removeEventListener('mousedown', handleFreehandMousedown);
                canvas.addEventListener('mousedown', dragStart, false);
                canvas.addEventListener('mousemove', drag, false);
               canvas.addEventListener('mouseup', dragStop, false);
            });

   

        
            canvas.addEventListener('mousedown', handleFreehandMousedown);
        

            function handleFreehandMousedown(event) {
        
                if (drawingEnabled && freehandbutton.checked && freehandRadio.checked) {
                    isDrawing = true;
                    lastX = event.offsetX;
                    lastY = event.offsetY;
                    context.beginPath();
                    context.moveTo(lastX, lastY);
                    handleFreehandChange();

                    var string = 'Freehand W -' + context.lineWidth + ' Stroke ' + context.strokeStyle;

                    if (!lineData.includes(string)) {
                        lineData.push(string);
                    }
                const lineDataField = document.getElementById('lineDataField');
                 lineDataField.value = JSON.stringify(lineData);
                
                }
            }

            function removeFreehandMousedownListener() {
            
                canvas.removeEventListener('mousedown', handleFreehandMousedown);
                isDragging = false;
            }

     
            const imageLoaders = document.getElementById('uploader');

            if (imageLoaders) {
                imageLoaders.addEventListener('change', (e) => {
            
                    removeFreehandMousedownListener();


                    
                });
            }

            canvas.addEventListener('mousemove', drag);
            canvas.addEventListener('mouseup', () => isDrawing = true);
            canvas.addEventListener('mouseout', () => isDrawing = false);

            function draw(event) {
                
                if (drawingEnabled && isDrawing) {
                    context.lineTo(event.offsetX, event.offsetY);
                    context.stroke();
                }
            }

            freehandbutton.addEventListener('click', () => {
    
                if (freehandbutton.checked) {
                    canvas.addEventListener('mousedown', handleFreehandMousedown);
                } else {
                    canvas.removeEventListener('mousedown', handleFreehandMousedown);
                }
            });

  

            





        //---------------
        let canvasSnapshot;

        // Function to take a snapshot of the canvas
        function takeCanvasSnapshot() {
            
            canvasSnapshot = context.getImageData(0, 0, canvas.width, canvas.height);
        }

        // Function to restore the canvas snapshot
        function restoreCanvasSnapshot() {
            
            context.putImageData(canvasSnapshot, 0, 0);
        }



        // Event listener for when the mouse is moved
        canvas.addEventListener('mousemove', (event) => {
    
            if (!isDrawing) return;
            const currentX = event.offsetX;
            const currentY = event.offsetY;

            context.lineTo(currentX, currentY); // Draw a line from lastX,lastY to currentX,currentY
            context.stroke(); // Apply stroke to the drawn line

            // Update lastX and lastY
            lastX = currentX;
            lastY = currentY;
        });

        // Event listener for when the mouse button is released
        canvas.addEventListener('mouseup', () => {
        
            isDrawing = false;
           // context.closePath(); // End the drawing path
        });


        //const textInput = document.getElementById('textInput');
        textInput.addEventListener('input', () => {

            redrawCanvas(); // Call a function to redraw the canvas including the text
        });


    }



    window.addEventListener('load', init, false);
</script>
<script>
    jQuery(document).ready(function () {
        $('input:radio[name="shape"]').change(function () {
            if ($(this).val() == 'freehandbrush') {

                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('brush');
                brushStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';



            }
             else if ($(this).val() == 'freehand') {
                // alert('freeh');
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('brush');
                brushStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';


            } 
            else if ($(this).val() == 'line') {

                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xordiv');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('brush');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('fill');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';

            } else if ($(this).val() == 'rect') {
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xordiv');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('brush');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('fill');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';



            } else if ($(this).val() == 'circle') {
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xordiv');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('brush');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('fill');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';

            } else if ($(this).val() == 'square') {
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xordiv');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('brush');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('fill');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';

            } else if ($(this).val() == 'ellipse') {
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xordiv');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('brush');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('fill');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';


            } else if ($(this).val() == 'polygon') {
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xordiv');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('brush');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('fill');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';


            } else if ($(this).val() == 'sprayPaintButton') {
                var ploysideStyle = document.getElementById('line');
                ploysideStyle.style.display = 'block';
                var brushStyle = document.getElementById('line_size');
                brushStyle.style.display = 'none';
                var brushStyle = document.getElementById('color-end');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'none';
                var brushStyle = document.getElementById('brush');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('fill');
                brushStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';

            } else if ($(this).val() == 'fountainpen') {
                var brushStyle = document.getElementById('div');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('brush');
                brushStyle.style.display = 'block';
                var brushStyle = document.getElementById('stroke');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';

            } else if ($(this).val() == 'spray') {
                var ploysideStyle = document.getElementById('stroke');
                ploysideStyle.style.display = 'none';
                var brushStyle = document.getElementById('brush');
                brushStyle.style.display = 'block';
                var ploysideStyle = document.getElementById('Polygon-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('line-end');
                ploysideStyle.style.display = 'none';
                var ploysideStyle = document.getElementById('xor');
                ploysideStyle.style.display = 'none';

            }

        });
    });
</script>





<script>
    $(document).on('blur', '#dataInput', function () {
        thisValue = $(this).val();
        var check = 'PB2023';
        var imploddata = thisValue.split(/[,]+/).filter(function (v) {
            return v !== ''
        }).join('~')
        var data = check + imploddata;

        if (!lineData.includes(data)) {
            lineData.push(data);
        }

    });
</script>

<script>
    $(document).ready(function () {
        $("#Contact_form").validate({
            rules: {
                cust_name: {
                    required: true
                },
                cust_email: {
                    required: true,
                    email: true
                }


            },
            messages: {
                cust_name: {
                    required: "Name is required"
                },
                cust_email: {
                    required: "Email is required",
                    email: "Please enter a valid email address"
                }
            }
        });
    });
</script>

