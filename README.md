# BBS
phpで構築したレガシーなBBS

# 動作要件

言語  ：PHP7  
DB    ：MySQL5.7  
Webサーバ ：Apache2  
その他：Composer

# 機能概要
掲示板機能を提供する。  
以下の機能を持つ  
①．スレッド毎のレス表示機能  
②．レス投稿機能  
③．スレッド作成機能  
 
# インストール
 
1.Githubからソースを落とす  
2.Apacheのhttpd.confにて、DocumentRootを'htdocs'に向ける  
 また、rewriteModuleがロードされていなければ設定を追加する  
```
LoadModule rewrite_module modules/mod_rewrite.so
```
3.以下のコマンドを実行
```
composer install
```
