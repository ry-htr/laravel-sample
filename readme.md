## Laravelの練習を兼ねたサンプルアプリケーション

[ララ帳 初めてのLARAVEL](https://laravel10.wordpress.com/category/%E3%81%AF%E3%81%98%E3%82%81%E3%81%A6%E3%81%AE-laravel-5-1/)を見ながら作成している。

### メモ

- artisan コマンドを使用してモデルを生成するとき
```
php artisan make:model Hoge
```
とするが、この時生成されるファイルはapp直下に生成される。
別のディレクトリに生成したい場合は、
```
php artisan make:model Models/Hoge
```
などとすると良い
