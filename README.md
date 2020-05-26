# 概要

- ミニシアターで上映されている映画を観る予定を投稿できるサービスです。  
- 映画館、上映日、タイトルを入力して投稿できます。    
- 自分だけではなく他のユーザーの投稿を見ることも可能です。  
  
URL [minitheater_schedule](https://infinite-taiga-85491.herokuapp.com)


# 機能詳細
  
## 投稿一覧
週単位で画面を移動できます  
また表示する投稿を自分のものだけするか、全てのユーザーのものにするかを切り替えられます
  
![画面移動](https://user-images.githubusercontent.com/58389827/82873766-f216fb00-9f6f-11ea-82f0-fd24dd26af65.gif)

## 投稿
映画館、上映日、タイトルを選択して投稿  
送信後は選択した上映日の画面にリダイレクトします  
  
![投稿](https://user-images.githubusercontent.com/58389827/82874049-62258100-9f70-11ea-8d15-3fbb53be37db.gif)


## 記録の確認
これまで自分の行った投稿の一覧を確認できます  
月ごと、映画館ごとに投稿した回数を表示します  
  
![記録](https://user-images.githubusercontent.com/58389827/82874142-7b2e3200-9f70-11ea-9be9-1fad67c2466a.png)

## リスポンシブ対応
ブラウザの幅によってレイアウトが変化します  

# 開発環境  
- macOS Mojave バージョン10.14.6
- PHP 7.4.4
- mysql 10.4.11-MariaDB

# セキュリティ対策  
- XSS(クロスサイトスクリプティング) への対策のためhtmlspecialchars関数の使用
- sha1関数を利用しログインに使用するパスワードのハッシュ化

