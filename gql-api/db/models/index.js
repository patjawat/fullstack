import Sequelize from 'sequelize';
import path from 'path';
// const env = process.env.NODE_ENV || "development";
const env = process.env.NODE_ENV || "mariadb";
const config    = require(path.join(__dirname, '../../', 'config', 'database.json'))[env];


if (process.env.DATABASE_URL) {
  var sequelize = new Sequelize(process.env.DATABASE_URL,{
    underscored: true,
  });
} else {
  var sequelize = new Sequelize(config.database, config.username, config.password,{
    dialect:config.dialect,
    define:{
      underscored: true,
    },
  });
}

let db = {
    User: sequelize.import('./user'),
    Article: sequelize.import('./article'),
    Tag:sequelize.import('./tag'),
    Product:sequelize.import('./product'),
    Patient:sequelize.import('./Patient')
};

Object.keys(db).forEach((modelName) => {
  if ('associate' in db[modelName]) {
    db[modelName].associate(db);
  }
});

db.sequelize = sequelize;

export default db