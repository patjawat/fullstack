module.exports = {
  developmentxx: {
    client: 'sqlite3',
    connection: {
      filename: './dev.sqlite3'
    }
  },
  staging: {
    client: 'postgresql',
    connection: {
      database: 'my_db',
      user:     'username',
      password: 'password'
    },
    pool: {
      min: 2,
      max: 10
    },
    migrations: {
      tableName: 'knex_migrations'
    }
  },
  production: {
    client: 'pg',
    connection: {
      database: 'pos',
      user:     'postgres',
      password: 'admin'
    },
    searchPath: ['knex', 'public'],
    pool: {
      min: 2,
      max: 10
    },
    migrations: {
      tableName: 'knex_migrations'
    }
  },
  development: {
    client: 'mysql',
    connection: {
      host: '127.0.0.1',
      port: '3307',
      database: 'testdb',
      user:     'root',
      password: 'docker',
      
    },
    pool: {
      min: 2,
      max: 10
    },
    migrations: {
      tableName: 'knex_migrations'
    }
  }
};