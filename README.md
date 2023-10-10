# E-Declaration App

### Environment  setup

1. Install docker with docker-compose with WSL2 (Ubuntu)

2. Build and run a project (From WSL2 Ubuntu terminal)
```
make prepare
```

3. Prepare MySQL database connection using credentials from .env file
```
MYSQL_DATABASE=nordspace_db
MYSQL_USER=nordspace
MYSQL_PASSWORD=nordspace
DB_PORT=3306
```

5. Seed DB
```
make seed
```

5. Start application
```
make run
```

6. Open web browser url http://127.0.0.1:8000/


### Stops docker services

```
make stop
```
