#Patient Intake & Output Tracker

This project is a patient intake and output tracker for hospital use. It keeps track of patient fluid intake and output, and generates statistical reports for doctors to analyze.

Choose a language for setup instructions:

- [Project setup guide (English)](#project-setup-guide-english)
  - [Setup Instructions](#setup-instructions)
- [專案設定指南 (正體中文)](#專案設定指南-正體中文)
  - [設定指南](#設定指南)
- [プロジェクト設定ガイド (日本語)](#プロジェクト設定ガイド-日本語)
  - [セットアップ方法](#セットアップ方法)

# Project setup guide (English)

This guide will walk you through the installation and configuration of the Patient Intake and Output Tracking System.

##Requirements
You'll need:

PHP >= 7.3
Composer
Laravel >= 8.x

## Setup Instructions

1. Clone this repository:
    ```bash
    git clone https://github.com/yoshikatw/patient-intake-output-tracker.git
    ```
2. Navigate into the directory:
    ```bash
    cd patient-intake-output-tracker
    ```
3. Install the dependencies:
    ```bash
    composer install
    ```
4. Create an `.env` file:
    ```bash
    cp .env.example .env
    ```
5. Generate your `APP_KEY`:
    ```bash
    php artisan key:generate
    ```
6. Configure your database and other settings in the `.env` file.
7. Run database migrations and seeding:
    ```bash
    php artisan migrate --seed
    ```

# 專案設定指南 (正體中文)

本指南將引導你完成病患攝取與排泄追蹤系統的安裝與設定。

##需求

你需要以下工具：

PHP >= 7.3
Composer
Laravel >= 8.x

## 設定指南

1. 複製此存儲庫：
    ```bash
    git clone https://github.com/yoshikatw/patient-intake-output-tracker.git
    ```
2. 導航到該目錄：
    ```bash
    cd patient-intake-output-tracker
    ```
3. 安裝依賴項：
    ```bash
    composer install
    ```
4. 創建一個 `.env` 文件：
    ```bash
    cp .env.example .env
    ```
5. 生成你的 `APP_KEY`：
    ```bash
    php artisan key:generate
    ```
6. 在 `.env` 文件中配置你的數據庫和其他設定。
7. 運行數據庫遷移和種子填充：
    ```bash
     php artisan migrate --seed
    ```

# プロジェクト設定ガイド (日本語)

このガイドは、患者の摂取および排出トラッキングシステムのインストールと設定を案内します。

##要件
次のツールが必要です：

PHP >= 7.3
Composer
Laravel >= 8.x

## セットアップ方法

1. このリポジトリをクローンします：
    ```bash
    git clone https://github.com/yoshikatw/patient-intake-output-tracker.git
    ```
2. ディレクトリに移動します：
    ```bash
    cd patient-intake-output-tracker
    ```
3. 依存関係をインストールします：
    ```bash
    composer install
    ```
4. `.env` ファイルを作成します：
    ```bash
    cp .env.example .env
    ```
5. APP_KEY を生成します：
    ```bash
    php artisan key:generate
    ```
6. データベースとその他の設定を `.env` ファイルに設定します。
7. 最後に、データベースマイグレーションとシーディングを実行します：
    ```bash
    php artisan migrate --seed
    ```
