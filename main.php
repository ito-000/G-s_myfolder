<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>音声文字起こし</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>

<body>
    <h1>文字起こし</h1>
    
<button id='btn'>音声認識スタート</button>
<!--<form action = 'main_insert.php' method 'POST'>-->
    <!--音声認識終了ボタン押下でtextをサーバに保存-->
    <!--ボタンを押したら登録画面に遷移-->
    <!--<input type ='submit' value = '音声認識終了' onclick = "location.href = 'main_select.php'" id ='btne'>-->
    <!--「音声認識終了」ボタンでストップするようにしたい-->
 <!--<input type = 'button' value = '音声認識終了' id ='btne'>-->
    <div id='content'></div>
<!--</form>-->   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //音声認識処理
        const speech = new webkitSpeechRecognition();
        //日本語に対応したweb speech apiを使用可能
        speech.lang = 'ja-jp';

        //イベント実行処理
        const btn = document.getElementById('btn');
        //const btne = document.getElementById('btne');
        const content = document.getElementById('content');

        btn.addEventListener('click', function () {
            //音声認識スタート 
            speech.start();
        });

        /*btne.addEventListener('click', function () {
            //音声認識終了
            speech.stop();
        })*/

        /*speech.addEventListener('result' , function(e){
            
            //音声認識で取得した情報を、コンソールに表示
            console.log(e);
        
        //音声認識で取得した情報を、HTMLに表示
        const text = e.results[0][0].transcript;
        content.innerText = text;
        
        } );*/

        //音声自動文字起こし機能
        speech.onresult = function (e) {
            speech.stop();
            if(e.results[0].isFinal){
                //何で急に'var'？
                var autotext = e.results[0][0].transcript
                content.innerHTML +='<div>' + autotext + '</div>';
                console.log(e);
                console.log(autotext);
            }
        }

        speech.onend = () => {
            speech.start()
        };
    </script>

    <form action="bookmark.php" method = "post">
    <p class = 'choice'><input type="checkbox" name = "mail">保存しますか？</p>
    <p class = 'choice'><input type="submit" value = "確定"></p>
    </form>
</body>

</html>