<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1100, initial-scale=2" />
    <link rel="stylesheet" href="{{ public_path('assets/css/pdf.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        /* vietnamese */
    @font-face {
    font-family: 'Pinyon Script';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/pinyonscript/v17/6xKpdSJbL9-e9LuoeQiDRQR8WOraOrbh.woff2) format('woff2');
    unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
    font-family: 'Pinyon Script';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/pinyonscript/v17/6xKpdSJbL9-e9LuoeQiDRQR8WOvaOrbh.woff2) format('woff2');
    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
    font-family: 'Pinyon Script';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/pinyonscript/v17/6xKpdSJbL9-e9LuoeQiDRQR8WOXaOg.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
        @font-face {
            font-family: monotype;
            src: url(/Monotype\ Corsiva.ttf);
        }

        html {
            zoom: 1.2;
            }

        @media print {
            pre, blockquote {page-break-inside: avoid;}
        }
        .print-btn {
            margin-left: 14px;
            margin-top: 4px;
            margin-bottom: 4px;
            background-color: #eb9121;
            color: #fbffff;
            border-color: antiquewhite;
            font-size: 20px;
            font-weight: 700;
        }
        @page { size: auto;  margin: 0mm; }
            
    </style>
</head>
<body>
    <div id="printarea" style="background-repeat: no-repeat; position: relative;" class="container text-center img-fluid">
        <img style="width: 100%; height: auto;" class="img-fluid" src="{{theme_url('images/certificate.png')}}" alt="">
        <div style="position: absolute;top: 46%;left: 55%;transform: translate(-50%, -50%);font-family: 'Pinyon Script', cursive;" class="innerCertificate">
            <h1 style="font-size: 38px!important;">{{ (!empty($getUserInfo->name))?$getUserInfo->name:'' }}</h1>
        </div>
        <div style="position: absolute;top: 12%;left: 79%;transform: translate(-50%, -50%);font-family: 'Pinyon Script', cursive;" class="innerCertificate">
            <div style="width: 63%; height: auto;" class="img-fluid" alt="">{!! QrCode::size(120)->color(255,90,0)->generate(URL::to($link)) !!}</div>
        </div>
        <div style="position: absolute;top: 57%;left: 55%;transform: translate(-50%, -50%);color: #F57E2A;" class="courseName">
            <h3 style="font-size: 14px!important;">{{ (!empty($course->title))?$course->title:'' }}</h3>
        </div>
        <div style="position: absolute;top: 82%;left: 48%;transform: translate(-50%, -50%);font-family: monotype;" class="dateText">
            <h3 style="font-size: 17px!important;margin: 0px;">{{ $return_date }}</h3>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
<script>
$(document).ready(function () {
    var form = $('.container'),
    cache_width = form.width(),
    a4 = [675.28,941.89]; // for a4 size paper width and height  

    $('#create_pdf').on('click', function () {  
        $('body').scrollTop(0);
        createPDF();
    });
    
    function createPDF() {
        getCanvas().then(function (canvas) {
            var
             img = canvas.toDataURL("http://london.me/themes/edugator/images/certificate.png"),  
             doc = new jsPDF({
                 unit: 'pt',
                 format: 'a4',
                 putOnlyUsedFonts:true
             });
            doc.setFontSize(40);
            doc.addImage(img, 'JPEG', 20,20);
            doc.save('techsolutionstuff-html-to-pdf.pdf');
            form.width(cache_width);
        });
    }
      
    function getCanvas() {
        form.width((a4[0] * 1.1777) - 100).css('max-width', '100%');  
        return html2canvas(form, {
            imageTimeout: 2000,
            dpi: 144,
            removeContainer: true
        });
    }
});
</script>
<script type="text/javascript">
    $("#btn").click(function () {
        $("#btn").hide();
        window.print();
        window.location.reload();
    });
</script>
<script>
document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
</script>
</html>