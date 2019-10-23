<!-- 問題１ 変数$i = 100; を用意し、100から1まで1つずつカウントダウンするプログラムを作成してください。 （1つずつ改行して表示して下さい） -->
<?php
for($i =100; $i>1; $i--){
  echo $i . '<br>';
}
?>
<!-- 終了 -->



<?php
echo'<br>';
?>
<!-- 問題２  正の整数1から9に、それぞれ3を掛けた数を半角スペース区切りで出力して下さい。 -->
<?php
for($i =1; $i<=9; $i++){
  echo $i*3 . ' ';
}
?>
<!-- 終了 -->
<!-- 半角スペース' '重要！　改行と間違わないように -->



<?php
echo'<br>';
?>
<!-- 問題３  1から100までの数をプリントするプログラムを書きなさい。 ただし3の倍数のときは数の代わりに｢Fizz｣と、5の倍数のときは｢Buzz｣とプリントし、3と5両方の倍数の場合には｢FizzBuzz｣とプリントすること。 -->

<?php
for($i = 1; $i<=100; $i++){
  if ($i%15 == 0){
    echo 'FizzBuzz'.'<br>';
  }else if ($i%3==0){
    echo 'Fizz'.'<br>';
  }else if ($i%5==0){
    echo 'Buzz'.'<br>';
  }else{
    echo $i .'<br>';
  }
 }
?>
<!-- 終了 -->


<?php
echo'<br>';
?>
<!-- 問題４  1〜100までの数字を表示させるプログラムを作りましょう。 ※出力のレイアウトは下記のように表示すること（数字を10個表示したタイミングで改行する） -->
<!-- クエスチョン　1010,2020と１０の倍数が２つ出てくる -->
<?php
for($i = 1; $i<=100; $i++){
  echo $i ;
  if($i % 10==0){
    echo '<br>';
  }
}
?>
<!-- echoのダブり表示に注意 -->
<!-- 終了 -->



<?php
echo'<br>';
?>
<!-- 問題５　下記のような配列変数「alpha」があります。この配列のうち、'A'という文字が何回登場してくるか計算して結果を出力してください。 -->
<?php
$alpha = ['E', 'A', 'D', 'B', 'A', 'C', 'A', 'B', 'E', 'E', 'A', 'A', 'C'];
$count = 0;
foreach($alpha as $value){
  if($value==='A'){
$count++;
  }
}
echo $count;
?>
<!-- 終了 -->



<?php
echo'<br>';
?>
<!-- 問題6
 英語と数学で合格判定。英語と数学それぞれが60点以上かつ、合計点が140点以上の場合「合格！」それ以外は「残念！」と表示してください。 -->
<!-- $english = 70; //英語の点数
$math = 70; //数学の点数
※変数に代入する数字は任意で変更して試してください。 -->
<?php
$english = 89;
$math = 40;
if ($english + $math > 140  && $english> 60 && $math> 60){
  echo '合格';
}else {
  echo'不合格です';
 }
echo'<br>';
?>


<!-- 問題7
九九を表示するプログラムを書いてください。
以下のようなレイアウトで表示するようにしてください。
1 2 3 4 5 6 7 8 9
2 4 6 8 ...
3 6...
4 8 ... -->

<!-- 
<?php
for($i =1; $i <= 9; $i++){
  $ans = 1*$i;
  echo $ans;
}
?>
これは１✖９までを模擬で作ったもの -->
<!-- <解答> -->
<table border= "1">
<?php
for($a = 1; $a <=9; $a++){
  echo '<tr>';
    for($i = 1; $i <= 9; $i++){
        $ans = $a * $i;
        echo'<td>' . $ans . '</td>';
    }
    echo'</tr>';
}
?>
</table>
<!-- table込みで作成見やすくしてみた -->
<!-- 解決 -->


<!-- 問題8
100以下の素数を表示するプログラムを書いてください。 素数とは、1とその数自身以外では割り切れない数です。 1は素数には含みません。 例: 7は1と7でしか割れないため素数です。 -->





<?php
function color_get($i) {
    if ($i == 0) return '#ff0000'; elseif ($i == 6) return '#0000ff'; else return '#000000';
}
$m = $_GET['m'];
if ($m) {
    $year = date('Y', strtotime($m . '01'));
    $month = date('n', strtotime($m . '01'));
} else {
    $year = date('Y');
    $month = date('n');
}
$day = date('j');
$weekday = array('日', '月', '火', '水', '木', '金', '土');
echo '<TABLE cellpadding="4" cellspacing="1" style="background-color : #aaaaaa;text-align : center;"><CAPTION style="padding : 4px;"><A href="?m=' . date('Ym', mktime(0, 0, 0, $month , 1, $year - 1)) . '">&lt;&lt;</A> <A href="?m=' . date('Ym', mktime(0, 0, 0, $month - 1 , 1, $year)) . '">&lt;</A> ' . $year . '年' . $month . '月 <A href="?m=' . date('Ym', mktime(0, 0, 0, $month + 1 , 1, $year)) . '">&gt;</A> <A href="?m=' . date('Ym', mktime(0, 0, 0, $month , 1, $year + 1)) . '">&gt;&gt;</A></CAPTION><TBODY><TR>';
$i = 0;
while ($i <= 6) {
    $c = color_get($i);
    echo '<TD style="color : ' . $c . ';background-color : #eeeeee;">' . $weekday[$i] . '</TD>';
    $i++;
}
echo '</TR><TR>';
$i = 0;
while ($i != date('w', mktime(0, 0, 0, $month, 1, $year))) {
    echo '<TD style="background-color : #ffffff;">　</TD>';
    $i++;
}
for ($days = 1; checkdate($month, $days, $year); $days++) {
    if ($i > 6) {
        echo '</TR><TR>';
        $i = 0;
    }
    $c = color_get($i);
    if ($days == $day) $bc = '#ffff00'; else $bc = '#ffffff';
    echo '<TD style="color : ' . $c . ';background-color : ' . $bc . ';">' . $days . '</TD>';
    $i++;
}
while ($i < 7) {
    echo '<TD style="background-color : #ffffff;">　</TD>';
    $i++;
}
echo '</TR></TBODY></TABLE>';

?>