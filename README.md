## Overview

This project is an e-commerce platform built using Laravel. It features Redis for caching and queue management, GitHub Actions for CI/CD workflows, and deployment to DigitalOcean

### Table of Contents

Prerequisites

Installation

Running Locally

Docker Setup

### Features
Cart Management: Add, update, and delete products in the cart.
Real-Time Updates: Redis-powered caching for faster performance.
CI/CD Integration: Automated testing and deployment with GitHub Actions.
Dockerized Environment: Simplified local development setup

### Prerequisites

Before you begin, ensure you have the following installed:

PHP (>=8.3)

Composer

Node.js (>=14)

Docker & Docker Compose

Redis

Git

DigitalOcean Account

Installation

Clone the repository:
```
 git clone https://github.com/V-a-l-a-ry/cart.git
 ```
 Install dependencies:
 ```
 composer install
npm install
```
Set up the environment variables:
```
cp .env.example .env
```
Generate the application key:
```
php artisan key:generate
```
Running the Application
```
php artisan serve
```
