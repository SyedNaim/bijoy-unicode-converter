<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Unicode to Bijoy Converter - BanglaText</title>
    <meta name="description" content="Convert Bangla unicode text to old bijoy format and Bijoy text into unicode text." />

    <meta name="keywords" content="unicode, bijoy," />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

</head>
<body>
 <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center mb-3">NSM Bangla Converter</h4>
                <textarea class="form-control" id="input" placeholder="ইউনিকোড কি-বোর্ডের লেখা এখানে পেস্ট করুন" rows="8"></textarea>
            </div>
            <div class="col-md-12">
                <div class="col-md-6" style="margin:0 auto">
                <div class="mt-2 mb-2 d-flex justify-content-between">
                    <button class="btn btn-primary" id="U2B"><i class="fas fa-arrow-down"></i>&nbsp;&nbsp;ইউনিকোড থেকে বিজয়</button>
                    <button class="btn btn-success" id="B2U"><i class="fas fa-long-arrow-alt-up"></i>&nbsp;&nbsp;বিজয় থেকে ইউনিকোড</button>
                    <button class="btn btn-danger" id="clear" title="Clear"><i class="fa-solid fa-rotate"></i>&nbsp;&nbsp;মুছে ফেলুন</button>
                </div>
               </div>
                <div class="ajex_loding mt-3">
                    <img src="img/loader.gif" alt="Loading...">
                </div>
            </div>
            <div class="col-md-12 output_box">
                <textarea class="form-control" id="output" placeholder="বিজয় কি-বোর্ডের লেখা এখানে পেস্ট করুন" rows="8"></textarea>
                <button title="Copy to Clipboard" class="btn btn-secondary mt-3 w-100" id="cutbtn"></button>
            </div>
        </div>
    </div>
<script>
    $('#cutbtn').click(function() {
        var copyText = document.getElementById("output");
        copyText.select();
        document.execCommand("copy");
    });

    $('#clear').click(function() {
        $('#input').val('');
        $('#output').val('');
    });

    $('#U2B').click(function() {
        $('.ajex_loding').show();
        $('#U2B').prop('disabled', true);
        $.ajax({
            url: 'php/convart.php',
            type: 'POST',
            data: { unicode: $('#input').val() },
            success: function(response) {
                $('#output').val(response);
                $('#U2B').prop('disabled', false);
                $('.ajex_loding').hide();
            },
            error: function() {
                alert('Server Error');
            }
        });
    });

    $('#B2U').click(function() {
        $('.ajex_loding').show();
        $('#B2U').prop('disabled', true);
        $.ajax({
            url: 'php/convartbijoytounicode.php',
            type: 'POST',
            data: { bijoy: $('#output').val() },
            success: function(response) {
                $('#input').val(response);
                $('#B2U').prop('disabled', false);
                $('.ajex_loding').hide();
            },
            error: function() {
                alert('Server Error');
            }
        });
    });
</script>
</body>
</html>
