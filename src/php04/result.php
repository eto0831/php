<?php

require_once('config/status_codes.php');

$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
// ↑$answer_codeに　　　　　　　　　　　　　↑インデックスｐｈｐから正解を持ってくる
$option = htmlspecialchars($_POST['option'], ENT_QUOTES);
 //↑$optionに　　　　　　　　　　　　 ↑インデックスｐｈｐからユーザーの解答を持ってくる
if (!$option) {
    header('Location: index.php');
    // ↑もし回答が空だったらheaderを使ってリロード　インデックスｐｈｐに戻る
}
            // ↓ステータスコーズの配列すべてがステータスコードになるまで繰り返す
foreach($status_codes as $status_code){
                    // ↓ステータスコードｐｈｐのコードと送信された正解のコードが同じものを探す
    if($status_code['code'] === $answer_code){
        // ↓$codeに上で正解と一致した配列のコードを代入
        $code = $status_code['code'];
        $description = $status_code['description'];
        // ↑$descriptionに一致した配列のdescriptionキー
    }
    $result = $option === $code;
    // ↑正解と決めた$codeとユーザーが入力したデータが同じなら$resultとする
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>
<body>
    
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">
                Status Code QUiz
            </a>
        </div>

    </header>
    <main>
        <div class="result__content">
            <div class="result">
                <!-- ↓正解なら -->
                <?php if ($result): ?>
                <h2 class="result__text--correct">正解</h2>
                <!-- ↓それ以外なら -->
                <?php else: ?>
                <h2 class="result__text--incorrect">不正解</h2>
                <?php endif; ?>
                <!-- ↑ここで分岐終わり　だから最後は:じゃなくて; -->
            </div>
            <div class="answer-table">
                <table class="answer-table__inner">
                    <tr class="answer-table__row">
                        <th class="answer-table__header">ステータスコード</th>
                        <td class="answer-table__text"><?php echo $code ?></td>
                    </tr>
                    <tr class="answer-table__row">
                        <th class="answer-table__header">説明</th>
                        <td class="answer-table__text"><?php echo $description ?></td>
                    </tr>
                </table>

            </div>         
        </div>

    </main>  
    
</body>
</html>