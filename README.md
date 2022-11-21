# Keyboard Recordings

 キーボードでの演奏・録音をして投稿することができるアプリケーションです。<br>
 投稿する際は、投稿フォームに曲名を入力し録音したwavファイルを指定します。<br>
 ユーザが投稿した録音一覧を表示したり、検索することができます。<br>
 
## DEMO
以下のURLから試すことができます。<br>
https://keyboardrecordings.herokuapp.com/

テスト用アカウント<br>
メールアドレス：test@example.com<br>
パスワード：12345678


## Features
【トップ画面】
キーボードの演奏、演奏の録音・ダウンロード、録音の投稿ができます。<br>
録音の投稿は、登録済みユーザのみです。
 ![top_keyboard](https://user-images.githubusercontent.com/109420472/199146143-ad1163d0-54d7-4aeb-a0df-400c3a0e749d.png)
 ![top_form](https://user-images.githubusercontent.com/109420472/199159501-de26bba9-e9a8-4632-869e-7a43b6ac0f14.png)
 <br><br>
 
 【タイムライン画面】
 自分や他の人が投稿した録音を聴くことができます。
 ![timeline](https://user-images.githubusercontent.com/109420472/200114168-8eed8675-3333-41c2-b5ef-ef6a59aadc3a.png)
 <br><br>
 
 【検索画面】
 投稿された録音を曲名で検索できます。
 ![search](https://user-images.githubusercontent.com/109420472/200114065-af6e83f3-461d-4789-8feb-b6dc0e987f0a.png)
 <br><br>
 
 【マイページ画面】
 ログインユーザが投稿した録音が表示されます。
 録音の曲名の編集、削除が可能です。
 ![mypage](https://user-images.githubusercontent.com/109420472/200113992-521d0a16-66ec-49b0-be97-7809e2cc6d5c.png)
 <br><br>
 
 【お問い合わせ画面】
 ![contact](https://user-images.githubusercontent.com/109420472/200113944-3ad3ac75-3163-4668-9bba-bb8a49277227.png)
 <br><br>
 

 
## Requirement
 
* "php": "^8.0.2",
* "doctrine/dbal": "^3.4",
* "guzzlehttp/guzzle": "^7.2",
* "laravel/framework": "^9.19",
* "laravel/sanctum": "^3.0",
* "laravel/tinker": "^2.7",
* "league/flysystem-aws-s3-v3": "3.*"

## Installation
 
 【インストールと設定】
```bash
git clone
cd recording
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
```
 【.envに設定追加する】
```bash
DB_DATABASE={rcp}
DB_USERNAME={dbuser}
DB_PASSWORD={dbuseraws1090}
```

【マイグレーション実行，サーバ起動】
```bash
php artisan migrate:fresh --seed
php artisan serve --port=8080
```
 
## Note
作成中のアプリです。 <br>
不具合等があった場合、下記にご連絡ください。
 
## Author
 
* 作成者：長嶺夏菜
* 所属：国際電子ビジネス専門学校 情報スペシャリスト科 サイバーセキュリティコース
* E-mail：kana-nagamine-20c@stu.kbc.ac.jp
 
## License
 
"Keyboard Recordings" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).