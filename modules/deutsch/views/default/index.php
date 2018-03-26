<div id="card"></div>

<div id="auth-form">
    <p id="auth">
        <input type="text" class="form-control" id="nick" placeholder="введите Ник">
    </p>
    <button type="submit" class="btn-success" onclick="logAuth()" id="log_btn"><p>Войти</p></button>
</div>

<div id="search-form">
    <p>
        <input type="text" class="form-control" id="word" placeholder="Начните вводить перевод">
    </p>
</div>

<button type="submit" class="btn-success" onclick="onTest()" id="test"><p>Проверить</p></button>
<button type="submit" class="btn-success" onclick="openTranslation()" id="open_translation"><p>Открыть перевод</p></button>
<button type="submit" class="btn-success" onclick="nextCard()" id="next"><p>Следующая карточка</p></button>
<button type="submit" class="btn-success thin" onclick="showWords()" id="show_words"><p>Посмотреть слова</p></button>
<button type="submit" class="btn-success thin" onclick="showStats()" id="show_stats"><p>Посмотреть статистику</p></button>

<div id="tour">

</div>

<script id="userId"></script>
<script>

    $(document).ready(function() {
        $('#word').focus(
            function () {
                $(this).select();
            });

        $('#word').autoComplete({
            minChars: 3,
            source: function (term, suggest) {
                term = term.toLowerCase();

                $.getJSON("http://servyz.xyz:8098/datas/translations/", function (data) {
                    console.log(data);
                    choices = data;
                    var suggestions = [];
                    for (i = 0; i < choices.length; i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);

                }, "json");

            }
        });

        $.ajax({
            type: "GET",
            url: "http://servyz.xyz:8098/datas/get-word-card/",
            success: function(html){
                $("#card").html(html);
            }

        });


        var word_form = document.getElementById('word');
        var open_translation = document.getElementById('open_translation');
        var test_btn = document.getElementById('test');
        var card = document.getElementById('card');
        var next = document.getElementById('next');
        var auth_form = document.getElementById('auth-form');
        var user_id = 0;



        word_form.style.display = 'none';
        open_translation.style.display = 'none';
        test_btn.style.display = 'none';
        card.style.display = 'none';
        next.style.display = 'none';


        /*$.get('https://ipinfo.io/json', function (data) {

         siteBlockListener('888', 'body', data);
         });
         */

        if($.cookie('the_cookie') == 'Рома' || $.cookie('the_cookie') == 'мама' || $.cookie('the_cookie') == 'Мишич') {
            var user = $.cookie('the_cookie');
            auth_form.style.display = 'none';
            $.ajax({
                type: "GET",
                url: "http://servyz.xyz:8098/datas/login/",
                data: "name=" + user,
                success: function(resp){
                    $("#userId").html('var user_id = ' + resp );
                    $.ajax({
                        type: "GET",
                        url: "http://servyz.xyz:8098/datas/get-marks/",
                        data: "id=" + resp,
                        success: function(resp){
                            $("#tour").html(resp);

                        }

                    });
                }

            });

            word_form.style.display = 'block';
            open_translation.style.display = 'block';
            test_btn.style.display = 'block';
            card.style.display = 'block';
            next.style.display = 'block';
        }

    });

    function onTest() {
        var word = $("#word").val();
        var auth_form = document.getElementById('auth-form');
        var test_btn = document.getElementById('test');
        auth_form.style.display = 'none';
        translation.style.display = 'block';
        open_translation.style.display = 'none';
        test_btn.style.display = 'none';

        //console.log(user_id);

        if(word == '') {
            alert('Вы не выбрали ответ!');
            return;
        }

        $.ajax({
            type: "POST",
            url: "http://servyz.xyz:8098/datas/test-translation/",
            data:'word=' + word +
            '&id=' + word_id +
            '&user_id=' + user_id,
            success: function(html){
                $("#tour").html(html);
                $("body").scrollTop(0);

            }

        });

    }

    function openTranslation() {
        $.ajax({
            type: "POST",
            url: "http://servyz.xyz:8098/datas/test-translation-fail/",
            data:
            'id=' + word_id +
            '&user_id=' + user_id,
            success: function(){
                var translation = document.getElementById('translation');
                var word_form = document.getElementById('word');
                var open_translation = document.getElementById('open_translation');
                var test_btn = document.getElementById('test');

                translation.style.display = 'block';
                word_form.style.display = 'none';
                open_translation.style.display = 'none';
                test_btn.style.display = 'none';
                $("body").scrollTop(0);
            }

        });

    }

    function logAuth(){
        var nick = $("#nick").val();
        $.cookie('the_cookie', nick, { expires: 90 });
        document.location.reload();
    }

    function nextCard() {
        if( document.getElementById('test').style.display == 'block'){
            $.ajax({
                type: "POST",
                url: "http://servyz.xyz:8098/datas/test-translation-fail/",
                data:
                'id=' + word_id +
                '&user_id=' + user_id,
                success: function(){
                    //console.log('gg ');
                    document.location.reload();
                }

            });
        }

        else document.location.reload();

    }

    function onPlay() {

        var aud_play = document.getElementById('aud_play');
        aud_play.play();

    }

    function onPlayPhrase() {
        var aud_play_phrase = document.getElementById('aud_play_phrase');
        aud_play_phrase.play();
    }

    function showWords() {
        document.location.href = "http://servyz.xyz:888/deutsch_show.html";

    }

    function showStats() {
        $.ajax({
            type: "GET",
            url: "http://servyz.xyz:8098/datas/get-user-stats/",
            data: "id=" + user_id,
            success: function(resp){
                $("#tour").html(resp);

            }

        });
    }

</script>





