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

                                <div class="form-group d-flex justify-content-between">
                                    <label>Add a Description<span><i class="bi bi-question-circle"></i></span></label>

                                </div>

                                <div id="dataTable">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-12 description-section">
                                            <!-- <div class="edit-section">
                                    <button id="adddiv"><i class="bi bi-plus"></i><small>ADD</small></button>
                                </div> -->
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
                                        <input type="file" id="uploader" />
                                        <div class='lightBorder mb-0'>



                                            <label class="radio-img " data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Rectangle">
                                                <input type="radio" name="shape" value="rect" class=" d-none icon">
                                                <img src="https://influocial.co/staging-pb/assets/images/rectangle.png"
                                                    alt="">

                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Circle"
                                                class="radio-img">
                                                <input class="" type="radio" name="shape" value="circle">
                                                <img src="https://influocial.co/staging-pb/assets/images/circle-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Square"
                                                class="radio-img">
                                                <input class="" type="radio" name="shape" value="square">
                                                <img src="https://influocial.co/staging-pb/assets/images/square-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Ellipse"
                                                class="radio-img">
                                                <input class="" type="radio" name="shape" value="ellipse">
                                                <img src="https://influocial.co/staging-pb/assets/images/elipse-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Polygon"
                                                class="radio-img">
                                                <input class="" type="radio" name="shape" value="polygon">
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
                                                <input class="" type="radio" name="shape" id="freehandRadio"
                                                    value="freehand"><img
                                                    src="https://influocial.co/staging-pb/assets/images/freehand-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Spray Paint" class="radio-img">
                                                <input class="" type="radio" name="shape"
                                                    value="sprayPaintButton" id="sprayPaintButton"><img
                                                    src="https://influocial.co/staging-pb/assets/images/spray-icon.png"
                                                    alt="">
                                            </label>
                                            <label data-bs-toggle="tooltip" data-bs-placement="right" title="Brush"
                                                class="radio-img backgroundColor">
                                                <input class="" type="radio" class="tool" name="shape"
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
                                                    class="button-secondary  text-dark bg-transparent border-0  p-0 "
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
                                                class="button-error pure-button text-dark bg-transparent border-0   p-0 "
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
<input type="file" id="uploader" onchange="handleFileUpload()" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>





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



  

    let isDrawing = false;
    let lastX = 0;
    let lastY = 0;
    var drawingEnabled = false;


    const strokeColorInput = document.getElementById('strokeColor');
    
    let previousStrokeColor = '';
    let previousStrokeColorbrush = '';
    var isDrawingSquare = false;
    let fountainPenActive = false;
    let pMouseX, pMouseY;
    var sprayPainting = false;
    var sprayRadius = 10; // Adjust the spray radius as needed
    var sprayButtonClicked = false;
    function draw(position) {
        var fillBox = document.getElementById("fillBox"),
            // shape = document.querySelector('input[type="radio"][name="shape"]:checked').value,

            shapeRadio = document.querySelector('input[type="radio"][name="shape"]:checked'),
            polygonSides = document.getElementById('polygonSides').value,
            polygonAngle = calculateAngle(dragStartLocation, position),
            lineCap = document.querySelector('input[type="radio"][name="lineCap"]:checked').value,
            writeCanvas = document.getElementById('textInput').value,
            xor = document.getElementById('xor');
          var shape = shapeRadio ? shapeRadio.value : "";
          // drawingEnabled = freehandbutton.checked;
        //global context
        context.lineCap = lineCap;
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


 
  //  ERASER_height = 20;

    function dragStart(event) {
       console.log("eraserstart");
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
                console.log("drag_eraser");
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
        console.log("eraser_used");
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
            draw(position);
        }
    }
    
  



    // Spray button functionality

    var isDrawingSpray = false; // Add this variable to track if spray brush is active
    var sprayBrushUsed = false;

    function changeLineWidth() {
        context.lineWidth = this.value;
        event.stopPropagation();
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

        // const shapeRadioButtons = document.querySelectorAll('input[type="radio"][name="shape"]');
        // shapeRadioButtons.forEach((radio)=> { radio.checked = false; });
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

            restoreCanvasSnapshot();
                  const newWidth = parseInt(document.getElementById('resizeWidth').value);
                  const newHeight = parseInt(document.getElementById('resizeHeight').value);

                if (!isNaN(newWidth) && !isNaN(newHeight)) {
                    img.width = newWidth;
                    img.height = newHeight;
                    const lastImage = images[images.length - 1];
                   // console.log(lastImage);
                 //  context.clearRect(0, 0, canvas.width, canvas.height);
                 //  restoreCanvasSnapshot();
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
               // console.log(lastImage);
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
            
            imageLoader.addEventListener('change', (e) => {
                alert("hello");
                context.globalCompositeOperation = "source-over";
            enableShapeDrawing = false;
            images.length = 0;
            const file = e.target.files[0];
            console.log(file);
          //  const reader = new FileReader();
            const timestamp = new Date().getTime();
            const fileNameWithTimestamp = `${timestamp}_${file.name}`;

            const reader = new FileReader();
                reader.onload = (event) => { 
                    const newImage = new Image();
                    const dataURL = event.target.result;
                    newImage.src = dataURL;
                    images.push({ img: newImage, x: imgX, y: imgY});
                    console.log(images);
                    img.src = dataURL;
                    takeCanvasSnapshot();
                    const lineDataField = document.getElementById('lineDataField');
                    lineDataField.value = JSON.stringify(lineData);
                    document.getElementById('resizeWidth').value = '0';
                    document.getElementById('resizeHeight').value = '0';
                    imageLoader.value = '';
                };
                reader.readAsDataURL(file);
      

        

            canvas.addEventListener('mousedown', handleMouseDown);

            function handleMouseDown(e) {
                console.log('handleMouseDown');
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
              //  console.log('startttttt');
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
                  //  console.log("stop");
                    isDragging = false;
                   // dragging = false;
                    
                });
                
                canvas.addEventListener('mouseleave', () => {
                   // dragging = false;
                    isDragging = false;
                    
                });
                
                
            });
                
                
                
        var lineWidth = document.getElementById('lineWidth'),
            fillColor = document.getElementById('fillColor'),
            strokeColor = document.getElementById('strokeColor'),
            canvasColor = document.getElementById('backgroundColor'),
            clearCanvas = document.getElementById('clearCanvas'),
            textInput = document.getElementById('textInput');
        xorCheckbox = document.getElementById('xor');
        fillCheckbox = document.getElementById('fillBox');


        const eraserButton12 = document.getElementById("eraserButton");
        eraserButton12.addEventListener("click", setlinewidth);

        function setlinewidth()
        {
            context.lineWidth = 20;
            isDrawing = false; 
            canvas.removeEventListener('mousedown', handleMouseDown);
        
            
        }

        context.lineWidth = 2


        context.fillStyle = fillColor.value;
        sprayPaintActive = false;

        function isShapeTool(shape) {
            
            const shapeTools = ['rect', 'circle', 'square', 'ellipse', 'polygon', 'freehandbrush', 'freehand', 'spray', 'line'];
            return shapeTools.includes(shape);
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
                if (shape == "rect" || shape == "circle" || shape == "square" || shape == "ellipse" || shape == "line" || shape == "polygon") {
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
       // xorCheckbox.addEventListener('change', handleXORCheckboxChange, false);
       // fillCheckbox.addEventListener('change', handleFillCheckboxChange, false);
        const eraserButton = document.getElementById("eraserButton");
        

            
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

            canvas.addEventListener('mousedown', handleFreehandMousedown);
            function handleFreehandMousedown(event) {
        
                if (drawingEnabled && freehandbutton.checked && freehandRadio.checked) {
                    
                    isDrawing = true;
                    lastX = event.offsetX;
                    lastY = event.offsetY;
                    context.beginPath();
                    context.moveTo(lastX, lastY);
                   // takeCanvasSnapshot();
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

          //  canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mousemove', drag);
          //  canvas.addEventListener('mouseup', dragStop);
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