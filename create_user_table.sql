-- データベースの選択（存在しない場合は作成）
CREATE DATABASE IF NOT EXISTS users;
USE users;

-- usersテーブルの作成
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
