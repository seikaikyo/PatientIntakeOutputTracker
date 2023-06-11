# Patient Intake and Output Tracking System

**[English](README_en.md) | [中文](README_zh-TW.md) | [日本語](README_ja.md)**

Please choose a language to continue.

# 患者の摂取と排出追跡システム (README_ja.md)

## 概要

「患者の摂取と排出追跡システム」は、医療従事者が患者の摂取と排出を追跡するためのアプリケーションです。このシステムを使用すると、看護師は患者が摂取または排出した物質の種類と量を記録することができます。その後、データは診断と治療のために医師によって閲覧および分析されます。

## 機能

1. **データ入力**：摂取/排出の種類、内容、量を記録します。データエントリの時間と日付も記録できます。
2. **データ表示**：患者の摂取/排出の記録を表形式で表示します。必要に応じて各エントリを削除できます。
3. **摂取/排出合計計算**：患者が摂取または排出した物質の合計量を自動的に計算します。
4. **ワンクリックダウンロード**：ワンクリックでデータを PDF ファイルとしてダウンロードし、共有や保存が容易になります。
5. **データの視覚化**：摂取/排出データを棒グラフ形式で表示し、より明瞭で直感的な理解を可能にします。

## インターフェース

システムは、医療従事者がデータを入力および閲覧しやすいようにユーザーフレンドリーなインターフェースを備えています。

1. **摂取/排出エントリーフォーム**：インターフェースの左側には、患者の摂取または排出の詳細を入力するためのフォームがあります。
2. **データ表示テーブル**：右側には、入力されたデータが表形式で表示されます。必要に応じて記録を削除するオプションもあります。
3. **ダウンロードボタン**：下部には、表示されたデータを PDF ファイルとしてダウンロードするためのボタンがあります。
4. **棒グラフ**：下部には、摂取と排出の合計量を比較する棒グラフが表示されます。

## 使用法

1. **データの入力**：摂取または排出のデータを入力するには、インターフェースの左側のフォームに記入します。
2. **データの削除**：記録を削除するには、テーブル内の対応するデータエントリの隣にある「削除」ボタンをクリックします。
3. **データのダウンロード**：データを PDF としてダウンロードするには、インターフェースの下部にある「ダウンロード」ボタンをクリックします。
4. **チャートの表示**：摂取/排出データをチャート形式で表示するには、インターフェースの下部までスクロールします。

## セットアップ

セットアップとインストールの手順については、[プロジェクトのセットアップガイド](Setup.md)を参照してください。

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
