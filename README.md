

<h1 align="center">
  🐘🎯 Refactoring of the old MyBonsaiApi code to hexagonal architecture and DDD
</h1>

## 🚀 Environment setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. [Install Docker Compose](https://docs.docker.com/compose/install/https://www.docker.com/get-started)
3. Clone this project: `git clone https://github.com/sebasdb2111/refactor_myBonsaiApi_to_DDD.git`
4. Move to the project folder: `cd cqrs-ddd-php-example`

### 🛠️ Environment configuration

1. Create a local environment file if needed: `cp .env .env.local`
3. Add `api.mybonsaiapi.localhost` domain to your local hosts: `echo "127.0.0.1 api.mybonsiapi.localhost"| sudo tee -a /etc/hosts > /dev/null`

### 🌍 Application execution

1. Install PHP dependencies and bring up the project Docker containers with Docker Compose: `make build`
2. Go to [the API health check page](http://api.mybonsaiapi.localhost:8030/status)
