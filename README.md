# CakePHPを使用したユーザー登録CRUDシステム

## 環境

- Docker
- Nginx
- PHP-fpm
- PHP 7.3
- Node 10.20
- CakePHP3.6
- MySQL5.7

## 各フォルダの構成。


```
config/Migrations/
```
こちらには今回使用しているDBについてまとめてあります。

```
config/Seeds/
```
こちらには今回使用しているDBの初期データをまとめてあります。


```
src/Controller/Compnent/User/
```

こちらにはサービス層として、実際の処理をまとめてあります。
サービス層では、バリデーションやモデルなどを使用しております。

なるべくコントローラーに処理を書かずに、こちらの方に処理をまとめて書くようにしました。

```
src/js/app.js
```
今回のシステムで使用している処理(ポップアップなど)をまとめています。

```
src/scss/main.scss
```
今回のシステムのレイアウトやCSSフレームワークBulumaなどのCSSを記載しています。


```
src/Model/Validation/
```

今回のシステムで使用している各カスタムバリデーションをまとめています。

```
src/Model/Validation/Form
```

今回のシステムで使用している各バリデーションについてまとめてあります。


## 個人で追加したもの

もともと入っていなかったというのもあり、package.jsonを追加しました。

また、SCSSやJSのコンパイラーとしてWebpackも追加しています。
