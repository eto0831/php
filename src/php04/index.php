<?php

require_once('config/status_codes.php');

$random_numbers = array_rand($status_codes, 4);
// ↑四つに絞る　　　　　　　　　　　↑別データの$status_codes配列
foreach($random_numbers as $index){
    $options[] = $status_codes[$index];
    //  ↑情報が入った配列として拾うため[]がついてる
}
// ↓これは問題文/解答
$question = $options[mt_rand(0,3)];
                    //  ↑一個に絞ってる
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/php04" class="header__logo">
                Status Code Quiz
            </a>            
        </div>
    </header>

    <main>
        <div class="quiz__content">
            <div class="question">
                <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでください</p>
                <p class="question__text">
                    <?php echo $question['description']?>
                    <!-- ↑上で一個に絞られた回答から['description']キーを呼びだしてる -->
                </p>
            </div>
        
        <form action="result.php" class="quiz-form" method ="post">
            <input type = "hidden" name="answer_code" value ="<?php echo $question['code'] ?>">
                                      <!-- ↑ここのnameの物の、valueの値がユーザーに見えない解答として送られる-->
            <div class="quiz-form__item"> 
                <!-- ↓四つに絞られた選択肢の数だけ繰り返す -->
                <?php foreach($options as $option):?>
                                        <!-- ↑ここで$optionになる　情報を含んだ配列の一つ -->
                <div class="quiz-form__group">            
                    <input type="radio" class="quiz-form__radio" id ="<?php echo $option['code'] ?>" name ="option" value="<?php echo $option['code']?>">
                                                              <!-- 　　　↑idも同じにする必要　　　　　　　　　　　↑ここのnameの物の、valueの値がユーザーの選択肢として送信される -->
                    <label class="quiz-form__label" for="<?php echo $option['code']?>">
                                                    <!-- ↑ラベルのforも紐づけたいformの要素のidと同じにずる必要 -->
                    <?php echo $option['code']?>
                    </label>
                 </div>
                 <?php endforeach; ?>
                 <!-- ↑ここでｐｈｐによる繰り返し終了 -->
            </div>
            <div class="quiz-form__button">
                <button class="quiz-form__button-submit" type ="submit">
                    回答
                </button>
            </div>
        </form>
        </div>     
    </main>    
</body>
</html>