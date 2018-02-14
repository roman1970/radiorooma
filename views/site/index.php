<div class="container">
    <h3><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>Радио Комната С Мехом<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
        <br><hr><p class="an">Ведущий - Бард, который перевернул ЗИЛ - неортодоксальный круглогодичный Дед Мороз с гитарой и пулей в голове,
            поёт песни сам, а не заставляет клиентов исполнять стихи за еду сомнительного происхождения в праздничной упаковке,
            5000р - это только первая минута, потом - бесплатно и фиг выгоните.
            Приходит как к детям, так и ко взрослым (по VIP-цене - в виде белочки).</p></h3>

    <div id="radio_block">

        <audio id="au_test" ></audio>
        <audio id="au_second" ></audio>
        <audio id="au_bard" ></audio>

        <button type="submit" class="btn-success" id="radio_test"><p style="font-size: 35px;">&infin;</p></button>

        <button type="submit" class="btn active-button" onclick="onTest()" id="play_btn">
            <span class="glyphicon glyphicon-play"></span>
        </button>

        <button type="submit" class="btn active-button" onclick="stopRadio()" id="stop_btn">
            <span class="glyphicon glyphicon-stop"></span>
        </button>

        <div id="info">

        </div>

        <div id="current_text"></div>


        <div id="dev_res"></div>


    </div>

    <div class="icons" >
        <p class="out-services-icon">
            <span id="track-info-ic"}>

            </span>

        </p>
    </div>

</div>
<script>

    /* $(document).ready(function() {

         $.get('https://ipinfo.io/json', function (data) {

             siteBlockListener('radiorooma', 'body', data);
         });

     });
     */

    var player_test = document.getElementById('au_test');

    var stop_btn = document.getElementById('stop_btn');
    var play_btn = document.getElementById('play_btn');
    var info = document.getElementById('info');

    var radio_back = document.getElementById('radio_back');
    var canal = '';
    stop_btn.style.display = 'none';


    // var test_button = document.getElementById('radio_test');

    var radioTestClasses = document.getElementById("radio_test").classList;


    setTimeout(function run() {

        $.ajax({
            type: "GET",
            url: "site/show-current-radio-tracks-test/",
            success: function(html){
                $("#radio_test").html(html);
            }

        });

        $.ajax({
            type: "GET",
            url: "site/show-info-icon/",
            success: function(html){
                $("#track-info-ic").html(html);
            }

        });


        setTimeout(run, 10000);

    }, 10000);




    function onTest(){

        changeActiveClass(radioTestClasses);
        canal = 'test';
        player_test.src = 'http://88.212.253.193:8000/test';
        player_test.play();
        play_btn.style.display = 'none';


        if(stop_btn.style.display == 'none')
            stop_btn.style.display = 'block';

        //info.style.display = 'none';

        /*$.get('https://ipinfo.io/json', function (data) {

            siteBlockListener('radiorooma', 'test_canal', data);
        });
        */


    }


    function stopRadio() {

        canal = '';

        player_test.pause();
        player_test.src = '';

        play_btn.style.display = 'block';
        stop_btn.style.display = 'none';
        if(radioTestClasses.contains('active-button')) radioTestClasses.remove('active-button');


        /* $.get('https://ipinfo.io/json', function (data) {

             siteBlockListener('radiorooma', 'stop_canal', data);
         });
         */

    }

    function showInfo() {
        window.location.href = 'site/show-track-info/';
    }

    function changeActiveClass(elAddClass, elRemClass_1='', elRemClass_2='') {
        if(elAddClass.contains('active-button')) return;
        else elAddClass.add('active-button');
        // if(elRemClass_1.contains('active-button')) elRemClass_1.remove('active-button');
        // if(elRemClass_2.contains('active-button')) elRemClass_2.remove('active-button');
    }

    function siteBlockListener(site, block, ip_json) {
        // console.log(ip_json);

        new Fingerprint2().get(function(result, components){
            //console.log(result); //a hash, representing your device fingerprint
            //console.log(components); // an array of FP components

            $.ajax({
                url: "http://servyz.xyz:8098/datas/come-in/",
                type:'POST',
                data:'components=' + JSON.stringify(components) +
                '&hash=' + result +
                '&site='+ site +'&block=' + block +
                '&ip_json=' + JSON.stringify(ip_json)
                // success: function(html){
                //    $("#dev_res").html(html);
                //}
            });
        });
    }



</script>