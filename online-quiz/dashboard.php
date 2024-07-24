<?php
session_start();
include "header.php";
if(!isset($_SESSION['username']))
{
    ?>
    <script type="text/javascript">
       window.location.href = "login.php";
    </script>
    <?php
}
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <br>
        <div class="row">
            <br>
            <div class="col-lg-2 col-lg-push-10">
                <div id="current_que" style="float: left;">0</div>
                <div style="float: left;">/</div>
                <div id="total_que" style="float: left;">0</div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color:white" id="load_ques"></div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
                <div class="col-lg-12 text-center">
                    <input type="button" class="btn btn-warning" value="previous" onclick="load_previous();">&nbsp;
                    <input type="button" class="btn btn-warning" value="next" onclick="load_next();">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function load_total_que() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("total_que").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "ajax/load_total_ques.php", true);
    xhttp.send();
}

var question_no = "1";
load_questions(question_no);

function load_questions() {
    document.getElementById("current_que").innerHTML = question_no;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.responseText == "over") {
                window.location = "result.php";
            } else {
                document.getElementById("load_ques").innerHTML = xhttp.responseText;
                load_total_que();
            }
        }
    };
    xhttp.open("GET", "ajax/load_ques.php?question_no=" + question_no, true);
    xhttp.send();
}

function load_previous() {
    if (question_no == "1") {
        load_questions(question_no);
    } else {
        question_no = eval(question_no) - 1;
        load_questions(question_no);
    }
}

function load_next() {
    question_no = eval(question_no) + 1;
    load_questions(question_no);
}

function save_ans(rvalue, question_no) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log("Response from server: " + xhttp.responseText);
        }
    };
    xhttp.open("GET", "ajax/save_quess.php?question_no=" + question_no + "&rvalue=" + rvalue, true);
    xhttp.send();
}

</script>

<?php
include "footer.php";
?>

