'use strict';
module.exports = (sequelize, DataTypes) => {
  const patient = sequelize.define('patient', {
    // id:{
    //   type: sequelize.INTEGER,
    //   primaryKey: true,
    //   autoIncrement: true
    // },
    fullname: DataTypes.STRING
  }, {});
  patient.associate = function(models) {
    // associations can be defined here
  };
  return patient;
};